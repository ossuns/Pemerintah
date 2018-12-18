<h3 style="margin-top:0px"><?php echo $button ?> Jenis Tenaga Kesehatan</h3>
<form action="<?php echo $action; ?>" method="post">
	<table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Jenis Tenaga Kesehatan <?php echo form_error('jenis_nakes') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="jenis_nakes" id="jenis_nakes" placeholder="Jenis Tenaga Kesehatan" value="<?php echo $jenis_nakes; ?>" />
                </td>
            </tr>
        </div>
    	<div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Singkatan <?php echo form_error('singkatan') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Singkatan" value="<?php echo $singkatan; ?>" />
                </td>
            </tr>
        </div>
    	<div class="form-group">
            <tr>
                <td>
                    <label for="int">Max Sip <?php echo form_error('max_sip') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="max_sip" id="max_sip" placeholder="Max Sip" value="<?php echo $max_sip; ?>" />
                </td>
            </tr>
        </div>
    </table>
	<input type="hidden" name="id_jenis_nakes" value="<?php echo $id_jenis_nakes; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('jenis_nakes') ?>" class="btn btn-default">Cancel</a>
</form>