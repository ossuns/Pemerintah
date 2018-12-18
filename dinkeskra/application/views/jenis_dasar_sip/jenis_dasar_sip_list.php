<h3 style="margin-top:0px">Jenis Dasar SIP</h3>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('jenis_dasar_sip/create'),'<span class="glyphicon glyphicon-plus" aria-label="Tambah"></span>', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('jenis_dasar_sip/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                    ?>
                    <a href="<?php echo site_url('jenis_dasar_sip'); ?>" class="btn btn-default">Reset</a>
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
        <th><center>Jenis Dasar Sip</center></th>
        <th><center>Action</center></th>
    </tr>
    <?php
        foreach ($jenis_dasar_sip_data as $jenis_dasar_sip)
        {
    ?>
    <tr>
		<td width="80px"><center><?php echo ++$start ?></center></td>
		<td><?php echo $jenis_dasar_sip->jenis_dasar_sip ?></td>
		<td style="text-align:center" width="200px">
			<?php 
    			echo anchor(site_url('jenis_dasar_sip/read/'.$jenis_dasar_sip->id_jenis_dasar_sip),'<span class="glyphicon glyphicon-eye-open" aria-label="Detail"></span>'); 
    			echo ' | '; 
    			echo anchor(site_url('jenis_dasar_sip/update/'.$jenis_dasar_sip->id_jenis_dasar_sip),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>'); 
                echo ' | ';
    			echo anchor(site_url('jenis_dasar_sip/delete/'.$jenis_dasar_sip->id_jenis_dasar_sip),'<span class="glyphicon glyphicon-trash" aria-label="Detele"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		</td>
	</tr>
    <?php
        }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>