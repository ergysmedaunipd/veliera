<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Core Value') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('core-values.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title (English)')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="title_sq" :value="__('Title (Albanian)')" />
                        <x-text-input id="title_sq" name="title_sq" type="text" class="mt-1 block w-full" value="{{ old('title_sq') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title_sq')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="icon" :value="__('Icon')" />
                        <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" value="{{ old('icon') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description (English)')" />
                        <x-textarea id="description" name="description" class="mt-1 block w-full" required>{{ old('description') }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description_sq" :value="__('Description (Albanian)')" />
                        <x-textarea id="description_sq" name="description_sq" class="mt-1 block w-full" required>{{ old('description_sq') }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description_sq')" />
                    </div>

                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
