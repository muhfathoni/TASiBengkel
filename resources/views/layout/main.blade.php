<!DOCTYPE html>
<html lang="en">

@include ('layout.head')

<body class="animsition">

	@include ('layout.top-bar')
	
	
	@yield ('content')


	<!-- Footer -->
	@include('layout.footer')

	@stack('script')


</body>
</html>
