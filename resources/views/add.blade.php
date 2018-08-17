@extends('layouts.app')

@section('content')
<div class="container">
                <h2>Add New Record</h2>
               
<form method="POST" action="/record">

    <div class="form-group">
    	<label class="col-2 col-form-label"> Term </label> <div class="col-10"> <input type="text" name="term" class="form-control"></div>
        <label class="col-2 col-form-label"> Event </label> <div class="col-10"><input type="text" name="event" class="form-control"></div>
        <label class="col-2 col-form-label"> Date </label> <div class="col-10"><input type="date" name="date" class="form-control"></div>
        <label class="col-2 col-form-label"> Member Name </label> <div class="col-10"><input type="text" name="name" class="form-control"></div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Record</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection