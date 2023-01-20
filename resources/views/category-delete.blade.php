@extends('layouts.mainlayout')
@section('title','delete category')
@section('content')
    <h5>Are you sure delete : {{$category->name}} ?</h5>
    <div class="mt-3">
        <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/categories" class="btn btn-secondary">Cancel</a>
    </div>
@endsection