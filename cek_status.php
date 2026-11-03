<?php
include 'koneksi.php';
$hasil = null;
$error = "";

if (isset($_GET['cari'])) {
    $kode = mysqli_real_escape_string($conn, $_GET['kode_tiket']);
    $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE kode_tiket = '$kode'");
    
    if (mysqli_num_rows($query) > 0) {
        $hasil = mysqli_fetch_assoc($query);
    } else {
        $error = "Kode tiket tidak ditemukan. Periksa kembali kode Anda.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status Pengaduan</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 50px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        input[type="text"] { width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .result { margin-top: 20px; background: #f1f3f5; padding: 15px; border-radius: 5px; }
        .badge { padding: 5px 10px; border-radius: 4px; color: white; font-weight: bold; }
        .bg-pending { background-color: #ffc107; color: black; }
        .bg-proses { background-color: #17a2b8; }
        .bg-selesai { background-color: #28a745; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cek Status Pengaduan Warga</h2>
        <form action="" method="GET">
            <input type="text" name="kode_tiket" placeholder="Masukkan Kode Tiket (Contoh: TKT-1234)" required value="<?= isset($_GET['kode_tiket']) ? htmlspecialchars($_GET['kode_tiket']) : ''; ?>">
            <button type="submit" name="cari">Cek Status</button>
        </form>

        <?php if (!empty($error)) : ?>
            <p class="error"><?= $error; ?></p>
        <?php endif; ?>

        <?php if ($hasil) : ?>
            <div class="result">
                <h3>Detail Pengaduan:</h3>
                <p><strong>Kode Tiket:</strong> <?= $hasil['kode_tiket']; ?></p>
                <p><strong>Nama Pelapor:</strong> <?= htmlspecialchars($hasil['nama_warga']); ?></p>
                <p><strong>Kategori:</strong> <?= $hasil['kategori']; ?></p>
                <p><strong>Lokasi:</strong> <?= htmlspecialchars($hasil['lokasi']); ?></p>
                <p><strong>Deskripsi:</strong> <?= htmlspecialchars($hasil['deskripsi']); ?></p>
                <p><strong>Status Saat Ini:</strong> 
                    <span class="badge 
                        <?php 
                            if($hasil['status'] == 'Pending') echo 'bg-pending';
                            elseif($hasil['status'] == 'Diproses') echo 'bg-proses';
                            else echo 'bg-selesai';
                        ?>">
                        <?= $hasil['status']; ?>
                    </span>
                </p>
                <p><small>Tanggal Laporan: <?= $hasil['created_at']; ?></small></p>
            </div>
        <?php endif; ?>

        <p style="margin-top: 20px;"><a href="index.php">&larr; Kembali ke Form Pengaduan</a></p>
    </div>
</body>
</html>s