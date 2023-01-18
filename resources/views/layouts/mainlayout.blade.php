<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
{{-- navbar --}}
<nav class="navbar navbar-dark navbar-expand-lg bg-primary g-0">
    <div class="container-fluid">
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">RENTAL BUKU</a>
      <h5 class="text-light">{{Auth::user()->username}}</h5>
    </div>
  </nav>
{{-- endnavbar --}}

    <div class="row g-0">
        {{-- sidebar --}}
        <div class="col-lg-2 p-3 bg-info collapse d-lg-block" id="collapseExample">
            <div class="row mt-2">
                <div class="list-group-flush">
                    @if (Auth::user()->role_id == 1)
                    <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                    <hr>
                    <a href="#" class="list-group-item list-group-item-action">Category</a>
                    <hr>
                    <a href="/books" class="list-group-item list-group-item-action">Books</a>
                    <hr>
                    <a href="#" class="list-group-item list-group-item-action">User</a>
                    <hr>
                    <a href="#" class="list-group-item list-group-item-action">Rent Log</a>
                    <hr>
                    @else
                    <a href="/books" class="list-group-item list-group-item-action">Books</a>
                    <hr>
                    <a href="/profile" class="list-group-item list-group-item-action">Profile</a>
                    <hr>
                    @endif
                    <a href="/logout" class="list-group-item list-group-item-action">Logout</a>
                    <hr>
                  </div>
            </div>
        </div>
        {{-- endsidebar --}}
        
        {{-- content --}}
        <div class="col-lg-10 ">
            <div class="row p-3">
                    @yield('content')
            </div>
        </div>
        {{-- endcontent --}}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>