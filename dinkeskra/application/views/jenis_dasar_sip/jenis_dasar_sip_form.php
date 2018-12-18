<h3 style="margin-top:0px"><?php echo $button ?> Jenis Dasar SIP</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Jenis Dasar SIP <?php echo form_error('jenis_dasar_sip') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="jenis_dasar_sip" id="jenis_dasar_sip" placeholder="Jenis Dasar Sip" value="<?php echo $jenis_dasar_sip; ?>" />
                </td>
            </tr>
        </div>
    </table>
    <input type="hidden" name="id_jenis_dasar_sip" value="<?php echo $id_jenis_dasar_sip; ?>" /> 
	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	<a href="<?php echo site_url('jenis_dasar_sip') ?>" class="btn btn-default">Cancel</a>
</form>