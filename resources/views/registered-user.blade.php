@extends('layouts.mainlayout')
@section('title','Registered user')

@section('content')
    <h3>User Registered List</h3>
    <div class="row">
        <div class="col-lg-12 mt-5">

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
                        <th scope="col">Username</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$u->username}}</td>
                              <td>
                                @if ($u->phone)
                                    {{$u->phone}}
                                @else
                                    -
                                @endif
                              </td>
                              <td>
                                <a href="user-detail/{{$u->slug}}" class="btn btn-info">detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
