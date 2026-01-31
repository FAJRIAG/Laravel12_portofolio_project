<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage About Me') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- English Content (Default) -->
                        <div class="space-y-4">
                            <!-- Hero Section -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md">
                                <h4 class="font-medium mb-3 dark:text-gray-300">Hero Section</h4>
                                <div class="mb-4">
                                    <label for="hero_title"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Hero
                                        Title</label>
                                    <input type="text" name="hero_title" id="hero_title"
                                        value="{{ old('hero_title', $about->hero_title) }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="e.g., Crafting Digital Experiences.">
                                    </div>
                                <div class="mb-4">
                                    <label for="hero_description"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Hero
                                        Description</label>
                                    <textarea name="hero_description" id="hero_description" rows="3"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="e.g., Saya adalah seorang web developer...">{{ old('hero_description', $about->hero_description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="page_title"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Page
                                        Title (Browser Tab)</label>
                                    <input type="text" name="page_title" id="page_title"
                                        value="{{ old('page_title', $about->page_title) }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="e.g., JriDev — Web Developer">
                                </div>
                            </div>

                            <!-- About Me Section -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md">
                                <h4 class="font-medium mb-3 dark:text-gray-300">About Me Section</h4>
                                <div class="mb-4">
                                    <label for="title"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title
                                        / Greeting</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="mb-4">
                                    <label for="description"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Biography</label>
                                    <textarea name="description" id="description" rows="5"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $about->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Logo Text (Global) -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md">
                                <div class="mb-4">
                                    <label for="logo_text"
                                        class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Logo
                                        Text (Top Left - Global)</label>
                                    <input type="text" name="logo_text" id="logo_text"
                                        value="{{ old('logo_text', $about->logo_text) }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="e.g., JriDev.">
                                </div>
                            </div>
                        </div>

                        <!-- Image Section (Always Visible) -->
                        <div class="mt-6 p-4 bg-white dark:bg-gray-800 border-t">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Profile Image</h3>
                            <div class="mb-4">
                                @if($about->image)
                                    <div class="mb-2">
                                        <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image"
                                            class="w-32 h-32 object-cover rounded-full border">
                                    </div>
                                @endif
                                <label for="image"
                                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Upload New
                                    Image</label>
                                <input type="file" name="image" id="image"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('image')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>