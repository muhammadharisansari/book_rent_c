@extends('layouts.mainlayout')
@section('title', 'Books')

@section('content')
    <h3>Book List</h3>
    <div class="mt-3 d-flex justify-content-end">
        <a href="book-deleted" class="btn btn-secondary me-3">view deleted data</a>
        <a href="book-add" class="btn btn-success">Add Data</a>
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
                            <th scope="col">Code</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($book as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->book_code }}</td>
                                <td>{{ $b->title }}</td>
                                <td>
                                    @foreach ($b->categories as $c)
                                        {{ $c->name }},
                                    @endforeach
                                </td>
                                <td>{{ $b->status }}</td>
                                <td>
                                    <a href="/book-edit/{{ $b->slug }}" class="btn btn-info">update</a>
                                    <a href="/book-delete/{{ $b->slug }}" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-danger">
                                        <center>Data belum Tersedia.</center>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $book->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
