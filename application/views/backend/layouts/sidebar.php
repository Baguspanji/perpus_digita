<?php
$uri = $this->uri->segment(2);
?>

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!-- <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url() ?>assets/backend/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <ul class="nav nav-primary">
                <li class="nav-item <?= $uri == '' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item <?= $uri == 'tamu' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin/tamu">
                        <i class="fas fa-th-list"></i>
                        <p>Pengunjung</p>
                    </a>
                </li>

                <li class="nav-item <?= $uri == 'buku' || $uri == 'post_buku' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin/buku">
                        <i class="fas fa-book"></i>
                        <p>Buku</p>
                    </a>
                </li>

                <li class="nav-item <?= $uri == 'kategori' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin/kategori">
                        <i class="fas fa-adjust"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item <?= $uri == 'siswa' || $uri == 'post_siswa' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>admin/siswa">
                        <i class="fas fa-users"></i>
                        <p>Siswa</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->