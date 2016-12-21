@extends('master')

@section('content')
<div class="container">
	<div class="col-md-offset-1 col-md-10">
        <h1>{{$student->name}} <span class="pull-right">
            Total Points</span></h1>

		<br>
		<h3>Student Details</h3>
		<a class="btn btn-primary btn-xs pull-right" href="/students/{{$student->id}}/edit">Edit Detalils</a>

        <table class="table">
            <tr><td>ID</td><td>{{ $student->id}}</td>
                <td>Name</td><td>{{ $student->name}}</td></tr>
            <tr><td>Batch</td><td>{{ $student->batch}}</td>
            <td>Sex</td><td>{{ $student->sex}}</td></tr>
            <tr><td>Email</td><td>{{ $student->email}}</td>
            <td>Address</td><td>{{ $student->address}}</td></tr>
        </table>

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
			<table class="table table-striped">
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
	function refresh_list() {
		$('.activities-view').find('tbody').empty();
		$.get('/activities/all/' + STUDENT_ID, function(data, status) {
	        data.forEach(function(d) {
	            //if (d.points == 'null') continue;
	            $tr = $('<tr><td>' + d.title +'</td><td>' + d.year +'</td><td>'
	                + d.activity_type +'</td><td>'+ d.points +'</td>'
	                + '<td><a class="details">Details' +
	                '<span hidden="true">' + d.id + '</span></a></td></tr>');
	            $('.activities-view').find('tbody').prepend($tr);
	        });
	    });
	}
</script>
<script src="/scripts/student_page_add_activity.js"></script>
<script src="/scripts/student_page_view_activities.js"></script>
@endsection
