@include('layouts.partials.head')
<body id="app-layout">
    @include('layouts.partials.adminnav')


    @yield('content')

    <!-- JavaScripts -->
    @include('layouts.partials.footer')
</body>
</html>
