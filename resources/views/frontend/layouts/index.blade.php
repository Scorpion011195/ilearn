<!doctype html>
<html lang="en">
@include('frontend.components.html_header')
<body>
	<div class="container-fuild">
		@include('frontend.components.header')
		@yield('content')
		@include('frontend.components.footer-script')
		@include('frontend.components.footer')		
	</div>
</body>
</html>
