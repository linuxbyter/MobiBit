<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\Setting;
use Carbon\Carbon;

class WithdrawController extends Controller
{
    public function withdraw_history()
    {
        $withdraws = Withdrawal::where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();

        return view('app.main.withdraw_history', compact('withdraws'));
    }

    public function withdraw()
    {
        $setting = Setting::first();
        $minWithdraw = $setting->minimum_withdraw ?? 0;
        $maxWithdraw = $setting->maximum_withdraw ?? 0;
        $withdrawCharge = $setting->withdraw_charge ?? 0;

        if (auth()->user()->gateway_method && auth()->user()->gateway_address) {
            return view('app.main.withdraw.index', compact('minWithdraw', 'maxWithdraw', 'withdrawCharge'));
        }

        return redirect()->route('user.bank')->with('success', 'First create a bank account');
    }

    public function withdrawRequest(Request $request)
    {
        $now = Carbon::now('Africa/Nairobi');

        // time restriction
        if ($now->hour < 8 || $now->hour >= 22) {
            return redirect()->back()->with('error', 'Withdrawals are allowed only between 08:00 AM and 10:00 PM.');
        }

        // daily limit
        $dailyWithdrawCount = Withdrawal::where('user_id', auth()->id())
            ->whereDate('created_at', Carbon::today())
            ->count();

        if ($dailyWithdrawCount >= 3) {
            return redirect()->back()->with('error', 'You can only withdraw 3 times per day.');
        }

        // validation
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $user = auth()->user();
        $setting = Setting::first();

        // deposit check
        $payments = Deposit::where('user_id', $user->id)->where('status', 'approved')->count();
        if ($payments < 1) {
            return redirect()->back()->with('error', "You can't withdraw before depositing.");
        }

        // investment check
        if (!Purchase::where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', "You need to invest before withdrawing.");
        }

        $amount = $request->amount;

        // balance check
        if ($amount > $user->balance) {
            return redirect()->back()->with('error', 'Insufficient balance for withdrawal.');
        }

        // min/max check
        if ($amount < $setting->minimum_withdraw) {
            return redirect()->back()->with('error', 'Minimum withdrawal is KES ' . number_format($setting->minimum_withdraw, 2));
        }

        if ($amount > $setting->maximum_withdraw) {
            return redirect()->back()->with('error', 'Maximum withdrawal is KES ' . number_format($setting->maximum_withdraw, 2));
        }

        // charge
        $charge = 0;
        if ($setting->withdraw_charge > 0) {
            $charge = ($amount * $setting->withdraw_charge) / 100;
        }

        $finalAmount = $amount - $charge;

        // debit wallet (IMPORTANT)
        $debit_wallet = debit_user_wallet($user->id, 2, 'KES', $amount);

        if ($debit_wallet['status'] == false) {
            return redirect()->back()->with('error', $debit_wallet['message']);
        }

        $reference = rand(10000, 99999);

        // ❌ NO AUTO TRANSFER — ALWAYS PENDING
        $status = 'pending';

        $paymenMethod = PaymentMethod::where('tag', $setting->auto_transfer_default)->first();

        $withdrawal = new Withdrawal();
        $withdrawal->user_id = $user->id;
        $withdrawal->method_name = $paymenMethod->name ?? 'Manual';
        $withdrawal->trx = $reference;
        $withdrawal->account_info = json_encode([
            'bank_account' => $user->gateway_address,
            'full_name' => $user->realname,
            'bank_name' => $user->bank_name,
            'bank_code' => $user->gateway_method,
        ]);
        $withdrawal->number = $user->gateway_address;
        $withdrawal->amount = $amount;
        $withdrawal->currency = 'KES';
        $withdrawal->charge = $charge;
        $withdrawal->oid = 'W-' . rand(100000, 999999);
        $withdrawal->final_amount = $finalAmount;
        $withdrawal->status = $status;

        if ($withdrawal->save()) {

            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->reason = 'withdraw_request';
            $ledger->perticulation = 'Withdrawal request submitted';
            $ledger->amount = $amount;
            $ledger->debit = $finalAmount;
            $ledger->status = 'pending';
            $ledger->date = now()->format('Y-m-d H:i');
            $ledger->save();
        }

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
    }

    public function withdrawPreview()
    {
        $withdraws = Withdrawal::with('payment_method')
            ->where('user_id', Auth::id())
            ->orderByDesc('id')
            ->get();

        return view('app.main.withdraw_history', compact('withdraws'));
    }
}