<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>


@extends('master')

@section('content')
<div class="container">
    <div class="col-md-offset-1 col-md-10">
        <h2>Activities that need to be validated</h2>
        <br><br>
		<div class="activities-view">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Activity</th>
						<th>Year</th>
						<th>Type</th>
						<th>Student ID</th>
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
@include('students.partials.showactivitymodal')
@include('students.partials.showclubactivitymodal')
@include('students.partials.showcompetitionmodal')
@include('students.partials.showsportsmodal')
@endsection

@section('scripts')
<script>
    STAFF_ID = '{{$_SESSION["login_user"]}}';
    STAFF_TYPES = [
        @foreach($types as $type)
        '{{$type}}',
        @endforeach
    ];
    TOKEN = '{{csrf_token()}}';
</script>
<script src="scripts/staff_validation_page.js"></script>
@endsection
