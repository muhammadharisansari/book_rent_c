<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body >
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-4 mt-5">

              @if (session('gagal'))
              <div class="alert alert-danger">
                  {{ session('gagal') }}
              </div>
              @endif

                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3 ">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="username" aria-describedby="username" required>
                              <div id="username" class="form-text">mohon pastikan anda mengetik dengan benar.</div>
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary form-control">login</button>
                            <div class="text-center mt-4">
                                <a href="register" class="stretched-link text-info " style="position: relative;">sign up</a>
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