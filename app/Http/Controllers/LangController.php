<?php

namespace App\Http\Controllers;
/**
 * Laravel/Symfony Developer
 * Name: abubakar
 * Telegram: @NANO_DEV
 * Hire me via Telegram: @NANO_DEV
 */
use Illuminate\Http\Request;
use App;
class LangController extends Controller
{
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
}
