<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">

            <h2 class="fw-bold">Data Laptop</h2>

            <!-- Button tambah -->
            <div class="row mb-3">
                <div class="col-lg-6">
                    <a href="<?= base_url('admin/laptop/tambah') ?>" class="btn btn-primary">
                        Tambah Data Laptop
                    </a>
                </div>
            </div>

            <!-- Flash message -->
            <div class="row">
                <div class="col-lg">
                    <?= $this->session->flashdata('pesan') ?>
                </div>
            </div>

            <!-- Jika ada data -->
            <?php if (!empty($laptop)) : ?>

                <div class="row mt-3">
                    <div class="col-lg">

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Laptop</th>
                                    <th>Harga</th>
                                    <th>Processor</th>
                                    <th>SSD (gb)</th>
                                    <th>RAM (gb)</th>
                                    <th>Baterai (wh)</th>
                                    <th>Berat (kg)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = $start + 1; ?>
                                <?php foreach ($laptop as $l): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $l['nama_laptop'] ?></td>
                                        <td>Rp <?= number_format($l['harga'], 0, ',', '.') ?></td>
                                        <td><?= $l['processor'] ?></td>
                                        <td><?= $l['ssd'] ?></td>
                                        <td><?= $l['ram'] ?></td>
                                        <td><?= $l['baterai'] ?></td>
                                        <td><?= $l['berat'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/laptop/hapus/') . $l['id'] ?>"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Yakin hapus laptop?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            <a href="<?= base_url('admin/laptop/edit/') . $l['id'] ?>"
                                               class="btn btn-sm btn-success">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Info + pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">

                            <small class="text-muted">
                                Total Data: <?= $total_rows; ?>
                            </small>

                            <div>
                                <?= $this->pagination->create_links(); ?>
                            </div>

                        </div>

                    </div>
                </div>

            <!-- Jika tidak ada data -->
            <?php else : ?>

                <div class="row mt-4">
                    <div class="col-12">

                        <div class="card border-0 shadow-sm rounded-4 py-5">
                            <div class="card-body text-center">
                                <h3 class="fw-bold mb-0">
                                    Belum ada data laptop
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endif; ?>

        </div>
    </main>
