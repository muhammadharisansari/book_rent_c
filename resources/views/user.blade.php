@extends('layouts.mainlayout')
@section('title','User')

@section('content')
    <h3>User client List</h3>
    <div class="mt-3 d-flex justify-content-end">
        <a href="/users-banned" class="btn btn-secondary me-3">banned user</a>
        <a href="/registered-users" class="btn btn-success">register user</a>
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
                                <a href="user-ban/{{$u->slug}}" class="btn btn-danger">ban user</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
