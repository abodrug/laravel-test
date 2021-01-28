@extends('layouts/layout')

@section('content')
    <form action="/register" method="post">
        @csrf
            <div class="form-group">
                <label for="name"> Login </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Login" />
            </div>

            <div class="form-group">
                <label for="password"> Password </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" />
            </div>

            <div class="form-group">
                <label for="email"> Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" />
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
