<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $about ? $about->translate('page_title') : 'JriDev — Web Developer & Designer' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&family=Satoshi:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-serif {
            font-family: 'Lora', serif;
        }

        .font-sans {
            font-family: 'Satoshi', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-700">

    <!-- DEBUG INFO -->


    <header class="absolute top-0 left-0 right-0 z-50">
        <nav class="container mx-auto px-6 py-5 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-white tracking-tight">{{ $about->logo_text ?? 'JriDev.' }}</a>
            <div class="hidden md:flex items-center space-x-10">
                <a href="#portfolio"
                    class="text-sm font-medium text-slate-200 hover:text-white transition-colors">{{ __('Portfolio') }}</a>
                <a href="#about"
                    class="text-sm font-medium text-slate-200 hover:text-white transition-colors">{{ __('About Me') }}</a>
                <a href="#contact"
                    class="text-sm font-medium text-slate-200 hover:text-white transition-colors">{{ __('Contact') }}</a>

                <!-- Language Switcher -->
                <!-- Language Switcher Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.outside="open = false"
                        class="flex items-center space-x-1 text-slate-200 hover:text-white text-sm font-medium transition-colors focus:outline-none">
                        <span class="uppercase">{{ app()->getLocale() == 'ja' ? 'JP' : app()->getLocale() }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-20 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('set_locale', 'en') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'font-bold bg-gray-50' : '' }}">EN</a>
                        <a href="{{ route('set_locale', 'id') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'id' ? 'font-bold bg-gray-50' : '' }}">ID</a>
                        <a href="{{ route('set_locale', 'ja') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'ja' ? 'font-bold bg-gray-50' : '' }}">JP</a>
                    </div>
                </div>
            </div>
            @auth
                <a href="{{ url('/admin/portfolios') }}"
                    class="hidden md:block px-5 py-2 text-sm bg-white text-slate-900 font-medium rounded-full hover:bg-slate-200 transition-colors">{{ __('Dashboard') }}</a>
            @else
                <a href="{{ route('login') }}"
                    class="hidden md:block px-5 py-2 text-sm bg-white text-slate-900 font-medium rounded-full hover:bg-slate-200 transition-colors">{{ __('Log  In') }}</a>
            @endauth
        </nav>
    </header>

    <main>
        <section class="h-screen min-h-[700px] relative flex items-center justify-center text-center bg-slate-900">
            <div class="absolute top-0 left-0 w-full h-full bg-black/60 z-10"></div>

            <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
                <source src="https://videos.pexels.com/video-files/3209828/3209828-hd_1920_1080_25fps.mp4"
                    type="video/mp4">
            </video>

            <div class="relative z-20 px-6">
                <h1 class="font-serif text-5xl md:text-7xl font-bold text-white">
                    {{ $about ? $about->translate('hero_title') : __('Crafting Digital Experiences.') }}
                </h1>

                <p class="mt-6 text-lg text-slate-300 max-w-2xl mx-auto">
                    {{ $about ? $about->translate('hero_description') : __('I am a web developer focused on developing functional, intuitive, and clean design applications.') }}
                </p>
                <a href="#portfolio"
                    class="inline-block mt-8 px-8 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-transform hover:scale-105 shadow-lg shadow-blue-500/20">
                    {{ __('View My Work') }}
                </a>
            </div>
        </section>

        <section id="portfolio" class="bg-white py-20 md:py-28">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl font-bold text-slate-900">{{ __('Portfolio') }}</h2>
                    <p class="mt-3 text-slate-500">{{ __('Selected projects that represent my skills.') }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($portfolios as $portfolio)
                        <a href="{{ $portfolio->link ?? '#' }}" target="_blank" class="block group">
                            <div
                                class="rounded-2xl overflow-hidden border border-slate-200 shadow-sm group-hover:shadow-xl transition-all duration-300">
                                <img class="w-full h-56 object-cover" src="{{ asset('storage/' . $portfolio->image) }}"
                                    alt="{{ $portfolio->translate('title') }}">
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-slate-900">{{ $portfolio->translate('title') }}</h3>
                                <p class="text-slate-500 text-sm mt-1">
                                    {{ Str::limit($portfolio->translate('description'), 80) }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full text-center text-slate-500">{{ __('No projects to display yet.') }}</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="about" class="py-20 md:py-28">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl font-bold text-slate-900">{{ __('My Work Philosophy') }}</h2>
                </div>

                <div class="flex flex-col md:flex-row items-center gap-12 mb-20">
                    <div class="w-full md:w-1/3">
                        @if($about && $about->image)
                            <img src="{{ asset('storage/' . $about->image) }}" alt="Profile Picture"
                                class="w-48 h-48 mx-auto rounded-full object-cover shadow-xl border-4 border-white">
                        @else
                            <img src="{{ asset('storage/images/profile.png') }}" alt="Profile Picture"
                                class="w-48 h-48 mx-auto rounded-full object-cover shadow-xl border-4 border-white">
                        @endif
                    </div>
                    <div class="w-full md:w-2/3 text-left">
                        <h3 class="font-serif text-2xl font-bold text-slate-900 mb-4">
                            {{ $about ? $about->translate('title') : __('Hello, I\'m JriDev.') }}
                        </h3>
                        <div class="text-slate-600 leading-relaxed text-lg mb-6 whitespace-pre-line">
                            {{ $about ? $about->translate('description') : __('Default description.') }}
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-12 text-center">
                    <div>
                        <div
                            class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">{{ __('Code Structure') }}</h3>
                        <p class="text-slate-500 mt-2">{{ __('Writing clean code...') }}</p>
                    </div>
                    <div>
                        <div
                            class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">{{ __('Intuitive Design') }}</h3>
                        <p class="text-slate-500 mt-2">{{ __('Designing interfaces...') }}</p>
                    </div>
                    <div>
                        <div
                            class="w-16 h-16 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-slate-900">{{ __('Fast Performance') }}</h3>
                        <p class="text-slate-500 mt-2">{{ __('Optimizing every aspect...') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="certificates" class="bg-slate-50 py-20 md:py-28">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl font-bold text-slate-900">{{ __('Certificates') }}</h2>
                    <p class="mt-3 text-slate-500">{{ __('Professional recognition...') }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($certificates as $certificate)
                        <div
                            class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow border border-slate-100">
                            @if($certificate->image)
                                <img src="{{ $certificate->image }}" alt="{{ $certificate->translate('title') }}"
                                    class="w-full h-40 object-cover rounded-lg mb-4 bg-slate-100">
                            @else
                                <div
                                    class="w-full h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                            <h3 class="font-bold text-lg text-slate-900">{{ $certificate->translate('title') }}</h3>
                            <p class="text-slate-500 text-sm">{{ $certificate->translate('issuer') }} &bull;
                                {{ $certificate->issued_at->format('M Y') }}
                            </p>
                            @if($certificate->credential_url)
                                <a href="{{ $certificate->credential_url }}" target="_blank"
                                    class="inline-block mt-4 text-blue-600 text-sm font-medium hover:underline">{{ __('View Credential') }}
                                    &rarr;</a>
                            @endif
                        </div>
                    @empty
                        <p class="col-span-full text-center text-slate-500">{{ __('No certificates yet.') }}</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <footer id="contact" class="bg-slate-100 border-t border-slate-200">
        <div class="container mx-auto px-6 py-16 text-center">
            <h2 class="font-serif text-3xl font-bold text-slate-900">{{ __('Let\'s Collaborate') }}</h2>
            <p class="mt-3 text-slate-500 max-w-lg mx-auto">{{ __('Have an idea or project...') }}</p>

            <a href="mailto:jridev2@gmail.com"
                class="inline-block mt-8 text-lg text-blue-600 font-semibold hover:underline">
                jridev2@gmail.com
            </a>

            <div class="mt-10 flex justify-center space-x-8">
                <a href="https://github.com/FAJRIAG" target="_blank"
                    class="text-slate-500 hover:text-slate-900 transition-colors" aria-label="GitHub">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.492.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.378.203 2.398.1 2.65.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.308.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/fajri-abdurahman-ghurri/" target="_blank"
                    class="text-slate-500 hover:text-slate-900 transition-colors" aria-label="LinkedIn">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg>
                </a>
            </div>

            <div class="mt-10 text-sm text-slate-500">
                &copy; {{ date('Y') }} JriDev. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>