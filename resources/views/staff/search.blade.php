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
        <h2>Search activities</h2>
        <br><br>
        <div class="row search-parameters">
            <div class="col-md-4">
                <input type="text" id="title" class="form-control" placeholder="Activity">
            </div>
            <div class="col-md-2">
                <input type="text" id="year" class="form-control" placeholder="Year">
            </div>
            <div class="col-md-3">
                <div class="checkbox-inline"><label><input type="checkbox"
                    name="club" checked>Clubs</label></div>
                <div class="checkbox-inline"><label><input type="checkbox"
                    name="competition" checked>Competitions</label></div>
                <div class="checkbox-inline"><label><input type="checkbox"
                    name="sport" checked>Sports</label></div>
                <div class="checkbox-inline"><label><input type="checkbox"
                    name="other" checked>Others</label></div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary search-button">Search</button>
            </div>
        </div>
		<div class="activities-view">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Activity</th>
						<th>Year</th>
						<th>Type</th>
                        <th>Points</th>
						<th>Student</th>
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
<script src="scripts/search_activities_page.js"></script>
@endsection
