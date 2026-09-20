<?php $filter = $this->session->userdata('filter_laptop'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

            <!-- HEADER -->
            <div class="mx-auto max-w-4xl text-center mb-8">
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
                    Cari Rekomendasi Laptop
                </h2>

                <p class="mt-2 text-slate-500">
                    Pilih kebutuhan laptop Anda untuk mendapatkan rekomendasi terbaik sesuai preferensi.
                </p>
            </div>

            <!-- FORM REKOMENDASI -->
            <div class="mx-auto max-w-4xl">

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    <!-- CARD HEADER -->
                    <div class="bg-gradient-to-r from-indigo-600 to-violet-600 px-6 py-5 sm:px-8">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-white/20">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-white">
                                    Tentukan Preferensi Anda
                                </h3>
                                <p class="text-sm text-indigo-100">
                                    Pilih kriteria laptop sesuai kebutuhan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8">

                        <form action="<?= base_url('cari_rekomendasi/hasil'); ?>" method="post">

                            <!-- BUDGET / HARGA -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    1. Berapa harga laptop yang Anda inginkan?
                                </label>

                                <select name="harga"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition"
                                    required>

                                    <option value="">-- Pilih Budget --</option>

                                    <option value="5"
                                        <?= (($filter['harga'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        &lt; Rp 4.579.800
                                    </option>

                                    <option value="4"
                                        <?= (($filter['harga'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        Rp 4.579.801 - Rp 6.109.600
                                    </option>

                                    <option value="3"
                                        <?= (($filter['harga'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        Rp 6.109.601 - Rp 7.639.400
                                    </option>

                                    <option value="2"
                                        <?= (($filter['harga'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        Rp 7.639.401 - Rp 9.169.200
                                    </option>

                                    <option value="1"
                                        <?= (($filter['harga'] ?? '') == 1) ? 'selected' : ''; ?>>
                                        &gt; Rp 9.169.200
                                    </option>

                                </select>
                            </div>


                            <!-- PROCESSOR -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    2. Tingkat preferensi processor yang Anda inginkan
                                </label>

                                <select name="processor"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition"
                                    required>

                                    <option value="">-- Pilih Processor --</option>

                                    <option value="1"
                                        <?= (($filter['processor'] ?? '') == 1) ? 'selected' : ''; ?>>
                                        Intel Celeron / AMD Athlon
                                    </option>

                                    <option value="2"
                                        <?= (($filter['processor'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        AMD Ryzen 3
                                    </option>

                                    <option value="3"
                                        <?= (($filter['processor'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        Intel Core i3
                                    </option>

                                    <option value="4"
                                        <?= (($filter['processor'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        Intel Core i5 / AMD Ryzen 5
                                    </option>

                                    <option value="5"
                                        <?= (($filter['processor'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        Intel Core i7 / AMD Ryzen 7
                                    </option>

                                </select>
                            </div>


                            <!-- RAM -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    3. Preferensi kapasitas RAM yang Anda inginkan
                                </label>

                                <select name="ram"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition"
                                    required>

                                    <option value="">-- Pilih RAM --</option>

                                    <option value="1"
                                        <?= (($filter['ram'] ?? '') == 1) ? 'selected' : ''; ?>>
                                        ≤ 4 GB
                                    </option>

                                    <option value="2"
                                        <?= (($filter['ram'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        8 GB
                                    </option>

                                    <option value="3"
                                        <?= (($filter['ram'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        12 GB
                                    </option>

                                    <option value="4"
                                        <?= (($filter['ram'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        16 GB
                                    </option>

                                    <option value="5"
                                        <?= (($filter['ram'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        ≥ 32 GB
                                    </option>

                                </select>
                            </div>


                            <!-- SSD -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    4. Preferensi kapasitas SSD yang Anda inginkan
                                </label>

                                <select name="ssd"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition"
                                    required>

                                    <option value="">-- Pilih SSD --</option>

                                    <option value="1"
                                        <?= (($filter['ssd'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        ≤ 64 GB
                                    </option>

                                    <option value="2"
                                        <?= (($filter['ssd'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        128 GB
                                    </option>

                                    <option value="3"
                                        <?= (($filter['ssd'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        256 GB
                                    </option>

                                    <option value="4"
                                        <?= (($filter['ssd'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        512 GB
                                    </option>

                                    <option value="5"
                                        <?= (($filter['ssd'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        ≥ 1 TB
                                    </option>

                                </select>
                            </div>


                            <!-- BERAT -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    5. Bobot laptop yang Anda preferensikan
                                </label>

                                <select name="berat"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition">

                                    <option value="">-- Pilih Berat --</option>

                                    <option value="5"
                                        <?= (($filter['berat'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        ≤ 1,42 Kg (Sangat Ringan)
                                    </option>

                                    <option value="4"
                                        <?= (($filter['berat'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        1,43 - 1,76 Kg
                                    </option>

                                    <option value="3"
                                        <?= (($filter['berat'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        1,77 - 2,09 Kg
                                    </option>

                                    <option value="2"
                                        <?= (($filter['berat'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        2,10 - 2,43 Kg
                                    </option>

                                    <option value="1"
                                        <?= (($filter['berat'] ?? '') == 1) ? 'selected' : ''; ?>>
                                        &gt; 2,43 Kg
                                    </option>

                                </select>
                            </div>


                            <!-- BATERAI -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-slate-800 mb-2">
                                    6. Kapasitas baterai yang Anda preferensikan
                                </label>

                                <select name="baterai"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700
                                           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 focus:outline-none
                                           transition">

                                    <option value="" hidden>-- Pilih Baterai --</option>

                                    <option value="1"
                                        <?= (($filter['baterai'] ?? '') == 1) ? 'selected' : ''; ?>>
                                        ≤ 42,4 Wh
                                    </option>

                                    <option value="2"
                                        <?= (($filter['baterai'] ?? '') == 2) ? 'selected' : ''; ?>>
                                        42,5 - 49,8 Wh
                                    </option>

                                    <option value="3"
                                        <?= (($filter['baterai'] ?? '') == 3) ? 'selected' : ''; ?>>
                                        49,9 - 57,2 Wh
                                    </option>

                                    <option value="4"
                                        <?= (($filter['baterai'] ?? '') == 4) ? 'selected' : ''; ?>>
                                        57,3 - 64,6 Wh
                                    </option>

                                    <option value="5"
                                        <?= (($filter['baterai'] ?? '') == 5) ? 'selected' : ''; ?>>
                                        &gt; 64,6 Wh
                                    </option>

                                </select>
                            </div>


                            <!-- CATATAN -->
                            <div class="mt-6 rounded-xl border border-indigo-100 bg-indigo-50 p-4">
                                <div class="flex gap-3">
                                    <div class="flex-shrink-0 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 text-indigo-600"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                        </svg>
                                    </div>

                                    <p class="text-sm leading-6 text-slate-600">
                                        <strong class="text-slate-800">Catatan:</strong>
                                        Harga digunakan sebagai batasan pencarian laptop.
                                        Sementara processor, RAM, SSD, berat, dan baterai digunakan dalam proses
                                        perhitungan metode SAW untuk menentukan rekomendasi terbaik.
                                    </p>
                                </div>
                            </div>


                            <!-- BUTTON -->
                            <div class="text-center mt-8">
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-2
                                           rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600
                                           px-8 py-3.5 text-sm font-bold text-white
                                           shadow-lg shadow-indigo-200
                                           hover:from-indigo-700 hover:to-violet-700
                                           hover:shadow-xl hover:-translate-y-0.5
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                           transition-all duration-200">

                                    Tampilkan Rekomendasi

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>

                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </main>
</div>