<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk | Perpusku</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" media="all,print" />
    <link rel="stylesheet" media="all,print" type="text/css" href="<?= base_url(); ?>assets/frontend/css/frontend.scss" />

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" media="all,print" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/jquery-ui/jquery-ui.min.css" media="all,print" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/fontawesome/css/all.min.css" media="all,print" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro&display=swap" rel="stylesheet" media="all,print" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/vendor/sweetalert/sweetalert2.min.css" />

    <style type="text/css" media="print,all">
        html,
        body {
            height: 100%;
        }

        #page-content {
            flex: 1 0 auto;
        }

        #sticky-footer {
            flex-shrink: none;
        }

        [data-trigger] {
            transition: all .3s;
        }

        body {
            font-family: 'Source Sans Pro', sans-serif;
            min-height: calc(100vh - 9rem) !important;
        }

        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3,
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
            font-family: 'Roboto Slab', serif;
        }
    </style>
</head>

<body class="bg-light d-flex flex-column">

    <div class="content-wrapper container" id="page-content">

        <div class="row align-items-center h-100 justify-content-center">
            <div class="col-md-4">

                <h3 class="text-center">Perpus Apps</h3>
                <p class="text-center">Masuk dahulu</p>
                <div class="card card-body shadow border-0">
                    <form id="login">

                        <label for="username" class="mb-1">Nama Pengguna</label>
                        <input type="text" name="username" id="username" required="required" class="form-control" placeholder="Nama Pengguna" />

                        <label for="password" class="mb-1 mt-3">Kata Sandi</label>
                        <input id="password" type="password" required="required" name="password" class="form-control" placeholder="Kata Sandi" />

                        <div class="row">
                            <div class="col-6 my-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" value="forever" name="remember" />
                                    <label class="custom-control-label" for="remember">Ingatkan Saya</label>
                                </div>
                            </div>
                            <div class="col-6 my-3">
                                <a class="text-right float-right" href="<?= base_url('auth/remember-me'); ?>">Reset Kata Sandi</a>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="text-center col-6">
                                <button class="btn btn-primary" type="submit">Masuk<i class="fas fa-sign-in-alt ml-2"></i></button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>

    <footer class="footer bg-white py-3 mt-3">
        <div class="container w-100">
            <div class="row align-items-between">
                <div class="col-md-6">
                    <span class="text-muted text-sm-center">Hak Cipta <?= date('Y'); ?> <a class="font-weight-bold text-muted" href="<?= base_url(); ?>">Perpus Apps</a>.</span>
                </div>
                <div class="col-md-6">
                    <p class="m-0 badge-primary text-md-center badge" id="clock"></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url(); ?>assets/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Addons -->
    <script href="<?= base_url(); ?>assets/frontend/vendor/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/frontend/vendor/sweetalert/sweetalert2.min.js"></script>

    <script type="text/javascript">
        (function($) {
            "use strict";

            $('form#login').submit(function(s) {
                s.preventDefault();

                var $f = $(this);
                var $b = $('[type="submit"]');

                $.ajax({
                    'url': '<?= base_url('auth/check-login'); ?>',
                    'data': $f.serialize(),
                    'method': 'POST',
                    beforeSend: function() {
                        $b.attr({
                            'disabled': 'disabled',
                        }).html('<i class="fas fa-spin fa-spinner mr-2"></i>Tunggu');

                        $('input[type="text"], input[type="password"]').attr('readonly', 'readonly');
                    },
                    success: function(s) {
                        if (s == 3) { // Jika pengguna gak ditemukan di database

                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                html: '<p>Nama pengguna atau email tidak terdaftar. Mohon periksa kembali ejaan anda.</p>'
                            });

                            $('input[type="text"], input[type="password"]').removeAttr('readonly');
                            $b.removeAttr('disabled').html('Masuk<i class="fas fa-sign-in-alt ml-2"></i>');

                        } else if (s == 2) { // Jika password salah

                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                html: '<p>Kata sandi tidak sesuai dengan kresidensial akun.</p>'
                            });

                            $('input[type="text"], input[type="password"]').removeAttr('readonly');
                            $b.removeAttr('disabled').html('Masuk<i class="fas fa-sign-in-alt ml-2"></i>');

                        } else if (s == 1) { // Jika benar

                            $b.attr({
                                'disabled': 'disabled',
                                'class': 'btn btn-lg btn-primary',
                            }).html('<i class="fas fa-spin fa-spinner mr-2"></i>Tunggu');

                            Swal.fire({
                                icon: 'success',
                                title: 'Autentikasi Berhasil!',
                                html: 'Akun anda sudah teridentifikasi, sistem akan mengarahkan anda ke halaman administrator dalam waktu 5 detik.',
                                allowOutsideClick: false,
                                timer: 3000,
                                showCloseButton: false,
                                showConfirmButton: false,
                            });

                            setInterval(function() {
                                window.location.href = '<?= base_url("auth/check"); ?>';
                            }, 5000);

                        }
                    },
                    error: function() {

                    }
                });
            });
        })(jQuery);
    </script>

</body>

</html>