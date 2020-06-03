<!doctype html>
<html lang="en">

@include(' includes._head')

<body>

	@include('includes._topbar')

	<div class="container-fluid">
		<div class="row">
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				@include('includes._nav')

				@include('includes._dash')

				@yield('index')

			</main>
		</div>
	</div>

	@include('includes._scripts')

	@include('includes._footer')
</body>
</html>
