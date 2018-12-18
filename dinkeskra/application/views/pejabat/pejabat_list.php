<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head> -->
    <body>
        <h2 style="margin-top:0px">Daftar Data Pejabat </h2>
        <div class="row" style="margin-bottom: 10px">
           <div class="col-md-4">
                <a href="<?php echo site_url('pejabat/create'); ?>" class="btn btn-primary"><span class="fa fa-fw fa-plus"></span>Tambah Data Pejabat</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pejabat/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pejabat'); ?>" class="btn btn-default">Reset</a>
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
                <th>No</th>
		<th>Nama Pejabat</th>
		<th>Pangkat</th>
		<th>Jabatan</th>
		<th>Nip</th>
        <th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($pejabat_data as $pejabat)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pejabat->nama_pejabat ?></td>
			<td><?php echo $pejabat->pangkat ?></td>
			<td><?php echo $pejabat->jabatan ?></td>
			<td><?php echo $pejabat->nip ?></td>
            <td><?php echo $pejabat->status ?></td>
			<!-- <td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('pejabat/read/'.$pejabat->id_pejabat),'Read'); 
				//echo ' | '; 
				//echo anchor(site_url('pejabat/update/'.$pejabat->id_pejabat),'Update'); 
				//echo ' | '; 
				//echo anchor(site_url('pejabat/delete/'.$pejabat->id_pejabat),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td> -->

            <td style="text-align:center" width="200px">
                        <!-- <a href="<?php //echo base_url().'pejabat/read/'.$pejabat->id_pejabat; ?>" class="btn btn-primary" style="margin-right:5px;"><i class="fa fa-fw fa-eye"></i> -->
                        </a>
                        <a href="<?php echo base_url().'pejabat/update/'.$pejabat->id_pejabat; ?>" class="btn btn-success" style="margin-right:5px;"><i class="fa fa-fw fa-edit"></i>
                        <a href="<?php echo base_url().'pejabat/delete/'.$pejabat->id_pejabat; ?>" class="btn btn-danger" style="margin-right:5px;"><i class="fa fa-fw fa- fa-trash"></i>
                    </td>


		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pejabat/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pejabat/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
<!-- </html> -->