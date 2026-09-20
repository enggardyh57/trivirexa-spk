<?php
$current_page  = $this->uri->segment(1);
$current_page2 = $this->uri->segment(2);


if (empty($current_page)) {
    $current_page = 'home';
}

$links = [
    'home'              => ['Home', base_url('home')],
    'daftar_laptop'     => ['Daftar Laptop', base_url('daftar_laptop')],
    'cari_rekomendasi'  => ['Cari Rekomendasi', base_url('cari_rekomendasi')],
];
?>

<header class="sticky top-0 z-40 border-b border-slate-200 bg-white">
  <div class="mx-auto max-w-6xl px-4">
    <div class="flex h-16 items-center justify-between">

      <!-- Brand -->
      <a href="<?= base_url('home') ?>"
        class="flex shrink-0 items-center">

        <span class="text-2xl font-extrabold tracking-tight text-gray-900">
          TRIVIREXA
        </span>

      </a>


      <!-- Desktop Nav -->
      <nav class="hidden items-center gap-1 lg:flex">

        <?php foreach ($links as $key => [$label, $url]): ?>

          <a href="<?= $url ?>"
            class="relative px-3 py-2 text-sm font-medium transition-colors
                       <?= ($current_page == $key)
                          ? 'text-indigo-600'
                          : 'text-slate-600 hover:text-gray-900' ?>">

            <?= $label ?>

            <?php if ($current_page == $key): ?>

              <span class="absolute inset-x-3 -bottom-px h-0.5
                                         bg-gradient-to-r from-indigo-600 to-violet-600">
              </span>

            <?php endif; ?>

          </a>

        <?php endforeach; ?>


        <?php if ($this->session->userdata('username')): ?>

          <a href="<?= base_url('riwayat_pencarian') ?>"
            class="relative px-3 py-2 text-sm font-medium transition-colors
                       <?= ($current_page == 'riwayat_pencarian')
                          ? 'text-indigo-600'
                          : 'text-slate-600 hover:text-gray-900' ?>">

            Riwayat Pencarian

            <?php if ($current_page == 'riwayat_pencarian'): ?>

              <span class="absolute inset-x-3 -bottom-px h-0.5
                                         bg-gradient-to-r from-indigo-600 to-violet-600">
              </span>

            <?php endif; ?>

          </a>

        <?php endif; ?>


        <!-- Bantuan -->
        <button type="button"
          onclick="document.getElementById('modalBantuan').classList.remove('hidden')"
          class="px-3 py-2 text-sm font-medium text-slate-600
                               transition-colors hover:text-gray-900">

          Bantuan

        </button>

      </nav>


      <!-- Right Side Desktop -->
      <div class="hidden items-center gap-3 lg:flex">

        <?php if ($this->session->userdata('username')): ?>

          <span class="text-sm text-slate-600">

            Halo,
            <span class="font-semibold text-gray-900">
              <?= $this->session->userdata('username') ?>
            </span>

          </span>

          <a href="<?= base_url('auth/logout') ?>"
            class="rounded-lg bg-red-600 px-4 py-2 text-sm
                              font-semibold text-white transition-colors
                              hover:bg-red-700">

            Logout

          </a>

        <?php else: ?>

          <a href="<?= base_url('auth') ?>"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm
                              font-semibold text-white transition-colors
                              hover:bg-indigo-700">

            Login

          </a>

        <?php endif; ?>

      </div>


      <!-- Mobile Toggle -->
      <button type="button"
        onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
        class="grid h-9 w-9 place-items-center rounded-md
                           border border-slate-200 lg:hidden">

        <svg xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-gray-900"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="1.8">

          <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M4 6h16M4 12h16M4 18h16" />

        </svg>

      </button>

    </div>


    <!-- Mobile Menu -->
    <div id="mobileMenu"
      class="hidden border-t border-slate-200 py-3 lg:hidden">

      <div class="flex flex-col gap-1">

        <?php foreach ($links as $key => [$label, $url]): ?>

          <a href="<?= $url ?>"
            class="rounded-md px-3 py-2 text-sm font-medium
                       <?= ($current_page == $key)
                          ? 'bg-indigo-50 text-indigo-600'
                          : 'text-slate-600' ?>">

            <?= $label ?>

          </a>

        <?php endforeach; ?>


        <?php if ($this->session->userdata('username')): ?>

          <a href="<?= base_url('riwayat_pencarian') ?>"
            class="rounded-md px-3 py-2 text-sm font-medium
                       <?= ($current_page == 'riwayat_pencarian')
                          ? 'bg-indigo-50 text-indigo-600'
                          : 'text-slate-600' ?>">

            Riwayat Pencarian

          </a>

        <?php endif; ?>


        <!-- Bantuan -->
        <button type="button"
          onclick="document.getElementById('modalBantuan').classList.remove('hidden')"
          class="rounded-md px-3 py-2 text-left text-sm
                               font-medium text-slate-600">

          Bantuan

        </button>


        <!-- Mobile Login / Logout -->
        <div class="mt-2 border-t border-slate-200 pt-3">

          <?php if ($this->session->userdata('username')): ?>

            <div class="px-3 pb-2 text-sm text-slate-600">

              Halo,
              <span class="font-semibold text-gray-900">
                <?= $this->session->userdata('username') ?>
              </span>

            </div>

            <a href="<?= base_url('auth/logout') ?>"
              class="block rounded-lg bg-red-600 px-3 py-2
                                  text-center text-sm font-semibold text-white
                                  hover:bg-red-700">

              Logout

            </a>

          <?php else: ?>

            <a href="<?= base_url('auth') ?>"
              class="block rounded-lg bg-indigo-600 px-3 py-2
                                  text-center text-sm font-semibold text-white
                                  hover:bg-indigo-700">

              Login

            </a>

          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>
