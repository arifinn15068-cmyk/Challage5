<?php
// Variabel $judulHalaman dan $halamanAktif diisi oleh halaman yang memanggil header ini.
$judulHalaman = $judulHalaman ?? "Beranda";
$halamanAktif = $halamanAktif ?? "";

// Daftar menu navigasi: nama file => teks menu
$menu = [
    "index.php"   => "Katalog Menu",
    "pesanan.php" => "Nota Pesanan",
    "tentang.php" => "Tentang Kami",
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judulHalaman ?> — <?= $namaToko ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col selection:bg-orange-500 selection:text-white">

<header class="sticky top-0 z-30 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3.5 flex flex-wrap items-center justify-between gap-4">
        <a href="index.php" class="flex items-center gap-3 group">
            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center text-xl shadow-md shadow-orange-500/20 group-hover:scale-105 transition">
                🍽️
            </span>
            <div>
                <span class="block text-lg font-extrabold tracking-tight text-slate-900"><?= $namaToko ?></span>
                <span class="block text-xs font-medium text-slate-500">Oleh <?= $pemilikToko ?></span>
            </div>
        </a>

        <nav class="flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-xl border border-slate-200/60 text-sm font-semibold">
            <?php foreach ($menu as $file => $teks): ?>
                <?php $kelas = ($file === $halamanAktif)
                    ? "bg-gradient-to-r from-orange-600 to-amber-600 text-white shadow-sm"
                    : "text-slate-600 hover:text-slate-900 hover:bg-white/70"; ?>
                <a href="<?= $file ?>" class="px-4 py-2 rounded-lg transition-all duration-200 <?= $kelas ?>"><?= $teks ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 sm:px-6 py-8 w-full flex-1">