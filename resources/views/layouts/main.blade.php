<!doctype html>
<html lang="en">
{{-- Head --}}
@include('includes.head')
{{-- End Head--}}
<body>

{{-- Navbar --}}
@include('includes.navbar')
{{-- End Navbar --}}


<main role="main">

    @yield('container')


{{--    Footer   --}}

{{--    End Footer  --}}


</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/js/bootstrap.bundle.min.js"></script>
</html>
