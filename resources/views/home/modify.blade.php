<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Banners, Core Values, and Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Banner Section -->
                <div class="mb-8">
                    <div class="flex justify-end mb-4">
                        <!-- Create New Banner Button -->
                        @if ($banners->isEmpty())
                            <x-primary-button>
                                <a href="{{ route('home.modify.create') }}" class="text-white">{{ __('Create New Banner') }}</a>
                            </x-primary-button>
                        @endif
                    </div>

                    <h3 class="font-semibold text-xl text-gray-800">{{ __('Banners') }}</h3>

                    @if (session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Title') }}</th>
                            <th class="px-4 py-2">{{ __('Subtitle') }}</th>
                            <th class="px-4 py-2">{{ __('Description') }}</th>
                            <th class="px-4 py-2">{{ __('Side Image') }}</th>
                            <th class="px-4 py-2">{{ __('Top Image') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="border px-4 py-2">{{ $banner->title }}</td>
                                <td class="border px-4 py-2">{{ $banner->subtitle }}</td>
                                <td class="border px-4 py-2">
                                    <textarea class="mt-3" disabled>{{ $banner->description }}</textarea>
                                </td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/' . $banner->side_image) }}" alt="{{ $banner->side_image }}" width="100">
                                </td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/' . $banner->top_image) }}" alt="{{ $banner->top_image }}" width="100">
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex space-x-2">
                                        <!-- Edit Button -->
                                        <x-primary-button>
                                            <a href="{{ route('home.modify.edit', $banner) }}" class="text-white">{{ __('Edit') }}</a>
                                        </x-primary-button>
                                        <!-- Delete Button -->
                                        <form action="{{ route('home.modify.destroy', $banner) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button onclick="return confirm('{{ __('Are you sure?') }}')">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Core Values Section -->
                <div class="mt-8">
                    <div class="flex justify-end mb-4">
                        <!-- Create New Core Value Button -->
                        <x-primary-button>
                            <a href="{{ route('core-values.create') }}" class="text-white">{{ __('Create New Core Value') }}</a>
                        </x-primary-button>
                    </div>

                    <h3 class="font-semibold text-xl text-gray-800">{{ __('Core Values') }}</h3>

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Title') }}</th>
                            <th class="px-4 py-2">{{ __('Icon') }}</th>
                            <th class="px-4 py-2">{{ __('Description') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coreValues as $coreValue)
                            <tr>
                                <td class="border px-4 py-2">{{ $coreValue->title }}</td>
                                <td class="border px-4 py-2"> {{ $coreValue->icon }}
                                </td>
                                <td class="border px-4 py-2">
                                    <textarea class="mt-3" disabled>{{ $coreValue->description }}</textarea>
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex space-x-2">
                                        <!-- Edit Button -->
                                        <x-primary-button>
                                            <a href="{{ route('core-values.edit', $coreValue) }}" class="text-white">{{ __('Edit') }}</a>
                                        </x-primary-button>
                                        <!-- Delete Button -->
                                        <form action="{{ route('core-values.destroy', $coreValue) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button onclick="return confirm('{{ __('Are you sure?') }}')">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Contact Section -->
                <div class="mt-8">
                    <h3 class="font-semibold text-xl text-gray-800">{{ __('Contact Information') }}</h3>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <!-- Editable Form for Contact -->
                    <form action="{{ route('contact.update') }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Email -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ $contact->email??'' }}" required />
                        </div>

                        <!-- Phone -->
                        <div class="mb-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{ $contact->phone??'' }}" required />
                        </div>

                        <!-- Address (English) -->
                        <div class="mb-4">
                            <x-input-label for="address" :value="__('Address (English)')" />
                            <x-textarea id="address" name="address" rows="1" class="mt-1 block w-full" required>{{ $contact ? $contact->getTranslation('address', 'en') : '' }}</x-textarea>
                        </div>

                        <!-- Address (Albanian) -->
                        <div class="mb-4">
                            <x-input-label for="address_sq" :value="__('Address (Albanian)')" />
                            <x-textarea id="address_sq" name="address_sq" rows="1" class="mt-1 block w-full" required>{{ $contact ? $contact->getTranslation('address', 'sq') : '' }}</x-textarea>
                        </div>

                        <!-- Message (English) -->
                        <div class="mb-4">
                            <x-input-label for="message" :value="__('Message (English)')" />
                            <x-textarea id="message" name="message" rows="1" class="mt-1 block w-full" required>{{ $contact ? $contact->getTranslation('message', 'en') : '' }}</x-textarea>
                        </div>

                        <!-- Message (Albanian) -->
                        <div class="mb-4">
                            <x-input-label for="message_sq" :value="__('Message (Albanian)')" />
                            <x-textarea id="message_sq" name="message_sq" rows="1" class="mt-1 block w-full" required>{{ $contact ? $contact->getTranslation('message', 'sq') : '' }}</x-textarea>
                        </div>

                        <!-- Submit Button -->
                        <x-primary-button>
                            {{ __('Save Contact Information') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
