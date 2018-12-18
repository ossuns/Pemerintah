<h3 style="margin-top:0px"><?php echo $button ?> Sarana Kesehatan</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
	    <div class="form-group">
            <tr>
                <td>
                    <label for="int">Jenis Sarkes <?php echo form_error('id_jenis_sarkes') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_jenis_sarkes" id="id_jenis_sarkes" placeholder="Id Jenis Sarkes" value="<?php echo $id_jenis_sarkes; ?>" /> -->
                    <?php echo form_dropdown('id_jenis_sarkes',$dd_jenis,$jj_current,'class="form-control"');?>
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Id Kecamatan" value="<?php echo $id_kecamatan; ?>" /> -->
                    <?php echo form_dropdown('id_kecamatan',$dd_kec,$cc_current,'class="form-control" id="id_kecamatan"');?>
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="int">Kelurahan <?php echo form_error('id_kelurahan') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_kelurahan" id="id_kelurahan" placeholder="Id Kelurahan" value="<?php echo $id_kelurahan; ?>" /> -->
                    
                    <?php if($this->uri->segment(2) == 'create') : ?>
                    <select name="id_kelurahan" class="form-control" id="id_kelurahan">
                        <option value="0">Pilih Kelurahan</option>
                    </select>
                    <?php else : ?>
                    <?php echo form_dropdown('id_kelurahan',$dd_kel,$ll_current,'class="form-control" id="id_kelurahan"');?>
                    <?php endif; ?>
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Nama Sarana <?php echo form_error('sarkes') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="sarkes" id="sarkes" placeholder="Sarkes" value="<?php echo $sarkes; ?>" />
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="alamat">Alamat Sarana<?php echo form_error('alamat_sarkes') ?></label>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="alamat_sarkes" id="alamat_sarkes" placeholder="Alamat"><?php echo $alamat_sarkes; ?></textarea>
                </td>
            </tr>
        </div>
    </table>
	<input type="hidden" name="id_sarkes" value="<?php echo $id_sarkes; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('sarkes') ?>" class="btn btn-default">Cancel</a>
</form>