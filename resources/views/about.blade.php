@extends('layouts.base')
@section('content')

    <!-- Banner -->
    <section>
        <header class="major">
            <h2>{{__('main.about_us')}}</h2>
        </header>

        <div class="features">
            @foreach ($members as $member)
                <article>
                    <a href="#" class="image">
                        <img src="{{ asset('storage/' . $member->picture) }}" alt="{{ $member->name }}" style="width: 100%; height: 500px; object-fit: cover;">
                    </a>
                    <div class="content" style="padding-left: 20px">
                        <h3>{{ $member->name }}</h3>
                        <p>{{ $member->bio }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

@endsection
