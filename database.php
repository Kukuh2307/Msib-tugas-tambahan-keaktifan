<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'db_tugas_tambahan_keaktifan';
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password);

        // Periksa apakah koneksi berhasil
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
        mysqli_select_db($this->conn, $this->db);
    }

    function input($nama, $email, $password, $noWa, $tempat_lahir, $date, $nama_orang_tua, $pekerjaan_orang_tua, $penghasilan_orang_tua, $nilai, $major, $alamat)
    {
        // cek penghasilan orang tua
        if ($penghasilan_orang_tua <= 20) {
            $penghasilan_orang_tua = "Tidak mamapu";
        } elseif ($penghasilan_orang_tua >= 21 && $penghasilan_orang_tua <= 40) {
            $penghasilan_orang_tua = "Kurang mampu";
        } else {
            $penghasilan_orang_tua = "Mampu";
        }

        // cek nilai
        if ($nilai >= 90 && $nilai <= 100) {
            $nilai = "Pintar";
        } elseif ($nilai >= 80 && $nilai <= 89) {
            $nilai = "Cukup pintar";
        } elseif ($nilai >= 60 && $nilai <= 79) {
            $nilai = "Rata-rata";
        } else {
            $nilai = "Penangann khussus";
        }

        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nama, email, password, noWa, tempat_lahir, date, nama_orang_tua, pekerjaan_orang_tua, penghasilan_orang_tua, nilai, major, alamat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $nama, $email, $password, $noWa, $tempat_lahir, $date, $nama_orang_tua, $pekerjaan_orang_tua, $penghasilan_orang_tua, $nilai, $major, $alamat);
        $stmt->execute();
        header('Location: login.php');
    }


    function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT id, password FROM mahasiswa WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $email;
                $_SESSION['id'] = $data['id'];
                header('Location: dashboard.php');
                exit();
            } else {
                header('Location: login.php?error=1');
                exit();
            }
        } else {
            header('Location: login.php?error=1');
            exit();
        }
    }

    function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit();
    }


    function display()
    {
        if (isset($_SESSION['user'])) {
            $email = $_SESSION['user'];
            $data = mysqli_query($this->conn, "SELECT * FROM mahasiswa WHERE email='$email'");
            while ($row = mysqli_fetch_assoc($data)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return [];
        }
    }

    function edit($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mahasiswa WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    function update($id, $nama, $email, $noWa, $tempat_lahir, $nama_orang_tua, $pekerjaan_orang_tua, $penghasilan_orang_tua, $nilai, $major, $alamat)
    {
        // cek penghasilan orang tua
        if ($penghasilan_orang_tua <= 20) {
            $penghasilan_orang_tua = "Tidak mamapu";
        } elseif ($penghasilan_orang_tua >= 21 && $penghasilan_orang_tua <= 40) {
            $penghasilan_orang_tua = "Kurang mampu";
        } else {
            $penghasilan_orang_tua = "Mampu";
        }

        // cek nilai
        if ($nilai >= 90 && $nilai <= 100) {
            $nilai = "Pintar";
        } elseif ($nilai >= 80 && $nilai <= 89) {
            $nilai = "Cukup pintar";
        } elseif ($nilai >= 60 && $nilai <= 79) {
            $nilai = "Rata-rata";
        } else {
            $nilai = "Penangan khusus";
        }

        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama=?, email=?, noWa=?, tempat_lahir=?, nama_orang_tua=?, pekerjaan_orang_tua=?, penghasilan_orang_tua=?, nilai=?, major=?, alamat=? WHERE id=?");
        $stmt->bind_param("ssssssssssi", $nama, $email, $noWa, $tempat_lahir, $nama_orang_tua, $pekerjaan_orang_tua, $penghasilan_orang_tua, $nilai, $major, $alamat, $id);
        $stmt->execute();

        // mysqli_query($this->conn, "UPDATE mahasiswa SET nama='$nama', email='$email', noWa='$noWa', tempat_lahir='$tempat_lahir',nama_orang_tua='$nama_orang_tua', pekerjaan_orang_tua='$pekerjaan_orang_tua', penghasilan_orang_tua='$penghasilan_orang_tua', nilai='$nilai', major='$major', alamat='$alamat' WHERE id='$id'");
        header('Location: login.php');
        exit();
    }
}
