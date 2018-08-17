@extends('layouts.app')

@section('content')
	<div class="container">
	<h1>Edit the Record</h1>

<form method="POST" action="/record/{{ $record->id }}">
	<div class="form-group">
		<label class="col-2 col-form-label"> Term </label> <div class="col-10"> <input type="text" name="term" class="form-control" value="{{$record->term}}"></div>
        <label class="col-2 col-form-label"> Event </label> <div class="col-10"><input type="text" name="event" class="form-control" value="{{ $record->event}}"> </div>
        <label class="col-2 col-form-label"> Date </label> <div class="col-10"><input type="date" name="date" class="form-control" value="{{$record->date}}"></div>
        <label class="col-2 col-form-label"> Member Name </label> <div class="col-10"><input type="text" name="name" class="form-control" value="{{$record->name}}"></div>
	</div>


	<div class="form-group">
		<button type="submit" name="update" class="btn btn-primary">Update record</button>
	</div>
{{ csrf_field() }}
</form>



</div>

@stop