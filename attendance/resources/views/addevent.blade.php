@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Event</h2>
               
<form method="POST" action="/newevent">

    <div class="form-group">
    	<label class="col-2 col-form-label"> Term </label> <div class="col-10"> <input type="text" name="term" class="form-control"></div>
        <label class="col-2 col-form-label"> Event </label> <div class="col-10"><input type="text" name="event" class="form-control"></div>
        <label class="col-2 col-form-label"> Date </label> <div class="col-10"><input type="date" name="date" class="form-control"></div>
        <label class="col-2 col-form-label"> Members </label> <div class="col-10"><textarea class="form-control" name="name" rows="5"></textarea> </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Event</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection