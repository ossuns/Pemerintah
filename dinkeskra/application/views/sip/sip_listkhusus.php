<td><tr><a href="<?php echo site_url('nakes') ?>" class="glyphicon glyphicon-arrow-left"></a></tr><tr><h3 style="margin-top:0px">Data Sip Dokter <?php echo $ok ;?></h3></tr></td>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('sip/create'),'<span class="glyphicon glyphicon-plus" aria-label="Edit"></span>', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('sip/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                    ?>
                    <a href="<?php echo site_url('sip'); ?>" class="btn btn-default">Reset</a>
                    <?php
                        }
                    ?>
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</div>
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
        foreach ($sip_data as $sip)
        {
    ?>
    <tr>
	    <td width="80px"><center><?php echo ++$start ?></center></td>
		<td>
            No SIP : <?php echo $sip->no_sip ?><br>
            Jenis Sarana : <?php echo $sip->jenis_sarkes ?><br>
            Lokasi : <?php echo $sip->sarkes ?><br>
            Alamat : <?php echo $sip->alamat_sarkes ?>
        </td>
		<td><?php echo date('d-F-Y', strtotime($sip->tanggal_terbit)) ?></td>
		<td><?php echo date('d-F-Y', strtotime($sip->masa_berlaku)) ?></td>
        <td><?php echo $sip->status_sip ?></td>
		<td style="text-align:center" width="200px">
			<?php
				echo anchor(site_url('sip/update/'.$sip->id_sip),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>'); 
                echo ' | '; 
                echo anchor(site_url('sip/aktifasi/'.$sip->id_sip),'<span class="glyphicon glyphicon-saved" aria-label="Terbitkan"></span>'); 
                echo ' | '; 
                echo anchor(site_url('Docx/cetaksip/'.$sip->id_sip),'<span class="glyphicon glyphicon-download" aria-label="Cetak" disabled></span>', array('disabled'=>'disabled')); 
				echo ' | '; 
				echo anchor(site_url('sip/delete/'.$sip->id_sip),'<span class="glyphicon glyphicon-trash" aria-label="Hapus"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
            
		</td>
	</tr>
    <?php
        }
    ?>
</table>
<div class="row">
    <!-- <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	</div> -->
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>