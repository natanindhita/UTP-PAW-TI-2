<?php
$ukuran = $_POST["ukuran"];
$warna = $_POST["warna"];
$halaman = $_POST["halaman"];
$rangkap = $_POST["rangkap"];

$tarif = 0;
$total = 0;
$valid = false;
$pesan = "Perhitungan belum dibuat.";

if (!ctype_digit($halaman) || (int)$halaman < 1) {
    $pesan = "Jumlah halaman harus berupa bilangan bulat positif.";
} elseif (!ctype_digit($rangkap) || (int)$rangkap < 1) {
    $pesan = "Jumlah rangkap harus berupa bilangan bulat positif.";
} else {
    if ($ukuran == "A4" && $warna == "Hitam Putih") {
        $tarif = 500;
    } elseif ($ukuran == "A4" && $warna == "Berwarna") {
        $tarif = 1500;
    } elseif ($ukuran == "F4" && $warna == "Hitam Putih") {
        $tarif = 700;
    } elseif ($ukuran == "F4" && $warna == "Berwarna") {
        $tarif = 1800;
    }

    if ($tarif > 0) {
        $valid = true;
    } else {
        $pesan = "Ukuran kertas atau warna cetak tidak valid.";
    }
}

if ($valid) {
    $total = $tarif * $halaman * $rangkap;
}
