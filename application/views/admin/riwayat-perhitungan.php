<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">

            <h2 class="fw-bold mb-4">
                Data Riwayat Perhitungan
            </h2>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <?php if (!empty($perhitungan)) : ?>

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Laptop</th>
                                        <th>Skor Akhir</th>
                                        <th>User</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = $start + 1; ?>

                                    <?php foreach ($perhitungan as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['tanggal']; ?></td>
                                            <td><?= $p['nama_laptop']; ?></td>
                                            <td><?= number_format($p['skor_akhir'], 2); ?></td>
                                            <td><?= $p['username']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                        <!-- INFO + PAGINATION -->
                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">

                            <small class="text-muted">
                                Total Data: <?= $total_rows; ?>
                            </small>

                            <div>
                                <?= $this->pagination->create_links(); ?>
                            </div>

                        </div>

                    <?php else : ?>

                        <!-- EMPTY STATE -->
                        <div class="text-center py-5">

                            <h3 class="fw-bold mb-2">
                                Belum ada hasil perhitungan
                            </h3>

                            <p class="text-muted mb-0">
                                Data perhitungan akan muncul setelah proses perhitungan dilakukan.
                            </p>

                        </div>

                    <?php endif; ?>

                </div>
            </div>

        </div>
    </main>
