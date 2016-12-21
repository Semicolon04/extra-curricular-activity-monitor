@extends('master2')
@section('content')
<div class="col-md-offset-3 col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">Login</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="/login">
				{!! csrf_field() !!}
				<div class="form-group">
					<label class="col-md-4 control-label">Username</label>
					<div class="col-md-6">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
