@extends('layouts/layout')

@section('content')
    <form action="/login" method="post">
        @csrf
        <div class="form-group">
            <label for="name"> Login </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter login" />
        </div>

        <div class="form-group">
            <label for="password"> Password </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
