@extends('layouts.app')

@section('title', 'Dokumentasi API - DocExtract AI')

@section('content')
<main class="min-h-screen bg-background flex flex-col">
    @include('components.header')
    
    <div class="flex-1">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 py-12">
            <div class="mb-12">
                <h1 class="text-4xl font-bold mb-4">Dokumentasi API</h1>
                <p class="text-muted-foreground">Panduan lengkap integrasi API DocExtract AI</p>
            </div>

            <!-- Tabs -->
            <div x-data="{ activeTab: 'Quick Start' }" class="mb-8">
                <div class="flex gap-4 border-b border-border overflow-x-auto">
                    @php
                    $tabs = ['Quick Start', 'Authentication', 'Endpoints', 'Examples'];
                    @endphp
                    
                    @foreach($tabs as $tab)
                    <button 
                        @click="activeTab = '{{ $tab }}'"
                        :class="activeTab === '{{ $tab }}' ? 'border-primary text-primary' : 'border-transparent text-muted-foreground hover:text-foreground'"
                        class="px-4 py-3 font-medium text-sm border-b-2 transition whitespace-nowrap">
                        {{ $tab }}
                    </button>
                    @endforeach
                </div>

            <!-- Content -->
            <div class="rounded-lg border border-border bg-card text-card-foreground shadow-sm mt-8">
                <!-- Quick Start Tab -->
                <div x-show="activeTab === 'Quick Start'" x-transition>
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Getting Started</h3>
                        <p class="text-sm text-muted-foreground">Mulai gunakan API dalam 5 menit</p>
                    </div>
                    <div class="p-6 pt-0 space-y-6">
                        <div>
                            <h3 class="font-semibold mb-3">1. Dapatkan API Key</h3>
                            <p class="text-muted-foreground mb-3">Login ke dashboard dan copy API key Anda</p>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <code>API Key: dex_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</code>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">2. Install Library (Optional)</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <code>npm install docextract-sdk</code>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">3. Buat Request Pertama</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>const response = await fetch('https://api.docextract.ai/v1/extract', {
  method: 'POST',
  headers: {
    'Authorization': 'Bearer YOUR_API_KEY',
    'Content-Type': 'multipart/form-data'
  },
  body: formData
});</pre>
                            </div>
                        </div>

                        <div class="bg-primary/10 border border-primary/20 p-4 rounded-lg">
                            <p class="text-sm mb-3">
                                <span class="font-semibold">Butuh Bantuan?</span> Tim support kami siap membantu 24/7
                            </p>
                            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                                Hubungi Support
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Authentication Tab -->
                <div x-show="activeTab === 'Authentication'" x-transition>
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Authentication</h3>
                        <p class="text-sm text-muted-foreground">Cara autentikasi API request Anda</p>
                    </div>
                    <div class="p-6 pt-0 space-y-6">
                        <div>
                            <h3 class="font-semibold mb-3">Bearer Token</h3>
                            <p class="text-muted-foreground mb-3">Gunakan API key sebagai Bearer token di header request</p>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>Authorization: Bearer dex_live_your_api_key_here</pre>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">Contoh Request dengan cURL</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>curl -X POST https://api.docextract.ai/v1/extract \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -F "file=@document.pdf"</pre>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Endpoints Tab -->
                <div x-show="activeTab === 'Endpoints'" x-transition>
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">API Endpoints</h3>
                        <p class="text-sm text-muted-foreground">Daftar endpoint yang tersedia</p>
                    </div>
                    <div class="p-6 pt-0 space-y-6">
                        <div>
                            <h3 class="font-semibold mb-3">POST /v1/extract</h3>
                            <p class="text-muted-foreground mb-3">Ekstrak data dari dokumen</p>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>POST https://api.docextract.ai/v1/extract</pre>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">GET /v1/balance</h3>
                            <p class="text-muted-foreground mb-3">Cek saldo akun Anda</p>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>GET https://api.docextract.ai/v1/balance</pre>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">GET /v1/history</h3>
                            <p class="text-muted-foreground mb-3">Lihat riwayat ekstraksi</p>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>GET https://api.docextract.ai/v1/history</pre>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Examples Tab -->
                <div x-show="activeTab === 'Examples'" x-transition>
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight">Code Examples</h3>
                        <p class="text-sm text-muted-foreground">Contoh implementasi di berbagai bahasa</p>
                    </div>
                    <div class="p-6 pt-0 space-y-6">
                        <div>
                            <h3 class="font-semibold mb-3">JavaScript / Node.js</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>const FormData = require('form-data');
const fs = require('fs');

const form = new FormData();
form.append('file', fs.createReadStream('document.pdf'));

const response = await fetch('https://api.docextract.ai/v1/extract', {
  method: 'POST',
  headers: {
    'Authorization': 'Bearer YOUR_API_KEY',
    ...form.getHeaders()
  },
  body: form
});

const data = await response.json();
console.log(data);</pre>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">Python</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>import requests

url = "https://api.docextract.ai/v1/extract"
headers = {"Authorization": "Bearer YOUR_API_KEY"}
files = {"file": open("document.pdf", "rb")}

response = requests.post(url, headers=headers, files=files)
print(response.json())</pre>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-semibold mb-3">PHP</h3>
                            <div class="bg-muted p-4 rounded-lg font-mono text-sm overflow-x-auto">
                                <pre>$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.docextract.ai/v1/extract",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer YOUR_API_KEY"
  ],
  CURLOPT_POSTFIELDS => [
    'file' => new CURLFile('document.pdf')
  ]
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response;</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
</main>
@endsection
