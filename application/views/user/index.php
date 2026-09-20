<div id="layoutSidenav_content">
    <main class="bg-slate-50 min-h-screen">

        <!-- HERO SECTION -->
        <section class="relative overflow-hidden bg-gradient-to-br from-indigo-100 via-violet-50 to-purple-100">

            <!-- Background -->
            <div class="absolute inset-0 bg-gradient-to-br 
            from-indigo-100 via-violet-50 to-violet-100"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">

                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- Hero Text -->
                    <div>

                        <div class="inline-flex items-center gap-2 px-3 py-1.5
                                    rounded-full bg-indigo-50 border border-indigo-100
                                    text-indigo-600 text-sm font-semibold mb-5">

                            <span class="w-2 h-2 rounded-full bg-indigo-600"></span>

                            Sistem Pendukung Keputusan

                        </div>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl
                                   font-bold tracking-tight text-slate-900
                                   leading-tight mb-6">

                            Temukan Laptop
                            <span class="text-transparent bg-clip-text
                                         bg-gradient-to-r from-indigo-600
                                         to-violet-600">

                                Sesuai Kebutuhan Anda

                            </span>

                        </h1>

                        <p class="text-lg text-slate-600 leading-8 max-w-xl mb-8">

                            TriVirexa membantu Anda memilih laptop berdasarkan
                            kebutuhan dan kriteria yang dipertimbangkan
                            menggunakan metode
                            <strong class="text-slate-800">
                                Simple Additive Weighting (SAW)
                            </strong>.

                        </p>

                        <div class="flex flex-col sm:flex-row gap-3">

                            <a href="<?= base_url('cari_rekomendasi'); ?>"
                                class="inline-flex items-center justify-center gap-2
                                       px-6 py-3.5 rounded-xl
                                       bg-gradient-to-r from-indigo-600 to-violet-600
                                       text-white font-semibold
                                       shadow-lg shadow-indigo-200
                                       hover:from-indigo-700 hover:to-violet-700
                                       transition">

                                Mulai Cari Rekomendasi

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />

                                </svg>

                            </a>

                            <a href="<?= base_url('daftar_laptop'); ?>"
                                class="inline-flex items-center justify-center
                                       px-6 py-3.5 rounded-xl
                                       bg-white border border-slate-200
                                       text-slate-700 font-semibold
                                       hover:bg-slate-50 hover:border-indigo-200
                                       transition">

                                Lihat Daftar Laptop

                            </a>

                        </div>

                    </div>


                    <!-- Hero Visual -->
                    <div class="relative">

                        <div class="bg-white rounded-3xl border border-slate-200
                                    shadow-xl shadow-slate-200/60 p-6">

                            <div class="flex items-center justify-between mb-5">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Hasil Perangkingan
                                    </p>

                                    <h3 class="text-xl font-bold text-slate-900">
                                        Top 5 Rekomendasi
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl
                                            bg-indigo-50 flex items-center justify-center">

                                    <svg class="w-6 h-6 text-indigo-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4M7 20h10a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                    </svg>

                                </div>

                            </div>

                            <p class="text-sm text-slate-500 mb-5">
                                Menampilkan 5 laptop dengan nilai akhir SAW tertinggi.
                            </p>


                            <!-- Ranking 1 -->
                            <div class="flex items-center gap-3 p-3.5
                                        rounded-xl bg-indigo-50 border border-indigo-100 mb-2.5">

                                <div class="w-9 h-9 rounded-lg
                                            bg-indigo-600 text-white
                                            flex items-center justify-center
                                            font-bold text-sm">

                                    1

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        Laptop Rekomendasi
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Nilai akhir SAW
                                    </p>

                                </div>

                                <span class="font-bold text-indigo-600">
                                    0.92
                                </span>

                            </div>


                            <!-- Ranking 2 -->
                            <div class="flex items-center gap-3 p-3.5
                                        rounded-xl border border-slate-100 mb-2.5">

                                <div class="w-9 h-9 rounded-lg
                                            bg-violet-100 text-violet-600
                                            flex items-center justify-center
                                            font-bold text-sm">

                                    2

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        Laptop Pilihan
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Nilai akhir SAW
                                    </p>

                                </div>

                                <span class="font-bold text-violet-600">
                                    0.87
                                </span>

                            </div>


                            <!-- Ranking 3 -->
                            <div class="flex items-center gap-3 p-3.5
                                        rounded-xl border border-slate-100 mb-2.5">

                                <div class="w-9 h-9 rounded-lg
                                            bg-slate-100 text-slate-600
                                            flex items-center justify-center
                                            font-bold text-sm">

                                    3

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        Laptop Pilihan
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Nilai akhir SAW
                                    </p>

                                </div>

                                <span class="font-bold text-slate-600">
                                    0.81
                                </span>

                            </div>


                            <!-- Ranking 4 -->
                            <div class="flex items-center gap-3 p-3.5
                                        rounded-xl border border-slate-100 mb-2.5">

                                <div class="w-9 h-9 rounded-lg
                                            bg-slate-100 text-slate-600
                                            flex items-center justify-center
                                            font-bold text-sm">

                                    4

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        Laptop Pilihan
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Nilai akhir SAW
                                    </p>

                                </div>

                                <span class="font-bold text-slate-600">
                                    0.78
                                </span>

                            </div>


                            <!-- Ranking 5 -->
                            <div class="flex items-center gap-3 p-3.5
                                        rounded-xl border border-slate-100">

                                <div class="w-9 h-9 rounded-lg
                                            bg-slate-100 text-slate-600
                                            flex items-center justify-center
                                            font-bold text-sm">

                                    5

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-semibold text-slate-900 truncate">
                                        Laptop Pilihan
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Nilai akhir SAW
                                    </p>

                                </div>

                                <span class="font-bold text-slate-600">
                                    0.75
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- SISTEM INFO -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-12">

                <p class="text-sm font-bold uppercase tracking-wider
                          text-indigo-600 mb-2">

                    Tentang Sistem

                </p>

                <h2 class="text-3xl font-bold text-slate-900 mb-4">

                    Membantu proses pemilihan laptop

                </h2>

                <p class="text-slate-600 leading-7">

                    TriVirexa menggunakan beberapa kriteria untuk membantu
                    pengguna memperoleh rekomendasi berdasarkan kebutuhan
                    yang dipilih.

                </p>

            </div>


            <div class="grid md:grid-cols-3 gap-6">

                <!-- Card 1 -->
                <div class="bg-white rounded-2xl border border-slate-200
                            p-6 hover:shadow-lg hover:shadow-indigo-100
                            transition">

                    <div class="w-12 h-12 rounded-xl bg-indigo-50
                                flex items-center justify-center mb-5">

                        <svg class="w-6 h-6 text-indigo-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 17h6M7 20h10M8 4h8a2 2 0 012 2v10H6V6a2 2 0 012-2z" />

                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2">
                        Berbasis Kriteria
                    </h3>

                    <p class="text-sm text-slate-600 leading-6">

                        Pemilihan laptop mempertimbangkan harga,
                        processor, RAM, SSD, kapasitas baterai, dan berat.

                    </p>

                </div>


                <!-- Card 2 -->
                <div class="bg-white rounded-2xl border border-slate-200
                            p-6 hover:shadow-lg hover:shadow-violet-100
                            transition">

                    <div class="w-12 h-12 rounded-xl bg-violet-50
                                flex items-center justify-center mb-5">

                        <svg class="w-6 h-6 text-violet-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 7h6M9 11h6M9 15h4M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />

                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2">
                        Metode SAW
                    </h3>

                    <p class="text-sm text-slate-600 leading-6">

                        Sistem melakukan normalisasi, pembobotan,
                        dan perhitungan nilai akhir untuk setiap alternatif.

                    </p>

                </div>


                <!-- Card 3 -->
                <div class="bg-white rounded-2xl border border-slate-200
                            p-6 hover:shadow-lg hover:shadow-indigo-100
                            transition">

                    <div class="w-12 h-12 rounded-xl bg-indigo-50
                                flex items-center justify-center mb-5">

                        <svg class="w-6 h-6 text-indigo-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 17l4 4 4-4M12 3v18M4 7h16" />

                        </svg>

                    </div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2">
                        Hasil Perangkingan
                    </h3>

                    <p class="text-sm text-slate-600 leading-6">

                        Sistem menampilkan alternatif laptop berdasarkan
                        nilai akhir hasil perhitungan SAW.

                    </p>

                </div>

            </div>

        </section>


        <!-- KRITERIA -->
        <section class="bg-white border-y border-slate-200">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <div>

                        <p class="text-sm font-bold uppercase tracking-wider
                                  text-violet-600 mb-2">

                            Kriteria Penilaian

                        </p>

                        <h2 class="text-3xl font-bold text-slate-900 mb-4">

                            Apa saja yang dipertimbangkan?

                        </h2>

                        <p class="text-slate-600 leading-7 mb-6">

                            Sistem menggunakan beberapa kriteria sebagai
                            dasar dalam proses pengambilan keputusan.

                        </p>

                        <a href="<?= base_url('daftar_laptop'); ?>"
                            class="inline-flex items-center gap-2
                                   text-indigo-600 font-semibold
                                   hover:text-violet-600 transition">

                            Lihat Daftar Laptop

                            <span>→</span>

                        </a>

                    </div>


                    <div class="grid sm:grid-cols-2 gap-4">

                        <?php
                        $criteria = [
                            ['Harga', 'C1', 'Cost'],
                            ['Processor', 'C2', 'Benefit'],
                            ['RAM', 'C3', 'Benefit'],
                            ['SSD', 'C4', 'Benefit'],
                            ['Baterai', 'C5', 'Benefit'],
                            ['Berat', 'C6', 'Cost']
                        ];
                        ?>

                        <?php foreach ($criteria as $item): ?>

                            <div class="flex items-center gap-4
                                        p-4 rounded-xl bg-slate-50
                                        border border-slate-100">

                                <div class="w-10 h-10 rounded-lg
                                            bg-indigo-100 text-indigo-600
                                            flex items-center justify-center
                                            text-xs font-bold">

                                    <?= $item[1] ?>

                                </div>

                                <div>

                                    <h3 class="font-semibold text-slate-900">
                                        <?= $item[0] ?>
                                    </h3>

                                    <p class="text-xs text-slate-500">
                                        <?= $item[2] ?>
                                    </p>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        </section>


        <!-- CARA KERJA SAW -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center max-w-2xl mx-auto mb-12">

                <p class="text-sm font-bold uppercase tracking-wider
                          text-indigo-600 mb-2">

                    Proses Rekomendasi

                </p>

                <h2 class="text-3xl font-bold text-slate-900 mb-4">

                    Bagaimana metode SAW bekerja?

                </h2>

                <p class="text-slate-600 leading-7">

                    Proses rekomendasi dilakukan melalui beberapa tahapan
                    berdasarkan data dan bobot kriteria.

                </p>

            </div>


            <div class="grid md:grid-cols-4 gap-6">

                <?php
                $steps = [
                    ['01', 'Pilih Kebutuhan', 'Tentukan preferensi pada setiap kriteria.'],
                    ['02', 'Normalisasi', 'Nilai alternatif dinormalisasi sesuai jenis kriteria.'],
                    ['03', 'Pembobotan', 'Nilai normalisasi dikalikan dengan bobot kriteria.'],
                    ['04', 'Perangkingan', 'Nilai akhir digunakan untuk menentukan urutan alternatif.']
                ];
                ?>

                <?php foreach ($steps as $step): ?>

                    <div class="relative bg-white border border-slate-200
                                rounded-2xl p-6">

                        <span class="text-4xl font-bold text-indigo-100">
                            <?= $step[0] ?>
                        </span>

                        <h3 class="text-lg font-bold text-slate-900 mt-3 mb-2">
                            <?= $step[1] ?>
                        </h3>

                        <p class="text-sm text-slate-600 leading-6">
                            <?= $step[2] ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>


        <!-- CTA -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">

            <div class="relative overflow-hidden rounded-3xl
                        bg-gradient-to-r from-indigo-600 to-violet-600
                        px-6 py-12 sm:px-12 text-center">

                <div class="relative">

                    <h2 class="text-3xl font-bold text-white mb-4">

                        Siap mencari laptop sesuai kebutuhan?

                    </h2>

                    <p class="text-indigo-100 max-w-2xl mx-auto mb-7">

                        Tentukan kebutuhan Anda dan biarkan sistem membantu
                        melakukan proses perhitungan berdasarkan metode SAW.

                    </p>

                    <a href="<?= base_url('rekomendasi'); ?>"
                        class="inline-flex items-center gap-2
                               px-6 py-3.5 rounded-xl
                               bg-white text-indigo-600
                               font-bold shadow-lg
                               hover:bg-indigo-50 transition">

                        Mulai Cari Rekomendasi

                        <svg class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />

                        </svg>

                    </a>

                </div>

            </div>

        </section>

    </main>
</div>