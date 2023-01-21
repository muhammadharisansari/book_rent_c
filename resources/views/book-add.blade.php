@extends('layouts.mainlayout')
@section('title','Book-add')

@section('content')
    <h3>Book form</h3>
    <div class="container">
        <div class="row mt-5 w-50">

            <div class=" d-flex ml-3">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Failed because :</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            
            <div class="col">
                <form action="book-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="book_code" class="form-label">Book code</label>
                        <input type="text" class="form-control" name="book_code" id="book_code" placeholder="example : A001-01..." value="{{ old('book_code') }}">
                    </div>
                    <div class= "mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="books title..." value="{{ old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input class="form-control" type="file" name="cover" id="cover">
                    </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
