<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head> -->
    <body>
        <h2 style="margin-top:0px">Detail Pejabat</h2>
        <table class="table">
	    <tr><td>Nama Pejabat</td><td><?php echo $nama_pejabat; ?></td></tr>
	    <tr><td>Pangkat</td><td><?php echo $pangkat; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
        <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pejabat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
<!-- </html> -->