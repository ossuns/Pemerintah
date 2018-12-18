<h3 style="margin-top:0px">Data Sip</h3>
        <table class="table table-bordered" id="table1" style="margin-bottom: 10px;">
            <tfoot>
            <tr>
                <th><center>No</center></th>
        <th><center>No SIP</center></th>
        <th><center>Nama Dokter</center></th>
        <th><center>No STR</center></th>
        <th><center>Tanggal Kadaluarsa</center></th>
        <th><center>Lokasi</center></th>
        <!-- <th><center>Jumlah SIP Aktif</center></th> -->
        <th><center>Action</center></th>
            </tr>
        </tfoot>
            <thead>
            <tr>
                <th><center>No</center></th>
        <th><center>No SIP</center></th>
        <th><center>Nama Dokter</center></th>
        <th><center>No STR</center></th>
        <th><center>Tanggal Kadaluarsa</center></th>
        <th><center>Lokasi</center></th>
        <!-- <th><center>Jumlah SIP Aktif</center></th> -->
        <th><center>Action</center></th>
            </tr></thead>
            <tbody><?php
            foreach ($sip_data as $sip)
            {
                $kadaluarsa = $this->Sip_model->kadaluarsa($sip->id_nakes);
                // print_r($sip);
                ?>
                <tr

        <?php
            if ($kadaluarsa) {
                echo "style='background-color:#FF0000'";
            }else {
                if($sip->status_sip ==="Aktif"){
                    echo "style='background-color:#9EEEBE'";
                }else{
                    echo "style='background-color:#FFFFFF'";
                }
            }
        ?>
                >
            <td width="80px"><center><?php echo ++$start ?></center></td>
            <td><?php echo $sip->no_sip ?></td>
            <td><?php echo $sip->nama ?></td>
            <td><?php echo $sip->no_str ?></td>
            <td><?php echo date('d-F-Y', strtotime($sip->masa_berlaku)) ?></td>
            <td><?php echo $sip->sarkes ?></td>
            <td style="text-align:center" width="200px">
                <!-- <?php 
                // echo anchor(site_url('sip/read/'.$sip->id_sip),'<span class="glyphicon glyphicon-eye-open" aria-label="Detail"></span>'); 
                // echo ' | '; 
                //echo anchor(site_url('sip/update/'.$sip->id_sip),'<span class="glyphicon glyphicon-pencil" aria-label="Edit"></span>'); 
                //echo ' | '; 
                //echo anchor(site_url('sip/delete/'.$sip->id_sip),'<span class="glyphicon glyphicon-trash" aria-label="Delete"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?> -->
                <a href="<?php echo base_url().'sip/update/'.$sip->id_sip; ?>" class="btn btn-success" style="margin-right:5px;"><i class="fa fa-fw fa-edit"></i>
                <a href="<?php echo base_url().'sip/delete/'.$sip->id_sip; ?>" class="btn btn-danger" style="margin-right:5px;" onclick="javasciprt: return confirm(\'Are You Sure ?\')"><i class="fa fa-fw fa- fa-trash"></i>
            </td>
        </tr>
                <?php
            }
            ?>
        </tbody>
        
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php //echo anchor(site_url('sip/excel'), 'Excel', 'class="btn btn-primary"'); ?>

        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>