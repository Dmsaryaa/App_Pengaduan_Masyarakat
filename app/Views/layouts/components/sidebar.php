<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: linear-gradient(#3D088C, #05F7DF);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>

        <div class="sidebar-brand-text mx-3"><?= session('level') ?><sup>2</sup></div>
        <!-- <div class="sidebar-brand-text mx-3">Pengaduan<sup>2</sup></div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active mt-3">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    if (session('level') == "admin") {
    ?>

    <li class="nav-item mb-3">
        <a href="/petugas" class="nav-link collapsed">
            <i class="fas fa-fw fa-user"></i>
            <span>Petugas</span>
        </a>
    </li>

    <li class="nav-item mb-3">
        <a href="/masyarakat" class="nav-link collapsed">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Masyarakat</span>
        </a>
    </li>

    <li class="nav-item mb-3">
        <a href="/pengaduan" class="nav-link collapsed">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item mb-3">
        <a href="/tanggapan" class="nav-link collapsed">
            <i class="fas fa-fw fa-regular fa-comment"></i>
            <span>Tanggapan</span>
        </a>
    </li>

    <?php
    }
    ?>

    <?php
    if (session('level') == "petugas") {
    ?>

    <div class="sidebar-heading">
        Petugas
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Masyarakat</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Crud :</h6>
                <a class="collapse-item" href="/pengaduan">Tulis Pengaduan</a>
            </div>
        </div>
    </li>

    <?php
    }
    ?>

    <?php
    if (session('level') == "masyarakat") {
    ?>

    <div class="sidebar-heading">
        Masyarakat
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Masyarakat</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Crud :</h6>
                <a class="collapse-item" href="/pengaduan">Tulis Pengaduan</a>
            </div>
        </div>
    </li>

    <?php
    }
    ?>

    <?php if (!empty(session()->get('log_in'))) : ?>
    <li class="nav-item">
        <a href="/login" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <span>LogOut</span>
        </a>
    </li>
    <?php endif ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>