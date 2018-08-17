@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                <h1>Home</h1>
                <br><br>
                <div>
                    <a name="event" class="btn btn-success btn-block" href="/event">Events</a>
                    <a name="member" class="btn btn-info btn-block" href="/member">Members</a>
                    <a name="record" class="btn btn-secondary btn-block" href="/list">List all records</a>
                </div>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif
               
</div>
@endsection