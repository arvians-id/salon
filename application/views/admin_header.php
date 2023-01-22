<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vilary Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading"><a href="<?= base_url(); ?>" class="text-decoration-none text-dark font-weight-bold">Vilary Admin</a></div>
            <div class="list-group list-group-flush">
                <a href="<?= base_url(); ?>admin_dashboard" class="list-group-item list-group-item-action bg-light <?= $this->uri->segment(2) == '' ? 'bg-dark text-white' : '' ?>">Dashboard</a>
                <a href="<?= base_url(); ?>admin_dashboard/reservasi" class="list-group-item list-group-item-action bg-light <?= $this->uri->segment(2) == 'reservasi' ? 'bg-dark text-white' : '' ?>">Reservasi</a>
                <a href="<?= base_url(); ?>admin_dashboard/list_akun" class="list-group-item list-group-item-action bg-light <?= $this->uri->segment(2) == 'list_akun' ? 'bg-dark text-white' : '' ?>">List Akun Pelangan</a>
                <a href="<?= base_url(); ?>forward_chaining/data_gejala" class="list-group-item list-group-item-action bg-light <?= $this->uri->segment(1) == 'forward_chaining' ? 'bg-dark text-white' : '' ?>">Forward Chaining</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $this->session->userdata('name') ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url(); ?>auth/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>