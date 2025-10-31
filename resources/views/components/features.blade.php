@php
$features = [
    [
        'icon' => '📋',
        'title' => 'Multi-Format Support',
        'description' => 'Dukungan untuk PDF, JPG, PNG, WEBP, TIFF, BMP dan format lainnya'
    ],
    [
        'icon' => '💾',
        'title' => 'Sistem Deposit Fleksibel',
        'description' => 'Top up saldo dengan berbagai metode pembayaran Indonesia'
    ],
    [
        'icon' => '🔌',
        'title' => 'API Key Management',
        'description' => 'Kelola API key untuk integrasi aplikasi Anda'
    ]
];
@endphp

<section id="features" class="w-full py-12 md:py-24 lg:py-32 bg-secondary/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Fitur Unggulan</h2>
            <p class="text-muted-foreground max-w-2xl">Solusi lengkap untuk kebutuhan ekstraksi dokumen Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($features as $feature)
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm hover:border-primary/50 transition">
                <div class="flex flex-col space-y-1.5 p-6">
                    <div class="text-4xl mb-4">{{ $feature['icon'] }}</div>
                    <h3 class="text-2xl font-semibold leading-none tracking-tight">{{ $feature['title'] }}</h3>
                </div>
                <div class="p-6 pt-0">
                    <p class="text-sm text-muted-foreground">{{ $feature['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
