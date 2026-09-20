<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">
            <h1>Form Edit Kritera</h1>
        </div>
        <div class="row mx-4">
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $kriteria['nama_kriteria'] ?>">
                        <?= form_error('nama_kriteria', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" value="<?= $kriteria['bobot'] ?>">
                        <?= form_error('bobot', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class=" mb-3">
                        <label for="atribut" class="form-label">Atribut</label>

                        <select class="form-select" name="atribut" required>
                            <option value="" disabled>Pilih atribut</option>

                            <option value="cost"
                                <?= $kriteria['atribut'] == 'cost' ? 'selected' : ''; ?>>
                                Cost
                            </option>

                            <option value="benefit"
                                <?= $kriteria['atribut'] == 'benefit' ? 'selected' : ''; ?>>
                                Benefit
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                    <a href="<?= base_url('admin/kriteria') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>