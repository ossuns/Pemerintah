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
        <h2>Daftar Data Pejabat</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pejabat</th>
		<th>Pangkat</th>
		<th>Jabatan</th>
		<th>Nip</th>
        <th>Status</th>
		
            </tr><?php
            foreach ($pejabat_data as $pejabat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pejabat->nama_pejabat ?></td>
		      <td><?php echo $pejabat->pangkat ?></td>
		      <td><?php echo $pejabat->jabatan ?></td>
		      <td><?php echo $pejabat->nip ?></td>	
              <td><?php echo $pejabat->status ?></td>  
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>