@php
$methods = [
    ['name' => 'BCA Virtual Account', 'icon' => '🏦', 'description' => 'Instant confirmation'],
    ['name' => 'Mandiri Virtual Account', 'icon' => '🏦', 'description' => 'Instant confirmation'],
    ['name' => 'BNI Virtual Account', 'icon' => '🏦', 'description' => 'Instant confirmation'],
    ['name' => 'BRI Virtual Account', 'icon' => '🏦', 'description' => 'Instant confirmation'],
    ['name' => 'GoPay', 'icon' => '📱', 'description' => 'Instant confirmation'],
    ['name' => 'OVO', 'icon' => '📱', 'description' => 'Instant confirmation'],
    ['name' => 'DANA', 'icon' => '📱', 'description' => 'Instant confirmation'],
    ['name' => 'ShopeePay', 'icon' => '📱', 'description' => 'Instant confirmation'],
    ['name' => 'QRIS', 'icon' => '📲', 'description' => 'Instant confirmation']
];
@endphp

<section class="w-full py-12 md:py-24 lg:py-32 bg-secondary/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Metode Pembayaran</h2>
            <p class="text-muted-foreground">Berbagai pilihan pembayaran untuk kemudahan Anda</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($methods as $method)
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm flex flex-col items-center justify-center p-6 hover:border-primary/50 transition cursor-pointer">
                <div class="text-4xl mb-2">{{ $method['icon'] }}</div>
                <p class="text-sm font-medium text-center">{{ $method['name'] }}</p>
                <p class="text-xs text-muted-foreground mt-1">{{ $method['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
