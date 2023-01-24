@extends('layouts.mainlayout')
@section('title','Book-list')

@section('content')
<div class="container">
    <div class="row mt-5 ">
        @foreach ($books as $u)
        <div class="col-lg-3 col-sm-6 mb-3">
                <div class="card h-100">
                    @if ($u->cover == '' || $u->cover == null)
                    <img src="{{asset('storage/cover/desain 5.jpg')}}" height="250" class="card-img-top" alt="..." draggable="false">
                    @else
                    <img src="{{asset('storage/cover/'.$u->cover)}}" height="250" class="card-img-top" alt="..." draggable="false">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{$u->book_code}}</h5>
                    <p class="card-text">{{$u->title}}</p>
                    <h5 class="card-footer text-end {{$u->status == 'in stock' ? 'text-success' : 'text-danger'}}">{{$u->status}}</h5>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection