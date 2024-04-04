<?php
session_start();
include 'database.php';
$db = new database();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = '';
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Profile</title>
    <link rel="stylesheet" href="css/style-dashboard.css">
</head>

<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="logo">
            <h1>KISAWA</h1>
        </div>
        <div class="user">
            <h2><?= $user ?></h2>
        </div>
    </div>

    <!-- card -->
    <div class="card-header">
        <h2>Profile Mahasiswa</h2>
    </div>
    <div class="card-content">
        <?php
        foreach ($db->display($user) as $data) {
        ?>
            <div class="item">
                <label for="nama">Nama </label>
                <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" readonly>
            </div>
            <div class="item">
                <label for="email">Email </label>
                <input type="text" id="email" name="email" value="<?= $data['email'] ?>" readonly>
            </div>
            <div class="item">
                <label for="noWa">Nomor Handphone </label>
                <input type="text" id="noWa" name="noWa" value="<?= $data['noWa'] ?>" readonly>
            </div>
            <div class="item">
                <label for="tempat_lahir">Tempat lahir </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" readonly>
            </div>
            <div class="item">
                <label for="date">Tanggal lahir </label>
                <input type="date" id="date" name="date" value="<?= $data['date'] ?>" readonly>
            </div>
            <div class="item">
                <label for="alamat">Alamat </label>
                <textarea name="alamat" id="alalmat" cols="30" rows="10" readonly><?= $data['alamat'] ?></textarea>
            </div>
            <hr>
            <div class="item">
                <label for="nama_orang_tua">Nama Orang tua </label>
                <input type="text" id="nama_orang_tua" name="nama_orang_tua" value="<?= $data['nama_orang_tua'] ?>" readonly>
            </div>
            <div class="item">
                <label for="pekerjaan_orang_tua">Pekerjaan Orang tua </label>
                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" value="<?= $data['pekerjaan_orang_tua'] ?>" readonly>
            </div>
            <div class="item">
                <label for="penghasilan_orang_tua">Penghasilan orang tua </label>
                <input type="text" id="penghasilan_orang_tua" name="penghasilan_orang_tua" value="<?= $data['penghasilan_orang_tua'] ?>" readonly>
            </div>
            <hr>
            <div class="item">
                <label for="nilai">Nilai rata-rata ujiaan </label>
                <input type="text" id="nilai" name="nilai" value="<?= $data['nilai'] ?>" readonly>
            </div>
            <div class="item">
                <label for="major">Program studi </label>
                <input type="text" id="major" name="major" value="<?= $data['major'] ?>" readonly>
            </div>
        <?php
        }
        ?>
        <div class="flex">
            <button class="edit"><a href="edit.php">Edit</a></button>
            <button><a href="proses.php?aksi=logout">Simpan</a></button>
        </div>
        >>>>>>> edit
    </div>





</body>

</html>