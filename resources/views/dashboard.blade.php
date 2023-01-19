@extends('layouts.mainlayout')
@section('title','Dashboard')

@section('content')
<h3>Welcome, {{Auth::user()->username}}</h3>
<div class="row mt-4">
    <div class="col-sm-4">
      <div class="card bg-primary bg-gradient text-white">
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <i class="bi bi-book-half"></i>
                </div>
                <div class="col-11">
                    <h5 class="card-title">Book</h5>
                </div>
            </div>
          <center>
              <h3>{{$book_count}}</h3>
          </center>
          <a href="#" class="btn btn-info">detail</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card bg-primary bg-gradient text-white">
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <i class="bi bi-card-list"></i>
                </div>
                <div class="col-11">
                    <h5 class="card-title">Category</h5>
                </div>
            </div>
          <center>
              <h3>{{$category_count}}</h3>
          </center>
          <a href="#" class="btn btn-info">detail</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card bg-primary bg-gradient text-white">
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <i class="bi bi-people"></i>
                </div>
                <div class="col-11">
                    <h5 class="card-title">User</h5>
                </div>
            </div>
          <center>
              <h3>{{$user_count}}</h3>
          </center>
          <a href="#" class="btn btn-info">detail</a>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <h4>Rent Log</h4>
    </div>

    <div class="row mt-3">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">User</th>
              <th scope="col">Book Title</th>
              <th scope="col">Rent Date</th>
              <th scope="col">Return Date</th>
              <th scope="col">Actual Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="7" class="text-center">no data</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection
