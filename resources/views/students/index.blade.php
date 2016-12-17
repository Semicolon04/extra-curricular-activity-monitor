@extends('master')
@section('content')
<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <h1>List of Students</h1>
        <a class="btn btn-default pull-right" href="{{route('students.create')}}">New</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Index Nunber</td>
                    <td>Name</td>
                    <td>Points</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{0}}</td>
                    <td><a href="{{route('students.show', $student->id)}}">
                        Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
