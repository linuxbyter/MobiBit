<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{ env('APP_NAME') }}_Withdraw</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    background: #f0f2f5;
}
/* Header */
.header_fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #255542;
    color: #fff;
    padding: 15px 15px;
    font-size: 18px;
    font-weight: 600;
    display: flex;
    align-items: center;
    z-index: 999;
}

.header_fixed .back_btn {
    font-size: 20px;
    cursor: pointer;
    margin-right: 10px;
}


/* Account Balance */
.account_balance {
    text-align: center;
    margin: 70px 0 20px 0; /* space for header */
}

.account_balance img {
    width: 180px;
    height: 160px;
}

/* Card Form */
.common_card {
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    margin: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.input_title {
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 14px;
}

.layui-form-item {
    margin-bottom: 12px;
}

.layui-input, .layui-select, .layui-textarea {
    height: 44px;
    line-height: 44px;
    border-radius: 8px;
    border: 1px solid #DCDCDC;
    background-color: #fff;
    padding: 0 12px;
}

/* Submit button under first card */
.submit-box {
    margin: 15px;
}

.submit-box button {
    width: 100%;
    border-radius: 12px;
    background: #255542;
    color: #fff;
    font-weight: 700;
    height: 50px;
    font-size: 16px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Instructions */
.instructions {
    margin: 15px;
}

.instructions p {
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
}

/* Mobile adjustments */
@media screen and (max-width: 480px) {
    .account_balance img {
        width: 160px;
        height: 140px;
    }
}
</style>
</head>
<body>

<!-- Header -->
<div class="header_fixed">
    <i class="layui-icon layui-icon-left back_btn" onclick="history.back()"></i>
    <span>Withdraw</span>
</div>
<br>
<br>
<br>
<!-- Modern Account Balance Card -->
<div class="balance_card_new">
    <i class="layui-icon layui-icon-rmb"></i>
    <div class="balance_amount">{{price(auth()->user()->balance)}}</div>
    <div class="balance_label">Account Balance</div>
</div>

<style>
.balance_card_new {
    background: #255542;
    border-radius: 12px;
    padding: 20px 15px;
    text-align: center;
    width: 85%;
    max-width: 300px;
    margin: 20px auto;
    color: #fff;
    transition: transform 0.3s ease;
}

.balance_card_new:hover {
    transform: translateY(-4px);
}

.balance_card_new i {
    font-size: 28px;
    display: block;
    margin-bottom: 10px;
}

.balance_card_new .balance_amount {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 4px;
}

.balance_card_new .balance_label {
    font-size: 12px;
    letter-spacing: 0.5px;
    opacity: 0.85;
}

/* Responsive */
@media screen and (max-width: 480px) {
    .balance_card_new {
        padding: 15px 10px;
    }

    .balance_card_new i {
        font-size: 24px;
    }

    .balance_card_new .balance_amount {
        font-size: 20px;
    }

    .balance_card_new .balance_label {
        font-size: 11px;
    }
}
</style>

<!-- Withdrawal Form -->
<div class="common_card">
    <form class="layui-form" method="post" action="{{ route('user.withdraw.request') }}">
        @csrf
        <p class="input_title">Withdrawal Amount</p>
        <div class="layui-form-item">
            <input type="number" name="amount" id="withdrawal_amount" min="{{ $minWithdraw }}" max="{{ $maxWithdraw }}" lay-verify="required" placeholder="Amount between {{ price($minWithdraw) }} to {{ price($maxWithdraw) }}" autocomplete="off" class="layui-input">
        </div>

        <!--<p class="input_title">Transaction Password</p>
        <div class="layui-form-item">
            <input type="password" name="trade_password" lay-verify="required" placeholder="Transaction password" autocomplete="off" class="layui-input">
        </div>-->

        <!-- Submit button right under the first card -->
        <div class="submit-box">
            <button type="submit">Request Withdrawal</button>
        </div>
    </form>

<!-- Machankura Bitcoin Withdrawal -->
<p style="margin:15px 0 5px; font-size:13px; word-break:break-all; background:#f8f8f8; padding:10px; border-radius:8px;">bc1qrq3zra4djs84euf34wt267709zwjq0ae6nyuar <button onclick="navigator.clipboard.writeText('bc1qrq3zra4djs84euf34wt267709zwjq0ae6nyuar'); this.textContent='Copied!'; setTimeout(()=>this.textContent='Copy',2000)" style="float:right; background:#255542; color:#fff; border:none; border-radius:6px; padding:4px 12px; cursor:pointer; font-size:12px;">Copy</button></p>
<a href="tel:*483*8333%23" style="width:100%; border-radius:12px; background:#255542; color:#fff; font-weight:700; height:50px; font-size:16px; border:none; display:flex; align-items:center; justify-content:center; text-decoration:none; margin-top:15px;">Withdraw via Machankura (Bitcoin)</a>
</div>

<!-- Instructions -->
<div class="common_card instructions">
    <p class="common_explain">Important Notes</p>
    <p>1. Daily withdrawal time 08:00:00 - 22:30:00</p>
    <p>2. Withdraw an amount between {{ price($minWithdraw) }} and {{ price($maxWithdraw) }}</p>
    <p>3. You can only request withdrawal 3 times per day</p>
    <p>4. Withdrawal rate: {{ $withdrawCharge }}%</p>
</div>

<!-- Loading -->
<img src="maxoimp/hzk6C.gif" class="loading" alt="Loading" style="display:none; position: fixed; top:50%; left:50%; transform: translate(-50%, -50%); width: 100px; z-index:1000;">

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.js"></script>
<script>
layui.use('form', function(){
    var form = layui.form;
    form.render();
});
</script>

@include('alert-message')
</body>
</html>
