<?php
session_start();
include 'database.php';
$db = new database();
if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
    $user = $_SESSION['user'];
    $id = $_SESSION['id'];
} else {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>FORM EDIT MAHASISWA</h1>
        </div>
        <div class="content">
            <form action="proses.php?aksi=update" method="POST">
                <?php
                foreach ($db->edit($id) as $data) {
                ?>
                    <!-- id -->
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <!-- nama -->
                    <div class="form-row">
                        <label for="nama">Nama Lengkap <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Nama lengkap anda" name="nama" value="<?= $data['nama'] ?>" required>
                    </div>

                    <!-- email -->
                    <div class="form-row">
                        <label for="email">Email Akun <span>*</span></label>
                        <input class="full-input" type="email" placeholder="Alamat email anda" name="email" value="<?= $data['email'] ?>" required>
                    </div>

                    <!-- noWa -->
                    <div class="form-row">
                        <label for="noWa">Nomor Handphone Aktif <span>*</span></label>
                        <input class="full-input" type="text" placeholder="No telpon anda" name="noWa" value="<?= $data['noWa'] ?>" required>
                    </div>

                    <!-- tempat lahir -->
                    <div class="form-row">
                        <label for="tempat_lahir">Kota Domisili <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Kota tinggal sesuai KTP" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" required>
                    </div>

                    <!-- tanggal lahir -->
                    <div class="form-row">
                        <label for="date">Tanggal lahir <span>*</span></label>
                        <input class="full-input" type="date" name="date" value="<?= $data['date'] ?>" readonly>
                    </div>

                    <!-- nama orang tua -->
                    <div class="form-row">
                        <label for="nama_orang_tua">Nama Orang Tua <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Nama orang tua" name="nama_orang_tua" value="<?= $data['nama_orang_tua'] ?>" required>
                    </div>

                    <!-- pekerjaan orang tua -->
                    <div class="form-row">
                        <label for="pekerjaan_orang_tua">Pekerjaan orang tua <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Pekerjaan orang tua" name="pekerjaan_orang_tua" value="<?= $data['pekerjaan_orang_tua'] ?>" required>
                    </div>

                    <!-- penghasilan orang tua -->
                    <div class="form-row">
                        <label for="penghasilan_orang_tua">Penghasilan orang tua <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Penghasilan orang tua" name="penghasilan_orang_tua" id="penghasilan_orang_tua" value="<?= $data['penghasilan_orang_tua'] ?>" maxlength="8" required>
                    </div>

                    <!-- nilai -->
                    <div class="form-row">
                        <label for="nilai">Nilai <span>*</span></label>
                        <input class="full-input" type="text" placeholder="Nilai anda" name="nilai" maxlength="2" value="<?= $data['nilai'] ?>" required>
                    </div>

                    <!-- major -->
                    <div class="form-row">
                        <label for="major">Pilih program studi yang anda pilih <span>*</span></label>
                        <input type="radio" name="major" value="Teknik Informatika" <?php if ($data['major'] == "Teknik Informatika") echo "checked"; ?>> Teknik Informatika<br>
                        <input type="radio" name="major" value="Sistem Informasi" <?php if ($data['major'] == "Sistem Informasi") echo "checked"; ?>> Sistem Informasi<br>
                        <input type="radio" name="major" value="Manajemen Informatika" <?php if ($data['major'] == "Manajemen Informatika") echo "checked"; ?>> Manajemen Informatika<br>
                        <?php
                        if ($data['major'] !== "Teknik Informatika" && $data['major'] !== "Sistem Informasi" && $data['major'] !== "Manajemen Informatika") {
                        ?>
                            <input type="radio" name="major" value="Other" <?php if ($data['major'] == "Other") echo "checked"; ?>> Other
                            <input class="short-input" type="text" name="major" placeholder="Other" value="<?= $data['major'] ?>">
                        <?php
                        } else {
                        ?>
                            <input type="radio" name="major" value="Other" <?php if ($data['major'] == "Other") echo "checked"; ?>> Other
                            <input class="short-input" type="text" name="major" placeholder="Other">
                        <?php
                        }
                        ?>
                    </div>

                    <!-- alamat -->
                    <div class="form-row">
                        <label for="alamat">Alamat <span>*</span></label>
                        <textarea name="alamat" id="alamat" class="full-input" cols="30" rows="10" required><?= $data['alamat'] ?></textarea>
                    </div>
                <?php
                }
                ?>
                <div class="form-submit">
                    <button type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('penghasilan_orang_tua').addEventListener('input', function() {
            // Batasi panjang input menjadi delapan digit
            if (this.value.length > 8) {
                this.value = this.value.slice(0, 8);
            }
            // Hapus karakter selain angka
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
</body>

</html>