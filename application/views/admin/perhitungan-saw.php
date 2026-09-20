<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">

            <h2 class="fw-bold mb-4">
                Perhitungan SAW
            </h2>

            <?= $this->session->flashdata('pesan') ?>

            <!-- BOBOT KRITERIA -->
            <div class="card mb-4">
                <div class="card-header">
                    <b>Bobot & Atribut Kriteria</b>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Kriteria</th>
                                <th>Bobot</th>
                                <th>Atribut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bobot as $key => $b): ?>
                                <tr>
                                    <td><?= ucfirst($key) ?></td>
                                    <td><?= number_format($b, 3) ?></td>
                                    <td>
                                        <span class="badge <?= $atribut[$key] == 'cost' ? 'bg-danger' : 'bg-success' ?>">
                                            <?= ucfirst($atribut[$key]) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if (empty($hasil)) : ?>

                <!-- ALERT KALAU DATA LAPTOP KOSONG -->
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle"></i>
                    Belum ada data laptop. Silakan tambahkan data laptop terlebih dahulu di menu
                    <a href="<?= base_url('admin/laptop') ?>">Data Laptop</a>.
                </div>

            <?php else : ?>

                <!-- TABS -->
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="sawTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#matriks" type="button">
                                    Matriks Keputusan
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#normalisasi" type="button">
                                    Normalisasi
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hasil" type="button">
                                    Nilai Preferensi
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">

                            <!-- TAB MATRIKS KEPUTUSAN -->
                            <div class="tab-pane fade show active" id="matriks">
                                <div style="overflow-x:auto;">
                                    <table class="table table-bordered table-hover" id="tableMatriks">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Laptop</th>
                                                <th>Harga</th>
                                                <th>Processor</th>
                                                <th>RAM</th>
                                                <th>SSD</th>
                                                <th>Berat</th>
                                                <th>Baterai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hasil as $i => $h): ?>
                                                <tr>
                                                    <td><?= $start + $i + 1 ?></td>
                                                    <td><?= $h['nama_laptop'] ?></td>
                                                    <td><?= $h['data_saw']['harga'] ?></td>
                                                    <td><?= $h['data_saw']['processor'] ?></td>
                                                    <td><?= $h['data_saw']['ram'] ?></td>
                                                    <td><?= $h['data_saw']['ssd'] ?></td>
                                                    <td><?= $h['data_saw']['baterai'] ?></td>
                                                    <td><?= $h['data_saw']['berat'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- TAB NORMALISASI -->
                            <div class="tab-pane fade" id="normalisasi">
                                <div style="overflow-x:auto;">
                                    <table class="table table-bordered table-hover" id="tableNormalisasi">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Laptop</th>
                                                <th>Harga</th>
                                                <th>Processor</th>
                                                <th>RAM</th>
                                                <th>SSD</th>
                                                <th>Baterai</th>
                                                <th>Berat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hasil as $i => $h): ?>
                                                <tr>
                                                    <td><?= $start + $i + 1 ?></td>
                                                    <td><?= $h['nama_laptop'] ?></td>
                                                    <td><?= number_format($h['normalisasi']['harga'], 2) ?></td>
                                                    <td><?= number_format($h['normalisasi']['processor'], 2) ?></td>
                                                    <td><?= number_format($h['normalisasi']['ram'], 2) ?></td>
                                                    <td><?= number_format($h['normalisasi']['ssd'], 2) ?></td>
                                                    <td><?= number_format($h['normalisasi']['baterai'], 2) ?></td>
                                                    <td><?= number_format($h['normalisasi']['berat'], 2) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- TAB PREFERENSI -->
                            <div class="tab-pane fade" id="hasil">
                                <table class="table table-bordered table-hover" id="tableHasil">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Laptop</th>
                                            <th>Nilai Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hasil as $i => $h): ?>
                                            <tr>
                                                <td><?= $start + $i + 1 ?></td>
                                                <td><?= $h['nama_laptop'] ?></td>
                                                <td><b><?= number_format($h['nilai_akhir'], 2) ?></b></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <small class="text-muted">
                    Total Data: <?= $total_rows; ?>
                </small>

                <div class="d-flex justify-content-center mt-3">
                    <?= $this->pagination->create_links() ?>
                </div>

            <?php endif; ?>

        </div>
    </main>


    <!-- DataTables cuma di-init kalau ada data -->
    <?php if (!empty($hasil)) : ?>
    <script>
        $(document).ready(function() {
            $('#tableMatriks').DataTable();
            $('#tableNormalisasi').DataTable();
            $('#tableHasil').DataTable();
        });
    </script>
    <?php endif; ?>
</div>