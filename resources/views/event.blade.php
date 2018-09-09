@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Events List</h2>
    <div class="container">
        <a href="/newevent" class="btn btn-primary">Add new event</a>
    </div>
    <br>
    <table class="table" id="events">
        <thead><tr>
            <th>Term</th>
            <th>Event </th>
            <th>Date</th>
            <th>Attendance Count</th>
            <th>Members </th>
        </tr>
    </thead>
    <tbody>
        @foreach($event_list as $name => $obj)
        <tr>
            <td>{{ $obj->term }}</td>
            <td>{{$obj->event}}</td>
            <td>{{$obj->date}}</td>
            <td>{{$obj->count}}</td>
            <td><a href="/member">See more</a></td>
        </tr>
    @endforeach
        </tbody>
    </table>
               
</div>

<script>
    $(document).ready( function () {
    $('#events').DataTable({
        "lengthMenu": [[10,25,50,-1], [10,25,50,"All"]]
    });
} );
</script>
@endsection