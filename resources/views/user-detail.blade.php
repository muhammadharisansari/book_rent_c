@extends('layouts.mainlayout')
@section('title','User detail')

@section('content')
    <h3>User Detail</h3>
    
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="container-fluid ">
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="" id="" class="form-control" value="{{$user->username}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="" id="" class="form-control" value="{{$user->phone}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea name="" id="" cols="30" rows="4" class="form-control" readonly>{{$user->address}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="" id="" class="form-control" value="{{$user->status}}" readonly>
                </div>
                @if ($user->status == 'inactive')
                    <div class="mt-3 mb-5 d-flex justify-content-end">
                        <a href="/user-approve/{{$user->slug}}" class="btn btn-success mb-5">Approve User</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-8">
            <x-rent-log-table :rentlog='$rentlogs'/>
        </div>
    </div>
@endsection