@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Events List</h2>
    <br>
    <table class="table">
        <thead><tr>
            <th>Event</th>
        </tr>
    </thead>
    <tbody>
        @foreach($event as $ev)
        <tr>
            <td>{{ $ev }}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
               
</div>
@endsection