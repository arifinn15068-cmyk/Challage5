<?php
// =========================================================
// HALAMAN KATALOG PRODUK (MODERN UI) - RUMAH MAKAN ARIF
// =========================================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Katalog Menu";
$halamanAktif = "index.php";

// Ringkasan toko
$jumlahProduk = count($produk);
$jumlahDiskon = hitungProdukDiskon($produk);
$nilaiStok    = hitungNilaiStok($produk);

// [Tantangan 1] Produk termurah
$produkTermurah = cariProdukTermurah($produk);

// [Tantangan 2] Rata-rata harga produk
$daftarHarga   = array_column($produk, "harga");
$rataRataHarga = (int) round(array_sum($daftarHarga) / count($produk));

// [Tantangan 3] Filter kategori (kosongkan "" untuk menampilkan semua menu)
$kategoriDipilih = "";

// [Tantangan 4] Menghitung jumlah produk per kategori
$jumlahPerKategori = [];
foreach ($produk as $item) {
    $kat = $item["kategori"];
    $jumlahPerKategori[$kat] = ($jumlahPerKategori[$kat] ?? 0) + 1;
}

require __DIR__ . '/includes/header.php';
?>

<!-- Hero Banner Modern -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-orange-950 text-white p-8 sm:p-10 mb-8 shadow-xl">
    <div class="relative z-10 max-w-2xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-orange-500/20 text-orange-300 border border-orange-400/30 mb-4">
            ✨ Kuliner Pilihan Nusantara
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-2">
            Katalog Menu <?= $namaToko ?>
        </h1>
        <p class="text-slate-300 text-base mb-5">
            <?= $sloganToko ?> — Disajikan langsung dengan resep spesial <span class="text-white font-semibold"><?= $pemilikToko ?></span>.
        </p>
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-xs px-4 py-2 rounded-xl border border-white/15 text-sm">
            <span class="text-slate-300">Rata-rata harga menu:</span>
            <span class="font-bold text-amber-400"><?= formatRupiah($rataRataHarga) ?></span>
        </div>
    </div>
    <div class="hidden md:flex items-center justify-center absolute right-10 top-1/2 -translate-y-1/2 text-8xl opacity-90 select-none">
        🍛
    </div>
</div>

<!-- Ringkasan Toko (4 Kartu Statistik Modern termasuk Tantangan 1) -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl shrink-0">📋</div>
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Jumlah Menu</p>
            <p class="text-2xl font-extrabold text-slate-900"><?= $jumlahProduk ?> Menu</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-2xl shrink-0">🏷️</div>
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Promo Diskon</p>
            <p class="text-2xl font-extrabold text-slate-900"><?= $jumlahDiskon ?> Menu</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl shrink-0">💰</div>
        <div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Nilai Stok</p>
            <p class="text-xl font-extrabold text-slate-900"><?= formatRupiah($nilaiStok) ?></p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl shrink-0">⭐</div>
        <div class="min-w-0">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Menu Termurah</p>
            <p class="text-sm font-bold text-slate-900 truncate" title="<?= $produkTermurah['nama'] ?>">
                <?= $produkTermurah["nama"] ?>
            </p>
            <p class="text-sm font-extrabold text-orange-600">
                <?= formatRupiah($produkTermurah["hargaAkhir"]) ?>
            </p>
        </div>
    </div>
</div>

<!-- [Tantangan 4] Bar Kategori Modern -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs px-5 py-4 mb-8 flex flex-wrap items-center justify-between gap-3">
    <div class="flex flex-wrap items-center gap-2 text-sm">
        <span class="font-bold text-slate-700 mr-1">Kategori Hidangan:</span>
        <?php foreach ($jumlahPerKategori as $namaKat => $jml): ?>
            <span class="inline-flex items-center gap-1.5 bg-slate-100 hover:bg-orange-50 hover:text-orange-700 text-slate-700 font-medium px-3.5 py-1.5 rounded-full transition">
                <span><?= $namaKat ?></span>
                <span class="bg-white text-slate-600 text-xs font-bold px-2 py-0.5 rounded-full shadow-2xs"><?= $jml ?></span>
            </span>
        <?php endforeach; ?>
    </div>
    <?php if ($kategoriDipilih !== ""): ?>
        <span class="text-xs font-bold bg-orange-100 text-orange-800 px-3 py-1 rounded-full">
            Filter Aktif: <?= $kategoriDipilih ?>
        </span>
    <?php endif; ?>
</div>

<!-- Grid Kartu Produk -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
<?php foreach ($produk as $kode => $item): ?>
    <?php
    // [Tantangan 3] Filter Kategori
    if ($kategoriDipilih !== "" && $item["kategori"] !== $kategoriDipilih) {
        continue;
    }
    $hargaAkhir = hargaSetelahDiskon($item["harga"], $item["diskon"]);
    ?>
    <article class="group bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">
        <!-- Area Visual Ikon -->
        <div class="bg-gradient-to-br from-orange-50/70 via-slate-50 to-amber-50/70 text-6xl text-center py-9 relative border-b border-slate-100">
            <span class="inline-block group-hover:scale-110 transition-transform duration-300"><?= $item["ikon"] ?></span>

            <!-- Kode Produk di Kanan Atas -->
            <span class="absolute top-3.5 right-3.5 bg-white/90 backdrop-blur-xs text-slate-500 text-xs font-bold px-2.5 py-1 rounded-lg border border-slate-200/60">
                <?= $kode ?>
            </span>

            <!-- Badge Diskon di Kiri Atas -->
            <?php if ($item["diskon"] > 0): ?>
                <span class="absolute top-3.5 left-3.5 bg-gradient-to-r from-rose-600 to-red-500 text-white text-xs font-extrabold px-3 py-1 rounded-full shadow-sm">
                    Hemat <?= $item["diskon"] ?>%
                </span>
            <?php endif; ?>
        </div>

        <!-- Isi Kartu -->
        <div class="p-5 flex flex-col flex-1">
            <div class="flex items-center justify-between gap-2 mb-2">
                <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-50 px-2.5 py-0.5 rounded-md">
                    <?= $item["kategori"] ?>
                </span>
                <span class="text-xs font-bold px-2.5 py-1 rounded-full <?= warnaStok($item["stok"]) ?>">
                    <?= labelStok($item["stok"]) ?>
                </span>
            </div>

            <h2 class="font-bold text-lg text-slate-900 mb-3 group-hover:text-orange-600 transition-colors">
                <?= $item["nama"] ?>
            </h2>

            <div class="mt-auto pt-3 border-t border-slate-100 flex items-baseline justify-between">
                <div>
                    <span class="block text-xs text-slate-400">Harga Porsi</span>
                    <span class="text-xl font-extrabold text-slate-900"><?= formatRupiah($hargaAkhir) ?></span>
                </div>
                <?php if ($item["diskon"] > 0): ?>
                    <span class="text-sm font-medium text-slate-400 line-through">
                        <?= formatRupiah($item["harga"]) ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </article>
<?php endforeach; ?>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>