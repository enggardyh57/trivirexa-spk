   <?php

    $current_page = $this->uri->segment(2);
    ?>
   <div id="layoutSidenav">
       <div id="layoutSidenav_nav">
           <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
               <div class="sb-sidenav-menu">
                   <div class="nav">
                       <div class="sb-sidenav-menu-heading">Data</div>
                       <a class="nav-link fw-semibold <?= ($current_page == 'dashboard') ? 'active' : '' ?>"
                           href="<?= base_url('admin/dashboard') ?>">
                           <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                           Dashboard
                       </a>
                       <div class="sb-sidenav-menu-heading">Kategori Data</div>
                       <a class="nav-link fw-semibold <?= ($current_page == 'laptop') ? 'active' : '' ?>"
                           href="<?= base_url('admin/laptop') ?>">
                           <div class="sb-nav-link-icon"><i class="fa-solid fa-laptop"></i></div>
                           Laptop
                       </a>
                       <a class="nav-link fw-semibold <?= ($current_page == 'kriteria') ? 'active' : '' ?>"
                           href="<?= base_url('admin/kriteria') ?>">
                           <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                           Kriteria
                       </a>
                       <a class="nav-link fw-semibold <?= ($current_page == 'perhitungan_saw') ? 'active' : '' ?>"
                           href="<?= base_url('admin/perhitungan_saw') ?>">
                           <div class="sb-nav-link-icon"><i class="fa-solid fa-calculator"></i></div>
                           Perhitungan SAW
                       </a>
                       <a class="nav-link fw-semibold <?= ($current_page == 'riwayat_perhitungan') ? 'active' : '' ?>"
                           href="<?= base_url('admin/riwayat_perhitungan') ?>">
                           <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                           Riwayat Perhitungan
                       </a>
                       <a class="nav-link fw-semibold <?= ($current_page == 'user') ? 'active' : '' ?>"
                           href="<?= base_url('admin/user') ?>">
                           <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                           User
                       </a>

                   </div>
               </div>
           </nav>
       </div>