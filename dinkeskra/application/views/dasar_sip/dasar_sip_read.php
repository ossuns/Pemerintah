<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Dasar_sip Read</h2>
        <table class="table">
	    <tr><td>Id Jenis Dasar Sip</td><td><?php echo $id_jenis_dasar_sip; ?></td></tr>
	    <tr><td>Id Nakes</td><td><?php echo $id_nakes; ?></td></tr>
	    <tr><td>Masa Berlaku</td><td><?php echo $masa_berlaku; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('dasar_sip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>