<style>
    .active {
        font-weight: bold;
    }
    #sidebar, #sidebar .inner, #sidebar nav, #sidebar section, #sidebar footer {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
</style>
<div id="sidebar" style="width: 15em">
    <div class="inner" style="padding: 0 0 0 2em; width: 15em" >

        <!-- Menu -->
        <nav id="menu" style="padding : 10em 0 0 0">
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
        <section style="padding :0">
            <header class="major">
                <h2>{{ __('main.get_in_touch') }}</h2>
            </header>
                 <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
            <br>
                    {{$contact->phone}}
            <br>
            {{$contact->address}}
        </section>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; Veliera </p>
        </footer>

    </div>
</div>
