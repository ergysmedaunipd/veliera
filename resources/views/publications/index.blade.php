<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <x-primary-button>
                        <a href="{{ route('publications.create') }}" class="text-white">
                            Add New Publication
                        </a>
                    </x-primary-button>
                </div>

                @if (session('success'))
                    <div class="text-green-600 mb-4">{{ session('success') }}</div>
                @endif

                <table class="table-auto w-full">
                    <thead>
                    <tr >
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Cover Photo</th>
                        <th class="px-4 py-2">File</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($publications as $publication)
                        <tr>
                            <td class="border px-4 py-2">{{ $publication->title }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($publication->description, 50) }}</td>
                            <td class="border px-4 py-2">
                                @if ($publication->cover_photo)
                                    <img src="{{ asset('storage/' . $publication->cover_photo) }}" alt="{{ $publication->cover_photo }}" width="100">
                                @endif
                            </td>
                            <td class="border px-4 py-2">

                                @if ($publication->file)
                                    <a href="{{ asset('storage/' . $publication->file) }}" class="text-blue-500" download>Download</a>
                                @endif
                            </td>
                            <td class="border px-4 py-2" >
                                <!-- Edit Button -->
                                <x-primary-button>
                                    <a href="{{ route('publications.edit', $publication) }}" class="text-white">{{ __('Edit') }}</a>
                                </x-primary-button>
                                <!-- Delete Button -->
                                <form action="{{ route('publications.destroy', $publication) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button onclick="return confirm('{{ __('Are you sure?') }}')">
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
