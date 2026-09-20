<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid p-4">
            <h1>Form Tambah Laptop</h1>
        </div>

        <div class="row mx-4">
            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_laptop" class="form-label">Nama Laptop</label>
                        <input type="text" class="form-control" id="nama_laptop" name="nama_laptop" value="<?= set_value('nama_laptop') ?>">
                        <?= form_error('nama_laptop', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar</label>
                        <?php if (isset($error_gambar)) : ?>
                            <small class="text-danger"><?= strip_tags($error_gambar); ?></small>
                        <?php endif; ?>

                        <input type="file"
                            name="gambar"
                            class="form-control">

                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga') ?>">
                        <?= form_error('harga', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="processor" class="form-label">Processor</label>
                        <input type="text" class="form-control" id="processor" name="processor" value="<?= set_value('processor') ?>">
                        <?= form_error('processor', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="ram" class="form-label">RAM</label>
                        <input type="text" class="form-control" id="ram" name="ram" value="<?= set_value('ram') ?>">
                        <?= form_error('ram', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="ssd" class="form-label">SSD</label>
                        <input type="text" class="form-control" id="ssd" name="ssd" value="<?= set_value('ssd') ?>">
                        <?= form_error('ssd', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="baterai" class="form-label">Baterai</label>
                        <input type="text" class="form-control" id="baterai" name="baterai" value="<?= set_value('baterai') ?>">
                        <?= form_error('baterai', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="text" class="form-control" id="berat" name="berat" value="<?= set_value('berat') ?>">
                        <?= form_error('berat', '<span class= "text-danger">', '</span>') ?>
                    </div>
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                    <a href="<?= base_url('admin/laptop') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </main>

   