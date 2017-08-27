<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.meta')

    @include('layouts.link')

    @include('layouts.script')

    @yield('title')

    @include('layouts.css')

    @yield('css')

</head>

<body role="document">

    @include('layouts.navbar')

    @include('layouts.sidebar')



    <div class="col-md-8">
        @yield('content')
    </div> 

    <div class="col-md-1"></div>

    @stack('scripts')
<script>
$(document).on('ready', function() {
    $("#input-6").fileinput({
        showUpload: false,
        maxFileCount: 10,
        mainClass: "input-group-lg"
    });
});
</script>
    @yield('footer-scripts')
<script>
$(document).on('ready', function() {
    $("#input-4").fileinput({showCaption: false});
});
</script>
</body>
</html>