<?php
// =========================================================
// HALAMAN TENTANG TOKO (MODERN UI - Tantangan 5)
// =========================================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Tentang Kami";
$halamanAktif = "tentang.php";

require __DIR__ . '/includes/header.php';
?>

<!-- Banner Profil -->
<div class="bg-white rounded-3xl border border-slate-200/80 p-8 sm:p-10 shadow-xs mb-8">
    <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
        Profil Usaha Kuliner
    </span>
    <h1 class="text-3xl font-extrabold text-slate-900 mt-3 mb-3">Tentang <?= $namaToko ?></h1>
    <p class="text-slate-600 text-base leading-relaxed max-w-3xl">
        <?= $profilToko["deskripsi"] ?>
    </p>
</div>

<div class="grid md:grid-cols-2 gap-6">
    <!-- Kartu Informasi Utama -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8">
        <h2 class="text-xl font-extrabold text-slate-900 mb-5 flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-base">📍</span>
            Informasi Rumah Makan
        </h2>
        <div class="space-y-4 text-sm">
            <div class="flex justify-between py-2.5 border-b border-slate-100">
                <span class="text-slate-500">Nama Usaha</span>
                <span class="font-bold text-slate-900"><?= $namaToko ?></span>
            </div>
            <div class="flex justify-between py-2.5 border-b border-slate-100">
                <span class="text-slate-500">Pemilik Usaha</span>
                <span class="font-bold text-orange-600"><?= $profilToko["pemilik"] ?></span>
            </div>
            <div class="flex justify-between py-2.5 border-b border-slate-100">
                <span class="text-slate-500">Alamat Lokasi</span>
                <span class="font-semibold text-slate-800 text-right"><?= $profilToko["alamat"] ?></span>
            </div>
            <div class="flex justify-between py-2.5 border-b border-slate-100">
                <span class="text-slate-500">Jam Operasional</span>
                <span class="font-semibold text-emerald-700"><?= $profilToko["jamBuka"] ?></span>
            </div>
            <div class="flex justify-between py-2.5">
                <span class="text-slate-500">Kontak Reservasi</span>
                <span class="font-bold text-slate-900"><?= $profilToko["telepon"] ?></span>
            </div>
        </div>
    </div>

    <!-- Kartu Layanan -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-8">
        <h2 class="text-xl font-extrabold text-slate-900 mb-5 flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-base">⭐</span>
            Layanan Unggulan Kami
        </h2>
        <ul class="space-y-3.5">
            <?php foreach ($profilToko["layanan"] as $layanan): ?>
                <li class="flex items-start gap-3 bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                    <span class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</span>
                    <span class="text-sm font-medium text-slate-700"><?= $layanan ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>