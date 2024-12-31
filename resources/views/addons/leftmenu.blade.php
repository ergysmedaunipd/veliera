<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form method="post" action="#">
                <input type="text" name="query" id="query" placeholder="Search Veliera" />
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('programs') }}">Our Programs</a></li>
                <li><a href="{{ route('publicationsLanding') }}">Publications</a></li>
            </ul>
        </nav>

        <!-- Section -->
        <section>
            <header class="major">
                <h2>Get in Touch</h2>
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
