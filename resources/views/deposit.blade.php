@extends('layouts.app')

@section('title', 'Deposit - DocExtract AI')

@section('content')
<main class="min-h-screen bg-background">
    @include('components.header')

    <div class="container mx-auto max-w-7xl px-4 md:px-6 py-8 md:py-12">
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Deposit Saldo</h1>
            <p class="text-muted-foreground">Top up saldo untuk mulai menggunakan layanan</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Pilih Nominal -->
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-4">Pilih Nominal</h2>
                    <p class="text-sm text-muted-foreground mb-6">Pilih atau masukkan jumlah deposit</p>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-6">
                        @php
                        $nominals = [
                            ['value' => 50000, 'label' => 'Rp 50,000'],
                            ['value' => 100000, 'label' => 'Rp 100,000'],
                            ['value' => 250000, 'label' => 'Rp 250,000'],
                            ['value' => 500000, 'label' => 'Rp 500,000', 'bonus' => 'Bonus 10%'],
                            ['value' => 1000000, 'label' => 'Rp 1,000,000', 'bonus' => 'Bonus 10%'],
                            ['value' => 2500000, 'label' => 'Rp 2,500,000', 'bonus' => 'Bonus 10%']
                        ];
                        @endphp
                        
                        @foreach($nominals as $index => $nominal)
                        <button type="button" 
                                class="nominal-btn p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all text-center relative"
                                data-value="{{ $nominal['value'] }}"
                                data-bonus="{{ isset($nominal['bonus']) ? 'true' : 'false' }}">
                            <div class="absolute top-2 right-2 hidden nominal-checkbox">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="font-semibold text-sm md:text-base">{{ $nominal['label'] }}</div>
                            @if(isset($nominal['bonus']))
                            <div class="text-xs text-green-600 font-medium mt-1">{{ $nominal['bonus'] }}</div>
                            @endif
                        </button>
                        @endforeach
                    </div>

                    <!-- Custom Nominal -->
                    <div class="border-t pt-6">
                        <h3 class="font-semibold mb-3">Nominal Custom</h3>
                        <input type="number" 
                               id="customNominal"
                               placeholder="Masukkan nominal (min. Rp 10,000)" 
                               min="10000" 
                               class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>

                <!-- Pilih Metode Pembayaran -->
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-4">Pilih Metode Pembayaran</h2>

                    <!-- Tabs -->
                    <div class="mb-6">
                        <div class="grid grid-cols-3 gap-2 p-1 bg-muted rounded-lg">
                            <button type="button" class="payment-tab px-4 py-2 rounded-md bg-background shadow-sm font-medium text-sm" data-tab="va">Virtual Account</button>
                            <button type="button" class="payment-tab px-4 py-2 rounded-md font-medium text-sm text-muted-foreground hover:text-foreground" data-tab="ewallet">E-Wallet</button>
                            <button type="button" class="payment-tab px-4 py-2 rounded-md font-medium text-sm text-muted-foreground hover:text-foreground" data-tab="qris">QRIS</button>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div id="payment-methods-container">
                        <!-- Virtual Account -->
                        <div class="payment-methods-group space-y-3" data-group="va">
                            @php
                            $vaMethods = [
                                ['id' => 'bca', 'name' => 'BCA Virtual Account', 'color' => '0066AE'],
                                ['id' => 'mandiri', 'name' => 'Mandiri Virtual Account', 'color' => 'FFD500'],
                                ['id' => 'bni', 'name' => 'BNI Virtual Account', 'color' => 'FF6600'],
                                ['id' => 'bri', 'name' => 'BRI Virtual Account', 'color' => '003D7A']
                            ];
                            @endphp
                            
                            @foreach($vaMethods as $method)
                            <button type="button" 
                                    class="payment-method-btn w-full p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all flex items-center gap-4 relative"
                                    data-method="{{ $method['id'] }}">
                                <div class="absolute top-3 right-3 hidden payment-method-checkbox">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="w-12 h-12 flex items-center justify-center flex-shrink-0">
                                    <img src="{{ asset('images/icons/' . $method['id'] . '.png') }}" 
                                         alt="{{ $method['name'] }}" 
                                         class="max-w-full max-h-full object-contain">
                                </div>
                                <div class="flex-1 text-left">
                                    <div class="font-semibold">{{ $method['name'] }}</div>
                                    <div class="text-xs text-muted-foreground">Instant confirmation</div>
                                </div>
                            </button>
                            @endforeach
                        </div>

                        <!-- E-Wallet -->
                        <div class="payment-methods-group space-y-3 hidden" data-group="ewallet">
                            @php
                            $ewalletMethods = [
                                ['id' => 'gopay', 'name' => 'GoPay', 'color' => '00AA13'],
                                ['id' => 'ovo', 'name' => 'OVO', 'color' => '4C3494'],
                                ['id' => 'dana', 'name' => 'DANA', 'color' => '118EEA'],
                                ['id' => 'shopeepay', 'name' => 'ShopeePay', 'color' => 'EE4D2D']
                            ];
                            @endphp
                            
                            @foreach($ewalletMethods as $method)
                            <button type="button" 
                                    class="payment-method-btn w-full p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all flex items-center gap-4 relative"
                                    data-method="{{ $method['id'] }}">
                                <div class="absolute top-3 right-3 hidden payment-method-checkbox">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="w-12 h-12 flex items-center justify-center flex-shrink-0">
                                    <img src="{{ asset('images/icons/' . $method['id'] . '.png') }}" 
                                         alt="{{ $method['name'] }}" 
                                         class="max-w-full max-h-full object-contain">
                                </div>
                                <div class="flex-1 text-left">
                                    <div class="font-semibold">{{ $method['name'] }}</div>
                                    <div class="text-xs text-muted-foreground">Instant confirmation</div>
                                </div>
                            </button>
                            @endforeach
                        </div>

                        <!-- QRIS -->
                        <div class="payment-methods-group space-y-3 hidden" data-group="qris">
                            @php
                            $qrisMethods = [
                                ['id' => 'qris', 'name' => 'QRIS - Semua E-Wallet & Bank', 'color' => 'FF0000']
                            ];
                            @endphp
                            
                            @foreach($qrisMethods as $method)
                            <button type="button" 
                                    class="payment-method-btn w-full p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all flex items-center gap-4 relative"
                                    data-method="{{ $method['id'] }}">
                                <div class="absolute top-3 right-3 hidden payment-method-checkbox">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="w-12 h-12 flex items-center justify-center flex-shrink-0">
                                    <img src="{{ asset('images/icons/' . $method['id'] . '.png') }}" 
                                         alt="{{ $method['name'] }}" 
                                         class="max-w-full max-h-full object-contain">
                                </div>
                                <div class="flex-1 text-left">
                                    <div class="font-semibold">{{ $method['name'] }}</div>
                                    <div class="text-xs text-muted-foreground">Scan QR untuk bayar</div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Ringkasan Deposit -->
            <div class="lg:col-span-1">
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm p-6 sticky top-24">
                    <h3 class="text-lg font-semibold mb-6">Saldo Saat Ini</h3>

                    <div class="mb-8">
                        <div class="text-sm text-muted-foreground mb-1">Total Saldo</div>
                        <div class="text-3xl font-bold text-green-600">Rp 247.500</div>
                        <div class="text-xs text-muted-foreground mt-1">~495 halaman ekstraksi</div>
                    </div>

                    <div class="border-t pt-6 space-y-4 mb-6">
                        <h4 class="font-semibold">Ringkasan Deposit</h4>

                        <div class="flex justify-between text-sm">
                            <span class="text-muted-foreground">Nominal:</span>
                            <span class="font-medium" id="summaryNominal">Rp 0</span>
                        </div>

                        <div class="flex justify-between text-sm" id="bonusRow">
                            <span class="text-muted-foreground">Bonus:</span>
                            <span class="font-medium text-green-600" id="summaryBonus">+Rp 0</span>
                        </div>

                        <div class="border-t pt-4 flex justify-between">
                            <span class="font-semibold">Total Diterima:</span>
                            <span class="font-bold text-lg" id="summaryTotal">Rp 0</span>
                        </div>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <div class="flex gap-2">
                            <div class="text-blue-600 flex-shrink-0">💡</div>
                            <div class="text-xs text-blue-800">
                                <div class="font-semibold mb-1">
                                    Tips: Deposit minimal Rp 500,000 untuk mendapatkan bonus 10%
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="btnProceed" class="w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-base font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-12">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedNominal = 0;
    let selectedPaymentMethod = null;

    // Format currency
    function formatRupiah(amount) {
        return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Calculate bonus
    function calculateBonus(amount) {
        return amount >= 500000 ? Math.floor(amount * 0.1) : 0;
    }

    // Update summary
    function updateSummary() {
        const bonus = calculateBonus(selectedNominal);
        const total = selectedNominal + bonus;

        document.getElementById('summaryNominal').textContent = formatRupiah(selectedNominal);
        document.getElementById('summaryBonus').textContent = '+' + formatRupiah(bonus);
        document.getElementById('summaryTotal').textContent = formatRupiah(total);

        // Show/hide bonus row
        document.getElementById('bonusRow').style.display = bonus > 0 ? 'flex' : 'none';
    }

    // Nominal buttons
    document.querySelectorAll('.nominal-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove selection from all buttons
            document.querySelectorAll('.nominal-btn').forEach(b => {
                b.classList.remove('border-primary', 'bg-primary/5');
                b.querySelector('.nominal-checkbox').classList.add('hidden');
            });

            // Clear custom input
            document.getElementById('customNominal').value = '';

            // Select this button
            this.classList.add('border-primary', 'bg-primary/5');
            this.querySelector('.nominal-checkbox').classList.remove('hidden');

            // Update selected nominal
            selectedNominal = parseInt(this.dataset.value);
            updateSummary();
        });
    });

    // Custom nominal input
    document.getElementById('customNominal').addEventListener('input', function() {
        // Remove selection from preset buttons
        document.querySelectorAll('.nominal-btn').forEach(b => {
            b.classList.remove('border-primary', 'bg-primary/5');
            b.querySelector('.nominal-checkbox').classList.add('hidden');
        });

        // Update selected nominal
        const value = parseInt(this.value) || 0;
        selectedNominal = value >= 10000 ? value : 0;
        updateSummary();
    });

    // Payment method tabs
    document.querySelectorAll('.payment-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.dataset.tab;

            // Update tab styles
            document.querySelectorAll('.payment-tab').forEach(t => {
                t.classList.remove('bg-background', 'shadow-sm');
                t.classList.add('text-muted-foreground');
            });
            this.classList.add('bg-background', 'shadow-sm');
            this.classList.remove('text-muted-foreground');

            // Show/hide payment method groups
            document.querySelectorAll('.payment-methods-group').forEach(group => {
                if (group.dataset.group === targetTab) {
                    group.classList.remove('hidden');
                } else {
                    group.classList.add('hidden');
                }
            });

            // Clear selected payment method
            selectedPaymentMethod = null;
            document.querySelectorAll('.payment-method-btn').forEach(btn => {
                btn.classList.remove('border-primary', 'bg-primary/5');
                btn.querySelector('.payment-method-checkbox').classList.add('hidden');
            });
        });
    });

    // Payment method selection
    document.querySelectorAll('.payment-method-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove selection from all methods in current group
            const currentGroup = this.closest('.payment-methods-group');
            currentGroup.querySelectorAll('.payment-method-btn').forEach(b => {
                b.classList.remove('border-primary', 'bg-primary/5');
                b.querySelector('.payment-method-checkbox').classList.add('hidden');
            });

            // Select this method
            this.classList.add('border-primary', 'bg-primary/5');
            this.querySelector('.payment-method-checkbox').classList.remove('hidden');

            // Update selected payment method
            selectedPaymentMethod = this.dataset.method;
        });
    });

    // Proceed button
    document.getElementById('btnProceed').addEventListener('click', function() {
        if (selectedNominal === 0) {
            alert('Silakan pilih atau masukkan nominal deposit');
            return;
        }

        if (selectedNominal < 10000) {
            alert('Nominal deposit minimal Rp 10.000');
            return;
        }

        if (!selectedPaymentMethod) {
            alert('Silakan pilih metode pembayaran');
            return;
        }

        // Proceed with payment
        console.log('Proceeding with payment:', {
            nominal: selectedNominal,
            bonus: calculateBonus(selectedNominal),
            total: selectedNominal + calculateBonus(selectedNominal),
            paymentMethod: selectedPaymentMethod
        });

        alert('Memproses pembayaran...\nNominal: ' + formatRupiah(selectedNominal) + '\nMetode: ' + selectedPaymentMethod);
    });

    // Initialize summary
    updateSummary();
});
</script>
@endsection
