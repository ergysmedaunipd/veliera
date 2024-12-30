@extends('layouts.base')
@section('content')

    <!-- Section -->
    <section>
        <header class="major">
            <h2>Our Programs</h2>
        </header>
        <div class="posts">
            @php
                $programs = [
                    ['image' => 'pic01.jpg', 'title' => 'Youth Empowerment Initiative', 'description' => 'Our Youth Empowerment Initiative provides educational opportunities and leadership training to young people from marginalized communities. This program helps them develop essential skills for future success.'],
                    ['image' => 'pic02.jpg', 'title' => 'Environmental Awareness Campaign', 'description' => 'The Environmental Awareness Campaign focuses on educating communities about sustainable practices and environmental conservation. We aim to inspire action for a cleaner planet.'],
                    ['image' => 'pic03.jpg', 'title' => 'Women’s Empowerment Program', 'description' => 'Our Women’s Empowerment Program is designed to help women gain financial independence and leadership skills through education, vocational training, and support for entrepreneurship.'],
                    ['image' => 'pic04.jpg', 'title' => 'Social Justice Advocacy', 'description' => 'Through our Social Justice Advocacy program, we fight for equal rights and justice for all. We work with communities and policymakers to address issues like discrimination and access to justice.'],
                    ['image' => 'pic05.jpg', 'title' => 'Community Health Initiative', 'description' => 'The Community Health Initiative aims to improve the health of underserved populations by providing healthcare services, health education, and raising awareness about public health issues.'],
                    ['image' => 'pic06.jpg', 'title' => 'Climate Action and Sustainability', 'description' => 'Our Climate Action and Sustainability program supports efforts to mitigate climate change, promoting renewable energy, waste reduction, and eco-friendly solutions across communities.']
                ];
            @endphp

                @foreach ($programs as $program)
                    <article>
                        <a href="#" class="image"><img src="{{ asset('build/assets/images/pic01.jpg') }}"
                                                       alt="Community Workshop"/></a>
                        <h3>{{ $program['title'] }}</h3>
                        <p>{{ $program['description'] }}</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Read More</a></li>
                        </ul>
                    </article>
                @endforeach
        </div>
    </section>

@endsection
