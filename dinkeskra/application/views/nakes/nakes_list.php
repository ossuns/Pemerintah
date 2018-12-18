<h3 style="margin-top:0px">Data Dokter</h3>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <!-- <?php// echo anchor(site_url('nakes/create'),'<span class="glyphicon glyphicon-plus" aria-label="Tambah"></span>', 'class="btn btn-primary"'); ?> -->
        <a href="<?php echo site_url('nakes/create'); ?>" class="btn btn-primary"><span class="fa fa-fw fa-plus"></span>Tambah Data Dokter</a>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>   
</div>
<!-- <table class="table table-bordered" style="margin-bottom: 10px"> -->
<table id="table1" class="table table-responsive table-bordered">
    <tfoot>
            <tr>
                <th><center>No</center></th>
        <th><center>Nama Lengkap</center></th>
        <th><center>Jenis Kelamin</center></th>
        <th><center>Jenis Dokter</center></th>
        <th><center>Telepon</center></th>
        <th><center>Alamat</center></th>
        <th><center>TTL</center></th>
        <!-- <th>Jumlah SIP Aktif</th> -->
        <th><center>Action</center></th>
            </tr>
        </tfoot>
        <thead>
    <tr>
        <th><center>No</center></th>
		<th><center>Nama Lengkap</center></th>
		<th><center>Jenis Kelamin</center></th>
		<th><center>Jenis Dokter</center></th>
		<th><center>Telepon</center></th>
		<th><center>Alamat</center></th>
		<th><center>TTL</center></th>
		<!-- <th>Jumlah SIP Aktif</th> -->
		<th><center>Action</center></th>
    </tr>
</thead>
    <?php
        foreach ($nakes_data as $nakes)
        {
    ?>
    <tr>
	   <td width="80px" align="center"><?php echo ++$start ?></td>
		<td><?php echo $nakes->nama ?></td>
		<td><?php echo $nakes->jk ?></td>
		<td><?php echo $nakes->jenis_nakes ?></td>
		<td><?php echo $nakes->telp ?></td>
		<td><?php echo $nakes->alamat ?></td>
		<td><?php echo $nakes->tmp_lahir ?> ,  <?php echo date('d-F-Y', strtotime($nakes->tgl_lahir)) ?></td>
		<td style="text-align:center" width="200px">
			<!-- <?php 
				//echo anchor(site_url('nakes/read/'.$nakes->id_nakes),'<span class="glyphicon glyphicon-eye-open" aria-label="Detail"></span>'); 
                //echo ' | ';
				//echo anchor(site_url('nakes/update/'.$nakes->id_nakes),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>');
                // echo ' | ';
                // echo anchor(site_url('sip/listkhusus/'.$nakes->id_nakes.'/'.$nakes->nama),'<span class="glyphicon glyphicon-search" aria-label="Cari SIP"></span>');
                //echo ' | ';
				//echo anchor(site_url('nakes/delete/'.$nakes->id_nakes),'<span class="glyphicon glyphicon-trash aria-label="Delete""></span>','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
			?> -->
            <a href="<?php echo base_url().'nakes/read/'.$nakes->id_nakes; ?>" class="btn btn-primary" style="margin-right:5px;"><i class="fa fa-fw fa-eye"></i>
            <a href="<?php echo base_url().'nakes/update/'.$nakes->id_nakes; ?>" class="btn btn-success" style="margin-right:5px;"><i class="fa fa-fw fa-edit"></i>
            <a href="<?php echo base_url().'nakes/delete/'.$nakes->id_nakes; ?>" class="btn btn-danger" style="margin-right:5px;" onclick="javasciprt: return confirm(\'Are You Sure ?\')"><i class="fa fa-fw fa- fa-trash"></i>
		</td>
	</tr>
    <?php
        }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <div class="col-md-4">
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
    		<?php //echo anchor(site_url('nakes/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    		<?php //echo anchor(site_url('nakes/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-8">
            <form method="post" action="<?=base_url('nakes/excel')?>">
                <select id="filternakes" class="form-control" name="id_jenis_nakes" onchange="this.form.submit()">
                    <option value="">Pilih Jenis</option>
                <?php foreach ($jennakes_data as $key => $value) : ?>
                    <option value="<?=$value->id_jenis_nakes; ?>"><?=$value->jenis_nakes; ?></option>
                <?php endforeach; ?>
                </select>
            </form>
        </div>
	</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
     <!-- nakes dropdon -->
    <div>
        
    </div>
</div>
<script type="text/javascript">
     $("#filternakes").change(function() {
        document.location.href = "<?=site_url()?>nakes?filter=" + $(this).val();
    });
 </script>