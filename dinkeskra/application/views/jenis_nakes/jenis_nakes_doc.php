<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Jenis_nakes List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Nakes</th>
		<th>Singkatan</th>
		<th>Max Sip</th>
		
            </tr><?php
            foreach ($jenis_nakes_data as $jenis_nakes)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $jenis_nakes->jenis_nakes ?></td>
		      <td><?php echo $jenis_nakes->singkatan ?></td>
		      <td><?php echo $jenis_nakes->max_sip ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>