<?php
// =========================================================
// KUMPULAN FUNGSI TOKO - RUMAH MAKAN ARIF (MODERN UI)
// =========================================================

// 1. Mengubah angka menjadi format Rupiah, contoh: 45000 -> "Rp 45.000"
function formatRupiah(float $angka): string
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 2. Menghitung harga setelah dipotong diskon (persen)
function hargaSetelahDiskon(int $harga, int $persenDiskon = 0): int
{
    $potongan = $harga * $persenDiskon / 100;
    return (int) round($harga - $potongan);
}

// 3. Menentukan label stok
function labelStok(int $stok): string
{
    return match (true) {
        $stok === 0 => "Habis",
        $stok < 5   => "Sisa $stok",
        default     => "Tersedia",
    };
}

// 4. Menentukan warna badge Tailwind sesuai stok (Modern Pill + Ring)
function warnaStok(int $stok): string
{
    return match (true) {
        $stok === 0 => "bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/20",
        $stok < 5   => "bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-600/20",
        default     => "bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-600/20",
    };
}

// 5. Menghitung total nilai seluruh stok (harga setelah diskon x stok)
function hitungNilaiStok(array $daftarProduk): int
{
    $total = 0;
    foreach ($daftarProduk as $item) {
        $total += hargaSetelahDiskon($item["harga"], $item["diskon"]) * $item["stok"];
    }
    return $total;
}

// 6. Menghitung jumlah produk yang sedang diskon
function hitungProdukDiskon(array $daftarProduk): int
{
    $jumlah = 0;
    foreach ($daftarProduk as $item) {
        if ($item["diskon"] > 0) {
            $jumlah++;
        }
    }
    return $jumlah;
}

// 7. Diskon tambahan berdasarkan total belanja
function diskonBelanja(int $totalBelanja): int
{
    $persen = match (true) {
        $totalBelanja >= 500000 => 15,
        $totalBelanja >= 200000 => 10,
        default                 => 0,
    };
    return (int) round($totalBelanja * $persen / 100);
}

// 8. [Tantangan 1] Mencari produk dengan harga akhir (setelah diskon) termurah
function cariProdukTermurah(array $daftarProduk): array
{
    $termurah = null;
    $hargaTermurah = null;

    foreach ($daftarProduk as $kode => $item) {
        $hargaAkhir = hargaSetelahDiskon($item["harga"], $item["diskon"]);
        if ($termurah === null || $hargaAkhir < $hargaTermurah) {
            $hargaTermurah = $hargaAkhir;
            $termurah = $item;
            $termurah["kode"] = $kode;
            $termurah["hargaAkhir"] = $hargaAkhir;
        }
    }

    return $termurah ?? [];
}