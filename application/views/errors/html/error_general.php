<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kesalahan!</title>
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
                            <tr><th>Tingkat Kesalahan</th><td>:</td><td><?php echo $heading; ?></td></tr>
                            <tr><th>Pesan</th><td>:</td><td><code><?php echo nl2br(str_replace( array('<p>', '</p>', '<br>', '<br/>'), array('', '', "\n", "\n"), $message ) ); ?></code></td></tr>
        				</table>
        			</div>
        		</div>

        	</div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    </body>
</html>