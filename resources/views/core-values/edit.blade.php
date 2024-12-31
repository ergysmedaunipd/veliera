<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Core Value') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('core-values.update', $coreValue) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full" value="{{ $coreValue->title }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="icon" class="block text-gray-700">{{ __('Icon') }}</label>
                        <input type="text" name="icon" id="icon" class="mt-1 block w-full" value="{{ $coreValue->icon }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">{{ __('Description') }}</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full" required>{{ $coreValue->description }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
