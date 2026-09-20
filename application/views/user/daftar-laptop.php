<div id="layoutSidenav_content">
    <main class="bg-slate-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <!-- HEADER -->
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5 mb-8">

                <div>
                    <p class="text-sm font-bold uppercase tracking-wider text-indigo-600 mb-2">
                        Koleksi Laptop
                    </p>

                    <h2 class="text-3xl font-bold text-slate-900 mb-2">
                        Daftar Laptop
                    </h2>

                    <p class="text-slate-500">
                        Temukan laptop sesuai kebutuhan dan preferensi Anda.
                    </p>
                </div>


                <!-- SEARCH & SORT -->
                <form method="get" action=""
                    class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto">

                    <!-- SORT -->
                    <select name="sort"
                        onchange="this.form.submit()"
                        class="px-4 py-2.5 rounded-xl border border-slate-200
                               bg-white text-sm text-slate-700
                               focus:outline-none focus:ring-2
                               focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">Urutkan</option>

                        <option value="harga_terendah"
                            <?= $this->input->get('sort') == 'harga_terendah' ? 'selected' : ''; ?>>
                            Harga Terendah
                        </option>

                        <option value="harga_tertinggi"
                            <?= $this->input->get('sort') == 'harga_tertinggi' ? 'selected' : ''; ?>>
                            Harga Tertinggi
                        </option>

                    </select>


                    <!-- SEARCH -->
                    <div class="flex">

                        <input type="text"
                            name="keyword"
                            placeholder="Cari laptop..."
                            value="<?= $this->input->get('keyword'); ?>"
                            class="w-full sm:w-56 px-4 py-2.5
                                   rounded-l-xl border border-slate-200
                                   bg-white text-sm text-slate-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-indigo-500 focus:border-indigo-500">

                        <button type="submit"
                            class="px-5 py-2.5 rounded-r-xl
                                   bg-indigo-600 text-white text-sm
                                   font-semibold hover:bg-indigo-700
                                   transition">
                            Cari
                        </button>

                    </div>

                </form>

            </div>


            <!-- CARD LIST -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

                <?php foreach ($laptop as $l) : ?>

                    <!-- LAPTOP CARD -->
                    <div class="group bg-white rounded-2xl
                                border border-slate-200 overflow-hidden
                                hover:shadow-xl hover:shadow-indigo-100/60
                                hover:-translate-y-1 transition duration-300">

                        <!-- IMAGE -->
                        <div class="relative bg-slate-100 overflow-hidden">

                            <img src="<?= base_url('assets/img/laptop/' . $l['gambar']); ?>"
                                class="w-full h-52 object-cover
                                       group-hover:scale-105 transition duration-500"
                                alt="<?= $l['nama_laptop']; ?>">

                            <!-- Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-lg
                                        bg-white/90 backdrop-blur-sm
                                        text-xs font-semibold
                                        text-indigo-600 shadow-sm">
                                    <?= explode(' ', trim($l['nama_laptop']))[0]; ?>
                                </span>
                            </div>

                        </div>


                        <!-- BODY -->
                        <div class="p-5 flex flex-col">

                            <h6 class="font-bold text-slate-900 mb-3
                                       leading-6 min-h-[48px]">
                                <?= $l['nama_laptop']; ?>
                            </h6>


                            <!-- PRICE -->
                            <div class="mb-4">

                                <p class="text-xs text-slate-400 mb-1">
                                    Harga
                                </p>

                                <p class="text-lg font-bold text-indigo-600">
                                    Rp <?= number_format($l['harga'], 0, ',', '.') ?>
                                </p>

                            </div>


                            <!-- PROCESSOR -->
                            <div class="flex items-start gap-2 mb-4">

                                <div class="w-8 h-8 rounded-lg bg-violet-50
                                            flex-shrink-0 flex items-center
                                            justify-center">

                                    <svg class="w-4 h-4 text-violet-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />

                                    </svg>

                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-slate-400">
                                        Processor
                                    </p>

                                    <p class="text-sm font-semibold text-slate-700 truncate">
                                        <?= $l['processor']; ?>
                                    </p>

                                </div>

                            </div>


                            <!-- BUTTON -->
                            <button type="button"
                                onclick="openLaptopModal(<?= $l['id']; ?>)"
                                class="w-full mt-1 py-2.5 rounded-xl
                                       bg-gradient-to-r from-indigo-600
                                       to-violet-600
                                       text-white text-sm font-semibold
                                       hover:from-indigo-700
                                       hover:to-violet-700
                                       transition shadow-sm">

                                Lihat Detail

                            </button>

                        </div>

                    </div>


                    <!-- MODAL DETAIL -->
                    <div id="modalDetail<?= $l['id']; ?>"
                        class="hidden fixed inset-0 z-50 overflow-y-auto">

                        <!-- Overlay -->
                        <div onclick="closeLaptopModal(<?= $l['id']; ?>)"
                            class="fixed inset-0 bg-slate-900/60
                                   backdrop-blur-sm">
                        </div>


                        <!-- Modal Container -->
                        <div class="relative min-h-screen flex items-center
                                    justify-center p-4">

                            <div class="relative w-full max-w-3xl
                                        bg-white rounded-2xl shadow-2xl
                                        overflow-hidden">

                                <!-- HEADER -->
                                <div class="flex items-center justify-between
                                            px-6 py-5 border-b border-slate-100">

                                    <div>

                                        <p class="text-xs font-semibold
                                                  uppercase tracking-wider
                                                  text-indigo-600 mb-1">
                                            Detail Laptop
                                        </p>

                                        <h5 class="text-xl font-bold text-slate-900">
                                            <?= $l['nama_laptop']; ?>
                                        </h5>

                                    </div>

                                    <button type="button"
                                        onclick="closeLaptopModal(<?= $l['id']; ?>)"
                                        class="w-9 h-9 rounded-xl
                                               text-slate-400
                                               hover:bg-slate-100
                                               hover:text-slate-700 transition">

                                        <svg class="w-5 h-5 mx-auto"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />

                                        </svg>

                                    </button>

                                </div>


                                <!-- BODY -->
                                <div class="p-6">

                                    <div class="grid md:grid-cols-2 gap-7
                                                items-center">

                                        <!-- GAMBAR -->
                                        <div class="bg-slate-50 rounded-2xl p-3">

                                            <img src="<?= base_url('assets/img/laptop/' . $l['gambar']); ?>"
                                                class="w-full h-64 object-cover rounded-xl"
                                                alt="<?= $l['nama_laptop']; ?>">

                                        </div>


                                        <!-- DETAIL -->
                                        <div>

                                            <div class="mb-5">

                                                <p class="text-sm text-slate-400 mb-1">
                                                    Harga
                                                </p>

                                                <p class="text-2xl font-bold
                                                          text-indigo-600">
                                                    Rp <?= number_format($l['harga'], 0, ',', '.') ?>
                                                </p>

                                            </div>


                                            <div class="grid grid-cols-2 gap-3">

                                                <!-- Processor -->
                                                <div class="p-3 rounded-xl
                                                            bg-slate-50 border
                                                            border-slate-100">

                                                    <p class="text-xs text-slate-400 mb-1">
                                                        Processor
                                                    </p>

                                                    <p class="text-sm font-semibold
                                                              text-slate-700">
                                                        <?= $l['processor']; ?>
                                                    </p>

                                                </div>


                                                <!-- RAM -->
                                                <div class="p-3 rounded-xl
                                                            bg-slate-50 border
                                                            border-slate-100">

                                                    <p class="text-xs text-slate-400 mb-1">
                                                        RAM
                                                    </p>

                                                    <p class="text-sm font-semibold
                                                              text-slate-700">
                                                        <?= $l['ram']; ?> GB
                                                    </p>

                                                </div>


                                                <!-- SSD -->
                                                <div class="p-3 rounded-xl
                                                            bg-slate-50 border
                                                            border-slate-100">

                                                    <p class="text-xs text-slate-400 mb-1">
                                                        SSD
                                                    </p>

                                                    <p class="text-sm font-semibold
                                                              text-slate-700">
                                                        <?= $l['ssd']; ?> GB
                                                    </p>

                                                </div>


                                                <!-- Battery -->
                                                <div class="p-3 rounded-xl
                                                            bg-slate-50 border
                                                            border-slate-100">

                                                    <p class="text-xs text-slate-400 mb-1">
                                                        Kapasitas Baterai
                                                    </p>

                                                    <p class="text-sm font-semibold
                                                              text-slate-700">
                                                        <?= $l['baterai']; ?> Wh
                                                    </p>

                                                </div>


                                                <!-- Weight -->
                                                <div class="p-3 rounded-xl
                                                            bg-slate-50 border
                                                            border-slate-100
                                                            col-span-2">

                                                    <p class="text-xs text-slate-400 mb-1">
                                                        Berat
                                                    </p>

                                                    <p class="text-sm font-semibold
                                                              text-slate-700">
                                                        <?= $l['berat']; ?> Kg
                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- FOOTER -->
                                <div class="flex justify-end px-6 py-4
                                            bg-slate-50 border-t
                                            border-slate-100">

                                    <button type="button"
                                        onclick="closeLaptopModal(<?= $l['id']; ?>)"
                                        class="px-5 py-2.5 rounded-xl
                                               bg-white border border-slate-200
                                               text-slate-600 text-sm
                                               font-semibold
                                               hover:bg-slate-100 transition">
                                        Tutup
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>


            <!-- EMPTY STATE -->
            <?php if (empty($laptop)) : ?>

                <div class="mt-8">

                    <div class="bg-white border border-slate-200
                                rounded-2xl shadow-sm py-14 px-6">

                        <div class="text-center max-w-md mx-auto">

                            <div class="w-16 h-16 mx-auto mb-5
                                        rounded-2xl bg-amber-50
                                        flex items-center justify-center">

                                <svg class="w-8 h-8 text-amber-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                                </svg>

                            </div>


                            <h3 class="text-xl font-bold text-slate-900 mb-3">
                                Laptop Tidak Ditemukan
                            </h3>

                            <p class="text-slate-500 mb-6">
                                Laptop atau merk yang Anda cari tidak tersedia.
                                Silakan coba kata kunci lain.
                            </p>


                            <a href="<?= base_url('daftar_laptop'); ?>"
                                class="inline-flex items-center justify-center
                                       px-5 py-2.5 rounded-xl
                                       bg-indigo-600 text-white
                                       text-sm font-semibold
                                       hover:bg-indigo-700 transition">

                                Lihat Semua Laptop

                            </a>

                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </main>
</div>


<script>
    function openLaptopModal(id) {

        const modal = document.getElementById('modalDetail' + id);

        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

    }


    function closeLaptopModal(id) {

        const modal = document.getElementById('modalDetail' + id);

        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

    }


    /* Tutup modal dengan tombol ESC */
    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            document.querySelectorAll('[id^="modalDetail"]').forEach(function(modal) {

                if (!modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                }

            });

            document.body.classList.remove('overflow-hidden');

        }

    });
</script>