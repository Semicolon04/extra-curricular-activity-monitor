@extends('master')

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1>Edit student details</h1>
        @include('partials.errors')
        <form action="{{route('students.update', $student->id)}}" method="POST">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" value="{{$student->id}}">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$student->name}}">
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
                <input type="text" class="form-control" name="email" value="{{$student->email}}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{$student->address}}">
            </div>

            <div class="form-group">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Update Student Details</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
