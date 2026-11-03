<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nik        = mysqli_real_escape_string($conn, $_POST['nik']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama_warga']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $lokasi     = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    // Generate Kode Tiket Unik
    $kode_tiket = "TKT-" . rand(1000, 9999);

    $sql = "INSERT INTO pengaduan (kode_tiket, nik, nama_warga, kategori, lokasi, deskripsi) 
            VALUES ('$kode_tiket', '$nik', '$nama', '$kategori', '$lokasi', '$deskripsi')";

    if (mysqli_query($conn, $sql)) {
        // Arahkan ke halaman sukses dengan membawa parameter kode tiket
        header("Location: sukses.php?tiket=" . $kode_tiket);
        exit();
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($conn);
    }
}
?>