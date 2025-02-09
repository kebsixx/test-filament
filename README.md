# Sistem Kasir dengan Filament

Sistem Point of Sale (POS) yang dibangun dengan Laravel dan Filament, menawarkan solusi lengkap untuk manajemen retail.

## Fitur Utama

### Authentication
- Sistem login yang aman
- Registrasi user
- Role-based access control
- Logout yang aman

### Manajemen Produk
- Add, edit, dan delete produk
- Kategori produk
- Tracking stok
- Pengaturan harga
- Upload gambar produk
- Generate barcode

### Manajemen Inventory
- Update stok realtime
- Alert stok menipis
- History tracking stok
- Laporan inventory

### Manajemen Penjualan
- Create transaksi penjualan baru
- Multiple metode pembayaran
- History penjualan
- Laporan penjualan harian/bulanan/tahunan
- Export data penjualan ke XLSX/CSV

### Manajemen Pembelian
- Kelola supplier
- Purchase order
- History pembelian
- Tracking barang masuk

### Laporan & Analisis
- Analisis penjualan
- Laporan pendapatan
- Metrik performa produk
- Fitur export (XLSX/CSV)
- Laporan dengan range tanggal custom

## Tech Stack

- Laravel 10
- Filament 3
- Database MySQL
- Support Export XLSX/CSV

## Struktur Database
Aplikasi ini menggunakan MySQL dengan tabel utama:

- users
- products
- categories
- sales
- sales_details
- purchases
- stock_movements
- suppliers
