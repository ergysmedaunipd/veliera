<!-- resources/views/layouts/base.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('addons.header')
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main Content -->
    <div id="main">
        <div class="inner">
            @include('addons.topmenu')

            <!-- Yield content from child pages -->
            @yield('content')
        </div>
    </div>

    <!-- Sidebar -->
    @include('addons.leftmenu')

</div>

@include('addons.footer')

</body>
</html>
