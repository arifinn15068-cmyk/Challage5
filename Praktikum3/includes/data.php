<?php
// =========================================================
// DATA TOKO (sementara disimpan di array)
// Pada Pertemuan 7, data ini akan dipindah ke database MySQL.
// =========================================================

$namaToko    = "Rumah Makan Arif";
$pemilikToko = "Muhamad Samsul Arifin";
$sloganToko  = "Cita Rasa Autentik Nusantara, Hangat Seperti di Rumah";

// Array multidimensi: kode produk => data produk (array asosiatif)
$produk = [
    "RM01" => [
        "nama"     => "Paket Nasi Bebek Bakar Spesial",
        "kategori" => "Makanan",
        "harga"    => 45000,
        "diskon"   => 10, // dalam persen
        "stok"     => 25,
        "ikon"     => "🦆",
    ],
    "RM02" => [
        "nama"     => "Gurame Asam Manis Porsi Keluarga",
        "kategori" => "Makanan",
        "harga"    => 85000,
        "diskon"   => 15,
        "stok"     => 3,
        "ikon"     => "🐟",
    ],
    "RM03" => [
        "nama"     => "Ayam Kampung Goreng Lengkuas",
        "kategori" => "Makanan",
        "harga"    => 38000,
        "diskon"   => 0,
        "stok"     => 18,
        "ikon"     => "🍗",
    ],
    "RM04" => [
        "nama"     => "Sate Kambing Muda 10 Tusuk",
        "kategori" => "Lauk Spesial",
        "harga"    => 60000,
        "diskon"   => 5,
        "stok"     => 0,
        "ikon"     => "🍢",
    ],
    "RM05" => [
        "nama"     => "Tumpeng Mini Syukuran Arif",
        "kategori" => "Paket Katering",
        "harga"    => 55000,
        "diskon"   => 20,
        "stok"     => 4,
        "ikon"     => "🍱",
    ],
    "RM06" => [
        "nama"     => "Es Kelapa Jeruk Murni",
        "kategori" => "Minuman",
        "harga"    => 18000,
        "diskon"   => 0,
        "stok"     => 30,
        "ikon"     => "🥥",
    ],
    "RM07" => [
        "nama"     => "Wedang Uwuh Rempah Tradisional",
        "kategori" => "Minuman",
        "harga"    => 15000,
        "diskon"   => 10,
        "stok"     => 15,
        "ikon"     => "🍵",
    ],
];

// Contoh pesanan pelanggan: kode produk => jumlah yang dibeli
$pesanan = [
    "RM01" => 3,
    "RM02" => 1,
    "RM05" => 2,
    "RM06" => 2,
];

// Data profil untuk halaman Tentang Toko (Tantangan 5)
$profilToko = [
    "pemilik"   => $pemilikToko,
    "deskripsi" => "Rumah Makan Arif menyajikan hidangan Nusantara autentik dengan bumbu warisan keluarga dan bahan-bahan segar pilihan setiap hari.",
    "alamat"    => "Kampung Ledok Melaya, krajan, Krajan, Kec. Melaya, Kabupaten Jembrana, Bali",
    "jamBuka"   => "Setiap Hari, 09.00 – 22.00 WITA",
    "telepon"   => "0812-3456-7890",
    "layanan"   => [
        "Makan di Tempat (Dine-in) dengan Area Lesehan & Ruang VIP Keluarga",
        "Pesan Antar Cepat (Delivery Order) dalam kondisi hangat & higienis",
        "Layanan Katering, Nasi Kotak Premium, dan Tumpeng Syukuran",
        "Reservasi Tempat untuk Acara Keluarga, Arisan & Rapat Kantor",
    ],
];