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
                        
                        @foreach($nominals as $nominal)
                        <button class="p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all text-center">
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
                        <input type="number" placeholder="Masukkan nominal (min. Rp 10,000)" min="10000" class="w-full px-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>

                <!-- Pilih Metode Pembayaran -->
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm p-6">
                    <h2 class="text-xl font-semibold mb-4">Pilih Metode Pembayaran</h2>

                    <!-- Tabs -->
                    <div class="mb-6">
                        <div class="grid grid-cols-3 gap-2 p-1 bg-muted rounded-lg">
                            <button class="px-4 py-2 rounded-md bg-background shadow-sm font-medium text-sm">Virtual Account</button>
                            <button class="px-4 py-2 rounded-md font-medium text-sm text-muted-foreground hover:text-foreground">E-Wallet</button>
                            <button class="px-4 py-2 rounded-md font-medium text-sm text-muted-foreground hover:text-foreground">QRIS</button>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="space-y-3">
                        @php
                        $methods = [
                            ['id' => 'bca', 'name' => 'BCA Virtual Account', 'icon' => '🏦', 'color' => 'bg-blue-500'],
                            ['id' => 'mandiri', 'name' => 'Mandiri Virtual Account', 'icon' => '🏦', 'color' => 'bg-yellow-500'],
                            ['id' => 'bni', 'name' => 'BNI Virtual Account', 'icon' => '🏦', 'color' => 'bg-orange-500'],
                            ['id' => 'bri', 'name' => 'BRI Virtual Account', 'icon' => '🏦', 'color' => 'bg-blue-600']
                        ];
                        @endphp
                        
                        @foreach($methods as $method)
                        <button class="w-full p-4 rounded-lg border-2 border-border hover:border-primary/50 transition-all flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg {{ $method['color'] }} flex items-center justify-center text-xl flex-shrink-0">
                                {{ $method['icon'] }}
                            </div>
                            <div class="flex-1 text-left">
                                <div class="font-semibold">{{ $method['name'] }}</div>
                                <div class="text-xs text-muted-foreground">Instant confirmation</div>
                            </div>
                        </button>
                        @endforeach
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
                            <span class="font-medium">Rp 500.000</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-muted-foreground">Bonus:</span>
                            <span class="font-medium text-green-600">+Rp 50.000</span>
                        </div>

                        <div class="border-t pt-4 flex justify-between">
                            <span class="font-semibold">Total Diterima:</span>
                            <span class="font-bold text-lg">Rp 550.000</span>
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

                    <button class="w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 py-6">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</main>
@endsection
