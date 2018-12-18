<h3 style="margin-top:0px">Jenis Sarana Kesehatan</h3>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <!-- <?php //echo anchor(site_url('jenis_sarkes/create'),'<span class="glyphicon glyphicon-plus" aria-label="Tambah"></span>', 'class="btn btn-primary"'); ?> -->
        <a href="<?php echo site_url('jenis_sarkes/create'); ?>" class="btn btn-primary"><span class="fa fa-fw fa-plus"></span>Tambah Data Jenis Sarana Kesehatan</a>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('jenis_sarkes/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                        if ($q <> '')
                        {
                            ?>
                                <a href="<?php echo site_url('jenis_sarkes'); ?>" class="btn btn-default">Reset</a>
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
		<th><center>Sarana Kesehatan</center></th>
		<th><center>Action</center></th>
    </tr>
    <?php
        foreach ($jenis_sarkes_data as $jenis_sarkes)
        {
    ?>
    <tr>
		<td width="80px"><center><?php echo ++$start ?></center></td>
		<td><?php echo $jenis_sarkes->jenis_sarkes ?></td>
		<td style="text-align:center" width="200px">
			<!-- <?php 
				//echo anchor(site_url('jenis_sarkes/read/'.$jenis_sarkes->id_jenis_sarkes),'<span class="glyphicon glyphicon-eye-open" aria-label="Detail"></span>'); 
				//echo ' | '; 
				//echo anchor(site_url('jenis_sarkes/update/'.$jenis_sarkes->id_jenis_sarkes),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>'); 
                //echo ' | ';
				//echo anchor(site_url('jenis_sarkes/delete/'.$jenis_sarkes->id_jenis_sarkes),'<span class="glyphicon glyphicon-trash" aria-label="Delete"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?> -->
            <a href="<?php echo base_url().'jenis_sarkes/update/'.$jenis_sarkes->id_jenis_sarkes; ?>" class="btn btn-success" style="margin-right:5px;"><i class="fa fa-fw fa-edit"></i>
            <a href="<?php echo base_url().'jenis_sarkes/delete/'.$jenis_sarkes->id_jenis_sarkes; ?>" class="btn btn-danger" style="margin-right:5px;" onclick="javasciprt: return confirm(\'Are You Sure ?\')"><i class="fa fa-fw fa- fa-trash"></i>
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