</header>


<!-- Modal Bantuan -->
<div id="modalBantuan"
  class="fixed inset-0 z-50 hidden">

  <!-- Overlay -->
  <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm"
    onclick="closeBantuan()">
  </div>


  <!-- Modal -->
  <div class="relative mx-auto mt-8 max-h-[85vh] w-[92%]
                max-w-2xl overflow-y-auto rounded-2xl
                bg-white shadow-2xl">

    <!-- Top Accent -->
    <div class="h-1.5 w-full rounded-t-2xl
                    bg-gradient-to-r from-indigo-600 to-violet-600">
    </div>


    <!-- Header -->
    <div class="flex items-start justify-between gap-4
                    border-b border-slate-200 px-6 py-5">

      <div>

        <h2 class="text-xl font-bold text-gray-900">
          Cara kerja rekomendasi laptop
        </h2>

        <p class="mt-1 text-sm text-slate-500">
          Sistem menilai laptop dengan metode
          Simple Additive Weighting (SAW), berdasarkan
          kriteria yang kamu pilih sendiri.
        </p>

      </div>


      <!-- Close -->
      <button type="button"
        onclick="closeBantuan()"
        class="grid h-8 w-8 shrink-0 place-items-center
                           rounded-md text-slate-400
                           hover:bg-slate-100 hover:text-slate-600">

        <svg xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="1.8">

          <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />

        </svg>

      </button>

    </div>


    <!-- Content -->
    <div class="px-6 py-5">

      <ol class="relative border-l-2 border-slate-200 pl-6">

        <?php
        $steps = [
          'Masuk ke menu <b>Cari Rekomendasi</b>.',
          'Pilih kebutuhan laptop: <b>harga, processor, RAM, SSD, kapasitas baterai, berat</b>.',
          'Tentukan pilihan sesuai kebutuhan pada setiap kolom.',
          'Klik tombol <b>Tampilkan Rekomendasi</b>.',
          'Sistem memproses data menggunakan metode <b>SAW</b>.',
          'Hasil rekomendasi dan perangkingan laptop ditampilkan.',
        ];
        ?>

        <?php foreach ($steps as $i => $step): ?>

          <li class="relative pb-6 last:pb-0">

            <span class="absolute -left-[31px] grid h-6 w-6
                                     place-items-center rounded-full
                                     bg-indigo-600 text-xs font-bold text-white">

              <?= $i + 1 ?>

            </span>

            <p class="text-sm text-slate-700">
              <?= $step ?>
            </p>

          </li>

        <?php endforeach; ?>

      </ol>


      <!-- Info -->
      <div class="mt-2 rounded-lg bg-violet-50
                        px-4 py-3 text-sm text-gray-900">

        Setiap kriteria bisa diberi bobot berbeda sesuai
        prioritasmu, jadi hasil rekomendasinya tetap personal.

      </div>

    </div>


    <!-- Footer -->
    <div class="flex items-center justify-end gap-3
                    border-t border-slate-200 px-6 py-4">

      <button type="button"
        onclick="closeBantuan()"
        class="rounded-lg px-4 py-2 text-sm font-medium
                           text-slate-600 hover:bg-slate-100">

        Tutup

      </button>

      <a href="<?= base_url('home/rekomendasi') ?>"
        class="rounded-lg bg-indigo-600 px-4 py-2 text-sm
                      font-semibold text-white hover:bg-indigo-700">

        Cari Rekomendasi

      </a>

    </div>

  </div>

</div>


<script>
  function closeBantuan() {
    document.getElementById('modalBantuan').classList.add('hidden');
  }

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeBantuan();
    }
  });
</script>