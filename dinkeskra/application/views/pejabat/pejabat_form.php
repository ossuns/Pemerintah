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
        <h2 style="margin-top:0px">Form Pejabat <?php echo $button ?></h2>
            <form action="<?php echo $action; ?>" method="post">
                <table class="table">
	               <div class="form-group">
                        <tr><td><label for="varchar">Nama Pejabat <?php echo form_error('nama_pejabat') ?></label></td>
                        <td><input type="text" class="form-control" name="nama_pejabat" id="nama_pejabat" placeholder="Nama Pejabat" value="<?php echo $nama_pejabat; ?>" /></td></tr>
                    </div>
                

 <div class="form-group">
        <tr><td><label for="varchar">Pangkat <?php echo form_error('pangkat') ?></label></td>
            <td><select class="form-control select2" name="pangkat" id="pangkat" style="width: 100%;">
                  <option value="Kepala">Kepala</option>
                  <option value="Sekretaris">Sekretaris</option>
                  <option value="Kepala Bidang SDK">Kepala Bidang SDK</option>
                </select></td></tr>
        </div>

	    <div class="form-group">
            <tr><td><label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label></td>
            <td><input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" /></td></tr>
        </div>
	    <div class="form-group">
            <tr><td><label for="varchar">Nip <?php echo form_error('nip') ?></label></td>
            <td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" /></td></tr>
        </div>

        <div class="form-group">
        <tr><td><label for="varchar">Status <?php echo form_error('status') ?></label></td>
            <td><select class="form-control select2" name="status" id="status" style="width: 100%;">
                <?php if ($status == "aktif") { ?>
                  <option value="aktif" selected>Aktif</option>
                  <option value="non aktif">Non Aktif</option>
                <?php } else if ($status == "non aktif") { ?>
                    <option value="aktif">Aktif</option>
                    <option value="non aktif" selected>Non Aktif</option>
                <?php } else { ?>
                    <option value="aktif">Aktif</option>
                    <option value="non aktif">Non Aktif</option>
                <?php } ?>
                </select></td></tr>
        </div>
    </table>

      <!--   <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div> -->

	    <input type="hidden" name="id_pejabat" value="<?php echo $id_pejabat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pejabat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
<!-- </html> -->