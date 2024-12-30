@extends('layouts.base')
@section('content')

    <!-- Banner -->
    <section>
        <header class="major">
            <h2>About Us</h2>
        </header>
        <div class="content">
            <h3>Our Mission</h3>
            <p>At Veliera, we are dedicated to empowering communities and promoting sustainable development. Our mission
                is to create meaningful change by supporting initiatives that foster education, environmental awareness,
                and social justice. Through collaboration and innovative solutions, we strive to make a lasting impact,
                addressing the needs of marginalized groups and contributing to a brighter future for all.</p>


        </div>

    </section>
    <section>
        <header class="major">
            <h2>Our Team</h2>
        </header>

        <div class="features">
            @php
                $teamMembers = [
                    ['name' => 'Diogjen Kolici', 'description' => 'Diogjen Kolici is the Executive Director of Veliera. He is 25 years old and has studied Architecture in the Polytechnic University of Tirana. After leading a series of civic initiatives, in 2019 he decided to take an active role in politics and was elected member of the City Council in his hometown Kurbin. Since July 2021 Diogjen has held the position of the Albanian Youth Delegate to the United Nations.'],
                    ['name' => 'Frenkli Prengaj', 'description' => 'Frenkli Prengaj is a member of the board at Veliera. He has completed his master\'s studies in Geo-Environmental Engineering. He started his activism in 2014, firstly at the youth forum of the Freedom Party, and later being engaged in students’ issues. He has worked as a project manager at REC Albania, where he was certified as a "Climate Leader" by the former US Vice President, Al Gore. Frenkli plays an active role in other youth organizations also, as a partnership officer for EDYN Albania and as a board member of the "Arbën Xhaferri" Summer Academy.'],
                    ['name' => 'Ermelinda Dida', 'description' => 'Ermelinda Dida was born in Tirana and graduated in Administration and Social Policies at the University of Tirana. She has been engaged for 5 years in non-profit organizations with a focus on adapting and improving the performance of marginalized groups in the education system and training youth towards economic empowerment. She is currently employed in the Human Resources department of a marketing company. Ermelinda has a motto: If you give up on your dreams, what’s left?'],
                    ['name' => 'Marsela Deliaj', 'description' => 'Marsela is a fourth-year student at the Faculty of Law, University of Tirana. She has started her youth and civic engagement 6 years ago, initially at the Child Rights Center Albania (CRCA), where she was one of the co-founders of Tirana Youth Parliament. Marsela was part of the pool of experts of the Western Balkans Youth Lab, a project supported by the Regional Cooperation Council. Furthermore, she has worked as a project coordinator at the Institute of Social Studies and Humanities, and currently she holds the position of President at Albanian National Youth Network (ANYN).'],
                    ['name' => 'Ana Gjidiaj', 'description' => 'Ana Gjidiaj is a member of the Board at Veliera Institute. She is pursuing her Bachelor\'s studies in Finance, Faculty of Economics, University of Tirana, and has started her political engagement since 2016 in the Freedom Party, where she is member of the Headship of the Youth Movement for Integration. As a member of the European Democracy Youth Network (EDYN), Ana holds the position of ambassador for Albania and member of the EDYN Communication Committee.'],
                    ['name' => 'Hermes Kafexhiu', 'description' => 'Hermes Kafexhiu is a member of the Board of the "Veliera" Institute. He was born and lived in Berat until finishing high school. Furthermore, Hermes graduated from the European University of Tirana with a bachelor’s degree in Public Relations and from Faculty of History and Philology with a bachelor’s degree in Albanian Literature. For years he has been engaged as a youth activist in student and political forums. He currently works as a journalist and field reporter for a daily show on Top-Channel.']
                ];
            @endphp

                @foreach ($teamMembers as $member)
                    @php
                        $firstName = explode(' ', $member['name'])[0];
                    @endphp
                    <article>
                        <a href="#" class="image">
                            <img src="{{ asset('build/assets/images/' . strtolower($firstName) . '.jpg') }}" alt="{{ $member['name'] }}" style="width: 100%; height: 500px; object-fit: cover;">
                        </a>
                        <div class="content" style="padding-left: 20px">
                            <h3>{{ $member['name'] }}</h3>
                            <p>{{ $member['description'] }}</p>
                        </div>
                    </article>
                @endforeach

        </div>
    </section>

@endsection
