@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Member List</h2>
    <!--<div class="container">
        <a href="/newmember" class="btn btn-primary">Add new member</a>
    </div> Need to add functionality for adding a new member eventually-->
    <br>
    <table class="table" id="members">
        <thead><tr>
            <th>Name</th>
            <th>Event Count</th>
            <th>Events</th>
        </tr>
    </thead>
    <tbody>@foreach($members as $name => $events)
        <tr>
            <td>{{$name}}</td>
            <td>{{ count($events) }}
            <td> @foreach($events as $e) {{ $e }} <br> @endforeach
            </td>
        </tr>
    @endforeach</tbody>
    </table>
               
</div>

<script>
    $(document).ready( function () {
    $('#members').DataTable({
        "lengthMenu": [[10,25,50,-1], [10,25,50,"All"]]
    });
} );
</script>
@endsection