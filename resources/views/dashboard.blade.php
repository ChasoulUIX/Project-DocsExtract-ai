@extends('layouts.app')

@section('title', 'Dashboard - DocExtract AI')

@section('content')
<main class="min-h-screen bg-background flex flex-col">
    @include('components.header')
    
    <div class="flex-1">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 py-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                @php
                $stats = [
                    ['label' => 'Total Ekstraksi', 'value' => '1,234', 'change' => '+12%'],
                    ['label' => 'Saldo Tersedia', 'value' => 'Rp 247.500', 'change' => '+8%'],
                    ['label' => 'Halaman Diproses', 'value' => '5,678', 'change' => '+18%'],
                    ['label' => 'API Calls', 'value' => '8,921', 'change' => '+23%'],
                    ['label' => 'Biaya Bulan Ini', 'value' => 'Rp 431.900', 'change' => '+15%', 'highlight' => true]
                ];
                @endphp
                
                @foreach($stats as $stat)
                <div class="rounded-lg border {{ isset($stat['highlight']) && $stat['highlight'] ? 'border-primary/30 bg-primary/5' : 'border-border bg-card' }} text-card-foreground shadow-sm">
                    <div class="flex flex-col space-y-1.5 p-6 pb-3">
                        <h3 class="text-sm font-medium text-muted-foreground">{{ $stat['label'] }}</h3>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="flex items-baseline justify-between">
                            <div class="text-2xl font-bold {{ isset($stat['highlight']) && $stat['highlight'] ? 'text-primary' : '' }}">{{ $stat['value'] }}</div>
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
                        <button onclick="openUpgradeModal()" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                            Upgrade Paket
                        </button>
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
                    <h3 class="text-lg font-semibold leading-none tracking-tight">💰 Harga Transparan</h3>
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
                            <h3 class="text-lg font-semibold leading-none tracking-tight">🔑 API Key Management</h3>
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
                            <code id="apiKeyDisplay" class="flex-1 text-sm font-mono">dex_live_••••••••••••••••••••••••••••••••</code>
                            <button onclick="toggleApiKey()" id="toggleApiKeyBtn" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0" title="Show/Hide API Key">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                <svg id="eyeOffIcon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                                    <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                                    <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                                    <line x1="2" x2="22" y1="2" y2="22"/>
                                </svg>
                            </button>
                            <button onclick="copyApiKey()" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0" title="Copy API Key">
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
                            <h3 class="text-lg font-semibold leading-none tracking-tight">📊 Riwayat Transaksi</h3>
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
                            <button onclick="switchTab('deposit')" id="depositTab" class="pb-3 px-1 font-medium text-sm border-b-2 border-primary text-primary">
                                Riwayat Deposit
                            </button>
                            <button onclick="switchTab('extraction')" id="extractionTab" class="pb-3 px-1 font-medium text-sm border-b-2 border-transparent text-muted-foreground hover:text-foreground">
                                Riwayat Ekstraksi
                            </button>
                        </div>
                    </div>

                    <!-- Deposit History Table -->
                    <div id="depositHistory" class="overflow-x-auto">
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

                    <!-- Extraction History Table -->
                    <div id="extractionHistory" class="overflow-x-auto hidden">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-border">
                                    <th class="text-left py-3 px-4 font-semibold">ID Ekstraksi</th>
                                    <th class="text-left py-3 px-4 font-semibold">Tanggal</th>
                                    <th class="text-left py-3 px-4 font-semibold">Nama File</th>
                                    <th class="text-left py-3 px-4 font-semibold">Tipe Dokumen</th>
                                    <th class="text-left py-3 px-4 font-semibold">Halaman</th>
                                    <th class="text-left py-3 px-4 font-semibold">Biaya</th>
                                    <th class="text-left py-3 px-4 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $extractions = [
                                    ['id' => 'EXT001', 'date' => '2025-01-15 14:32', 'file' => 'invoice_jan_2025.pdf', 'type' => 'Invoice', 'pages' => '3', 'cost' => 'Rp 1.050'],
                                    ['id' => 'EXT002', 'date' => '2025-01-15 10:15', 'file' => 'ktp_john_doe.jpg', 'type' => 'KTP', 'pages' => '1', 'cost' => 'Rp 500'],
                                    ['id' => 'EXT003', 'date' => '2025-01-14 16:45', 'file' => 'financial_report_q4.pdf', 'type' => 'Laporan Keuangan', 'pages' => '25', 'cost' => 'Rp 8.750'],
                                    ['id' => 'EXT004', 'date' => '2025-01-14 09:20', 'file' => 'contract_vendor_a.pdf', 'type' => 'Kontrak', 'pages' => '5', 'cost' => 'Rp 1.750'],
                                    ['id' => 'EXT005', 'date' => '2025-01-13 11:30', 'file' => 'batch_documents.zip', 'type' => 'Dokumen Lainnya', 'pages' => '1200', 'cost' => 'Rp 420.000']
                                ];
                                @endphp
                                
                                @foreach($extractions as $ext)
                                <tr class="border-b border-border hover:bg-muted/50 transition">
                                    <td class="py-3 px-4 font-mono text-xs">{{ $ext['id'] }}</td>
                                    <td class="py-3 px-4">{{ $ext['date'] }}</td>
                                    <td class="py-3 px-4 font-medium">{{ $ext['file'] }}</td>
                                    <td class="py-3 px-4">{{ $ext['type'] }}</td>
                                    <td class="py-3 px-4">{{ $ext['pages'] }}</td>
                                    <td class="py-3 px-4 font-semibold text-primary">{{ $ext['cost'] }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Completed</span>
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

    <!-- Upgrade Package Modal -->
    <div id="upgradeModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-card rounded-lg shadow-xl max-w-6xl w-full max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between p-6 border-b border-border sticky top-0 bg-card z-10">
                <div>
                    <h3 class="text-xl font-bold">Upgrade Paket</h3>
                    <p class="text-sm text-muted-foreground mt-1">Pilih paket yang sesuai dengan kebutuhan Anda</p>
                </div>
                <button onclick="closeUpgradeModal()" class="hover:bg-accent rounded-full p-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                @php
                $modalPricingPlans = [
                    [
                        'name' => 'Starter',
                        'description' => 'Untuk kebutuhan personal',
                        'monthlyLimit' => '100',
                        'limitText' => 'dokumen',
                        'features' => [
                            'Ekstraksi hingga 100 dokumen/bulan',
                            'Semua format dokumen',
                            'API access',
                            'Email support'
                        ],
                        'highlighted' => false
                    ],
                    [
                        'name' => 'Professional',
                        'description' => 'Untuk bisnis berkembang',
                        'monthlyLimit' => '1000',
                        'limitText' => 'dokumen',
                        'features' => [
                            'Ekstraksi hingga 1000 dokumen/bulan',
                            'Semua format dokumen',
                            'Priority support',
                            'Batch processing',
                            'Advanced analytics'
                        ],
                        'highlighted' => true,
                        'badge' => 'Paling Populer'
                    ],
                    [
                        'name' => 'Enterprise',
                        'description' => 'Untuk kebutuhan besar',
                        'monthlyLimit' => 'Unlimited',
                        'limitText' => '',
                        'features' => [
                            'Ekstraksi unlimited',
                            'Dedicated support',
                            'Custom integration',
                            'SLA guarantee',
                            'On-premise option'
                        ],
                        'highlighted' => false
                    ]
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($modalPricingPlans as $plan)
                    <div class="relative flex flex-col rounded-lg border {{ $plan['highlighted'] ? 'border-primary/50 bg-primary/5 shadow-lg ring-2 ring-primary/20' : 'border-border bg-card' }} transition-all hover:shadow-xl">
                        @if(isset($plan['badge']))
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-primary-foreground px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                            {{ $plan['badge'] }}
                        </div>
                        @endif

                        <div class="flex flex-col space-y-1.5 p-6 {{ $plan['highlighted'] ? 'pt-8' : '' }}">
                            <h3 class="text-xl font-bold">{{ $plan['name'] }}</h3>
                            <p class="text-sm text-muted-foreground">{{ $plan['description'] }}</p>
                        </div>

                        <div class="px-6 pb-6 flex-1 flex flex-col">
                            <div class="mb-6 pb-6 border-b border-border">
                                <div class="text-xs text-muted-foreground mb-2 uppercase tracking-wide">Limit per bulan</div>
                                <div class="flex items-baseline gap-2">
                                    <div class="text-3xl font-bold {{ $plan['highlighted'] ? 'text-primary' : '' }}">{{ $plan['monthlyLimit'] }}</div>
                                    @if($plan['limitText'])
                                    <div class="text-sm text-muted-foreground">{{ $plan['limitText'] }}</div>
                                    @endif
                                </div>
                            </div>

                            <ul class="space-y-3 mb-6 flex-1">
                                @foreach($plan['features'] as $feature)
                                <li class="flex items-start gap-2">
                                    <svg class="h-5 w-5 {{ $plan['highlighted'] ? 'text-primary' : 'text-green-600' }} flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 6 9 17l-5-5"/>
                                    </svg>
                                    <span class="text-sm">{{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>

                            <button onclick="selectPackage('{{ $plan['name'] }}')" class="w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 {{ $plan['highlighted'] ? 'bg-primary text-primary-foreground hover:bg-primary/90 shadow-md' : 'border border-input bg-background hover:bg-accent hover:text-accent-foreground' }} h-10 px-4 py-2">
                                Pilih Paket
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 p-4 bg-muted/50 border border-border rounded-lg">
                    <p class="text-center text-sm text-muted-foreground">
                        <span class="font-semibold">💡 Tips:</span> Deposit minimal Rp 50.000 untuk mendapatkan bonus 10%
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
</main>

<script>
// API Key Management
const actualApiKey = 'dex_live_1234567890abcdefghijklmnopqrstuvwxyz';
let isApiKeyVisible = false;

function toggleApiKey() {
    const display = document.getElementById('apiKeyDisplay');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeOffIcon = document.getElementById('eyeOffIcon');
    
    isApiKeyVisible = !isApiKeyVisible;
    
    if (isApiKeyVisible) {
        display.textContent = actualApiKey;
        eyeIcon.classList.add('hidden');
        eyeOffIcon.classList.remove('hidden');
    } else {
        display.textContent = 'dex_live_••••••••••••••••••••••••••••••••';
        eyeIcon.classList.remove('hidden');
        eyeOffIcon.classList.add('hidden');
    }
}

function copyApiKey() {
    navigator.clipboard.writeText(actualApiKey).then(() => {
        alert('API Key copied to clipboard!');
    });
}

// Transaction History Tabs
function switchTab(tab) {
    const depositTab = document.getElementById('depositTab');
    const extractionTab = document.getElementById('extractionTab');
    const depositHistory = document.getElementById('depositHistory');
    const extractionHistory = document.getElementById('extractionHistory');
    
    if (tab === 'deposit') {
        depositTab.classList.add('border-primary', 'text-primary');
        depositTab.classList.remove('border-transparent', 'text-muted-foreground');
        extractionTab.classList.remove('border-primary', 'text-primary');
        extractionTab.classList.add('border-transparent', 'text-muted-foreground');
        depositHistory.classList.remove('hidden');
        extractionHistory.classList.add('hidden');
    } else {
        extractionTab.classList.add('border-primary', 'text-primary');
        extractionTab.classList.remove('border-transparent', 'text-muted-foreground');
        depositTab.classList.remove('border-primary', 'text-primary');
        depositTab.classList.add('border-transparent', 'text-muted-foreground');
        extractionHistory.classList.remove('hidden');
        depositHistory.classList.add('hidden');
    }
}

// Upgrade Modal
function openUpgradeModal() {
    const modal = document.getElementById('upgradeModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeUpgradeModal() {
    const modal = document.getElementById('upgradeModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

// Close modal on outside click
document.getElementById('upgradeModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeUpgradeModal();
    }
});

// Select Package
function selectPackage(packageName) {
    alert(`Anda memilih paket ${packageName}. Fitur ini akan segera tersedia!`);
    closeUpgradeModal();
}
</script>
@endsection
