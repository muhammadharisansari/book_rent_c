@extends('layouts.mainlayout')
@section('title','Banned user')

@section('content')
    <h3>Banned User List</h3>
    <div class="row mt-5">
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
                        @foreach ($ban as $u)
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
                                <a href="user-restore/{{$u->slug}}" class="btn btn-info">restore</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
