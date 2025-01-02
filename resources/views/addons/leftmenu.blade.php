<style>
    .active {
        font-weight: bold;
    }
</style>
<div id="sidebar">
    <div class="inner">

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>{{ __('main.menu') }}</h2>
            </header>
            <ul>
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">{{ __('main.home') }}</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">{{ __('main.about_us') }}</a>
                </li>
                <li class="{{ request()->routeIs('programsLanding') ? 'active' : '' }}">
                    <a href="{{ route('programsLanding') }}">{{ __('main.our_programs') }}</a>
                </li>
                <li class="{{ request()->routeIs('publicationsLanding') ? 'active' : '' }}">
                    <a href="{{ route('publicationsLanding') }}">{{ __('main.publications') }}</a>
                </li>
            </ul>
        </nav>

        <!-- Section -->
        <section>
            <header class="major">
                <h2>{{ __('main.get_in_touch') }}</h2>
            </header>
            <p>{{$contact->message}}</p>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                <li class="icon solid fa-phone">{{$contact->phone}}</li>
                <li class="icon solid fa-home"> {{$contact->address}} </li>
            </ul>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; Veliera </p>
        </footer>

    </div>
</div>
