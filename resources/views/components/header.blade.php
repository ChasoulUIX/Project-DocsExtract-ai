<header class="sticky top-0 z-50 w-full border-b border-border bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
    <div class="container mx-auto flex h-16 max-w-7xl items-center justify-between px-4 md:px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold">
                D
            </div>
            <span class="font-bold text-lg hidden sm:inline">DocExtract AI</span>
        </a>

        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-sm text-muted-foreground hover:text-foreground transition">
                Beranda
            </a>
            <a href="{{ route('dashboard') }}" class="text-sm text-muted-foreground hover:text-foreground transition">
                Dashboard
            </a>
            <a href="{{ route('deposit') }}" class="text-sm text-muted-foreground hover:text-foreground transition">
                Deposit
            </a>
            <a href="{{ route('home') }}#pricing" class="text-sm text-muted-foreground hover:text-foreground transition">
                Harga
            </a>
            <a href="{{ route('docs') }}" class="text-sm text-muted-foreground hover:text-foreground transition">
                Dokumentasi
            </a>
        </nav>

        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}">
                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                    Masuk
                </button>
            </a>
            <a href="{{ route('login') }}">
                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-9 px-4 py-2">
                    Mulai Gratis
                </button>
            </a>
        </div>
    </div>
</header>
