<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <img src="<?php //echo base_url();?>assets/img/DINKES.jpg" class="user-image" alt="User Image" width="100%"> -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Jumlah Tenaga Kesehatan -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $nakes; ?></h3>
              <p>Tenaga Kesehatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="http://localhost/dinkeskra/nakes" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- SIP Aktif -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $aktif - $masa_berlaku; ?><sup style="font-size: 20px"></sup></h3>
              <p>SIP Aktif</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- SIP Belum Aktif -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $blmaktif; ?></h3>
              <p>SIP Belum Aktif</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- SIP Kadaluarsa -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $masa_berlaku; ?></h3>
              <p>SIP Kadaluarsa</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- Dokter Umum -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $count_umum; ?></h3>
              <p>Dokter Umum</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- Dokter Gigi -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $count_gigi; ?></h3>
              <p>Dokter Gigi</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- Dokter Spesialis -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $count_spesialis; ?></h3>
              <p>Dokter Spesialis</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
      </div>

      <!-- /.row (main row) -->
    <!-- <div class="box" style="height:auto;"> -->
	    <!-- <div class="box-body"> -->
	    	<!-- <h3 align="center"><b>Selamat Datang di Halaman Admin</b></h3> -->
	    	<!-- <h3 align="center"><b>SISTEM INFORMASI SURAT IJIN PRAKTEK DOKTER -->
	    	<!-- <br>KABUPATEN KARANGANYAR</b></h3> -->
	    	<!-- <h4 align="center" style="font-size:20px">Jl. Kenangan</h4> -->
	    	<!-- <img src="<?php //echo base_url();?>assets/img/putih.jpg" class="user-image" alt="User Image" width="20%" align="center"> -->
	    <!-- </div> -->
	<!-- </div> -->
      
</section>
 <?php //$this->load->view('template/footer'); ?>