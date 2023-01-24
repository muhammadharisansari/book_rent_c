@extends('layouts.mainlayout')
@section('title','Banned user')
@section('content')
    <h5>Are you sure ban : {{$user->username}} ?</h5>
    <div class="mt-3">
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/users" class="btn btn-secondary">Cancel</a>
    </div>
@endsection