<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Certificate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- English Content (Default) -->
                        <div class="space-y-4">
                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $certificate->title) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="issuer"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issuer</label>
                                <input type="text" name="issuer" id="issuer"
                                    value="{{ old('issuer', $certificate->issuer) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                        </div>

                        <!-- Common Fields -->
                        <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="mb-4">
                                <label for="issued_at"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Issued
                                    Date</label>
                                <input type="date" name="issued_at" id="issued_at"
                                    value="{{ old('issued_at', $certificate->issued_at->format('Y-m-d')) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                @error('issued_at')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="credential_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Credential URL
                                    (Optional)</label>
                                <input type="url" name="credential_url" id="credential_url"
                                    value="{{ old('credential_url', $certificate->credential_url) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('credential_url')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Certificate Image
                                    (Optional)</label>
                                @if($certificate->image)
                                    <div class="mb-2">
                                        <img src="{{ $certificate->image }}" alt="Current Image"
                                            class="h-20 w-20 object-cover rounded">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Current Image</p>
                                    </div>
                                @endif
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Leave blank to keep current
                                    image.
                                </p>
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.certificates.index') }}"
                                class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 mr-4">Cancel</a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Certificate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>