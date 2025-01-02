@extends('layouts.base')
@section('content')
    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <header>
                <h1>{{ $banner ? $banner->getTranslation('title', app()->getLocale()) : __('main.welcome') }} </h1>
                <p>{{ $banner ? $banner->getTranslation('subtitle', app()->getLocale()) : __('main.join_us') }}</p>
            </header>
            <p>{{ $banner ? $banner->getTranslation('description', app()->getLocale()) : __('main.banner_description') }}</p>
            <ul class="actions">
                <li><a href="{{ route('about') }}" class="button big">{{ __('main.learn_more') }}</a></li>
            </ul>
        </div>
        <span class="image object">
        <img src="{{ asset($banner->image ? 'storage/' . $banner->image : 'build/assets/images/logo_png.png') }}" alt="Community Event"/>
    </span>
    </section>

    <!-- Core Values Section -->
    <section>
        <header class="major">
            <h2>{{ __('main.our_core_values') }}</h2>
        </header>
        <div class="features">
            @foreach($coreValues as $coreValue)
                <article>
                    <span class="icon {{ $coreValue->icon }}"></span>
                    <div class="content">
                        <h3>{{ $coreValue->getTranslation('title', app()->getLocale()) }}</h3>
                        <p>{{ $coreValue->getTranslation('description', app()->getLocale()) }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Recent Publications Section -->
    <section>
        <header class="major">
            <h2>{{ __('main.recent_publications') }}</h2>
        </header>
        <div class="posts">
            @foreach($publications as $publication)
                <article>
                    <a href="{{ route('publicationsLandingShow', $publication->id) }}" class="image">
                        <img src="{{ asset('storage/' . $publication->cover_photo) }}" alt="{{ $publication->title }}" />
                    </a>
                    <h3>{{ $publication->title }}</h3>
                    <small><b>{{ $publication->created_at->format("d/m/Y H:i") }}</b></small>
                    <p>{{ Str::limit($publication->description, 150, '...') }}</p>
                    <ul class="actions">
                        <li><a href="{{ route('publicationsLandingShow', $publication->id) }}" class="button">{{ __('main.read_more') }}</a></li>
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

@endsection
