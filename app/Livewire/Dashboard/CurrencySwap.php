<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class CurrencySwap extends Component
{

    public $fromCurrency;
    public $toCurrency;
    public float $amount = 0;
    public float $estimatedAmount = 0;
    public $availableCurrencies = [];

    public function mount()
    {
        $this->fromCurrency = $this->extractCurrencyCode(Auth::user()->currency ?? 'USD');
        $this->toCurrency = 'BTC';
        $this->updateAvailableCurrencies();
    }

    protected function extractCurrencyCode($currencyString)
    {
        try {
            $parts = explode('-', $currencyString);
            return $parts[1] ?? $currencyString;
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    protected function exchangeCurrency($from, $to)
    {
        try {
            $response = Http::get(config('services.exchange_rate_url'));
            if ($response->successful()) {
                $rates = $response->json()['rates'];

                if ($from === 'USD') return $rates[$to] ?? 1;
                if ($to === 'USD') return 1 / ($rates[$from] ?? 1);

                return ($rates[$to] ?? 1) / ($rates[$from] ?? 1);
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An Error Occurred');
            Log::error('Exchange rate API error: ' . $e->getMessage());
            return 1;
        }
    }

    protected function getCryptoRates()
    {
        try {
            $response = Http::get(config('services.crypto_price_url'), [
                'ids' => 'bitcoin,ethereum',
                'vs_currencies' => 'usd',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $btcRate = $data['bitcoin']['usd'] ?? null;
                $ethRate = $data['ethereum']['usd'] ?? null;

                if ($btcRate === null || $ethRate === null) {
                    throw new \Exception('Invalid currency or missing rate data');
                }

                return [
                    'BTC' => $btcRate,
                    'ETH' => $ethRate
                ];
            }

            throw new \Exception('API request failed');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [
                'BTC' => 1,
                'ETH' => 1
            ];
        }
    }

    public function updateAvailableCurrencies()
    {
        try {
            $this->availableCurrencies = ['BTC', 'ETH', $this->extractCurrencyCode(Auth::user()->currency)];
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    public function updatedFromCurrency($value)
    {
        try {
            if ($this->toCurrency === $value) {
                $this->toCurrency = $this->getAlternativeCurrency($value);
            }
            $this->calculateEstimatedAmount();
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    public function updatedToCurrency($value)
    {
        try {
            if ($this->fromCurrency === $value) {
                $this->fromCurrency = $this->getAlternativeCurrency($value);
            }
            $this->calculateEstimatedAmount();
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    public function updatedAmount()
    {
        $this->calculateEstimatedAmount();
    }


    protected function convertAmount(float $amount, string $fromCurrency, string $toCurrency)
    {
        try {

            if (empty($amount) || !is_numeric($amount)) {
                return 0;
            }

            $fromCurrencyCode = $this->extractCurrencyCode($fromCurrency);
            $toCurrencyCode   = $this->extractCurrencyCode($toCurrency);

            // Get base rates (USD based)
            $rates = $this->getCryptoRates();

            //Crypto to Crypto 
            if (in_array($fromCurrencyCode, ['BTC', 'ETH']) && in_array($toCurrencyCode, ['BTC', 'ETH'])) {
                $fromUsd = $amount * $rates[$fromCurrencyCode];
                return $fromUsd / $rates[$toCurrencyCode];
            }

            // Fiat to Crypto
            if (in_array($toCurrencyCode, ['BTC', 'ETH'])) {
                $cryptoUsdRate = $rates[$toCurrencyCode];
                if ($fromCurrencyCode === 'USD') {
                    return $amount / $cryptoUsdRate;
                } else {
                    $fiatUsdRate = $this->exchangeCurrency($fromCurrencyCode, 'USD');
                    return ($amount * $fiatUsdRate) / $cryptoUsdRate;
                }
            }

            // Crypto to Fiat
            if (in_array($fromCurrencyCode, ['BTC', 'ETH'])) {
                $cryptoUsdRate = $rates[$fromCurrencyCode];
                if ($toCurrencyCode === 'USD') {
                    return $amount * $cryptoUsdRate;
                } else {
                    $fiatUsdRate = $this->exchangeCurrency('USD', $toCurrencyCode);
                    return ($amount * $cryptoUsdRate) * $fiatUsdRate;
                }
            }

            // Fiat to Fiat
            $rate = $this->exchangeCurrency($fromCurrencyCode, $toCurrencyCode);
            return $amount * $rate;
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }


    public function calculateEstimatedAmount()
    {
        try {
            $this->estimatedAmount = $this->convertAmount(
                $this->amount,
                $this->fromCurrency,
                $this->toCurrency
            );
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    public function swap()
    {
        try {

            $this->validate([
                'fromCurrency' => 'required|string',
                'toCurrency' => 'required|string',
                'amount' => 'required|numeric|min:0',
            ]);

            $user = Auth::user();

            // Check if user has sufficient balance
            if ($this->fromCurrency !== 'BTC' && $this->fromCurrency !== 'ETH') {
                if ($user->account_balance < $this->amount) {
                    session()->flash('error', 'Insufficient balance.');
                    return;
                }
            } else if ($this->fromCurrency === 'BTC') {
                if ($user->bitcoin_balance < $this->amount) {
                    session()->flash('error', 'Insufficient Bitcoin balance.');
                    return;
                }
            } else if ($this->fromCurrency === 'ETH') {
                if ($user->ethereum_balance < $this->amount) {
                    session()->flash('error', 'Insufficient Ethereum balance.');
                    return;
                }
            }

            // Calculate the converted amount
            $convertedAmount = $this->convertAmount(
                $this->amount,
                $this->fromCurrency,
                $this->toCurrency
            );

            // Perform the swap
            if ($this->fromCurrency !== 'BTC' && $this->fromCurrency !== 'ETH') {
                // Converting from fiat to crypto
                $user->account_balance -= $this->amount;

                if ($this->toCurrency === 'BTC') {
                    $user->bitcoin_balance += $convertedAmount;
                } else {
                    $user->ethereum_balance += $convertedAmount;
                }
            } else {
                // Converting from crypto to fiat
                if ($this->fromCurrency === 'BTC') {
                    $user->bitcoin_balance -= $this->amount;
                } else {
                    $user->ethereum_balance -= $this->amount;
                }

                $user->account_balance += $convertedAmount;
            }

            $user->save();

            $this->amount = 0;
            $this->estimatedAmount = 0;
            session()->flash('success', 'Currency swap completed successfully.');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.currency-swap', [
            'availableCurrencies' => $this->availableCurrencies
        ]);
    }
}
