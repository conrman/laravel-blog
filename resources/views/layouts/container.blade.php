@section ('container')
	<div class="container">
		<div class="row">
			{{-- Content --}}
			@yield ('content')

			{{-- Sidebar --}}
			@yield ('sidebar')
		</div>
	</div>
@show