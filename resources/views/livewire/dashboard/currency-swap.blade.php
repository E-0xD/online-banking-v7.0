<div>
    <div class="card">
        <div class="card-body">

            <div class="container-fluid mb-4">
                <div class="row g-4">
                    <!-- Available -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm border rounded-3 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center justify-content-center bg-primary rounded p-2"
                                        style="width:40px; height:40px;">
                                        <i class="fa-solid fa-credit-card text-white"></i>
                                    </div>
                                    <span
                                        class="text-muted small fw-medium">{{ currency(Auth::user()->currency) }}</span>
                                </div>
                                <h3 class="h5 fw-bold mb-1">
                                    {{ currency(Auth::user()->currency) }}{{ number_format(Auth::user()->account_balance, 2) }}
                                </h3>

                            </div>
                        </div>
                    </div>

                    <!-- Monthly Deposits -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm border rounded-3 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center justify-content-center bg-success rounded p-2"
                                        style="width:40px; height:40px;">
                                        <i class="fab fa-bitcoin text-white"></i>
                                    </div>
                                    <span class="text-muted small fw-medium">BITCOIN</span>
                                </div>
                                <h3 class="h5 fw-bold mb-1">{{ number_format(Auth::user()->bitcoin_balance, 8) }} BTC
                                </h3>

                            </div>
                        </div>
                    </div>

                    <!-- Monthly Expenses -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card shadow-sm border rounded-3 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center justify-content-center bg-danger rounded p-2"
                                        style="width:40px; height:40px;">
                                        <i class="fab fa-ethereum text-white"></i>
                                    </div>
                                    <span class="text-muted small fw-medium">ETHEREUM</span>
                                </div>
                                <h3 class="h5 fw-bold mb-1">{{ number_format(Auth::user()->ethereum_balance, 8) }} ETH
                                </h3>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <form wire:submit.prevent="swap">
                <div class="mb-3">
                    <label class="form-label">From Currency</label>
                    <select wire:model.live="fromCurrency" class="form-select">
                        @foreach ($availableCurrencies as $currency)
                            @if ($currency !== $toCurrency)
                                <option value="{{ $currency }}">
                                    @if ($currency === 'BTC')
                                        Bitcoin (BTC)
                                    @elseif($currency === 'ETH')
                                        Ethereum (ETH)
                                    @else
                                        {{ $currency }}
                                    @endif
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">To Currency</label>
                    <select wire:model.live="toCurrency" class="form-select">
                        @foreach ($availableCurrencies as $currency)
                            @if ($currency !== $fromCurrency)
                                <option value="{{ $currency }}">
                                    @if ($currency === 'BTC')
                                        Bitcoin (BTC)
                                    @elseif($currency === 'ETH')
                                        Ethereum (ETH)
                                    @else
                                        {{ $currency }}
                                    @endif
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <div class="input-group">
                        <input type="number" wire:model.live.debounce.500ms="amount" class="form-control"
                            step="any" min="0" placeholder="Enter amount to swap">
                        <span class="input-group-text">{{ $fromCurrency }}</span>
                    </div>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Estimated Conversion</label>
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">From:</span>
                                <input type="text" class="form-control" readonly
                                    value="{{ number_format($amount, $fromCurrency == 'BTC' || $fromCurrency == 'ETH' ? 8 : 2) }} {{ $fromCurrency }}">
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">To:</span>
                                <input type="text" class="form-control" readonly
                                    value="{{ number_format($estimatedAmount, $toCurrency == 'BTC' || $toCurrency == 'ETH' ? 8 : 2) }} {{ $toCurrency }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-exchange-alt me-2"></i>Swap Currencies
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
