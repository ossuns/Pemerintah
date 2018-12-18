<h3 style="margin-top:0px">Data Sip</h3>

    <table class="table">
	    <tr><td>Jenis Tenaga Kesehatan</td><td><?php echo $id_nakes; ?></td></tr>
	    <tr><td>Jenis Sarana Kesehatan</td><td><?php echo $id_jenis_sarkes; ?></td></tr>
	    <tr><td>Sarana Kesehatan</td><td><?php echo $id_sarkes; ?></td></tr>
	    <tr><td>No Sip</td><td><?php echo $no_sip; ?></td></tr>
	    <tr><td>Tanggal Masuk</td><td><?php echo $tanggal_masuk; ?></td></tr>
	    <tr><td>Tanggal Selesai</td><td><?php echo $tanggal_selesai; ?></td></tr>
	    <tr><td>Tanggal Terbit</td><td><?php echo $tanggal_terbit; ?></td></tr>
	    <!-- <tr><td>Tanggal Berlaku</td><td><?php echo $tanggal_berlaku; ?></td></tr> -->
	    <tr><td>Tanggal Kadaluarsa</td><td><?php echo $masa_berlaku; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>