<div id="layoutSidenav_content">
    <main>
        <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-7xl">

                <!-- HEADER -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-slate-900">
                        Data Hasil Perhitungan
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Riwayat hasil perhitungan rekomendasi laptop.
                    </p>
                </div>


                <!-- CARD -->
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="p-5 sm:p-6">

                        <!-- TABLE -->
                        <div class="overflow-x-auto rounded-xl border border-slate-200">

                            <table class="w-full min-w-[700px] text-sm text-left">

                                <thead class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white">
                                    <tr>
                                        <th class="px-5 py-4 font-semibold">
                                            No
                                        </th>

                                        <th class="px-5 py-4 font-semibold">
                                            Tanggal
                                        </th>

                                        <th class="px-5 py-4 font-semibold">
                                            Nama Laptop
                                        </th>

                                        <th class="px-5 py-4 font-semibold">
                                            Hasil Perhitungan
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-slate-100">

                                    <?php $no = $start + 1; ?>

                                    <?php foreach ($perhitungan as $p) : ?>

                                        <tr class="hover:bg-indigo-50/50 transition">

                                            <td class="px-5 py-4 text-slate-600">
                                                <?= $no++; ?>
                                            </td>

                                            <td class="px-5 py-4 text-slate-600">
                                                <?= $p['tanggal']; ?>
                                            </td>

                                            <td class="px-5 py-4 font-medium text-slate-800">
                                                <?= $p['nama_laptop']; ?>
                                            </td>

                                            <td class="px-5 py-4">
                                                <span class="inline-flex items-center rounded-lg bg-indigo-50 px-3 py-1.5
                                                             text-sm font-semibold text-indigo-600">
                                                    <?= round($p['skor_akhir'], 4); ?>
                                                </span>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>


                        <!-- INFO + PAGINATION -->
                        <div class="mt-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                            <div>
                                <span class="text-sm text-slate-500">
                                    Total Data:
                                    <span class="font-semibold text-slate-700">
                                        <?= $total_rows; ?>
                                    </span>
                                </span>
                            </div>

                            <!-- Pagination -->
                            <div class="overflow-x-auto">
                                <?= $this->pagination->create_links(); ?>
                            </div>

                        </div>


                        <!-- EMPTY STATE -->
                        <?php if (empty($perhitungan)) : ?>

                            <div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 px-6 py-12 text-center">

                                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-100">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8 text-indigo-600"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 13h6m-6 4h3m5-14H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2zm-1 0v4H8V3h8z" />

                                    </svg>

                                </div>

                                <h3 class="text-lg font-bold text-slate-800">
                                    Anda belum mempunyai riwayat pencarian rekomendasi laptop
                                </h3>

                                <a href="<?= base_url('cari_rekomendasi'); ?>"
                                    class="mt-5 inline-flex items-center justify-center gap-2
                                           rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600
                                           px-5 py-3 text-sm font-bold text-white
                                           shadow-lg shadow-indigo-200
                                           hover:from-indigo-700 hover:to-violet-700
                                           hover:-translate-y-0.5 hover:shadow-xl
                                           transition-all duration-200">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 4v16m8-8H4" />

                                    </svg>

                                    Cari rekomendasi laptop

                                </a>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>
    </main>
</div>