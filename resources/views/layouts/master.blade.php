<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('layouts.head')
<body>
	@include('layouts.navbar')
	<div class="page-content">
		@include('layouts.sidebar')
		<div class="content-wrapper">
			<div class="content-inner">
				@yield('content')
				@include('layouts.footer')
			</div>
		</div>
	</div>
</body>
</html>