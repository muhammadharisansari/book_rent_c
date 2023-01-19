@extends('layouts.mainlayout')
@section('title','Category')

@section('content')
    <h3>Category form</h3>
    <div class="container">
        <div class="row mt-5 w-50">
            <div class="col">
                <form action="category-add" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="category name...">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
