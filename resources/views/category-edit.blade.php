@extends('layouts.mainlayout')
@section('title','Category-edit')

@section('content')
    <h3>Category edit form</h3>
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
                <form action="/category-edit/{{$category->slug}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="name" class="form-label">Category</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" placeholder="category name...">
                      </div>
                      <button type="submit" class="btn btn-primary">edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
