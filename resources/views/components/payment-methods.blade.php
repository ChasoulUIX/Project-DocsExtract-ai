@php
$methods = [
    ['name' => 'BCA Virtual Account', 'icon' => 'https://dummyimage.com/48x48/0066AE/ffffff&text=BCA', 'description' => 'Instant confirmation'],
    ['name' => 'Mandiri Virtual Account', 'icon' => 'https://dummyimage.com/48x48/FFD500/003D7A&text=MDR', 'description' => 'Instant confirmation'],
    ['name' => 'BNI Virtual Account', 'icon' => 'https://dummyimage.com/48x48/FF6600/ffffff&text=BNI', 'description' => 'Instant confirmation'],
    ['name' => 'BRI Virtual Account', 'icon' => 'https://dummyimage.com/48x48/003D7A/ffffff&text=BRI', 'description' => 'Instant confirmation'],
    ['name' => 'GoPay', 'icon' => 'https://dummyimage.com/48x48/00AA13/ffffff&text=GP', 'description' => 'Instant confirmation'],
    ['name' => 'OVO', 'icon' => 'https://dummyimage.com/48x48/4C3494/ffffff&text=OVO', 'description' => 'Instant confirmation'],
    ['name' => 'DANA', 'icon' => 'https://dummyimage.com/48x48/118EEA/ffffff&text=DANA', 'description' => 'Instant confirmation'],
    ['name' => 'ShopeePay', 'icon' => 'https://dummyimage.com/48x48/EE4D2D/ffffff&text=SP', 'description' => 'Instant confirmation'],
    ['name' => 'QRIS', 'icon' => 'https://dummyimage.com/48x48/FF0000/ffffff&text=QRIS', 'description' => 'Instant confirmation']
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
                <img src="{{ $method['icon'] }}" alt="{{ $method['name'] }}" class="w-12 h-12 mb-3 rounded-lg">
                <p class="text-base font-medium text-center">{{ $method['name'] }}</p>
                <p class="text-sm text-muted-foreground mt-1">{{ $method['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
