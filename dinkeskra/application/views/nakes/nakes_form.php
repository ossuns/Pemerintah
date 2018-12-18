<h3 style="margin-top:0px"><?php echo $button ?> Data Dokter</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Nik <?php echo form_error('nik') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Nama Lengkap <?php echo form_error('nama') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="enum">Jenis Kelamin <?php echo form_error('jk') ?></label>
                </td>
                <td>
                    <input type="radio" class="form-radio" name="jk" id="jk1" value="Laki-laki" <?php if($jk == 'Laki-Laki'){ echo 'checked="checked"'; } ?> /><label for="jk1">Laki-laki</label>
                    <br>
                    <input type="radio" class="form-radio" name="jk" id="jk2" value="Perempuan" <?php if($jk == 'Perempuan'){ echo 'checked="checked"'; } ?> /><label for="jk2">Perempuan</label>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Tempat Lahir <?php echo form_error('tmp_lahir') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" value="<?php echo $tmp_lahir; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />
                    </div>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Telepon <?php echo form_error('telp') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Telephon" value="<?php echo $telp; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="alamat">Alamat Dokter <?php echo form_error('alamat') ?></label>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="int">Jenis Dokter <?php echo form_error('id_jenis_nakes') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_jenis_nakes" id="id_jenis_nakes" placeholder="Id Jenis Nakes" value="<?php echo $id_jenis_nakes; ?>" /> -->
                    <?php echo form_dropdown('id_jenis_nakes',$dd_jenisnakes,$dd_current,'class="form-control"');?>
                </td>
            </tr>
        </div>
    </table>
    <h3 style="margin-top:0px">Dasar SIP</h3>
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Nomor STR <?php echo form_error('no_str') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="no_str" id="no_str" placeholder="Nomor" value="<?php echo $no_str; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Masa Berlaku STR <?php echo form_error('masa_berlaku') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Masa Berlaku" value="<?php echo $masa_berlaku; ?>" />
                    </div>
                </td>
            </tr>
        </div>
    </table>
    <input type="hidden" name="id_nakes" value="<?php echo $id_nakes; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('nakes') ?>" class="btn btn-default">Cancel</a>
</form>