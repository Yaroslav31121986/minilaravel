@extends('layouts.site')

@section('content')

<div class="jumbotron">
	<div class="container">
		<h1 class="display-3">{{ $header }}</h1>
		<p>{{ $message }}</p>
		<p>
			<a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
	</div>
</div>

<form method="post" action="{{route('articleStore')}}">
	<div class="form-group">
		<label for="title">Заголовок</label>
		<input type="text" class="form-control" id="title" name="title"/>
	</div>
	<div class="form-group">
		<label for="mini_text">Краткое оипсание</label>
		<textarea class="form-control" id="mini_text" name="mini_text"></textarea>
	</div>
	<div class="form-group">
		<label for="text">Текст</label>
		<textarea class="form-control" id="text" name="text"></textarea>
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
	{{ csrf_field() }}
</form>

@endsection