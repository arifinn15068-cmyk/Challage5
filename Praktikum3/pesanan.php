<?php
// =========================================================
// HALAMAN NOTA PESANAN (MODERN UI) - RUMAH MAKAN ARIF
// =========================================================
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/fungsi.php';

$judulHalaman = "Nota Pesanan";
$halamanAktif = "pesanan.php";

$totalBelanja = 0;
$totalBarang  = 0;

foreach ($pesanan as $kode => $jumlah) {
    $hargaAkhir    = hargaSetelahDiskon($produk[$kode]["harga"], $produk[$kode]["diskon"]);
    $totalBelanja += $hargaAkhir * $jumlah;
    $totalBarang  += $jumlah;
}

$potongan   = diskonBelanja($totalBelanja);
$totalBayar = $totalBelanja - $potongan;

require __DIR__ . '/includes/header.php';
?>

<div class="max-w-3xl mx-auto">
    <!-- Header Nota -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
                Struk Resmi
            </span>
            <h1 class="text-3xl font-extrabold text-slate-900 mt-2">Nota Pesanan Pelanggan</h1>
            <p class="text-sm text-slate-500"><?= $namaToko ?> · Kasir: <?= $pemilikToko ?></p>
        </div>
        <div class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-4 py-2 rounded-xl text-sm font-bold">
            Status: Lunas / Siap Disajikan
        </div>
    </div>

    <!-- Kartu Tabel & Ringkasan Pembayaran -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-slate-100 text-xs font-bold uppercase tracking-wider text-slate-400">
                            <th class="py-3.5 pr-3">No</th>
                            <th class="py-3.5">Hidangan</th>
                            <th class="py-3.5 text-right">Harga Akhir</th>
                            <th class="py-3.5 text-center">Qty</th>
                            <th class="py-3.5 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                    <?php $no = 1; ?>
                    <?php foreach ($pesanan as $kode => $jumlah): ?>
                        <?php
                        $item       = $produk[$kode];
                        $hargaAkhir = hargaSetelahDiskon($item["harga"], $item["diskon"]);
                        ?>
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 pr-3 font-semibold text-slate-400"><?= $no++ ?></td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-xl shrink-0">
                                        <?= $item["ikon"] ?>
                                    </span>
                                    <div>
                                        <p class="font-bold text-slate-900"><?= $item["nama"] ?></p>
                                        <p class="text-xs text-slate-400"><?= $kode ?> · <?= $item["kategori"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 text-right font-medium text-slate-700"><?= formatRupiah($hargaAkhir) ?></td>
                            <td class="py-4 text-center">
                                <span class="inline-block bg-slate-100 text-slate-800 font-bold px-3 py-1 rounded-lg">
                                    <?= $jumlah ?>
                                </span>
                            </td>
                            <td class="py-4 text-right font-bold text-slate-900"><?= formatRupiah($hargaAkhir * $jumlah) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bagian Bawah Nota -->
        <div class="bg-slate-50 border-t border-slate-200/80 p-6 sm:p-8 space-y-3">
            <div class="flex justify-between text-sm text-slate-600">
                <span>Total Porsi / Item</span>
                <span class="font-bold text-slate-900"><?= $totalBarang ?> item</span>
            </div>
            <div class="flex justify-between text-sm text-slate-600">
                <span>Subtotal Belanja</span>
                <span class="font-bold text-slate-900"><?= formatRupiah($totalBelanja) ?></span>
            </div>
            <div class="flex justify-between text-sm text-rose-600 font-semibold">
                <span>Diskon Belanja (Promo Resto)</span>
                <span>- <?= formatRupiah($potongan) ?></span>
            </div>
            <div class="border-t border-slate-200 pt-4 mt-2 flex items-center justify-between">
                <span class="text-base font-extrabold text-slate-900">Total Pembayaran</span>
                <span class="text-2xl font-extrabold text-orange-600"><?= formatRupiah($totalBayar) ?></span>
            </div>

            <?php if ($potongan === 0): ?>
                <div class="mt-4 bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold px-4 py-3 rounded-xl">
                    💡 Info Promo: Belanja minimal <?= formatRupiah(200000) ?> otomatis hemat 10%, dan minimal <?= formatRupiah(500000) ?> hemat 15%!
                </div>
            <?php else: ?>
                <div class="mt-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold px-4 py-3 rounded-xl">
                    🎉 Selamat! Pesanan ini mendapatkan potongan harga otomatis sebesar <?= formatRupiah($potongan) ?>.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>