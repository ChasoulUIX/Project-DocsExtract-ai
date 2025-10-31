<section class="relative w-full py-12 md:py-24 lg:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-accent/5"></div>

    <div class="container mx-auto max-w-7xl px-4 md:px-6 relative z-10">
        <div class="flex flex-col items-center justify-center space-y-8 text-center">
            <div class="space-y-4">
                <p class="text-sm font-medium text-primary">Ekstraksi Dokumen dengan AI</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-balance">
                    Ekstrak Data dari Dokumen Apapun
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto text-balance">
                    Proses ekstraksi dokumen tercepat dengan dukungan berbagai format gambar. Bayar sesuai pemakaian dengan
                    sistem deposit yang mudah.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}">
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8">
                        Mulai Sekarang
                    </button>
                </a>
                <a href="#features">
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 px-8">
                        Lihat Dokumentasi
                    </button>
                </a>
            </div>

            <div class="w-full mt-12">
                <div class="relative w-full h-64 md:h-96 bg-gradient-to-br from-primary/10 to-accent/10 rounded-lg border border-border overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <img src="{{ asset('images/icons/docs.png') }}" alt="Document" class="w-24 h-24 mx-auto mb-4 rounded-lg">
                            <p class="text-base text-muted-foreground">Tampilan Demo Ekstraksi Dokumen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
