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
                <li><a data-toggle-"modal" href="#new-club-activity">Club</a></li>
                <li><a data-toggle-"modal" href="#new-competition">Competition</a></li>
                <li><a data-toggle-"modal" href="#new-sports">Sports</a></li>
            </ul>
        </div>
        <h2>Add Activity</h2>
    </div>
</div>

<div class="modal fade" id="new-activity" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new activity</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="title" class="control-label col-sm-2">Title</label>
                        <div class="col-sm-10"><input name="title" class="form-control" type="text"></div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label col-sm-2">Description</label>
                        <div class="col-sm-10"><textarea name="description" class="form-control" type="text"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="control-label col-sm-2">Year</label>
                        <div class="col-sm-10"><input name="year" class="form-control" type="text"></div>
                    </div>
                </form>
                <button class="btn btn-primary pull-right add-award">Add award</button>
                <h4>Awards</h4>
                <br><br><br>
                <div class="award-fields"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/scripts/student_page.js"></script>
@endsection
