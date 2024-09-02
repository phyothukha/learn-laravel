<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    //
    public function exchange(Request $request)

    {
        $rates =  Http::get("https://forex.cbm.gov.mm/api/latest")->object()->rates;
        $fromCurrency = str_replace(",", "", $rates->{strtoupper($request->from)});
        $toCurrency = str_replace(",", "", $rates->{strtoupper($request->to)});

        $mmk = $request->amount * $fromCurrency;
        $result = round($mmk / $toCurrency, 2) . " " . $request->to;
        return view("exchange-result", [
            "result" => $result,
            "toCurrency" => $request->to,
            "inputAmount" => $request->amount

        ]);
    }
}
