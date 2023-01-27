@extends('layouts.mainlayout')
@section('title','returnBook')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h3>Return book form</h3>

    <div class="container-fluid">
        <div class="row mt-5 ">
            <div class="col-lg-6 col-md-12">

                @if (session('message'))
                    <div class="alert {{session('alert-class')}}">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user_id" id="user" class="form-control select">
                            <option value="" disabled selected>choose user</option>
                            @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->username}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="book" class="form-label">book</label>
                        <select name="book_id" id="book" class="form-control select">
                            <option value="" disabled selected>choose book</option>
                            @foreach ($book as $b)
                            <option value="{{$b->id}}">({{$b->book_code}}) {{$b->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Kembalikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select').select2();

    });
</script>
@endsection