<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 25-9-17
 * Time: 21:09
 */
?>
<!DOCTYPE html>
<html>
<head>
 @include('includes.header')
</head>
<body>
@include('includes.navbar')
<div class="container-fluid">
    @yield('content')

<footer class="footer navbar-fixed-bottom">
@include('includes.footer')
</footer>
</div>
<script type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script type="text/javascript" href="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
