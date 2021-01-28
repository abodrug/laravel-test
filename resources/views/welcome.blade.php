@extends('layouts/layout')

@section('content')
    <div class="header">
        <div class="top-line">
        <div class="row">
            <div class="col">
                @if(isset($token) && '' !== $token)
                    Get token: <strong>{{$token}}</strong>
                @endif
                @if(isset($countHit))
                    My Stats: <strong>{{$countHit}}</strong>
                @endif
                @if(isset($allHit))
                    All Stats: <strong>{{$allHit}}</strong>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
