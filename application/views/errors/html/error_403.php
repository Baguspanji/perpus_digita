<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tidak diizinkan!</title>
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

        <div class="content-wrapper container" id="page-content">

        	<div class="row align-items-center h-100 justify-content-center">
        		<div class="col-md-6">
        			<div class="d-flex flex-row align-items-center">
        				<h1>403</h1>
        				<p class="ml-3"><code>Akses Ditolak</code></p>
        			</div>
        			<p class="text-muted">Maaf, Anda tidak memiliki akses ke halaman ini. Karena ada sesuatu yang sensitif yang merusak kinerja server.</p>
        			<a href="javascript:history.back();" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
        		</div>
        	</div>

        </div>

        <footer class="footer bg-white py-3 mt-3">
        	<div class="container w-100">
        		<div class="row align-items-between">
	        		<div class="col-md-6">
	        			<span class="text-muted text-sm-center">Hak Cipta <?php echo date('Y'); ?> <a class="font-weight-bold text-muted" href="/">Perpus Apps</a>.</span>
	        		</div>
	        		<div class="col-md-6">
	        			<p class="m-0 badge-primary text-md-center badge" id="clock"></p>
	        		</div>
	        	</div>
        	</div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    </body>
</html>