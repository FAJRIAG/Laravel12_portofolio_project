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

                        <div class="mb-6 border-b pb-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Hero Section (Top of Page)</h3>
                            <!-- Hero Title -->
                            <div class="mb-4">
                                <label for="hero_title" class="block text-gray-700 text-sm font-bold mb-2">Hero
                                    Title</label>
                                <input type="text" name="hero_title" id="hero_title"
                                    value="{{ old('hero_title', $about->hero_title) }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="e.g., Crafting Digital Experiences.">
                                @error('hero_title')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Hero Description -->
                            <div class="mb-4">
                                <label for="hero_description" class="block text-gray-700 text-sm font-bold mb-2">Hero
                                    Description</label>
                                <textarea name="hero_description" id="hero_description" rows="3"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="e.g., Saya adalah seorang web developer...">{{ old('hero_description', $about->hero_description) }}</textarea>
                                @error('hero_description')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Logo Text -->
                            <div class="mb-4">
                                <label for="logo_text" class="block text-gray-700 text-sm font-bold mb-2">Logo Text (Top
                                    Left)</label>
                                <input type="text" name="logo_text" id="logo_text"
                                    value="{{ old('logo_text', $about->logo_text) }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="e.g., JriDev.">
                                @error('logo_text')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Page Title -->
                            <div class="mb-4">
                                <label for="page_title" class="block text-gray-700 text-sm font-bold mb-2">Page Title
                                    (Browser)</label>
                                <input type="text" name="page_title" id="page_title"
                                    value="{{ old('page_title', $about->page_title) }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="e.g., JriDev — Web Developer">
                                @error('page_title')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 mb-4">About Me Section</h3>

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title /
                                Greeting</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('title')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-700 text-sm font-bold mb-2">Biography</label>
                            <textarea name="description" id="description" rows="5"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $about->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Profile Image</label>
                            @if($about->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image"
                                        class="w-32 h-32 object-cover rounded-full border">
                                </div>
                            @endif
                            <input type="file" name="image" id="image"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('image')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
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