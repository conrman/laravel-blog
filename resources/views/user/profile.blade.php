@extends ('layouts.app')

@section ('content')
	<main class="page dashboard col-md-8">
		<div class="panel panel-default">
			<header class="panel-heading">
				<strong>Published</strong>
			</header>

			<div class="panel-body">
				@include ('posts.table')
			</div>

		</div>
	</main>
@stop

@section ('sidebar')
	<aside class="sidebar col-md-4">Dash sidebar</aside>
@stop
