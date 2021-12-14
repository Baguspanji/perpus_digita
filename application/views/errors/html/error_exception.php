<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Halaman 404!</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="all,print" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" media="all,print" />

        <!-- Plugins -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro&display=swap" rel="stylesheet" media="all,print" />

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
            [data-trigger] { transition: all .3s; }
            body { font-family: 'Source Sans Pro', sans-serif; min-height: calc(100vh - 9rem)!important;}
            h1,.h1,
            h2,.h2,
            h3,.h3,
            h4,.h4,
            h5,.h5,
            h6,.h6 { font-family: 'Roboto Slab', serif; }
        </style>
    </head>
    <body class="bg-light d-flex flex-column">

        <div class="content-wrapper" id="page-content">

        	<header class="bg-danger shadow mb-3 py-5">
        		<div class="text-white container">
        			<div class="row align-items-center">
        				<div class="col-6">
        					<h1>Kesalahan Terdeteksi!</h1>
        				</div>
        				<div class="col-6">
        					<i class="fas fa-exclamation-triangle float-right fa-5x" style="color: rgba(0,0,0,.2)"></i>
        				</div>
        			</div>
        		</div>
        	</header>

        	<div class="container">
        		
        		<div class="card shadow">
        			<div class="card-body">
        				<p class="m-0">Kesalahan berikut telah kami tangkap untuk anda perbaiki.</p>
        			</div>
        			<div class="table-responsive">
        				<table class="table table-striped mb-0 table-borderless">
        					<tr><th>Tingkat Kesalahan</th><td>: <?php echo get_class($exception); ?></td></tr>
        					<tr><th>Pesan</th><td>: <?php echo $message; ?></td></tr>
        					<tr><th>Tingkat Kesalahan</th><td>: <?php echo get_class($exception); ?></td></tr>
        					<tr><th>Berkas</th><td>: <code><?php echo $exception->getFile(); ?></td></code></tr>
        					<tr><th>Baris</th><td>: <?php echo $exception->getLine(); ?></td></tr>
        				</table>
        			</div>
        		</div>

        		<div class="card shadow my-3">
        			<a class="card-header bg-white text-decoration-none text-dark" href="#" data-toggle="collapse" data-target="#expand-error">
        				<h2 class="m-0 display-5">Pelacak Kode</h2>
        			</a>
        			<div class="card-body collapse" id="expand-error">
        				
						<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

						<?php foreach ($exception->getTrace() as $error): ?>

							<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
		        			<div class="table-responsive border rounded">
		        				<table class="table table-striped mb-0 table-borderless">

								<tr><th>Berkas</th><td>: <code><?php echo $error['file']; ?></code></td></tr>
								<tr><th>Baris</th><td>: <?php echo $error['line']; ?></td></tr>
								<tr><th>Fungsi</th><td>: <?php echo $error['function']; ?></td></tr>

								</table>
							</div>
							<?php endif ?>

						<?php endforeach ?>

						<?php endif ?>

        			</div>
        		</div>

        	</div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    </body>
</html>
