@extends('layouts.mainlayout')
@section('title','Book-edit')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h3>Book edit form</h3>
    <div class="container">
        <div class="row mt-3 w-50">

            <div class=" d-flex ml-3">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Failed because :</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            
            <div class="col">
                <form action="/book-edit/{{$book->slug}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    @if ($book->cover !='')
                        <img src="{{asset('storage/cover/'.$book->cover)}}" alt="" width="200" srcset="">
                    @endif    
                    <div class="mb-3">
                        <label for="book_code" class="form-label">Book code</label>
                        <input type="text" class="form-control" name="book_code" id="book_code" placeholder="example : A001-01..." value="{{ $book->book_code }}">
                    </div>
                    <div class= "mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="books title..." value="{{ $book->title }}">
                    </div>
                    
                    <div class= "mb-3 ml-3">
                        <label for="cat" class="form-label">Category ( current :
                            @foreach ($book->categories as $item)
                               {{$item->name}}, 
                            @endforeach
                        )
                        </label>
                        
                        <select class="form-select select-multiple" name="categories[]" id="cat" aria-label="Default select example" multiple>
                            <option disabled>bisa lebih dari satu</option>
                            @foreach ($categories as $c)
                            <option value="{{$c->id}}">{{$c->name}} </option>
                             @endforeach
                        </select>
                    </div>    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                      <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection
