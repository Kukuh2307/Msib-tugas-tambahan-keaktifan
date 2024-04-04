<?php
session_start();
include 'database.php';
$db = new database();
$aksi = $_GET['aksi'];

try {
    if ($aksi == 'tambah') {
        // Enkripsi password sebelum menyimpannya
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $db->input(
            $_POST['nama'],
            $_POST['email'],
            $hashed_password,
            $_POST['noWa'],
            $_POST['tempat_lahir'],
            $_POST['date'],
            $_POST['nama_orang_tua'],
            $_POST['pekerjaan_orang_tua'],
            $_POST['penghasilan_orang_tua'],
            $_POST['nilai'],
            $_POST['major'],
            $_POST['alamat']
        );
    } elseif ($aksi == 'login') {
        $db->login($_POST['email'], $_POST['password']);
    } elseif ($aksi == 'update') {
        // echo $_POST['id'];
        // echo $_POST['nama'];
        // echo $_POST['email'];
        // echo $_POST['noWa'];
        // echo $_POST['tempat_lahir'];
        // echo $_POST['date'];
        // echo $_POST['nama_orang_tua'];
        // echo $_POST['pekerjaan_orang_tua'];
        // echo $_POST['penghasilan_orang_tua'];
        // echo $_POST['nilai'];
        // echo $_POST['major'];
        // echo $_POST['alamat'];

        $db->update(
            $_POST['id'],
            $_POST['nama'],
            $_POST['email'],
            $_POST['noWa'],
            $_POST['tempat_lahir'],
            $_POST['nama_orang_tua'],
            $_POST['pekerjaan_orang_tua'],
            $_POST['penghasilan_orang_tua'],
            $_POST['nilai'],
            $_POST['major'],
            $_POST['alamat']
        );
    } else {
        echo "gagal";
    }
} catch (Exception $e) {
    echo $e;
}
