<?php

namespace App\Http\Controllers;

use App\Models\Record;
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

        $record = new Record();
        $record->input = $request->amount . " " . $request->from;
        $record->output = $result;
        $record->save();

        // return $record->first();
        return view("exchange-result", [
            "result" => $result,
            "fromCurrency" => $request->from,
            "inputAmount" => $request->amount,
            "records" => $record->all()
        ]);
    }
}
