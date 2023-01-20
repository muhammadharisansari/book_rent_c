@extends('layouts.mainlayout')
@section('title','Category')

@section('content')
    <h3>Category List</h3>
    <div class="mt-3 d-flex justify-content-end">
        <a href="category-add" class="btn btn-success">Add Data</a>
    </div>
    <div class="row">
        <div class="col-lg-12">

          @if (session('status'))
            <div class=" mt-3 alert alert-success">
                {{ session('status') }}
            </div>
          @endif

            <div class="container-fluid">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $c)
                        <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$c->name}}</td>
                              <td>
                                <a href="category-edit/{{$c->slug}}" class="btn btn-info">update</a>
                                <a href="#" class="btn btn-danger">delete</a>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
