<?php

if (isset($_POST['submit'])) {
  $bahan_baku = $_POST['bahan_baku'];
  $produk = $_POST['produk'];
}

?>

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


  <div class="card mx-auto mt-4 w-50 shadow">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Bahan Baku</th>
            <?php
            $j = 1;

            for ($i = 0; $i < $produk; $i++) {
              echo '<th scope="col">Produk ' . $j . '</th>';
              $j++;
            }
            ?>
            <th scope="col">Kapasitas</th>
          </tr>
        </thead>
        <tbody>
          <form action="hasil.php" method="POST">
            <input type="hidden" name="total_bk" value="<?= $bahan_baku ?>">
            <input type="hidden" name="total_po" value="<?= $produk ?>">
            <?php

            $bk = 1;
            $po = 1;

            for ($j = 0; $j < $bahan_baku; $j++) {
              echo '
                <tr>
                    <th scope="row">' . $bk . '</th>';

              for ($i = 0; $i < $produk; $i++) {
                echo '<td><input type="number" name="nilai_var[' . $j . '][]"></td>';
              }
              echo '<td><input type="number" name="nilai_kunci[]"></td>';
              $bk++;
              echo '</tr>';
            }
            ?>
            <tr>
              <th>Biaya/Laba</th>
              <?php
              $bk = 1;
              for ($i = 0; $i < $produk; $i++) {
                echo '<td><input type="number" name="nilai_z[]"></td>';

                $bk++;
              }
              ?>
              <td>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>

              </td>
            </tr>
          </form>
        </tbody>
      </table>

    </div>
  </div>
  <footer class="text-center"><a href="github.com/ahmadfauzan/program-linier">github.com/ahmadfauzan/program-linier</a></footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>