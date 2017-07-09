<!DOCTYPE html>
<html>
@include('frontend.components.html_header')
<body class="font-style--main">
	<div class="container-fuild">
		@include('frontend.components.header')
        <div class="margin--top-nav">
		@yield('content')
		@include('frontend.components.footer-script')
		@include('frontend.components.footer')
        </div>
	</div>
</body>
</html>
