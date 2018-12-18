
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- dashboard -->
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- master sip -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/dinkeskra/jenis_dasar_sip"><i class="fa fa-circle-o"></i> Jenis Dasar SIP</a></li>
            
            <li><a href="http://localhost/dinkeskra/jenis_nakes"><i class="fa fa-circle-o"></i> Jenis Tenaga Kesehatan</a></li>

            <li><a href="http://localhost/dinkeskra/kecamatan"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
            
            <li><a href="http://localhost/dinkeskra/kelurahan"><i class="fa fa-circle-o"></i> Kelurahan</a></li>

            <li><a href="jenis_sarkes"><i class="fa fa-circle-o"></i> Jenis Sarana</a></li>
          </ul>
        </li>
        <!-- dokter -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Dokter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Master Dokter
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="http://localhost/dinkeskra/jenis_dokter"><i class="fa fa-circle-o"></i> Jenis Dokter</a></li>
              </ul>
            </li>
            <li><a href="http://localhost/dinkeskra/nakes"><i class="fa fa-circle-o"></i> Data Pemohon</a></li>
            
            <li><a href="http://localhost/dinkeskra/sip"><i class="fa fa-circle-o"></i> Data SIP</a></li>
          </ul>
        </li>
        <!-- calender -->
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
