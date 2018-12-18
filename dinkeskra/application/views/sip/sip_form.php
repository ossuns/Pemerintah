<h3 style="margin-top:0px"><?php echo $button ?> Data SIP</h3>

<form action="<?php echo $action; ?>" method="post">
    <input type="hidden" value="<?=$this->uri->segment(3)?>" name="id">
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="int">Nama Dokter <?php echo form_error('id_nakes') ?></label>
                </td>
                <td>
                    <!-- <input type="hidden" class="form-control" name="id_nakes" id="id_nakes" placeholder="Id Nakes" value="<?php echo $id_nakes; ?>" /> -->
                    <input type="text" class="form-control"  value="<?php echo $nama_dokter; ?>" readonly>
                    <input type="hidden" class="form-control" name="id_nakes" id="id_nakes" placeholder="Id Nakes" value="<?php echo $id_nakes; ?>" readonly>
                    
                </td>
            </tr>
        </div>
        
        <div class="form-group">
            <tr>
                <td>
                    <label for="varchar">No Sip <?php echo form_error('no_sip') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="no_sip" id="no_sip" placeholder="No Sip" value="<?php echo $no_sip; ?>" />
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="input" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo date('m/d/Y'); ?>" readonly/>
                    </div>
                </td>
            </tr>
        </div>
        <!-- <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></label>
                </td>
                <td>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" />
                </td>
            </tr>
        </div> -->
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Terbit <?php echo form_error('tanggal_terbit') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit" placeholder="Tanggal Terbit" value="<?php echo $tanggal_terbit; ?>" />
                    </div>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Berlaku <?php echo form_error('tanggal_berlaku') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <input type="date" class="form-control" name="tanggal_berlaku" id="tanggal_berlaku" placeholder="Tanggal Berlaku" value="<?php echo $tanggal_berlaku; ?>"/>
                    </div>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="date">Tanggal Kadaluarsa <?php echo form_error('masa_berlaku') ?></label>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>

                        <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Tanggal Kadaluarsa" value="<?php echo $masa_berlaku; ?>" readonly/>
                    </div>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="int">Nomor Urutan <?php echo form_error('no_urut') ?></label>
                </td>
                <td>
                    <select class="form-control" name="no_urut">
                        <option value="01">Kesatu</option>
                        <option value="02">Kedua</option>
                        <option value="03">Ketiga</option>
                    </select>
                    <!-- <input type="date" class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Tanggal Kadaluarsa" value="<?php echo $masa_berlaku; ?>" /> -->
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td>
                    <label for="text">No Rekomendasi <?php echo form_error('no_rekomendasi') ?></label>
                </td>
                <td>
                    <input type="text" class="form-control" name="no_rekomendasi" id="no_rekomendasi" placeholder="No Rekomendasi" value="<?php echo $no_rekomendasi; ?>" />
                </td>
            </tr>
        </div>
    </table>
<h3 style="margin-top:0px">Lokasi</h3>
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    <label for="int">Jenis Sarana <?php echo form_error('id_jenis_sarkes') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_jenis_sarkes" id="id_jenis_sarkes" placeholder="Id Jenis Sarkes" value="<?php echo $id_jenis_sarkes; ?>" /> -->
                    <?php echo form_dropdown('id_jenis_sarkes',$jj_jensar,$jj_current,'class="form-control" id="id_jenis_sarkes" onchange="proses()" ');?>
                </td>
            </tr>
        </div>

        <div class="form-group">
            <tr>
                <td>
                    <label for="int">Sarana Kesehatan <?php echo form_error('id_sarkes') ?></label>
                </td>
                <td>
                    <!-- <input type="text" class="form-control" name="id_sarkes" id="id_sarkes" placeholder="Id Sarkes" value="<?php echo $id_sarkes; ?>" /> -->
                    
                    <?php //echo form_dropdown('id_sarkes',$ss_sarkes,$ss_current,'class="form-control select"');?>
                     <?php if($this->uri->segment(2) == 'create') : ?>
                    <select name="id_sarkes" class="form-control" id="id_sarkes">
                        <option value="0">Pilih Lokasi</option>
                    </select>
                    <?php else : ?>
                    <?php echo form_dropdown('id_sarkes',$ss_sarkes,$ss_current,'class="form-control" id="id_sarkes"');?>
                    <?php endif; ?>
                </td>
            </tr>
        </div>
        <!-- <div class="form-group"> -->
            <!-- <tr> -->
                <!-- <td> -->
                    <!-- <label for="int">Sarana Praktek Mandiri <?php //echo form_error('id_sarkes') ?></label> -->
                <!-- </td> -->
                <!-- <td> -->
                    <!-- <input type="text" class="form-control" name="id_sarkes" id="id_sarkes" placeholder="Sarana Pratek Mandiri" value="<?php //echo $id_sarkes; ?>" /> -->
                    
                    <!-- <?php //echo form_dropdown('id_sarkes',$ss_sarkes,$ss_current,'class="form-control select"');?>
                     <?php //if($this->uri->segment(2) == 'create') : ?>
                    <select name="id_sarkes" class="form-control" id="id_sarkes">
                        <option value="0">Pilih Lokasi</option>
                    </select>
                    <?php //else : ?>
                    <?php //echo form_dropdown('id_sarkes',$ss_sarkes,$ss_current,'class="form-control" id="id_sarkes"');?>
                    <?php //endif; ?> -->
                <!-- </td> -->
            <!-- </tr> -->
        <!-- </div> -->
        <div class="form-group">
            <tr>
                <td>
                </td>
                <td>
                    <!-- <?php echo anchor(site_url('sarkes/create'),'<span>Tambah</span>', 'class="btn btn-primary" style="margin-top:0px" data-toggle="modal" data-target="#sarkes"'); ?> --> 
                    
                </td>
            </tr>
        </div>
        <!-- <div class="col-md-4">
            <?php echo anchor(site_url('sarkes/create'),'<span>Tambah</span>', 'class="btn btn-primary" style="margin-top:0px"'); ?>
        </div> -->
    </table>
        <input type="hidden" name="id_sip" value="<?php echo $id_sip; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('sip') ?>" class="btn btn-default">Cancel</a>
    </form>

    </body>
    <!-- <script type="text/javascript"> 
        function proses(){
          var jenissarkes=document.getElementById("id_jenis_sarkes").value;
          if (jenissarkes==2) {
            document.getElementById("id_sarkes").disabled = true;   
          }else{
             document.getElementById("id_sarkes").disabled = false; 
          }
         
        }
    </script> -->
   
</html>