@extends('layouts.mainlayout')
@section('title','Category deleted')

@section('content')
    <h3>Category deleted List</h3>
    
    <div class="row mt-5">
        <div class="col-lg-12">

          @if (session('status'))
            <div class=" mb-3 alert alert-success">
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
                        @foreach ($data as $c)
                        <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$c->name}}</td>
                              <td>
                                <a href="category-restore/{{$c->slug}}" class="btn btn-info">restore</a>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
