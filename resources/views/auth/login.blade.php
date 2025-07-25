<x-guest-layout>
    <div class="w-full max-w-sm mx-auto">
        <div class="bg-white p-10 md:p-12 rounded-2xl shadow-sm border border-slate-200">
            
{{--             <div class="text-center mb-8">
                <a href="/" class="inline-block text-slate-900">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.311l-3.75 0m3.75-7.478a12.057 12.057 0 0 1 7.5 0m-7.5 0a12.057 12.057 0 0 0-7.5 0m1.5-7.478a6.01 6.01 0 0 0-1.5.189m1.5-.189a6.01 6.01 0 0 1 1.5.189m3.75 7.478a12.057 12.057 0 0 0 4.5 0m-4.5 0a12.057 12.057 0 0 1-4.5 0" />
                    </svg>
                </a>
            </div> --}}

            <div class="text-center">
                <h1 class="font-serif text-3xl font-bold text-slate-900">
                    Welcome Back
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Please sign in to continue.
                </p>
            </div>

            <x-auth-session-status class="mt-6 mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-8">
                @csrf

                <div class="relative">
                    <x-text-input 
                        id="email" 
                        class="peer block w-full border-0 border-b-2 border-slate-200 bg-transparent py-3 text-slate-900 placeholder:text-transparent focus:border-slate-900 focus:outline-none focus:ring-0" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="Email Address"
                    />
                    <x-input-label 
                        for="email" 
                        value="Email Address" 
                        class="absolute left-0 -top-3.5 text-slate-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-slate-500"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="relative">
                     <x-text-input 
                        id="password" 
                        class="peer block w-full border-0 border-b-2 border-slate-200 bg-transparent py-3 text-slate-900 placeholder:text-transparent focus:border-slate-900 focus:outline-none focus:ring-0"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="Password"
                    />
                     <x-input-label 
                        for="password" 
                        value="Password"
                        class="absolute left-0 -top-3.5 text-slate-500 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-slate-500"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-slate-900 shadow-sm focus:ring-slate-900" name="remember">
                        <span class="ms-2 text-sm text-slate-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-slate-600 hover:text-slate-900 hover:underline" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <div>
                    <x-primary-button class="w-full flex justify-center py-3 bg-slate-900 hover:bg-slate-800 focus:bg-slate-800 active:bg-slate-900 text-base">
                        Sign In
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="text-center mt-6 text-sm text-slate-500">
             <a href="/" class="hover:underline">← Back to Portfolio</a>
        </div>
    </div>
</x-guest-layout>