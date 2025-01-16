@extends('layouts.base')

@section('content')

    <!-- Section -->
    <section id="banner">
        <div class="content">
            <header>
                <h1>{{ $publication->getTranslation('title', app()->getLocale()) ?? ' ' }}</h1>
            </header>

            <!-- If banner image exists, display it, else fallback to default image -->
            <img style="height: 25vh; width: auto; display: block; margin: 0 auto; object-fit: cover;" src="{{ asset($publication->image ? 'storage/' . $publication->image : 'build/assets/images/logo_png.png') }}" alt="Community Event"/>
            <p>{{ $publication->getTranslation('description', app()->getLocale()) ?? '' }}</p>
        </div>
    </section>

    @if($publication->files->isNotEmpty())
        <div class="mt-8 text-center">
            @foreach($publication->files as $file)
                <div class="mb-4">
                    <a href="{{ asset('storage/' . $file->file_path) }}" class="text-blue-500 underline text-lg flex items-center justify-center" download>
                        <svg style="height: 16px" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V3"></path>
                        </svg>
                        {{ __('Download File') }}
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
