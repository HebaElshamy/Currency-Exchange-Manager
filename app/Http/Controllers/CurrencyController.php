<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CurrencyController extends Controller
{
    //
    public function index()
    {
        $currencies = Config::get('exchangeRates');
        return view('currencies.index', compact('currencies'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required|string|size:3',
            'rate' => 'required|numeric',
        ]);

        $currency = strtoupper($request->currency);
        $currencies = Config::get('exchangeRates');
        $currencies[$currency] = $request->rate;

        // Save the updated rates to the file
        $path = config_path('exchangeRates.php');
        file_put_contents($path, '<?php return ' . var_export($currencies, true) . ';');

        return redirect()->route('currencies.index');
    }
    public function destroy($currency)
    {
        $currencies = Config::get('exchangeRates');
        unset($currencies[$currency]);

        // Save the updated rates to the file
        $path = config_path('exchangeRates.php');
        file_put_contents($path, '<?php return ' . var_export($currencies, true) . ';');

        return redirect()->route('currencies.index');
    }
}


