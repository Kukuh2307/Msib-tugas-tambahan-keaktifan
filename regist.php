<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regist</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>FORM PENDAFTARAN MAHASISWA ONLINE</h1>
            <p>Llorempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="content">
            <p>Pastikan anda telah mengisi dengan benar formulir pendaftaran dibawah ini: <br>
                <b>Note: Jika anda sudah mempunyai akun silahkan</b> <a href="login.php">Login</a>
            </p>
            <span>*</span> Wajib
            <br>
            <br>
            <form action="proses.php?aksi=tambah" method="POST">
                <!-- nama -->
                <div class="form-row">
                    <label for="nama">1. Nama Lengkap <span>*</span></label>
                    <input class="full-input" type="text" placeholder="Nama lengkap anda" name="nama" required>
                </div>

                <!-- email -->
                <div class="form-row">
                    <label for="nama">2. Email Akun <span>*</span></label>
                    <input class="full-input" type="email" placeholder="Alamat email anda" name="email" required>
                </div>

                <!-- password -->
                <div class="form-row">
                    <label for="nama">3. Password <span>*</span></label>
                    <input class="full-input" type="password" placeholder="Password anda" name="password" required>
                </div>

                <!-- noWa -->
                <div class="form-row">
                    <label for="nama">4. Nomor Handphone Aktif <span>*</span></label>
                    <input class="full-input" type="text" placeholder="No telpon anda" name="noWa" required>
                </div>

                <!-- tempat lahir -->
                <div class="form-row">
                    <label for="nama">5. Kota Domisili <span>*</span></label>
                    <input class="full-input" type="text" placeholder="Kota tinggal sesuai KTP" name="tempat_lahir" required>
                </div>

                <!-- tanggal lahir -->
                <div class="form-row">
                    <label for="date">6. Tanggal lahir <span>*</span></label>
                    <input class="full-input" type="date" name="date" required>
                </div>

                <!-- nama orang tua -->
                <div class="form-row">
                    <label for="nama_orang_tua">7. Nama Orang Tua <span>*</span></label>
                    <input class="full-input" type="text" placeholder="Nama orang tua" name="nama_orang_tua" required>
                </div>

                <!-- pekerjaan orang tua -->
                <div class="form-row">
                    <label for="pekerjaan_orang_tua">8. Pekerjaan orang tua <span>*</span></label>
                    <input class="full-input" type="text" placeholder="Pekerjaan orang tua" name="pekerjaan_orang_tua" required>
                </div>

                <!-- penghasilan orang tua -->
                <div class="form-row">
                    <label for="penghasilan_orang_tua">Penghasilan orang tua <span>*</span></label>
                    <p style="margin-top: 5px; font-size: 12px; color:#7b7b7b"><i>- Angka pertama jutaan <br>- Angka kedua ratusan</i></p>
                    <input class="full-input" type="text" placeholder="Penghasilan orang tua" name="penghasilan_orang_tua" id="penghasilan_orang_tua" maxlength="2" required>
                </div>

                <!-- nilai -->
                <div class="form-row">
                    <label for="nilai">10. Nilai <span>*</span></label>
                    <input class="full-input" type="text" placeholder="Nilai anda" name="nilai" maxlength="2" required>
                </div>


                <div class="form-row">
                    <label for="major">11. Pilih program studi yang anda pilih <span>*</span></label>
                    <input type="radio" name="major" value="Teknik Informatika">Teknik Informatika<br>
                    <input type="radio" name="major" value="Sistem Informasi">Sistem Informasi<br>
                    <input type="radio" name="major" value="Manajemen Informatika">Manajemen Informatika<br>
                    <input type="radio" name="major" value="Other">Other
                    <input class="short-input" type="text" name="other_major" placeholder="Other">
                </div>

                <div class="form-row">
                    <label for="alamat">12. Alamat<span>*</span></label>
                    <textarea name="alamat" id="alamat" class="full-input" cols="30" rows="10"></textarea>
                </div>
                <div class="form-submit">
                    <button name="register">DAFTAR</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Tambahkan event listener untuk input penghasilan orang tua
        document.getElementById('penghasilan_orang_tua').addEventListener('input', function() {
            let input = this.value;

            // Hapus semua tanda titik
            input = input.replace(/\./g, '');

            // Ambil dua digit pertama dari nilai input
            let processedValue = input.substring(0, 2);

            // Set nilai input kembali
            this.value = processedValue;
        });
    </script>
</body>

</html>