@extends('layouts.mainlayout')
@section('title', 'Profile')

@section('content')
    <h3>Your Rent Log</h3>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <x-rent-log-table :rentlog='$rentlogs' />
            </div>
        </div>
    </div>
@endsection
