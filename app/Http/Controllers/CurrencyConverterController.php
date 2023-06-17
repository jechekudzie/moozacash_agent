<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyConverterController extends Controller
{
    public function convertPairs(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $amount = $request->input('fromAmount');

        $url = "https://api.exchangeratesapi.io/v1/convert?access_key=" . env('EXCHANGE_RATES_API') . "&from=$from&to=$to&amount=$amount";

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
