@extends('layouts.base')
@section('content')
    <style>
        .posts article {
            overflow-wrap: break-word;
        }
        .posts .image img {
            height: 400px; /* Set a fixed height for all images */
            object-fit: cover; /* Ensure the image covers the area */
            width: 100%; /* Ensure the image takes the full width */
        }
    </style>
    <section>
        <header class="major">
            <h2> {{__('main.publications')}}</h2>
        </header>
        <div class="posts">
            @foreach($publications as $publication)
                <article>
                    <a href="{{ route('publicationsLandingShow', $publication->id) }}" class="image">
                        <img src="{{ asset('storage/' . $publication->cover_photo) }}" alt="{{ $publication->title }}" />
                    </a>
                    <h3>{{ $publication->title }}</h3>
                    <small><b>{{$publication->created_at->format("d/m/Y H:i")}}</b></small>
                    <p>{{ Str::limit($publication->description, 150, '...') }}</p>
                    <ul class="actions">
                        <li><a href="{{ route('publicationsLandingShow', $publication->id) }}" class="button">{{__('main.read_more')}}</a></li>
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

@endsection
