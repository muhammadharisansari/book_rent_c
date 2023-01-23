@extends('layouts.mainlayout')
@section('title','Books deleted')

@section('content')
    <h3>Books deleted List</h3>
    
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
                          <th scope="col">Code</th>
                          <th scope="col">Title</th>
                          <th scope="col">Category</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach ($dBooks as $b)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$b->book_code}}</td>
                            <td>{{$b->title}}</td>
                            <td>
                              @foreach ($b->categories as $c)
                                  {{$c->name}},
                              @endforeach
                            </td>
                            <td>{{$b->status}}</td>
                              <td>
                                <a href="book-restore/{{$b->slug}}" class="btn btn-info">restore</a>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
