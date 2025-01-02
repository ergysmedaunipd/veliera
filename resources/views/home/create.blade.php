<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('home.modify.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title (English)')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="title_sq" :value="__('Title (Albanian)')" />
                        <x-text-input id="title_sq" name="title_sq" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title_sq')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="subtitle" :value="__('Subtitle')" />
                        <x-text-input id="subtitle" name="subtitle" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('subtitle')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="subtitle_sq" :value="__('Subtitle (Albanian)')" />
                        <x-text-input id="subtitle_sq" name="subtitle_sq" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('subtitle_sq')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" name="description" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="description_sq" :value="__('Description (Albanian)')" />
                        <x-textarea id="description_sq" name="description_sq" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('description_sq')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="side_image" :value="__('Side Image')" />
                        <x-file-input id="side_image" name="side_image" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('side_image')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="top_image" :value="__('Top Image')" />
                        <x-file-input id="top_image" name="top_image" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('top_image')" />
                    </div>
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
