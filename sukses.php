<?php
$kode_tiket = isset($_GET['tiket']) ? $_GET['tiket'] : '-';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaduan Berhasil</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; text-align: center; padding: 50px; }
        .card { background: white; max-width: 500px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .ticket { background: #e9ecef; padding: 15px; font-size: 20px; font-weight: bold; color: #007bff; margin: 20px 0; border-radius: 5px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-top: 10px; }
        .btn-secondary { background-color: #6c75d7; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Terima Kasih!</h2>
        <p>Laporan Anda telah berhasil dikirim dan <strong>sedang diproses</strong> oleh petugas.</p>
        <p>Simpan Kode Tiket Anda untuk mengecek status:</p>
        
        <div class="ticket"><?= htmlspecialchars($kode_tiket); ?></div>

        <a href="cek_status.php" class="btn">Cek Status Laporan</a>
        <br><br>
        <a href="index.php" style="color: #666; font-size: 14px; text-decoration: underline;">Kirim Pengaduan Lain</a>
    </div>
</body>
</html>