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
        <h2>Sarkes List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kecamatan</th>
		<th>Id Kelurahan</th>
		<th>Sarkes</th>
		<th>Alamat</th>
		
            </tr><?php
            foreach ($sarkes_data as $sarkes)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sarkes->id_kecamatan ?></td>
		      <td><?php echo $sarkes->id_kelurahan ?></td>
		      <td><?php echo $sarkes->sarkes ?></td>
		      <td><?php echo $sarkes->alamat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>