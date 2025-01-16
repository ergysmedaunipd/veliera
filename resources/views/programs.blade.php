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
            <h2> {{__('main.our_programs')}}</h2>
        </header>
        <div class="posts">
            @foreach($programs as $program)
                <article>
                    <a href="{{ route('programsLandingShow', $program->id) }}" class="image">
                        <img src="{{ asset('storage/' . $program->cover_photo) }}" alt="{{ $program->title }}" />
                    </a>
                    <h3>{{ $program->title }}</h3>
                    <small><b>{{$program->created_at->format("d/m/Y H:i")}}</b></small>
                    <p>{{ Str::limit($program->description, 150, '...') }}</p>
                    <ul class="actions">
                        <li><a href="{{ route('programsLandingShow', $program->id) }}" class="button">{{__('main.read_more')}}</a></li>
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

@endsection
