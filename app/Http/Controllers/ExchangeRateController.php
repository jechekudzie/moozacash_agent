<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the exchange rates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangeRates = ExchangeRate::all();

        return view('admin.rates', compact('exchangeRates'));
    }

    /**
     * Show the form for creating a new exchange rate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchange-rates.create');
    }

    /**
     * Store a newly created exchange rate.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'currency_code' => 'required|max:3',
            'rate' => 'required|numeric'
        ]);

        $exchangeRate = new ExchangeRate($validated);
        $exchangeRate->save();

        return redirect()
            ->route('exchange-rates.index')
            ->with('success', 'Exchange rate created.');
    }

    /**
     * Show the form for editing an exchange rate.
     *
     * @param \App\Models\ExchangeRate $exchangeRate
     * @return \Illuminate\Http\Response
     */
    public function edit(ExchangeRate $exchangeRate)
    {
        return view('exchange-rates.edit', compact('exchangeRate'));
    }

    /**
     * Update an exchange rate.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExchangeRate $exchangeRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExchangeRate $exchangeRate)
    {
        $validated = $request->validate([
            'currency_code' => 'required|max:3',
            'rate' => 'required|numeric'
        ]);

        $exchangeRate->update($validated);

        return redirect()
            ->route('exchange-rates.index')
            ->with('success', 'Exchange rate updated.');
    }

    /**
     * Delete an exchange rate.
     *
     * @param \App\Models\ExchangeRate $exchangeRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExchangeRate $exchangeRate)
    {
        $exchangeRate->delete();

        return redirect()
            ->route('exchange-rates.index')
            ->with('success', 'Exchange rate deleted.');
    }
}
