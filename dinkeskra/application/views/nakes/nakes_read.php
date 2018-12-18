<a href="<?php echo site_url('nakes') ?>" class="glyphicon glyphicon-arrow-left"></a><h3 style="margin-top:0px">Data Dokter</h3>


<?php
	if ($data['masa_berlaku'] >= date("Y-m-d") && diff_date(date("Y-m-d"), $data['masa_berlaku'])>180) {
		$color = "#00FF00";
		$text = "STR Masih Berlaku";
	}elseif ($data['masa_berlaku'] >= date("Y-m-d") && diff_date(date("Y-m-d"), $data['masa_berlaku'])<=180 ) {
		$color = "#EFB723";
		$text = "STR Hampir Kadaluarsa";
	}else{
		$color = "#FF0000";
		$text = "STR Sudah Kadaluarsa";
	}
?>

<h3 style="color: <?php echo $color; ?>"><?php echo $text; ?></h3>
<p>No STR :  <?php echo $data['no_str'] ?></p>
<p>Berlaku sampai dengan  <?php echo date('d-F-Y', strtotime($data['masa_berlaku'])); ?></p>
<br>
    <table class="table">
	    <tr><td>Jenis Tenaga Kesehatan</td><td><?php echo $data['jenis_nakes']; ?></td></tr>
	    <tr><td>Nik</td><td><?php echo $data['nik']; ?></td></tr>
	    <tr><td>Nama Lengkap</td><td><?php echo $data['nama']; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $data['jk']; ?></td></tr>
	    <tr><td>Tempat Tanggal Lahir</td><td><?php echo $data['tmp_lahir']; ?>, <?php echo date('d-F-Y', strtotime($data['tgl_lahir'])); ?></td></tr>
	    <tr><td>Telephon</td><td><?php echo $data['telp']; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $data['alamat']; ?></td></tr>
	    <tr><td></td><td></td></tr>
	</table>
<br>

<h3 style="margin-top:0px">Data SIP</h3>
<p>Max SIP Aktif : 3</p>	
	<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th><center>No</center></th>
		<th><center>Rincian</center></th>
		<th><center>Tanggal Terbit</center></th>
		<th><center>Tanggal Kadaluarsa</center></th>
        <th><center>Status</center></th>
		<th><center>Action</center></th>
    </tr>
    <?php
    	$start = 0;
    	$juml = 0;
        foreach ($sip as $result)
        {
    ?>
    <tr
    	<?php
    		if ($kadaluarsa) {
    			echo "style='background-color:#FF0000'";
    		} else {
    			echo ($result['status_sip']==="Aktif") ? "style='background-color:#9EEEBE'" : "";
    		}
    	?>
    >
	    <td width="80px"><center><?php echo ++$start ?></center></td>
		<td>
            No SIP : <?php echo $result['no_sip']; ?><br>
            Jenis Sarana : <?php echo $result['jenis_sarkes']; ?><br>
            Lokasi : <?php echo $result['sarkes']; ?><br>
            Alamat : <?php echo $result['alamat_sarkes']; ?>
        </td>
		<td><center><?php echo date('d-F-Y', strtotime($result['tanggal_terbit'])); ?></center></td>
		<td><center><?php echo date('d-F-Y', strtotime($result['masa_berlaku'])); ?></center></td>
        <td><center><?php echo $result['status_sip']; ?></center></td>
		<td style="text-align:center" width="200px">
			<?php
				echo anchor(site_url('sip/update/'.$result['id_sip']),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>'); 
                echo ' | '; 
                echo anchor(site_url('sip/aktifasi/'.$result['id_sip']),'<span class="glyphicon glyphicon-saved" aria-label="Terbitkan"></span>'); 
                echo ' | '; 
                echo anchor(site_url('Docx/cetaksip/'.$result['id_sip']),'<span class="glyphicon glyphicon-download" aria-label="Cetak" disabled></span>', array('disabled'=>'disabled')); 
				echo ' | '; 
				echo anchor(site_url('sip/delete/'.$result['id_sip']),'<span class="glyphicon glyphicon-trash" aria-label="Hapus"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
            
		</td>
	</tr>
    <?php
    	$juml += $start;
        }
    ?>
</table>
<div class="col-md-4">
    <?php 
if ($data['masa_berlaku'] >= date("Y-m-d") && $juml <= 3) {
    echo anchor(site_url('sip/create/'.$data['id_nakes'].'/'),'<span>Tambah SIP</span>', 'class="btn btn-primary" style="margin-top:0px"'); 
}elseif ($juml > 3) {
	echo "<script>alert('SIP Max');</script>";
}
?>
</div>