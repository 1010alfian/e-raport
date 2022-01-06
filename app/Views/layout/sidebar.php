<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">E-Raport</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Er</a>
        </div>
        <ul class="sidebar-menu">
            <?php if ($user['level'] == 1 || $user['level'] == 2 || $user['level'] == 3) : ?>
                <li class="<?= $title == "Dashboard" ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('dashboard') ?>">
                        <i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
            <?php endif; ?>            
            <?php if ($user['level'] == 1) :  ?>
                <li class="menu-header">Admin</li>
                
                <!-- Master Data -->
                <li class="nav-item dropdown <?= $title == "Kelola Data Guru" || $title == "Kelola Data Siswa" ? "active" : ""; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master Data</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $title == "Kelola Data Guru" ? "active" : ""; ?>"><a class="nav-link" href="KelolaGuru">Kelola Data Guru</a></li>
                        <li class="<?= $title == "Kelola Data Siswa" ? "active" : ""; ?>"><a class="nav-link" href="KelolaSiswa">Kelola Data Siswa</a></li>
                        <li class="<?= $title == "Mata Pelajaran" ? "active" : ""; ?>"><a class="nav-link" href="KelolaMapel">Mata Pelajaran</a></li>
                    </ul>
                </li>

                <!-- Nilai -->
                <li class="nav-item dropdown <?= $title == "Keterampilan" || $title == "Pengetahuan" || $title == "Sikap" || $title == "Absensi" ? "active" : ""; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Nilai</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $title == "Keterampilan" ? "active" : ""; ?>"><a class="nav-link" href="keterampilan">Keterampilan</a></li>
                        <li class="<?= $title == "Pengetahuan" ? "active" : ""; ?>"><a class="nav-link" href="">Pengetahuan</a></li>
                        <li class="<?= $title == "Sikap" ? "active" : ""; ?>"><a class="nav-link" href="">Sikap</a></li>
                        <li class="<?= $title == "Absensi" ? "active" : ""; ?>"><a class="nav-link" href="">Absensi</a></li>
                    </ul>
                </li>

                <!-- SAW -->
                <li class="nav-item dropdown <?= $title == "Alternative" || $title == "Kriteria" || $title == "Sub Kriteria" || $title == "Bobot" ? "active" : ""; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>SAW</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $title == "Alternative" ? "active" : ""; ?>"><a class="nav-link" href="">Alternative</a></li>
                        <li class="<?= $title == "Kriteria" ? "active" : ""; ?>"><a class="nav-link" href="">Kriteria</a></li>
                        <li class="<?= $title == "Sub Kriteria" ? "active" : ""; ?>"><a class="nav-link" href="">Sub Kriteria</a></li>
                        <li class="<?= $title == "Bobot" ? "active" : ""; ?>"><a class="nav-link" href="">Bobot</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($user['level'] == 2) :  ?>
                <li class="menu-header">Wali Kelas</li>

                <li class="<?= $title == "Kelola Data Siswa" ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('KelolaSiswa') ?>">
                        <i class="fas fa-database"></i> <span>Kelola Data Siswa</span></a>
                </li>

                <li class="<?= $title == "Kelola Nilai" ? "active" : ""; ?>"><a class="nav-link" href="<?= site_url('') ?>">
                        <i class="fas fa-database"></i> <span>Kelola Nilai</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                        <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                        <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                    </ul>
                </li>
            <?php endif; ?>

    </aside>
</div>