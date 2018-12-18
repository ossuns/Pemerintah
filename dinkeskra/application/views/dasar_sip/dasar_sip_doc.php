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
        <h2>Dasar_sip List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Nakes</th>
		<th>Dasar Sip</th>
		<th>Masa Berlaku</th>
		
            </tr><?php
            foreach ($dasar_sip_data as $dasar_sip)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $dasar_sip->id_nakes ?></td>
		      <td><?php echo $dasar_sip->dasar_sip ?></td>
		      <td><?php echo $dasar_sip->masa_berlaku ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>