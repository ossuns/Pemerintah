<h3 style="margin-top:0px"><?php echo $button ?> Sarana Kesehatan</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
	    <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Sarana Kesehatan <?php echo form_error('jenis_sarkes') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="jenis_sarkes" id="jenis_sarkes" placeholder="Sarana Kesehatan" value="<?php echo $jenis_sarkes; ?>" />
                </td>
            </tr>
        </div>
    </table>
	<input type="hidden" name="id_jenis_sarkes" value="<?php echo $id_jenis_sarkes; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('jenis_sarkes') ?>" class="btn btn-default">Cancel</a>
</form>