@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Records List</h2>
    <div class="container">
        <a href="/record" class="btn btn-primary">Add new record</a>
    </div>
    <br>
    <table class="table" id="records">
        <thead><tr>
            <th>Term</th>
            <th>Event</th>
            <th>Date</th>
            <th>Member Name</th>
        </tr></thead>
    <tbody>@foreach($user->records as $record)
        <tr>
            <td>{{$record->term}}</td>
            <td>{{$record->event}}</td>
            <td>{{$record->date}}</td>
            <td>{{$record->name}}</td>
            <td>
               
                <form action="/record/{{$record->id}}">
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                    {{ csrf_field() }}
                </form>
            </td>
        </tr>
    @endforeach</tbody>
    </table>   
</div>
<script>
    $(document).ready( function () {
    $('#records').DataTable({
        "columnDefs": [{
            "targets": 4,
            "orderable": false
        }],
        "lengthMenu": [[10,25,50,-1], [10,25,50,"All"]]
    });
} );
</script>
@endsection