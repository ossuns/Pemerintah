<h3 style="margin-top:0px">Jenis Tenaga Kesehatan</h3>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('jenis_nakes/create'),'<span class="glyphicon glyphicon-plus" aria-label="Tambah"></span>', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('jenis_nakes/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                    ?>
                    <a href="<?php echo site_url('jenis_nakes'); ?>" class="btn btn-default">Reset</a>
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
		<th><center>Jenis Tenaga Kesehatan</center></th>
		<th><center>Max Sip</center></th>
		<th><center>Action</center></th>
    </tr>
    <?php
        foreach ($jenis_nakes_data as $jenis_nakes)
        {
    ?>
    <tr>
		<td width="80px"><center><?php echo ++$start ?></center></td>
		<td><?php echo $jenis_nakes->jenis_nakes ?></td>
		<td><center><?php echo $jenis_nakes->max_sip ?></center></td>
		<td style="text-align:center" width="200px">
			<?php 
				// echo anchor(site_url('jenis_nakes/read/'.$jenis_nakes->id_jenis_nakes),'Read'); 
				// echo ' | '; 
				echo anchor(site_url('jenis_nakes/update/'.$jenis_nakes->id_jenis_nakes),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>');
				echo anchor(site_url('jenis_nakes/delete/'.$jenis_nakes->id_jenis_nakes),'<span class="glyphicon glyphicon-trash" aria-label="Delete"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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