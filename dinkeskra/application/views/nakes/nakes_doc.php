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
        <h2>Nakes List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Jenis Nakes</th>
		<th>Nik</th>
		<th>Nama</th>
		<th>Jk</th>
		<th>Telp</th>
		<th>Alamat</th>
		<th>Tmp Lahir</th>
		<th>Tgl Lahir</th>
		
            </tr><?php
            foreach ($nakes_data as $nakes)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nakes->id_jenis_nakes ?></td>
		      <td><?php echo $nakes->nik ?></td>
		      <td><?php echo $nakes->nama ?></td>
		      <td><?php echo $nakes->jk ?></td>
		      <td><?php echo $nakes->telp ?></td>
		      <td><?php echo $nakes->alamat ?></td>
		      <td><?php echo $nakes->tmp_lahir ?></td>
		      <td><?php echo $nakes->tgl_lahir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>