<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">
            <h2 class="fw-bold">Data Kriteria</h2>

            <div class="row">
                <div class="col-lg-6">
                    <a href="<?= base_url('admin/kriteria/tambah') ?>" class="btn btn-primary none-text-decoration disabled" aria-disabled="true">Tambah Data Kriteria</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg my-3">
                    <?= $this->session->flashdata('pesan') ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Atribut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($kriteria as $k): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $k['nama_kriteria'] ?></td>
                                    <td><?= $k['bobot'] ?></td>
                                    <td><?= $k['atribut'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/kriteria/hapus/') . $k['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('yakin hapus kriteria?')"><i class="fa-solid fa-trash"></i></a>
                                        <a href="<?= base_url('admin/kriteria/edit/') . $k['id'] ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>