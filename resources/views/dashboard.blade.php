@extends('layouts.mainlayout')
@section('title', 'Dashboard')

@section('content')
    <h3>Welcome, {{ Auth::user()->username }}</h3>
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="card bg-primary bg-gradient text-white">
                <div class="card-body mb-4">
                    <div class="row">
                        <div class="col-1">
                            <i class="bi bi-book-half"></i>
                        </div>
                        <div class="col-11">
                            <h5 class="card-title">Book</h5>
                        </div>
                    </div>
                    <center>
                        <h3>{{ $book_count }}</h3>
                    </center>
                    {{-- <a href="#" class="btn btn-info">detail</a> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-primary bg-gradient text-white">
                <div class="card-body mb-4">
                    <div class="row">
                        <div class="col-1">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <div class="col-11">
                            <h5 class="card-title">Category</h5>
                        </div>
                    </div>
                    <center>
                        <h3>{{ $category_count }}</h3>
                    </center>
                    {{-- <a href="#" class="btn btn-info">detail</a> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-primary bg-gradient text-white">
                <div class="card-body mb-4">
                    <div class="row">
                        <div class="col-1">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="col-11">
                            <h5 class="card-title">User</h5>
                        </div>
                    </div>
                    <center>
                        <h3>{{ $user_count }}</h3>
                    </center>
                    {{-- <a href="#" class="btn btn-info">detail</a> --}}
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <h4>Rent Log</h4>
        </div>

        <div class="row mt-3">
            <div class="col">
                <x-rent-log-table :rentlog='$rentlogs' />
                {{ $rentlogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
