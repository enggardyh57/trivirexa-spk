<div id="layoutSidenav_content">
    <main>
        <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

            <!-- HEADER -->
            <div class="mx-auto max-w-6xl text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 shadow-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.75 17L8 20h8l-1.75-3M4 5h16v10H4V5z" />
                    </svg>
                </div>

                <h2 class="text-2xl sm:text-3xl font-bold text-slate-900">
                    Hasil Rekomendasi Laptop
                </h2>

                <p class="mt-2 text-slate-500">
                    Berikut adalah rekomendasi laptop terbaik berdasarkan kebutuhan yang Anda pilih.
                </p>
            </div>


            <?php if (empty($hasil)) : ?>

                <!-- EMPTY RESULT -->
                <div class="mx-auto max-w-3xl">
                    <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6 text-center">
                        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-amber-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 text-amber-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14a2 2 0 001.71 2.14h16.36a2 2 0 001.71-2.14l-8.18-14a2 2 0 00-3.42 0z" />
                            </svg>
                        </div>

                        <h3 class="font-bold text-amber-900">
                            Laptop Tidak Ditemukan
                        </h3>

                        <p class="mt-1 text-sm text-amber-700">
                            Laptop tidak ditemukan sesuai kriteria yang dipilih.
                        </p>
                    </div>
                </div>

            <?php else : ?>

                <?php $ranking = 1; ?>

                <div class="mx-auto max-w-6xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <?php foreach ($hasil as $h) : ?>

                        <?php $current_rank = $ranking; // simpan ranking SEBELUM increment ?>

                        <!-- CARD LAPTOP -->
                        <div class="group h-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm
                                    hover:-translate-y-1 hover:shadow-xl transition-all duration-200">

                            <!-- IMAGE -->
                            <div class="relative overflow-hidden">
                                <img src="<?= base_url('assets/img/laptop/' . $h['gambar']); ?>"
                                    class="h-56 w-full object-cover group-hover:scale-105 transition-transform duration-300">

                                <!-- RANKING -->
                                <span class="absolute right-3 top-3 inline-flex items-center gap-1.5
                                             rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600
                                             px-3 py-2 text-xs font-bold text-white shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>

                                    Ranking #<?= $ranking++; ?>
                                </span>
                            </div>


                            <!-- CARD BODY -->
                            <div class="p-5 flex flex-col h-[calc(100%-14rem)]">

                                <h5 class="text-lg font-bold text-slate-900 mb-3 line-clamp-2">
                                    <?= $h['nama_laptop']; ?>
                                </h5>

                                <div class="mb-5">
                                    <div class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                                        <span class="text-sm text-slate-500">
                                            Harga
                                        </span>

                                        <span class="text-sm font-bold text-slate-800">
                                            Rp <?= number_format($h['harga'], 0, ',', '.'); ?>
                                        </span>
                                    </div>
                                </div>


                                <!-- SCORE -->
                                <div class="flex items-center justify-between mt-auto mb-4">
                                    <span class="text-sm font-medium text-slate-500">
                                        Nilai Akhir
                                    </span>

                                    <span class="text-xl font-bold text-indigo-600">
                                        <?= number_format($h['nilai_akhir'], 2); ?>
                                    </span>
                                </div>


                                <!-- BUTTON -->
                                <div class="grid grid-cols-2 gap-2">

                                    <button type="button"
                                        onclick="openLaptopModal('detailLaptop<?= md5($h['nama_laptop']); ?>')"
                                        class="inline-flex items-center justify-center gap-1.5 rounded-xl
                                               border border-indigo-200 bg-indigo-50
                                               px-3 py-2.5 text-sm font-semibold text-indigo-600
                                               hover:bg-indigo-100 transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.46 12C3.73 7.94 7.52 5 12 5s8.27 2.94 9.54 7c-1.27 4.06-5.06 7-9.54 7s-8.27-2.94-9.54-7z" />
                                        </svg>

                                        Detail
                                    </button>


                                    <button type="button"
                                        onclick="openLaptopModal('perhitungan<?= md5($h['nama_laptop']); ?>')"
                                        class="inline-flex items-center justify-center gap-1.5 rounded-xl
                                               bg-gradient-to-r from-indigo-600 to-violet-600
                                               px-3 py-2.5 text-sm font-semibold text-white
                                               shadow-sm hover:from-indigo-700 hover:to-violet-700
                                               transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 7h6m-6 4h6m-6 4h3m-7 5h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>

                                        Perhitungan SAW
                                    </button>

                                </div>

                            </div>
                        </div>


                        <!-- ================================================= -->
                        <!-- MODAL DETAIL LAPTOP -->
                        <!-- ================================================= -->

                        <div id="detailLaptop<?= md5($h['nama_laptop']); ?>"
                            class="hidden fixed inset-0 z-50 overflow-y-auto">

                            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"
                                onclick="closeLaptopModal('detailLaptop<?= md5($h['nama_laptop']); ?>')">
                            </div>

                            <div class="relative flex min-h-full items-center justify-center p-4">

                                <div class="relative w-full max-w-4xl rounded-2xl bg-white shadow-2xl">

                                    <!-- MODAL HEADER -->
                                    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">

                                        <h5 class="text-lg font-bold text-slate-900">
                                            <?= $h['nama_laptop']; ?>
                                        </h5>

                                        <button type="button"
                                            onclick="closeLaptopModal('detailLaptop<?= md5($h['nama_laptop']); ?>')"
                                            class="flex h-9 w-9 items-center justify-center rounded-lg
                                                   text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </button>
                                    </div>


                                    <!-- MODAL BODY -->
                                    <div class="p-6">

                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

                                            <div class="md:col-span-2">
                                                <img src="<?= base_url('assets/img/laptop/' . $h['gambar']); ?>"
                                                    class="h-64 w-full rounded-2xl object-cover shadow-sm">
                                            </div>


                                            <div class="md:col-span-3">

                                                <div class="divide-y divide-slate-100 rounded-xl border border-slate-200">

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">Harga</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            Rp <?= number_format($h['harga'], 0, ',', '.'); ?>
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">Processor</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            <?= $h['processor']; ?>
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">RAM</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            <?= $h['ram']; ?> GB
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">SSD</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            <?= $h['ssd']; ?> GB
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">Baterai</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            <?= $h['baterai']; ?> Wh
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3">
                                                        <span class="font-medium text-slate-500">Berat</span>
                                                        <span class="text-right font-semibold text-slate-800">
                                                            <?= $h['berat']; ?> Kg
                                                        </span>
                                                    </div>

                                                    <div class="flex justify-between gap-4 px-4 py-3 bg-indigo-50">
                                                        <span class="font-bold text-indigo-700">
                                                            Nilai Akhir SAW
                                                        </span>

                                                        <span class="font-bold text-indigo-700">
                                                            <?= number_format($h['nilai_akhir'], 2); ?>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <?php
                                            // Hitung kriteria unggul & lemah berdasarkan normalisasi
                                            $kriteria_list = ['processor', 'ram', 'ssd', 'baterai'];
                                            $rata_rata = array_sum(
                                                array_intersect_key(
                                                    $h['normalisasi'],
                                                    array_flip($kriteria_list)
                                                )
                                            ) / count($kriteria_list);

                                            $unggul = [];
                                            $lemah = [];

                                            foreach ($kriteria_list as $k) {
                                                if ($h['normalisasi'][$k] >= $rata_rata) {
                                                    $unggul[] = ucfirst($k);
                                                } else {
                                                    $lemah[] = ucfirst($k);
                                                }
                                            }

                                            $bobot_tertinggi_key = array_search(
                                                max($h['bobot']),
                                                $h['bobot']
                                            );
                                        ?>


                                        <!-- KENAPA DIREKOMENDASIKAN -->
                                        <div class="mt-6 rounded-2xl border border-indigo-100 bg-gradient-to-r from-indigo-50 to-violet-50 p-5">

                                            <div class="flex items-start gap-3">

                                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-indigo-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-indigo-600"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-6.364l-.707-.707m2.828 11.314a8 8 0 1111.314 0c-.55.55-1.22.9-1.958 1.125-.34.104-.654.342-.834.66L17 20H7l-.986-1.265a2.04 2.04 0 00-.834-.66A8.001 8.001 0 016.343 16.95z" />
                                                    </svg>
                                                </div>

                                                <div>
                                                    <h6 class="font-bold text-slate-900 mb-2">
                                                        Kenapa Direkomendasikan?
                                                    </h6>

                                                    <p class="text-sm leading-6 text-slate-600">
                                                        <?= $h['nama_laptop']; ?> menempati
                                                        <b>Ranking #<?= $current_rank; ?></b>
                                                        dengan nilai akhir
                                                        <b><?= number_format($h['nilai_akhir'], 2); ?></b>.
                                                        Nilai ini paling banyak dipengaruhi oleh kriteria
                                                        <b><?= ucfirst($bobot_tertinggi_key); ?></b>,
                                                        yang memiliki bobot penilaian tertinggi dalam sistem.

                                                        <?php if (!empty($unggul)) : ?>
                                                            Laptop ini unggul pada kriteria
                                                            <b><?= implode(', ', $unggul); ?></b>
                                                        <?php endif; ?>

                                                        <?php if (!empty($lemah)) : ?>
                                                            , namun sedikit tertinggal pada kriteria
                                                            <b><?= implode(', ', $lemah); ?></b>.
                                                        <?php else : ?>
                                                            .
                                                        <?php endif; ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <!-- MODAL FOOTER -->
                                    <div class="flex justify-end border-t border-slate-200 px-6 py-4">

                                        <button
                                            onclick="closeLaptopModal('detailLaptop<?= md5($h['nama_laptop']); ?>')"
                                            class="rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-semibold text-slate-700
                                                   hover:bg-slate-200 transition">
                                            Tutup
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <!-- ================================================= -->
                        <!-- MODAL PERHITUNGAN SAW -->
                        <!-- ================================================= -->

                        <div id="perhitungan<?= md5($h['nama_laptop']); ?>"
                            class="hidden fixed inset-0 z-50 overflow-y-auto">

                            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"
                                onclick="closeLaptopModal('perhitungan<?= md5($h['nama_laptop']); ?>')">
                            </div>

                            <div class="relative flex min-h-full items-center justify-center p-4">

                                <div class="relative w-full max-w-6xl rounded-2xl bg-white shadow-2xl">

                                    <!-- HEADER -->
                                    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">

                                        <h5 class="text-lg font-bold text-indigo-600">
                                            Rincian Perhitungan SAW
                                        </h5>

                                        <button type="button"
                                            onclick="closeLaptopModal('perhitungan<?= md5($h['nama_laptop']); ?>')"
                                            class="flex h-9 w-9 items-center justify-center rounded-lg
                                                   text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </button>

                                    </div>


                                    <!-- BODY -->
                                    <div class="p-6">

                                        <h4 class="text-xl font-bold text-slate-900 mb-4">
                                            <?= $h['nama_laptop']; ?>
                                        </h4>


                                        <!-- PENJELASAN CARA BACA TABEL -->
                                        <div class="mb-6 rounded-2xl border border-indigo-100 bg-indigo-50 p-5">

                                            <div class="flex items-start gap-3">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 flex-shrink-0 mt-0.5 text-indigo-600"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                                </svg>

                                                <div class="text-sm text-slate-600 leading-6">

                                                    <strong class="text-slate-800">
                                                        Cara membaca tabel ini:
                                                    </strong>

                                                    <ul class="mt-2 list-disc pl-5 space-y-1">
                                                        <li>
                                                            <strong>Normalisasi</strong> - nilai setiap kriteria yang telah disesuaikan agar dapat dibandingkan secara adil (skala 0–1).
                                                        </li>

                                                        <li>
                                                            <strong>Bobot</strong> - tingkat kepentingan tiap kriteria dalam penilaian, ditentukan dari hasil kuesioner.
                                                        </li>

                                                        <li>
                                                            <strong>Utility</strong> - hasil perkalian antara normalisasi dan bobot, menunjukkan kontribusi tiap kriteria terhadap nilai akhir.
                                                        </li>
                                                    </ul>

                                                    <div class="mt-2">
                                                        Seluruh nilai <strong>Utility</strong> dijumlahkan menjadi
                                                        <strong>Nilai Akhir</strong>, yang digunakan untuk menentukan peringkat laptop.
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                        <!-- TABLE -->
                                        <div class="overflow-x-auto rounded-xl border border-slate-200">

                                            <table class="w-full text-sm text-left">

                                                <thead class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white">

                                                    <tr>
                                                        <th class="px-5 py-3 font-semibold">
                                                            Kriteria
                                                        </th>

                                                        <th class="px-5 py-3 font-semibold text-center">
                                                            Normalisasi
                                                        </th>

                                                        <th class="px-5 py-3 font-semibold text-center">
                                                            Bobot
                                                        </th>

                                                        <th class="px-5 py-3 font-semibold text-center">
                                                            Utility
                                                        </th>
                                                    </tr>

                                                </thead>


                                                <tbody class="divide-y divide-slate-100">

                                                    <?php foreach ($h['normalisasi'] as $key => $n) : ?>

                                                        <tr class="hover:bg-slate-50 transition">

                                                            <td class="px-5 py-3 font-medium text-slate-700 capitalize">
                                                                <?= $key; ?>
                                                            </td>

                                                            <td class="px-5 py-3 text-center text-slate-600">
                                                                <?= number_format($n, 2); ?>
                                                            </td>

                                                            <td class="px-5 py-3 text-center text-slate-600">
                                                                <?= number_format($h['bobot'][$key], 2); ?>
                                                            </td>

                                                            <td class="px-5 py-3 text-center font-semibold text-indigo-600">

                                                                <?= number_format(
                                                                    $n * $h['bobot'][$key],
                                                                    2
                                                                ); ?>

                                                            </td>

                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                                <tfoot>

                                                    <tr class="bg-indigo-50">

                                                        <th colspan="3"
                                                            class="px-5 py-4 text-right font-bold text-slate-800">
                                                            Nilai Akhir
                                                        </th>

                                                        <th class="px-5 py-4 text-center text-lg font-bold text-indigo-600">

                                                            <?= number_format(
                                                                $h['nilai_akhir'],
                                                                2
                                                            ); ?>

                                                        </th>

                                                    </tr>

                                                </tfoot>

                                            </table>

                                        </div>

                                    </div>


                                    <!-- FOOTER -->
                                    <div class="flex justify-end border-t border-slate-200 px-6 py-4">

                                        <button
                                            onclick="closeLaptopModal('perhitungan<?= md5($h['nama_laptop']); ?>')"
                                            class="rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-semibold text-slate-700
                                                   hover:bg-slate-200 transition">
                                            Tutup
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </div>


                    <?php endforeach; ?>

                </div>

            <?php endif; ?>


            <!-- CARI DENGAN KRITERIA LAIN -->
            <div class="text-center mt-10">

                <a href="<?= base_url('cari_rekomendasi'); ?>"
                    class="inline-flex items-center justify-center gap-2
                           rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600
                           px-6 py-3 text-sm font-bold text-white
                           shadow-lg shadow-indigo-200
                           hover:from-indigo-700 hover:to-violet-700
                           hover:-translate-y-0.5 hover:shadow-xl
                           transition-all duration-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>

                    Cari dengan Kriteria Lain
                </a>

            </div>

        </div>
    </main>
</div>


<!-- MODAL SCRIPT -->
<script>
    function openLaptopModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closeLaptopModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('[id^="detailLaptop"], [id^="perhitungan"]')
                .forEach(function(modal) {
                    modal.classList.add('hidden');
                });

            document.body.classList.remove('overflow-hidden');
        }
    });
</script>