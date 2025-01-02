<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="bio" :value="__('Bio (English)')" />
                        <x-textarea id="bio" name="bio" class="mt-1 block w-full" required></x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="bio_sq" :value="__('Bio (Albanian)')" />
                        <x-textarea id="bio_sq" name="bio_sq" class="mt-1 block w-full" required></x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('bio_sq')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="picture" :value="__('Picture')" />
                        <x-file-input id="picture" name="picture" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('picture')" />
                    </div>
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
