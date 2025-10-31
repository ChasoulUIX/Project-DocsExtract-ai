@php
$formats = [
    ['name' => 'PDF', 'icon' => '📄'],
    ['name' => 'JPG/JPEG', 'icon' => '🖼️'],
    ['name' => 'PNG', 'icon' => '🖼️'],
    ['name' => 'WEBP', 'icon' => '🖼️'],
    ['name' => 'TIFF', 'icon' => '📋'],
    ['name' => 'BMP', 'icon' => '🖼️']
];
@endphp

<section class="w-full py-12 md:py-24 lg:py-32">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Format yang Didukung</h2>
            <p class="text-muted-foreground">Ekstrak data dari berbagai format dokumen</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($formats as $format)
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm flex flex-col items-center justify-center p-6 hover:border-primary/50 transition cursor-pointer">
                <div class="text-4xl mb-2">{{ $format['icon'] }}</div>
                <p class="text-sm font-medium text-center">{{ $format['name'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
