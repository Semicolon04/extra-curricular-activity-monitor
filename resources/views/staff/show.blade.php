@extends('master')
@section('content')
<div class="container">
	<div class="col-md-offset-3 col-md-6">
        <h1>{{$staff->name}}</h1>

		<h3>Staff Details</h3>
		<a class="btn btn-primary btn-xs pull-right"
            href="{{route('staff.edit', [$staff->id])}}">Edit Detalils</a>


        <table class="table">
            <tr><td>ID</td><td>{{ $staff->id}}</td></tr>
            <tr><td>Name</td><td>{{ $staff->name}}</td></tr>
            <tr><td>Email</td><td>{{ $staff->email}}</td></tr>
            <tr><td>Job Title</td><td>{{ $staff->job_title}}</td></tr>
        </table>

        <h3>Categories Managed</h3>
        <ul>
            @foreach($types as $c)
            <li>{{$c}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
