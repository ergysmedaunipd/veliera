<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Publication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('publications.update', $publication) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $publication->title) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" name="description" class="mt-1 block w-full" required>{{ old('description', $publication->description) }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="cover_photo" :value="__('Cover Photo')" />
                        <x-file-input id="cover_photo" name="cover_photo" class="mt-1 block w-full" />
                        @if($publication->cover_photo)
                            <img src="{{ asset('storage/' . $publication->cover_photo) }}" alt="Cover Photo" width="100" class="mt-2">
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('cover_photo')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="file" :value="__('File (Optional)')" />
                        <x-file-input id="file" name="file" class="mt-1 block w-full" />
                        @if($publication->file)
                            <a href="{{ asset('storage/' . $publication->file) }}" target="_blank" class="mt-2 block text-blue-500 underline">Download Current File</a>
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('file')" />
                    </div>

                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
