@extends('layouts.base')
@section('content')

<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h1>Welcome to Veliera<br/>
                Empowering Communities</h1>
            <p>Join us in creating a better tomorrow</p>
        </header>
        <p>At Veliera, we believe in the power of community and collective action. We are committed to
            empowering individuals and fostering sustainable development. Through our programs, we work with
            local communities to promote education, health, and social equality.</p>
        <ul class="actions">
            <li><a href="{{ route('home') }}" class="button big">Learn More About Us</a></li>
        </ul>
    </div>
    <span class="image object">
                    <img src="{{ asset('build/assets/images/pic10.jpg') }}" alt="Community Event"/>
                </span>
</section>
<!-- Section -->
<section>
    <header class="major">
        <h2>Our Core Values</h2>
    </header>
    <div class="features">
        <article>
            <span class="icon fa-gem"></span>
            <div class="content">
                <h3>Community Building</h3>
                <p>We aim to strengthen local communities through education, collaboration, and shared resources. By working together, we create lasting change.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fa-paper-plane"></span>
            <div class="content">
                <h3>Empowerment through Education</h3>
                <p>We believe that education is the foundation for personal and social growth. Our initiatives help individuals gain the skills they need to thrive.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fa-rocket"></span>
            <div class="content">
                <h3>Sustainable Development</h3>
                <p>We focus on projects that provide long-term, sustainable solutions to the challenges faced by communities, from environmental conservation to economic resilience.</p>
            </div>
        </article>
        <article>
            <span class="icon solid fa-signal"></span>
            <div class="content">
                <h3>Social Equality</h3>
                <p>At Veliera, we work to ensure that all individuals, regardless of background, have equal access to opportunities and resources to achieve their full potential.</p>
            </div>
        </article>
    </div>
</section>

<!-- Section -->
<section>
    <header class="major">
        <h2>Recent Publications</h2>
    </header>
    <div class="posts">
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic01.jpg') }}" alt="Community Workshop" /></a>
            <h3>Building Skills for the Future</h3>
            <p>Our recent workshop on digital skills helped over 100 local youth gain valuable technical knowledge, empowering them to enter the workforce.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic02.jpg') }}" alt="Health Clinic" /></a>
            <h3>Improving Healthcare Access</h3>
            <p>Our mobile health clinic reached 200 families in rural areas, providing essential medical services and raising awareness about public health issues.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic03.jpg') }}" alt="Sustainable Farming Initiative" /></a>
            <h3>Supporting Sustainable Agriculture</h3>
            <p>Through our sustainable farming initiative, we’ve helped local farmers reduce environmental impact and improve crop yields, benefiting entire communities.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic04.jpg') }}" alt="Women's Empowerment Program" /></a>
            <h3>Empowering Women Entrepreneurs</h3>
            <p>Our entrepreneurship program is helping women start and grow small businesses, boosting local economies and promoting gender equality.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic05.jpg') }}" alt="Environmental Cleanup" /></a>
            <h3>Protecting Our Environment</h3>
            <p>We are leading environmental cleanup efforts in local communities, working towards reducing waste and protecting natural resources for future generations.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
        <article>
            <a href="#" class="image"><img src="{{ asset('build/assets/images/pic06.jpg') }}" alt="Volunteer Support" /></a>
            <h3>Volunteers Making a Difference</h3>
            <p>Thanks to the efforts of our dedicated volunteers, we have been able to expand our outreach and make a tangible difference in the lives of many.</p>
            <ul class="actions">
                <li><a href="#" class="button">Read More</a></li>
            </ul>
        </article>
    </div>
</section>
@endsection
