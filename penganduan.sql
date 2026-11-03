-- Buat dan gunakan basis data
CREATE DATABASE IF NOT EXISTS e_pemerintahan;
USE e_pemerintahan;

-- Hapus tabel jika sudah ada untuk pengaturan ulang yang bersih
DROP TABLE IF EXISTS pengaduan;

CREATE TABLE pengaduan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_tiket VARCHAR(10) NOT NULL UNIQUE,
    nik VARCHAR(16) NOT NULL,
    nama_warga VARCHAR(100) NOT NULL,
    kategori ENUM('Infrastruktur', 'Pelayanan', 'Keamanan', 'Lainnya') NOT NULL,
    lokasi TEXT NOT NULL,
    deskripsi TEXT NOT NULL,
    status ENUM('Pending', 'Diproses', 'Selesai') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Masukkan data contoh awal (Opsional untuk pengujian)
INSERT INTO pengaduan (kode_tiket, nik, nama_warga, kategori, lokasi, deskripsi, status) 
VALUES 
('TKT-1001', '3326123456780001', 'Budi Santoso', 'Infrastruktur', 'Jl. Merdeka No. 10, RT 01/02', 'Jalan berlubang besar di dekat jembatan membahayakan pengendara.', 'Pending'),
('TKT-1002', '3326987654320002', 'Siti Aminah', 'Pelayanan', 'Kantor Kelurahan Suka Maju', 'Antrean pembuatan KTP terlalu lama dan kurang tertib.', 'Diproses');