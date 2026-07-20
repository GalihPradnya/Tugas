 <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column min-vh-100">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                   

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php
                    $user_name = $this->session->userdata('name');
                    $user_image = $this->session->userdata('image');

                    if(empty($user_name))
                    {
                        $user_name = 'Guest';
                    }

                    if(empty($user_image))
                    {
                        $user_image = 'default.jpg';
                        
                    }

                    $user_image = base_url('assets/img/profile/'.$user_image);
                    ?>
                <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       

                        <!-- Nav Item - Messages -->
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="mr-2 d-none d-lg-inline text-right">

                            <div class="text-gray-800 font-weight-bold">
                                <?= $user_name; ?>
                            </div>

                            <div class="small text-gray-500">

                                <?php if($this->session->userdata('role_id') == 1): ?>
                                    Super Admin

                                <?php elseif($this->session->userdata('role_id') == 2): ?>
                                    Admin

                                <?php else: ?>
                                    Masyarakat

                                <?php endif; ?>

                            </div>

                        </div>
                                <img class="img-profile rounded-circle"
                                    src="<?= $user_image; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item"
                                href="<?= base_url('user/user'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <a class="dropdown-item"
                                href="<?= base_url('beranda'); ?>">

                                    <i class="fas fa-globe fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Website Desa

                                </a>
                                <?php if($this->session->userdata('role_id') == 3): ?>

                                <a class="dropdown-item"
                                href="<?= base_url('user/surat_saya'); ?>">

                                    <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Surat Saya

                                </a>

                                <?php endif; ?>
                                                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
    


               <!-- End of Topbar -->