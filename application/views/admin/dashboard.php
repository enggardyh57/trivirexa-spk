<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 py-4">

            <h2 class="fw-bold mb-4">
                Dashboard Admin
            </h2>

            <!-- CARD -->
            <div class="row g-4 mb-5">

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm text-white" style="background-color: #121358;">
                        <div class="card-body">
                            <h5>Jumlah Laptop</h5>
                            <h2 class="fw-bold">
                                <?= $total_laptop; ?>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm text-white" style="background-color: #1F6F5F;">
                        <div class="card-body">
                            <h5>Jumlah Kriteria</h5>
                            <h2 class="fw-bold">
                                <?= $total_kriteria; ?>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm text-white" style="background-color: #df8a00;">
                        <div class="card-body">
                            <h5>Jumlah User</h5>
                            <h2 class="fw-bold">
                                <?= $total_user; ?>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm text-white" style="background-color: #99000a;">
                        <div class="card-body">
                            <h5>Total Perhitungan</h5>
                            <h2 class="fw-bold">
                                <?= $total_perhitungan; ?>
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

            <!-- GRAFIK -->
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h4 class="fw-bold mb-4">
                        Grafik Merk Laptop
                    </h4>

                    <canvas id="grafikBrand"></canvas>

                </div>
            </div>

        </div>
    </main>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('grafikBrand');

    const grafikBrand = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach ($grafik_brand as $g) : ?> '<?= $g['brand']; ?>',
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'Jumlah Laptop',
                data: [
                    <?php foreach ($grafik_brand as $g) : ?>
                        <?= $g['total']; ?>,
                    <?php endforeach; ?>
                ],
                backgroundColor: [

                    '#343938'
                ],

                borderColor: [

                    '#343938'
                ],
                borderWidth: 1
            }]
        },

        options: {
            responsive: true,

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>