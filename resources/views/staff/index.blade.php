@extends('master')

@section('content')
<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <h1>Staff</h1>
        <a class="btn btn-default pull-right" href="{{route('staff.create')}}">New</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Job Title</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($staff as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->job_title}}</td>
                    <td><a href="{{route('staff.show', $s->id)}}">
                        Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
