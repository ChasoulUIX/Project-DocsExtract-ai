@php
$documentTypes = [
    ['name' => 'KTP', 'price' => 'Rp 500'],
    ['name' => 'KK', 'price' => 'Rp 500'],
    ['name' => 'SIM', 'price' => 'Rp 500'],
    ['name' => 'Paspor', 'price' => 'Rp 600'],
    ['name' => 'Invoice', 'price' => 'Rp 350'],
    ['name' => 'Kwitansi', 'price' => 'Rp 350'],
    ['name' => 'Surat Jalan', 'price' => 'Rp 400'],
    ['name' => 'Laporan Keuangan', 'price' => 'Rp 750'],
    ['name' => 'Kontrak', 'price' => 'Rp 800'],
    ['name' => 'Dokumen Lainnya', 'price' => 'Rp 500']
];

$pricingPlans = [
    [
        'name' => 'Starter',
        'description' => 'Untuk kebutuhan personal',
        'monthlyLimit' => '100 dokumen',
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
        'monthlyLimit' => '1000 dokumen',
        'features' => [
            'Ekstraksi hingga 1000 dokumen/bulan',
            'Semua format dokumen',
            'Priority support',
            'Batch processing',
            'Advanced analytics'
        ],
        'highlighted' => true
    ],
    [
        'name' => 'Enterprise',
        'description' => 'Untuk kebutuhan besar',
        'monthlyLimit' => 'Unlimited',
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

<section id="pricing" class="w-full py-12 md:py-24 lg:py-32">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <!-- Pricing Plans Section -->
        <div class="mb-16">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Harga Transparan</h2>
                <p class="text-base text-muted-foreground max-w-2xl">Bayar hanya untuk apa yang Anda gunakan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($pricingPlans as $plan)
                <div class="relative flex flex-col rounded-lg border {{ $plan['highlighted'] ? 'border-primary shadow-lg md:scale-105' : 'border-border' }} bg-card text-card-foreground shadow-sm">
                    @if($plan['highlighted'])
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-primary-foreground px-4 py-1 rounded-full text-sm font-medium">
                        Paling Populer
                    </div>
                    @endif

                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">{{ $plan['name'] }}</h3>
                        <p class="text-sm text-muted-foreground">{{ $plan['description'] }}</p>
                    </div>

                    <div class="p-6 pt-0 flex-1 flex flex-col">
                        <div class="mb-6">
                            <div class="text-sm text-muted-foreground mb-2">Limit per bulan</div>
                            <div class="text-2xl md:text-3xl font-bold">{{ $plan['monthlyLimit'] }}</div>
                        </div>

                        <ul class="space-y-3 mb-6 flex-1">
                            @foreach($plan['features'] as $feature)
                            <li class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-primary flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5"/>
                                </svg>
                                <span class="text-sm">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('login') }}" class="w-full">
                            <button class="w-full inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 {{ $plan['highlighted'] ? 'bg-primary text-primary-foreground hover:bg-primary/90' : 'border border-input bg-background hover:bg-accent hover:text-accent-foreground' }} h-10 px-4 py-2">
                                Pilih Paket
                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Per-Document Pricing Section -->
        <div class="border-t pt-16">
            <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Harga Per Dokumen</h2>
                <p class="text-base text-muted-foreground max-w-2xl">Harga berbeda sesuai jenis dokumen yang diekstraksi</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                @foreach($documentTypes as $doc)
                <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm text-center">
                    <div class="p-6 pt-6">
                        <h3 class="font-semibold text-base mb-2">{{ $doc['name'] }}</h3>
                        <p class="text-2xl font-bold text-primary">{{ $doc['price'] }}</p>
                        <p class="text-sm text-muted-foreground mt-2">per dokumen</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-12 p-6 bg-primary/10 border border-primary/20 rounded-lg">
            <p class="text-center text-base">
                <span class="font-semibold">💡 Tips:</span> Deposit minimal Rp 50.000 untuk mendapatkan bonus 10%
            </p>
        </div>
    </div>
</section>
