<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?> | Perpusku</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!-- <link rel="icon" href="<?= base_url() ?>assets/backend/assets/img/icon.ico" type="image/x-icon" /> -->

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url() ?>assets/backend/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/assets/css/demo.css">

    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>assets/backend/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/backend/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url() ?>assets/backend/assets/js/atlantis.min.js"></script>
</head>

<body>
    <div class="wrapper">

        <?php $this->load->view('backend/layouts/header') ?>

        <?php $this->load->view('backend/layouts/sidebar') ?>

        <div class="main-panel">

            <?php $this->load->view($content) ?>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script>
        $('#basic-datatables').DataTable({
            info:  false
        });

        function notifikasi(pesan, tipe, ico = '') {
            $.notify({
                // options
                icon: ico,
                message: pesan,
            }, {
                // settings
                type: tipe,
                z_index: 9999
            });
        }
    </script>

    <?php echo $this->session->flashdata('notifikasi'); ?>

</body>

</html>