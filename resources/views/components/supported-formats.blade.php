@php
$formats = [
    ['name' => 'PDF', 'icon' => 'https://dummyimage.com/48x48/EF4444/ffffff&text=PDF', 'color' => 'EF4444'],
    ['name' => 'JPG/JPEG', 'icon' => 'https://dummyimage.com/48x48/F59E0B/ffffff&text=JPG', 'color' => 'F59E0B'],
    ['name' => 'PNG', 'icon' => 'https://dummyimage.com/48x48/10B981/ffffff&text=PNG', 'color' => '10B981'],
    ['name' => 'WEBP', 'icon' => 'https://dummyimage.com/48x48/3B82F6/ffffff&text=WEBP', 'color' => '3B82F6'],
    ['name' => 'TIFF', 'icon' => 'https://dummyimage.com/48x48/8B5CF6/ffffff&text=TIFF', 'color' => '8B5CF6'],
    ['name' => 'BMP', 'icon' => 'https://dummyimage.com/48x48/EC4899/ffffff&text=BMP', 'color' => 'EC4899']
];
@endphp

<section class="w-full py-12 md:py-24 lg:py-32">
    <div class="container mx-auto max-w-7xl px-4 md:px-6">
        <div class="flex flex-col items-center justify-center space-y-4 text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Format yang Didukung</h2>
            <p class="text-base text-muted-foreground">Ekstrak data dari berbagai format dokumen</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($formats as $format)
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm flex flex-col items-center justify-center p-6 hover:border-primary/50 transition cursor-pointer">
                <img src="{{ $format['icon'] }}" alt="{{ $format['name'] }}" class="w-12 h-12 mb-3 rounded-lg">
                <p class="text-base font-medium text-center">{{ $format['name'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
