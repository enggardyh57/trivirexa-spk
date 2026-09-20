<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 py-4">

            <h2 class="fw-bold mb-4">
                Data User
            </h2>
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no =  1; ?>

                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['nama_lengkap']; ?></td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>