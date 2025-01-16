<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Publication') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title (English)')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="title_sq" :value="__('Title (Albanian)')" />
                        <x-text-input id="title_sq" name="title_sq" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description (English)')" />
                        <x-textarea id="description" name="description" class="mt-1 block w-full" required></x-textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description_sq" :value="__('Description (Albanian)')" />
                        <x-textarea id="description_sq" name="description_sq" class="mt-1 block w-full" required></x-textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="cover_photo" :value="__('Cover Photo')" />
                        <x-text-input id="cover_photo" name="cover_photo" type="file" class="mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="files" :value="__('Files (Optional)')" />
                        <x-text-input id="files" name="files[]" type="file" class="mt-1 block w-full" multiple />
                    </div>

                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
