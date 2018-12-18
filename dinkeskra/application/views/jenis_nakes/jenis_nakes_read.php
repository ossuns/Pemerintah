<!-- <!doctype html>
<html>
    <head>
        <title>Tenaga Kesehatan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body> -->
        <h3 style="margin-top:0px">Jenis Tenaga Kesehatan</h3>
        <table class="table">
	    <tr><td>Jenis Tenaga Kesehatan</td><td><?php echo $jenis_nakes; ?></td></tr>
	    <tr><td>Singkatan</td><td><?php echo $singkatan; ?></td></tr>
	    <tr><td>Max Sip</td><td><?php echo $max_sip; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_nakes') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<!--         </body>
</html> -->