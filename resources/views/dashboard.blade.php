<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Portfolio Card -->
                    <a href="{{ route('admin.portfolios.index') }}"
                        class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Manage
                            Portfolios</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Add, edit, or delete your portfolio
                            projects.</p>
                    </a>

                    <!-- About Me Card -->
                    <a href="{{ route('admin.about.index') }}"
                        class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Manage Profile
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Update your bio, title, and profile
                            picture.</p>
                    </a>

                    <!-- Certificates Card -->
                    <a href="{{ route('admin.certificates.index') }}"
                        class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Manage
                            Certificates
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Add, edit, or delete your professional
                            certificates.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>