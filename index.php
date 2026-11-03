<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Pengaduan Masyarakat Kabupaten Pekalongan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Laporan Pengaduan Masyarakat Kabupaten Pekalongan <img src="logo-pemerintahan.png" alt="Logo" class="logo-h2"></h2>
        <p>Gunakan formulir di bawah ini untuk melaporkan kendala atau permasalahan fasilitas umum di lingkungan Anda. </p>
        
        <form action="proses_simpan.php" method="POST">
            <div class="form-group">
                <label>NIK (Nomor Induk Kependudukan):</label>
                <input type="text" name="nik" maxlength="16" placeholder="Masukkan 16 digit NIK Anda" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama_warga" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label>Kategori Masalah:</label>
                <select name="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Infrastruktur">Infrastruktur (Jalan, Lampu, Jembatan)</option>
                    <option value="Pelayanan">Pelayanan Publik (Administrasi, Kantor Desa)</option>
                    <option value="Keamanan">Keamanan & Ketertiban</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label>Lokasi Kejadian:</label>
                <input type="text" name="lokasi" placeholder="Contoh: Jl. Pahlawan RT 02/03" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Masalah:</label>
                <textarea name="deskripsi" rows="4" placeholder="Jelaskan permasalahan secara detail..." required></textarea>
            </div>
            <button type="submit" name="submit" class="btn-primary">Kirim Laporan</button>
        </form>
        <p style="margin-top: 20px;"><a href="cek_status.php">CEK STATUS PENGADUAN &rarr;</a></p>
    </div>
</body>
</html>