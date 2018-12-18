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
        <h2>Sip List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Nakes</th>
		<th>Id Sarkes</th>
		<th>No Sip</th>
		<th>No Pendaftaran</th>
		<th>No Tahun Sip</th>
		<th>No Urut</th>
		<th>Tahun Terbit</th>
		<th>Tanggal Masuk</th>
		<th>Tanggal Selesai</th>
		<th>Tanggal Terbit</th>
		<th>Tanggal Berlaku</th>
		<th>Tanggal Kadaluarsa</th>
		
            </tr><?php
            foreach ($sip_data as $sip)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sip->id_nakes ?></td>
		      <td><?php echo $sip->id_sarkes ?></td>
		      <td><?php echo $sip->no_sip ?></td>
		      <td><?php echo $sip->no_pendaftaran ?></td>
		      <td><?php echo $sip->no_tahun_sip ?></td>
		      <td><?php echo $sip->no_urut ?></td>
		      <td><?php echo $sip->tahun_terbit ?></td>
		      <td><?php echo $sip->tanggal_masuk ?></td>
		      <td><?php echo $sip->tanggal_selesai ?></td>
		      <td><?php echo $sip->tanggal_terbit ?></td>
		      <td><?php echo $sip->tanggal_berlaku ?></td>
		      <td><?php echo $sip->tanggal_kadaluarsa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>