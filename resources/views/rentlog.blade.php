@extends('layouts.mainlayout')
@section('title','Rent log')

@section('content')
    <h3>Rent Log List</h3>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">

                {{-- cara memanggil componen buatan (file ada di : app/view/components/RentLogTable dan resources/views/components/rent-log-table.blade.php) --}}

                <x-rent-log-table :rentlog='$rentlogs' />

            </div>
        </div>
    </div>
@endsection
