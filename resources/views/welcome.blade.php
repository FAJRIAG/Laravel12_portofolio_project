<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JriDev — Web Developer & Designer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Satoshi:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-serif { font-family: 'Lora', serif; }
        .font-sans { font-family: 'Satoshi', sans-serif; }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-700">

    <header class="absolute top-0 left-0 right-0 z-50">
        <nav class="container mx-auto px-6 py-5 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-white tracking-tight">JriDev.</a>
            <div class="hidden md:flex items-center space-x-10">
                <a href="#portfolio" class="text-sm font-medium text-slate-200 hover:text-white transition-colors">Portfolio</a>
                <a href="#about" class="text-sm font-medium text-slate-200 hover:text-white transition-colors">About</a>
                <a href="#contact" class="text-sm font-medium text-slate-200 hover:text-white transition-colors">Contact</a>
            </div>
            @auth
                <a href="{{ url('/admin/portfolios') }}" class="hidden md:block px-5 py-2 text-sm bg-white text-slate-900 font-medium rounded-full hover:bg-slate-200 transition-colors">Dashboard</a>
            @else
                 <a href="{{ route('login') }}" class="hidden md:block px-5 py-2 text-sm bg-white text-slate-900 font-medium rounded-full hover:bg-slate-200 transition-colors">Log In</a>
            @endauth
        </nav>
    </header>

    <main>
        <section class="h-screen min-h-[700px] relative flex items-center justify-center text-center bg-slate-900">
            <div class="absolute top-0 left-0 w-full h-full bg-black/60 z-10"></div>
            
            <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
                <source src="https://videos.pexels.com/video-files/3209828/3209828-hd_1920_1080_25fps.mp4" type="video/mp4">
            </video>

            <div class="relative z-20 px-6">
                <h1 class="font-serif text-5xl md:text-7xl font-bold text-white">
                    Crafting Digital Experiences.
                </h1>

                <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto">
                    Saya adalah seorang web developer yang berfokus pada pengembangan aplikasi yang fungsional, intuitif, dan memiliki desain yang bersih.
                </p>
                <a href="#portfolio" class="inline-block mt-8 px-8 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-transform hover:scale-105 shadow-lg shadow-blue-500/20">
                    Lihat Karya Saya
                </a>
            </div>
        </section>

        <section id="portfolio" class="bg-white py-20 md:py-28">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl font-bold text-slate-900">Portfolio</h2>
                    <p class="mt-3 text-slate-500">Proyek-proyek pilihan yang merepresentasikan keahlian saya.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($portfolios as $portfolio)
                        <a href="{{ $portfolio->link ?? '#' }}" target="_blank" class="block group">
                            <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-sm group-hover:shadow-xl transition-all duration-300">
                                <img class="w-full h-56 object-cover" 
                                     src="{{ asset('storage/' . $portfolio->image) }}" 
                                     alt="{{ $portfolio->title }}">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-slate-900">{{ $portfolio->title }}</h3>
                                <p class="text-slate-500 text-sm mt-1">{{ Str::limit($portfolio->description, 80) }}</p>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full text-center text-slate-500">Belum ada proyek untuk ditampilkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="about" class="py-20 md:py-28">
            <div class="container mx-auto px-6">
                 <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl font-bold text-slate-900">Filosofi Kerja Saya</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-12 text-center">
                    <div>
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" /></svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">Struktur Kode</h3>
                        <p class="text-slate-500 mt-2">Menulis kode yang bersih, terstruktur, dan mudah dikelola untuk skalabilitas jangka panjang.</p>
                    </div>
                     <div>
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" /></svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">Desain Intuitif</h3>
                        <p class="text-slate-500 mt-2">Merancang antarmuka yang tidak hanya indah, tetapi juga mudah digunakan oleh semua kalangan.</p>
                    </div>
                     <div>
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">Performa Cepat</h3>
                        <p class="text-slate-500 mt-2">Mengoptimalkan setiap aspek aplikasi untuk memastikan waktu muat yang cepat dan responsif.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact" class="bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto px-6 py-16 text-center">
            <h2 class="font-serif text-3xl font-bold text-slate-900">Mari Berkolaborasi</h2>
            <p class="mt-3 text-slate-500 max-w-lg mx-auto">Punya ide atau proyek yang ingin Anda wujudkan? Saya siap membantu.</p>

            <a href="mailto:jridev2@gmail.com" class="inline-block mt-8 text-lg text-blue-600 font-semibold hover:underline">
                jridev2@gmail.com
            </a>

            <div class="mt-10 flex justify-center space-x-8">
                <a href="https://github.com/FAJRIAG" target="_blank" class="text-slate-500 hover:text-slate-900 transition-colors" aria-label="GitHub">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.492.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.378.203 2.398.1 2.65.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.308.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                </a>
                <a href="https://www.linkedin.com/in/fajri-abdurahman-ghurri/" target="_blank" class="text-slate-500 hover:text-slate-900 transition-colors" aria-label="LinkedIn">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" /></svg>
                </a>
                <a href="https://discord.com/users/fajriag" target="_blank" class="text-slate-500 hover:text-slate-900 transition-colors" aria-label="Discord">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 28 28"><path d="M23.021 3.445H4.978A2.036 2.036 0 0 0 3 5.48v17.04a2.036 2.036 0 0 0 2.021 2.035h14.392l-.634-2.215a.678.678 0 0 1 .134-.72l1.634-1.634a.678.678 0 0 1 .961 0l1.634 1.634a.678.678 0 0 1 .134.72l-.634 2.215h3.359a2.036 2.036 0 0 0 2.021-2.035V5.48a2.036 2.036 0 0 0-2.021-2.035zM9.49 18.299c-1.01 0-1.828-.86-1.828-1.921s.818-1.92 1.828-1.92c1.01 0 1.828.86 1.828 1.92s-.818 1.92-1.828 1.92zm9.02 0c-1.01 0-1.828-.86-1.828-1.921s.818-1.92 1.828-1.92c1.01 0 1.828.86 1.828 1.92s-.818 1.92-1.828 1.92z"/></svg>
                </a>
            </div>
            
            <div class="mt-10 text-sm text-slate-500">
                &copy; {{ date('Y') }} JriDev. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>