<h3 style="margin-top:0px">Dasar_sip <?php echo $button ?></h3>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jenis Dasar Sip <?php echo form_error('id_jenis_dasar_sip') ?></label>
            <input type="text" class="form-control" name="id_jenis_dasar_sip" id="id_jenis_dasar_sip" placeholder="Id Jenis Dasar Sip" value="<?php echo $id_jenis_dasar_sip; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Nakes <?php echo form_error('id_nakes') ?></label>
            <input type="text" class="form-control" name="id_nakes" id="id_nakes" placeholder="Id Nakes" value="<?php echo $id_nakes; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Masa Berlaku <?php echo form_error('masa_berlaku') ?></label>
            <input type="text" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Masa Berlaku" value="<?php echo $masa_berlaku; ?>" />
        </div>
	    <input type="hidden" name="id_dasar_sip" value="<?php echo $id_dasar_sip; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dasar_sip') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>