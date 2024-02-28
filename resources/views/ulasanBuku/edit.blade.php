<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Perpustakaan</title>
  </head>
  <body>
    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
          <h2>Edit Data Ulasan Buku</h2>
        </div>
        <form action="{{route('ulasanbuku.update', $ulasanBuku->id)}}" method="post">
            @csrf
            <div class="card-body">
                    <div class="row mb-3">
                      <label for="userID" class="col-sm-2 col-form-label">UserID</label>
                      <div class="col-sm-10">
                        <input type="integer" name="userID" class="form-control" id="userID" value="{{$ulasanBuku->userID}}" required>
                      </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                      <label for="bukuID" class="col-sm-2 col-form-label">BukuID</label>
                      <div class="col-sm-10">
                        <input type="integer" name="bukuID" class="form-control" id="bukuID" value="{{$ulasanBuku->bukuID}}" required>
                      </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <label for="ulasan" class="col-sm-2 col-form-label">Ulasan</label>
                        <div class="col-sm-10">
                          <input type="text" name="ulasan" class="form-control" id="ulasan" value="{{$ulasanBuku->ulasan}}" required>
                        </div>
                      </div>
                      <br>
                    <br>
                    <div class="row mb-3">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                          <input type="integer" name="rating" class="form-control" id="rating" value="{{$ulasanBuku->rating}}" required>
                        </div>
                      </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>