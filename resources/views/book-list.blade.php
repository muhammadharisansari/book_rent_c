@extends('layouts.mainlayout')
@section('title','Book-list')

@section('content')
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row w-50 ">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <select class="form-select" name="category" id="inputGroupSelect02">
                    <option selected disabled hidden>Choose category</option>
                    @foreach ($cat as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    </select>
                    <input type="text" class="form-control" name="title" placeholder="search title">
                    <button class="btn btn-primary" type="submit" for="inputGroupSelect02">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4 ">
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