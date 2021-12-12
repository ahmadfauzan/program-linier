<?php
$arr = array(0, 1, 2, 3, 4, 0, 5, 6, 4, 3, 2, 1, 0);



echo $min = getMin($arr);

// $count = count($arr);

// while (count(array_unique($arr)) > 1) {

//     for ($i = 0; $i < $count; $i++) {
//         if ($arr[$i] >= $min) {
//             $arr[$i] -= $min;
//             echo $arr[$i] .
//                 " ";
//         }
//     }
//     echo "\n";
// }

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
    <?php
    function getKey($data, $row, $value)
    {
        foreach ($data as $key => $data) {
            if ($data[$row] === $value)
                return $key;
        }
        return false;
    }

    function getMin($a)
    {
        $arr_filtered = array_values(array_filter($a));
        return min($arr_filtered);
    }



    if (isset($_POST['submit'])) {
        $total_bk = $_POST['total_bk'];
        $total_po = $_POST['total_po'];
        $n_nilai_z = [];
        $nilai_var = [];
        $it = 0;
        $data[$total_bk + 1] = array();
        $nilai_s = [];
        $index = [];
        $nilai_kunci_m = 0;
        $nilai_s_berubah = [];
        $nilai_z_berubah = [];
        $nilai_col_terpilih = [];
        $nilai_var_baris_z = [];
        $is_loop = true;
        $min = 0;

        $char = range('A', 'Z');


        // inisialisai nilai s
        for ($i = 0; $i < $total_bk + 2; $i++) {
            $nilai_s[$i] = 0;
        }


        // input kolom z di array data
        $data[0][0] = 1;
        for ($i = 1; $i <= $total_bk + 1; $i++) {
            $data[0][$i] = 0;
        }

        // input nilai s
        for ($i = $total_po + 1; $i < $total_bk + $total_po + 3; $i++) {
            $data[$i][0] = $nilai_s[$it];
            $it++;
        }

        $i = 0;
        foreach ($_POST['nilai_z'] as $z) {
            $n_nilai_z[$i] = -1 * $z;
            $data[$i + 1][0] = -1 * $z;
            $i++;
        }


        // input nilai var
        $j = 0;
        foreach ($_POST['nilai_var'] as $var) {

            for ($i = 0; $i < $total_po; $i++) {
                $nilai_var[$i][$j] = $var[$i];
                $data[$i + 1][$j + 1] = $var[$i];
            }
            $j++;
        }

        // input nilai s1, s2 ....
        for ($i = $total_po + 1; $i < $total_bk + $total_po + 1; $i++) {
            for ($j = 1; $j < $total_bk + 1; $j++) {
                if ($j + 2 == $i) {
                    $data[$i][$j] = 1;
                } else {
                    $data[$i][$j] = 0;
                }
            }
        }

        // input nilai kunci 

        $j = 1;
        foreach ($_POST['nilai_kunci'] as $nilai_kunci) {
            $data[$total_po + $total_bk + 1][$j] = $nilai_kunci;

            $j++;
        }


        while ($is_loop) {
    ?>
            <div class="card mx-auto mt-4 w-50 shadow">
                <div class="card-body">
                    <?php


                    for ($i = 1; $i <= $total_po; $i++) {
                        $nilai_var_baris_z[$i - 1] = $data[$i][0];
                    }

                    if (min($nilai_var_baris_z) < 0) {
                    } else {
                        $is_loop = false;
                    }

                    $min = min(array_column($data, 0));
                    $keyCol = getKey($data, 0, $min);


                    // index
                    for ($i = 1; $i < $total_bk + 1; $i++) {
                        $index[$i] = $data[$total_bk + $total_po + 1][$i] / $data[$keyCol][$i];
                        $data[$total_bk + $total_po + 2][$i] = $index[$i];
                    }

                    $min2 = getMin($index);
                    $keyRow =  array_search($min2, $data[$total_po + $total_bk + 2]);

                    $nilai_kunci_m = $data[$keyCol][$keyRow];

                    // nilai s berubah
                    $k = 0;
                    for ($i = 1; $i < $total_bk + $total_po + 2; $i++) {

                        $nilai_s_berubah[$k] = $data[$i][$keyRow] / $nilai_kunci_m;
                        $k++;
                    }

                    for ($i = 0; $i < $total_bk + 1; $i++) {
                        $nilai_col_terpilih[$i] = $data[$keyCol][$i];
                    }

                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Var Dasar</th>
                                <th scope="col">Z</th>
                                <?php
                                $j = 1;
                                for ($i = 0; $i < $total_po; $i++) {
                                    echo  '<th scope="col">' . $char[$i] . '</th>';
                                    $j++;
                                }
                                $j = 1;
                                for ($i = 0; $i < $total_bk; $i++) {
                                    echo '<th scope="col">S' . $j . '</th>';
                                    $j++;
                                } ?>
                                <th scope="col">Nilai Kunci</th>
                                <th scope="col">Index</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Z</th>
                                <?php for ($j = 0; $j < $total_bk + $total_po + 3; $j++) {
                                    echo '<td>' . $data[$j][0] . '</td>';
                                } ?>
                            </tr>
                            <?php
                            $k = 1;
                            for ($i = 0; $i < $total_bk; $i++) {
                                echo '<tr>
                        <th scope="row">S' . $k . '</th>';
                                for ($j = 0; $j < $total_bk + $total_po + 3; $j++) {

                                    echo '<td>' . $data[$j][$i + 1] . '</td>';
                                }
                                echo '</tr>';
                                $j++;
                                $k++;
                            } ?>

                        </tbody>
                    </table>
                    <?php
                    if ($is_loop == true) {
                    ?>
                        <p style="color: red;">
                            Nilai kunci = <?= $nilai_kunci_m; ?>
                        </p>
                        <p style="color: blue;">
                            Nilai S<?= $keyRow; ?> menjadi <?= $char[$keyCol - 1] ?> =
                            <?php
                            foreach ($nilai_s_berubah as $s) {
                                echo $s . ' ';
                            }
                            ?>
                        </p>
                    <?php
                    } else {

                        echo '<b><p style="color:#9e35e8;">Nilai Maksimum = ' . $data[$total_bk + $total_po + 1][0] . '</p></b>';
                    }
                    ?>
                </div>
            </div>

    <?php
            // Baris Z
            $j = 0;
            for ($i = 1; $i < $total_bk + $total_po + 2; $i++) {
                $data[$i][0] = $data[$i][0] - ($nilai_col_terpilih[0] * $nilai_s_berubah[$j]);
                // echo $data[$i][0];
                $j++;
            }

            // Baris s1, s2 ....
            for ($j = 1; $j <= $total_bk; $j++) {
                $k = 0;
                for ($i = 1; $i <= $total_bk + $total_po + 1; $i++) {
                    if ($j != $keyRow) {
                        $data[$i][$j] = $data[$i][$j] - ($nilai_col_terpilih[$j] * $nilai_s_berubah[$k]);
                    } else {
                        $data[$i][$j] = $nilai_s_berubah[$k];
                    }
                    $k++;
                }
            }
        }
    }

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>