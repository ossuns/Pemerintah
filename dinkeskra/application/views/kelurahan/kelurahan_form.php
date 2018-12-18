<h3 style="margin-top:0px"> <?php echo $button ?> Data Kelurahan</h3>
<form action="<?php echo $action; ?>" method="post">
    <table class="table">
	    <div class="form-group">
            <tr>
                <td>
                    <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                </td>
                    <!-- <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Id Kecamatan" value="<?php echo $id_kecamatan; ?>" /> -->
                <td>
                    <?php echo form_dropdown('id_kecamatan',$dd_kecamatan,$dd_current,'class="form-control"');?>
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
                </td>
            </tr>
        </div>
	    <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">Kodepos <?php echo form_error('kodepos') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kodepos" value="<?php echo $kodepos; ?>" />
                </td>
            </tr>
        </div>
    </table>
	    <input type="hidden" name="id_kelurahan" value="<?php echo $id_kelurahan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelurahan') ?>" class="btn btn-default">Cancel</a>
	</form>
 <!--    </body>
</html> -->