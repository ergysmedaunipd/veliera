@extends('layouts.base')
@section('content')

<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h1>{{ $banner->title ?? 'Welcome ' }} </h1>
            <p>{{ $banner->subtitle ?? 'Join us  ' }}</p>
        </header>
        <p>{{ $banner->description ?? ' We are committed to empowering individuals and fostering sustainable development. Through our programs, we work with local communities to promote education, health, and social equality.' }}</p>
        <ul class="actions">
            <li><a href="{{ route('about') }}" class="button big">Learn More About Us</a></li>
        </ul>
    </div>
    <span class="image object">
        <!-- If banner image exists, display it, else fallback to default image -->
        <img src="{{ asset($banner->image ? 'storage/' . $banner->image : 'build/assets/images/logo_png.png') }}" alt="Community Event"/>
    </span>
</section>
<!-- Section -->
<!-- Core Values Section -->
<section>
    <header class="major">
        <h2>Our Core Values</h2>
    </header>
    <div class="features">
        @foreach($coreValues as $coreValue)
            <article>
                <!-- Display the dynamic icon and title from database -->
                <span class="icon {{ $coreValue->icon }}"></span>
                <div class="content">
                    <h3>{{ $coreValue->title }}</h3>
                    <p>{{ $coreValue->description }}</p>
                </div>
            </article>
        @endforeach
    </div>
</section>

<!-- Section -->
<section>
    <header class="major">
        <h2>Recent Publications</h2>
    </header>
    <div class="posts">
        @foreach($publications as $publication)
            <article>
                <a href="{{ route('publicationsLandingShow', $publication->id) }}" class="image">
                    <img src="{{ asset('storage/' . $publication->cover_photo) }}" alt="{{ $publication->title }}" />
                </a>
                <h3>{{ $publication->title }}</h3>
                <p>{{ Str::limit($publication->description, 150, '...') }}</p>
                <ul class="actions">
                    <li><a href="{{ route('publicationsLandingShow', $publication->id) }}" class="button">Read More</a></li>
                </ul>
            </article>
        @endforeach
    </div>
</section>

@endsection
