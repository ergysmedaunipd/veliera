<style>
    .nav-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
    }

    .language-picker {
        position: relative;
        display: inline-block;
    }

    .language-picker .selected-language {
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .language-picker .selected-language img {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }

    .language-picker .dropdown {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 8px;
    }

    .language-picker .dropdown a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .language-picker .dropdown a img {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }
</style>
<header id="header" style="padding: 6em 0 0 0 ;">
    <a href="{{ url('/') }}" class="logo">
        <img style="width: auto; height: 100px; margin: 0 0 -20px 0; object-fit: cover;" src="{{ asset('build/assets/images/png_me_text.png') }}" alt="Community Event"/>
    </a>
    <div class="nav-container">
        <nav>
            <ul>
                <li class="language-picker">
                    <div class="selected-language">
                        @if (Session::get('locale') == 'en')
                            <span>English</span>
                        @else
                            <span>Shqip</span>
                        @endif
                    </div>
                    <div class="dropdown">
                        <a href="{{ route('lang.change', ['locale' => 'en']) }}">
                            <span>English</span>
                        </a>
                        <a href="{{ route('lang.change', ['locale' => 'sq']) }}">
                            <span>Shqip</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const languagePicker = document.querySelector('.language-picker');
        const dropdown = languagePicker.querySelector('.dropdown');

        languagePicker.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function () {
            dropdown.style.display = 'none';
        });
    });
</script>
