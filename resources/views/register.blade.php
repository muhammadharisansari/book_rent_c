<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body >
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-4">

          @if ($errors->any())
            <div class="alert alert-danger">
              <h4>Register failed :</h4>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session('Berhasil'))
              <div class="alert alert-success">
                  {{ session('Berhasil') }}
              </div>
              @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Form register</h4>
                  </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3 ">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="username" aria-describedby="username" >
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" >
                            </div>
                            <div class="mb-3 ">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="number" name="phone" class="form-control" id="phone" aria-describedby="phone">
                            </div>
                            <div class="mb-3 ">
                              <label for="address" class="form-label">Address</label>
                              <textarea name="address" id="address" cols="3" rows="3" class="form-control" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary form-control mt-3">submit</button>
                            <div class="text-center mt-4">
                                <a href="login" class="stretched-link text-info " style="position: relative;">login</a>
                            </div>
                          </form>
                    </div>
                  </div>

            </div>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>