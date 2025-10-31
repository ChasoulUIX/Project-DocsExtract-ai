@php
$methods = [
    ['name' => 'BCA Virtual Account', 'icon' => asset('images/icons/bca.png'), 'description' => 'Instant confirmation'],
    ['name' => 'Mandiri Virtual Account', 'icon' => asset('images/icons/mandiri.png'), 'description' => 'Instant confirmation'],
    ['name' => 'BNI Virtual Account', 'icon' => asset('images/icons/bni.png'), 'description' => 'Instant confirmation'],
    ['name' => 'BRI Virtual Account', 'icon' => asset('images/icons/bri.png'), 'description' => 'Instant confirmation'],
    ['name' => 'GoPay', 'icon' => asset('images/icons/gopay.png'), 'description' => 'Instant confirmation'],
    ['name' => 'OVO', 'icon' => asset('images/icons/ovo.png'), 'description' => 'Instant confirmation'],
    ['name' => 'DANA', 'icon' => asset('images/icons/dana.png'), 'description' => 'Instant confirmation'],
    ['name' => 'ShopeePay', 'icon' => asset('images/icons/shopeepay.png'), 'description' => 'Instant confirmation'],
    ['name' => 'QRIS', 'icon' => asset('images/icons/qris.png'), 'description' => 'Instant confirmation']
];
@endphp

<section class="w-full py-12 md:py-24 lg:py-32 bg-secondary/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Metode Pembayaran</h2>
            <p class="text-base text-muted-foreground">Berbagai pilihan pembayaran untuk kemudahan Anda</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($methods as $method)
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm flex flex-col items-center justify-center p-6 hover:border-primary/50 transition cursor-pointer">
                <div class="w-16 h-16 mb-3 flex items-center justify-center">
                    <img src="{{ $method['icon'] }}" alt="{{ $method['name'] }}" class="max-w-full max-h-full object-contain">
                </div>
                <p class="text-sm font-medium text-center">{{ $method['name'] }}</p>
                <p class="text-xs text-muted-foreground mt-1">{{ $method['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
