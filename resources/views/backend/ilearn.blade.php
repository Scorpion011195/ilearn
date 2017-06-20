<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
@yield('css')
@include('backend.layout.html_header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('backend.layout.header')
    @include('backend.layout.left-sidebar')
    @include('backend.layout.content')
    @include('backend.layout.control-sidebar')
    @include('backend.layout.script ')
    @yield('script')
</div>
</body>
</html>
