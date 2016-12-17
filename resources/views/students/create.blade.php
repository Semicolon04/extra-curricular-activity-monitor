@extends('master')
@section('content')
<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <h1>Create new student</h1>
        <br>
        <form class="form" method="POST" action={{route('students.store')}}>
            {{csrf_field()}}
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="batch">Batch</label>
                <select name="batch" class="form-control">
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sex">Sex</label>
                <select name="sex" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address">
            </div>

            <div class="form-group">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Create Student</button>
                </div>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection
