<h3 style="margin-top:0px"> <?php echo $button ?> Data Kecamatan</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
	    <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                </td>
            </tr>
        </div>
    </table>
    <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('kecamatan') ?>" class="btn btn-default">Cancel</a>
</form>