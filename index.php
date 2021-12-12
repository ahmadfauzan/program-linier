<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <h2 class="text-center mt-4">Program Linier</h2>


  <div class="card mx-auto mt-4 w-25 shadow">
    <div class="card-body">
      <form action="tabel.php" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Jumlah baku</label>
          <input type="text" class="form-control" name="bahan_baku" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Jumlah produk</label>
          <input type="text" class="form-control" name="produk" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <label for="exampleInputEmail1" class="form-label">Tujuan</label>
        <select class="form-select mb-3" name="tujuan" aria-label="Default select example">
          <option selected>Pilih tujuan</option>
          <option value="minimasi">Minimasi</option>
          <option value="maksimasi">Maksimasi</option>
        </select>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>

      </form>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>