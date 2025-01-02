<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Members Section -->
                <div class="mb-8">
                    <div class="flex justify-end mb-4">
                        <!-- Create New Member Button -->
                        <x-primary-button>
                            <a href="{{ route('members.create') }}" class="text-white">{{ __('Create New Member') }}</a>
                        </x-primary-button>
                    </div>

                    <h3 class="font-semibold text-xl text-gray-800">{{ __('Members') }}</h3>

                    @if (session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Name') }}</th>
                            <th class="px-4 py-2">{{ __('Bio') }}</th>
                            <th class="px-4 py-2">{{ __('Picture') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td class="border px-4 py-2">{{ $member->getTranslation('name', app()->getLocale()) }}</td>
                                <td class="border px-4 py-2">
                                    <textarea class="mt-3" disabled>{{ $member->getTranslation('bio', app()->getLocale()) }}</textarea>
                                </td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('storage/' . $member->picture) }}" alt="{{ $member->name }}" width="100">
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex space-x-2">
                                        <!-- Edit Button -->
                                        <x-primary-button>
                                            <a href="{{ route('members.edit', $member) }}" class="text-white">{{ __('Edit') }}</a>
                                        </x-primary-button>
                                        <!-- Delete Button -->
                                        <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
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
</x-app-layout>
