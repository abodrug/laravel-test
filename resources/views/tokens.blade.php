@extends('layouts/layout')

@section('content')
    <table id="productSizes" class="table">
        <thead>
        <tr class="d-flex">
            <th class="col-2">Login</th>
            <th class="col-4">Token</th>
            <th class="col-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tokens as $token)
            <tr class="d-flex">
                <td class="col-2">{{$token->name}}</td>
                <td class="col-4">{{$token->token}}</td>
                <td class="align-content-center">
                    <form onSubmit="return confirm('Удалить?')" action="{{route('token-del', $token->name)}}" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
