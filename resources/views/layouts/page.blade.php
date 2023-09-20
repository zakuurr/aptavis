<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<body>

    @include('layouts.components.navbar')
    <div class="container">
        @yield('content')
    </div>

    @include('sweetalert::alert')
   @include('layouts.partials.js')
</body>
</html>
