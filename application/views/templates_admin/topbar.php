<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark shadow-sm px-3">

    <!-- Brand -->
    <a class="navbar-brand fw-bold fs-5" href="<?= base_url('admin') ?>">
        SPK SAW LAPTOP
    </a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm text-white order-1 order-lg-0 me-3"
        id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Right Navbar -->
    <ul class="navbar-nav ms-auto align-items-center">

        <?php if ($this->session->userdata('username')): ?>

            <!-- Username -->
            <li class="nav-item me-2">
                <span class="nav-link text-white">
                    Halo, <?= $this->session->userdata('username') ?>
                </span>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a class="btn btn-danger btn-sm rounded-pill px-3"
                    href="<?= base_url('auth/logout') ?>">
                    Logout
                </a>
            </li>

        <?php else: ?>

            <!-- Login -->
            <li class="nav-item">
                <a class="btn btn-primary btn-sm rounded-pill px-3"
                    href="<?= base_url('auth') ?>">
                    Login
                </a>
            </li>

        <?php endif; ?>

    </ul>

</nav>