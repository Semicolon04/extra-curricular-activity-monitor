@extends('master')

@section('content')
<div class="container">
	<div class="col-md-offset-1 col-md-10">
        <h1>{{$student->name}} <span class="pull-right">
            {{$student->id}}</span></h1>

        <div class="panel panel-default">
    		<div class="panel-heading">
    			<div class="panel-title">
    				Student Details
    			</div>
    		</div>
    		<div class="panel-body">
                <table class="table table-bordered">
                    <tr><td>ID</td><td>{{ $student->id}}</td>
                        <td>Name</td><td>{{ $student->name}}</td></tr>
                    <tr><td>Batch</td><td>{{ $student->batch}}</td>
                    <td>Sex</td><td>{{ $student->sex}}</td></tr>
                    <tr><td>Email</td><td>{{ $student->email}}</td>
                    <td>Address</td><td>{{ $student->address}}</td></tr>
                </table>
    		</div>
        </div>

        <div class="btn-group pull-right">
            <button class="btn btn-primary"
                data-toggle="modal" data-target="#new-activity">
                Add Activity</button>
            <button class="btn btn-primary dropdown-toggle"
                data-toggle="dropdown"><span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
                <li><a data-toggle="modal" href="#new-club-activity">Club</a></li>
                <li><a data-toggle="modal" href="#new-competition">Competition</a></li>
                <li><a data-toggle="modal" href="#new-sports">Sports</a></li>
            </ul>
        </div>
        <h2>Activities</h2>
		<div class="activities-view">
			<table class="table">
				<thead>
					<tr>
						<th>Activity</th>
						<th>Year</th>
						<th>Type</th>
						<th>Points</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<!-- jquery adds rows here -->
				</tbody>
			</table>
		</div>
    </div>
</div>

@include('students.partials.newactvitymodal')
@include('students.partials.newclubactivitymodal')
@include('students.partials.newcompetitionmodal')
@include('students.partials.newsportsmodal')

@include('students.partials.showactivitymodal')
@include('students.partials.showclubactivitymodal')
@include('students.partials.showcompetitionmodal')
@include('students.partials.showsportsmodal')

@endsection

@section('scripts')
<script>
	var STUDENT_ID = '140592C'; // hardcoded for now
</script>
<script src="/scripts/student_page_add_activity.js"></script>
<script src="/scripts/student_page_view_activities.js"></script>
@endsection
