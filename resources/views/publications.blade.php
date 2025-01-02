@extends('layouts.base')
@section('content')

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
