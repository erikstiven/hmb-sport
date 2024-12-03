<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/favicon-32x32.png" type="image/png" />
    <link href="<?php echo BASE_URL; ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo BASE_URL; ?>assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo BASE_URL; ?>assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/header-colors.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/DataTables/datatables.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/fontawesome.min.css">

    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>


 


</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?php echo BASE_URL; ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Rocker</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="<?php echo BASE_URL . 'admin/home'; ?>">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>

                </li>

                <li>
                    <a href="<?php echo BASE_URL . 'usuarios'; ?>">
                        <div class="parent-icon"><i class='fas fa-users' style='font-size: 16px;'></i></div>
                        <div class="menu-title">Usuarios</div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . 'categorias'; ?>">
                        <div class="parent-icon"><i class='fas fa-tags' style='font-size: 16px;'></i></div>
                        <div class="menu-title">Categorias</div>
                    </a>
                </li>

                <li>
                    <a href="<?php echo BASE_URL . 'productos'; ?>">
                        <div class="parent-icon"><i class='fas fa-list' style='font-size: 16px;'></i></div>
                        <div class="menu-title">Productos</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">

                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo BASE_URL; ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Pauline Seitz</p>
                                <p class="designattion mb-0">Web Designer</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">