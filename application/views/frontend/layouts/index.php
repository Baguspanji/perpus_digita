<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?> | Perpusku</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" media="all,print" />
    <link rel="stylesheet" media="all,print" type="text/css" href="<?= base_url(); ?>assets/frontend/css/frontend.scss" />
    <link rel="stylesheet" media="all,print" type="text/css" href="<?= base_url(); ?>assets/frontend/css/frontend.css" />

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" media="all,print" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/jquery-ui/jquery-ui.min.css" media="all,print" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/fontawesome/css/all.min.css" media="all,print" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro&display=swap" rel="stylesheet" media="all,print" />

    <script src="<?= base_url(); ?>assets/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="<?= base_url(); ?>assets/frontend/vendor/fontawesome/js/all.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/vendor/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

</head>

<body class="bg-light d-flex flex-column">

    <div id="page-content">

        <div class="bg-primary pb-3 shadow">

            <?php $this->load->view('frontend/layouts/header') ?>

        </div>

        <main class="container mt-3">

            <?php $this->load->view($content) ?>

        </main>

    </div>

    <footer class="footer bg-white shadow py-3 mt-5">
        <div class="container">
            <span class="text-muted" data-trigger="text-muted-dark">Hak Cipta <?= date('Y'); ?> <a class="font-weight-bold text-muted" href="/">Perpus Apps</a>.</span>
        </div>
    </footer>

</body>

</html>