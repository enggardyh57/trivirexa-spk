<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">
            <h1>Form Edit Laptop</h1>
        </div>
        <div class="row mx-4">
            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_laptop" class="form-label">Nama Laptop</label>
                        <input type="text" class="form-control" id="nama_laptop" name="nama_laptop" value="<?= $laptop['nama_laptop'] ?>">
                        <?= form_error('nama_laptop', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Gambar Sebelumnya</label><br>
                            <img src="<?= base_url('assets/img/laptop/' . $laptop['gambar']); ?>" class="img-thumbnail" width="150">
                        </div>

                        <div class="col-md-6">
                            <label for="gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            <?php if (isset($error_gambar)) : ?>
                                <small class="text-danger"><?= strip_tags($error_gambar); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $laptop['harga'] ?>">
                        <?= form_error('harga', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="processor" class="form-label">Processor</label>
                        <input type="text" class="form-control" id="processor" name="processor" value="<?= $laptop['processor'] ?>">
                        <?= form_error('processor', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="ssd" class="form-label">SSD</label>
                        <input type="text" class="form-control" id="ssd" name="ssd" value="<?= $laptop['ssd'] ?>">
                        <?= form_error('ssd', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class=" mb-3">
                        <label for="ram" class="form-label">RAM</label>
                        <input type="text" class="form-control" id="ram" name="ram" value="<?= $laptop['ram'] ?>">
                        <?= form_error('ram', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class=" mb-3">
                        <label for="baterai" class="form-label">Baterai</label>
                        <input type="text" class="form-control" id="baterai" name="baterai" value="<?= $laptop['baterai'] ?>">
                        <?= form_error('baterai', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class=" mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="text" class="form-control" id="berat" name="berat" value="<?= $laptop['berat'] ?>">
                        <?= form_error('berat', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <button type=" submit" class="btn btn-success">Edit Data</button>
                    <a href="<?= base_url('admin/laptop') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>