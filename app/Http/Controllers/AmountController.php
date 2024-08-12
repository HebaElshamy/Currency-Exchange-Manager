<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AmountController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();
        $amounts = Amount::where('user_id', $userId)->get();
        $currencies = Config::get('exchangeRates');
        return view('amounts.index', compact('amounts', 'currencies'));
    }

    public function store(Request $request)
{
    // Base validation rules
    $rules = [
        'amount' => 'required|numeric',
        'currency' => 'required|string',
    ];

    // If "Other" is selected, validate the custom currency field
    if ($request->input('currency') === 'other') {
        $rules['custom_currency'] = 'required|string|size:3';
    }

    // Validate the request data
    $validatedData = $request->validate($rules);

    // Determine the final currency value
    $currency = $request->input('currency') === 'other'
        ? $request->input('custom_currency')
        : $request->input('currency');

    // Create the new amount record
    Amount::create([
        'amount' => $request->amount,
        'currency' => strtoupper($currency), // Ensure currency is uppercase
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('amounts.index');
}


    public function update(Request $request, $id)
{
    $amount = Amount::findOrFail($id);

    // Validate the request
    $request->validate([
        'amount' => 'required|numeric',
        'currency' => 'required|string',
        'custom_currency' => 'nullable|string|size:3',
    ]);

    
    if ($amount->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Determine the final currency value
    $currency = $request->input('currency');
    if ($currency === 'other') {
        // Use custom currency if "Other" is selected
        $currency = $request->input('custom_currency');
    }

    // Update the amount record
    $amount->update([
        'amount' => $request->amount,
        'currency' => strtoupper($currency),
    ]);

    return redirect()->route('amounts.index');
}

    public function destroy($id)
    {
        $amount = Amount::findOrFail($id);

        if ($amount->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $amount->delete();

        return redirect()->route('amounts.index');
    }
    public function all_exchange_amounts(){
        $userId = Auth::id();
        $amounts = Amount::where('user_id', $userId)->get();
        $currencies = Config::get('exchangeRates');
        return view('amounts.exchange-amounts', compact('amounts', 'currencies'));

    }

}
