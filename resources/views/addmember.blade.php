@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Member</h2>
               
<form method="POST" action="/newmember">

    <div class="form-group">
        <label class="col-2 col-form-label"> Member Name </label> <div class="col-10"><input type="text" name="name" class="form-control"></div>
        <br>
        <p class="col-2">Events Attended:</p>
        @foreach($event_list as $name => $obj)
        <div class="form-check form-check-inline">
            <label class="col-10 col-form-check-label"> {{ $name }} </label><input type="checkbox" name="event" class="form-control">
        </div>
        @endforeach
        
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Member</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection