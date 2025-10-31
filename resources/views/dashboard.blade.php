@extends('layouts.app')

@section('title', 'Dashboard - DocExtract AI')

@section('content')
<main class="min-h-screen bg-background flex flex-col">
    @include('components.header')
    
    <div class="flex-1">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 py-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @php
                $stats = [
                    ['label' => 'Total Ekstraksi', 'value' => '1,234', 'change' => '+12%'],
                    ['label' => 'Saldo Tersedia', 'value' => 'Rp 247.500', 'change' => '+8%'],
                    ['label' => 'Halaman Diproses', 'value' => '5,678', 'change' => '+18%'],
                    ['label' => 'API Calls', 'value' => '8,921', 'change' => '+23%']
                ];
                @endphp
                
                @foreach($stats as $stat)
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6 pb-3">
                        <h3 class="text-sm font-medium text-muted-foreground">{{ $stat['label'] }}</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="flex items-baseline justify-between">
                            <div class="text-2xl font-bold">{{ $stat['value'] }}</div>
                            <div class="flex items-center gap-1 text-xs text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 17 17 7M17 7H7m10 0v10"/>
                                </svg>
                                {{ $stat['change'] }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Current Package -->
            <div class="rounded-lg border border-primary/20 bg-primary/5 shadow-sm mb-8">
                <div class="flex flex-col space-y-1.5 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold leading-none tracking-tight">📦 Paket Saat Ini</h3>
                            <p class="text-sm text-muted-foreground">Informasi paket yang sedang Anda gunakan</p>
                        </div>
                        <a href="#upgrade">
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                                Upgrade Paket
                            </button>
                        </a>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <p class="text-sm text-muted-foreground mb-1">Nama Paket</p>
                            <p class="text-2xl font-bold text-primary">Professional</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground mb-1">Harga Per Dokumen</p>
                            <p class="text-2xl font-bold">Rp 350<span class="text-sm text-muted-foreground ml-1">/dokumen</span></p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground mb-1">Limit Per Bulan</p>
                            <p class="text-2xl font-bold">1,000</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t">
                        <p class="text-sm font-semibold mb-3">Fitur Paket:</p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach(['Ekstraksi hingga 1000 dokumen/bulan', 'Semua format dokumen', 'Priority support', 'Batch processing'] as $feature)
                            <li class="flex items-center gap-2 text-sm">
                                <svg class="w-4 h-4 text-green-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5"/>
                                </svg>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Transparent Pricing -->
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm mb-8">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">💰 Harga Transparan</h3>
                    <p class="text-sm text-muted-foreground">Bayar hanya untuk apa yang Anda gunakan</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 border rounded-lg">
                                <p class="text-sm text-muted-foreground mb-1">Dokumen Diproses Bulan Ini</p>
                                <p class="text-2xl font-bold">1,234</p>
                            </div>
                            <div class="p-4 border rounded-lg">
                                <p class="text-sm text-muted-foreground mb-1">Biaya Bulan Ini</p>
                                <p class="text-2xl font-bold text-primary">Rp 431.900</p>
                            </div>
                        </div>
                        <div class="p-4 bg-muted rounded-lg">
                            <p class="text-sm font-semibold mb-3">Rincian Biaya:</p>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span>Invoice (3 hal × Rp 350)</span>
                                    <span class="font-semibold">Rp 1.050</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>KTP (1 hal × Rp 500)</span>
                                    <span class="font-semibold">Rp 500</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Laporan Keuangan (25 hal × Rp 350)</span>
                                    <span class="font-semibold">Rp 8.750</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Kontrak (5 hal × Rp 350)</span>
                                    <span class="font-semibold">Rp 1.750</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Dokumen Lainnya (1.200 hal × Rp 350)</span>
                                    <span class="font-semibold">Rp 420.000</span>
                                </div>
                                <div class="border-t pt-2 mt-2 flex justify-between font-bold">
                                    <span>Total</span>
                                    <span class="text-primary">Rp 431.900</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- API Key Management -->
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm mb-8">
                <div class="flex flex-col space-y-1.5 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold leading-none tracking-tight">🔑 API Key Management</h3>
                            <p class="text-sm text-muted-foreground">Kelola API key untuk integrasi aplikasi Anda</p>
                        </div>
                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                            Generate New Key
                        </button>
                    </div>
                </div>
                <div class="p-6 pt-0 space-y-6">
                    <div class="space-y-3">
                        <h4 class="font-semibold">Production API Key</h4>
                        <div class="flex items-center gap-2 p-3 bg-muted rounded-lg">
                            <code class="flex-1 text-sm font-mono">sk_live_••••••••••••••••••••••••••••••••</code>
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div>
                            <p class="text-muted-foreground">Status</p>
                            <p class="font-semibold text-green-600">Active</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground">Created</p>
                            <p class="font-semibold">15 Jan 2025</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground">Last Used</p>
                            <p class="font-semibold">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold leading-none tracking-tight">📊 Riwayat Transaksi</h3>
                            <p class="text-sm text-muted-foreground">Riwayat deposit dan ekstraksi dokumen Anda</p>
                        </div>
                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-3">
                            Export CSV
                        </button>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <div class="mb-6 border-b">
                        <div class="flex gap-4">
                            <button class="pb-3 px-1 font-medium text-sm border-b-2 border-primary text-primary">
                                Riwayat Deposit
                            </button>
                            <button class="pb-3 px-1 font-medium text-sm border-b-2 border-transparent text-muted-foreground hover:text-foreground">
                                Riwayat Ekstraksi
                            </button>
                        </div>
                    </div>

                    <!-- Deposit History Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-border">
                                    <th class="text-left py-3 px-4 font-semibold">ID Transaksi</th>
                                    <th class="text-left py-3 px-4 font-semibold">Tanggal</th>
                                    <th class="text-left py-3 px-4 font-semibold">Metode</th>
                                    <th class="text-left py-3 px-4 font-semibold">Jumlah</th>
                                    <th class="text-left py-3 px-4 font-semibold">Bonus</th>
                                    <th class="text-left py-3 px-4 font-semibold">Total</th>
                                    <th class="text-left py-3 px-4 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $transactions = [
                                    ['id' => 'DEP001', 'date' => '2025-01-15', 'method' => 'BCA Virtual Account', 'amount' => 'Rp 100.000', 'bonus' => 'Rp 10.000', 'total' => 'Rp 110.000'],
                                    ['id' => 'DEP002', 'date' => '2025-01-14', 'method' => 'GoPay', 'amount' => 'Rp 50.000', 'bonus' => 'Rp 5.000', 'total' => 'Rp 55.000'],
                                    ['id' => 'DEP003', 'date' => '2025-01-10', 'method' => 'Mandiri Virtual Account', 'amount' => 'Rp 250.000', 'bonus' => 'Rp 25.000', 'total' => 'Rp 275.000']
                                ];
                                @endphp
                                
                                @foreach($transactions as $tx)
                                <tr class="border-b border-border hover:bg-muted/50 transition">
                                    <td class="py-3 px-4 font-mono text-xs">{{ $tx['id'] }}</td>
                                    <td class="py-3 px-4">{{ $tx['date'] }}</td>
                                    <td class="py-3 px-4">{{ $tx['method'] }}</td>
                                    <td class="py-3 px-4 font-semibold">{{ $tx['amount'] }}</td>
                                    <td class="py-3 px-4 text-green-600 font-semibold">{{ $tx['bonus'] }}</td>
                                    <td class="py-3 px-4 font-bold">{{ $tx['total'] }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Success</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
</main>
@endsection
