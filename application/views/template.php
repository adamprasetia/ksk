<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" href="http://www.cianjurkab.go.id/images/cjr_icon.png" type="image/x-icon"/>
	<title><?php echo APP_NAME?></title>	
	<link href="<?php echo base_url('assets/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/jquery-ui-1.11.4.custom/jquery-ui.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/AdminLTE-2.3.0/dist/css/AdminLTE.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/AdminLTE-2.3.0/plugins/morris/morris.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/font-awesome-4.5.0/css/font-awesome.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/lib/ionicons-2.0.1/css/ionicons.min.css')?>" type="text/css" rel="stylesheet"/>
	<script src="<?php echo base_url('assets/lib/jquery-1.11.3.min.js')?>"/></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-70699667-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini fixed">
  <header class="main-header">
    <?php echo anchor('home','<span class="logo-mini"><b>DKP</b></span><span class="logo-lg"><b>SIPPKOPS</b> DKP</span>',array('class'=>'logo')) ?>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/avatar.jpg') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->general_lib->getFullname() ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url('assets/img/avatar.jpg') ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->general_lib->getFullname() ?>
                  <small><?php echo $this->general_lib->getLevel() ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo anchor('home/change_password','Change Password',array('class'=>'btn btn-default btn-flat')) ?>
                </div>
                <div class="pull-right">
                  <?php echo anchor('home/logout','Sign out',array('class'=>'btn btn-default btn-flat')) ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
				<li class="<?php echo ($this->uri->segment(1)=='master'?'active':"")?> treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(2)=='kendaraan_tipe'?'active':"")?>"><?php echo anchor('master/kendaraan_tipe','<i class="fa fa-circle-o"></i> Tipe Kendaraan')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='kendaraan_status'?'active':"")?>"><?php echo anchor('master/kendaraan_status','<i class="fa fa-circle-o"></i> Status Kendaraan')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='komponen_group'?'active':"")?>"><?php echo anchor('master/komponen_group','<i class="fa fa-circle-o"></i> Group Komponen')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='komponen_satuan'?'active':"")?>"><?php echo anchor('master/komponen_satuan','<i class="fa fa-circle-o"></i> Satuan Komponen')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='servis_tipe'?'active':"")?>"><?php echo anchor('master/servis_tipe','<i class="fa fa-circle-o"></i> Servis Tipe')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='servis_aksi'?'active':"")?>"><?php echo anchor('master/servis_aksi','<i class="fa fa-circle-o"></i> Servis Aksi')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='user_level'?'active':"")?>"><?php echo anchor('master/user_level','<i class="fa fa-circle-o"></i> User Level')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='user_status'?'active':"")?>"><?php echo anchor('master/user_status','<i class="fa fa-circle-o"></i> User Status')?></li>
						<li class="<?php echo ($this->uri->segment(2)=='anggaran_tipe'?'active':"")?>"><?php echo anchor('master/anggaran_tipe','<i class="fa fa-circle-o"></i> Anggaran Tipe')?></li>
          </ul>
      	</li>	
				<li class="<?php echo ($this->uri->segment(1)=='user'?'active':"")?> treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(2)=='add'?'active':"")?>"><?=anchor('user/add','<i class="fa fa-circle-o"></i> Tambah User')?></li>
						<li class="<?php echo ($this->uri->segment(2)==''?'active':"")?>"><?=anchor('user','<i class="fa fa-circle-o"></i> List User')?></li>
          </ul>
      	</li>					      					
				<li class="<?php echo ($this->uri->segment(1)=='kendaraan'?'active':"")?> treeview">
          <a href="#">
            <i class="fa fa-car"></i> <span>Kendaraan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(2)=='add'?'active':"")?>"><?=anchor('kendaraan/add','<i class="fa fa-circle-o"></i> Tambah Kendaraan')?></li>
						<li class="<?php echo ($this->uri->segment(2)==''?'active':"")?>"><?=anchor('kendaraan','<i class="fa fa-circle-o"></i> List Kendaraan')?></li>
          </ul>
      	</li>					      					
				<li class="<?php echo ($this->uri->segment(1)=='komponen'?'active':"")?> treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Komponen</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(1)=='komponen' && $this->uri->segment(2)=='add'?'active':"")?>"><?=anchor('komponen/add','<i class="fa fa-circle-o"></i> Tambah Komponen')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='komponen' && $this->uri->segment(2)==''?'active':"")?>"><?=anchor('komponen','<i class="fa fa-circle-o"></i> List Komponen')?></li>
          </ul>
      	</li>			
				<li class="<?php echo (strpos($this->uri->segment(1),'anggaran') === false ?'':'active')?> treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Anggaran</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(1)=='anggaran' && $this->uri->segment(2)=='add'?'active':"")?>"><?=anchor('anggaran/add','<i class="fa fa-circle-o"></i> Tambah Anggaran')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='anggaran' && $this->uri->segment(2)==''?'active':"")?>"><?=anchor('anggaran','<i class="fa fa-circle-o"></i> List Anggaran')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='anggaran_rekap'?'active':"")?>"><?=anchor('anggaran_rekap','<i class="fa fa-circle-o"></i> Rekap Anggaran')?></li>
          </ul>
      	</li>					
				<li class="<?php echo (strpos($this->uri->segment(1),'servis') === false ?'':'active')?> treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Servis</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
						<li class="<?php echo ($this->uri->segment(1)=='servis' && $this->uri->segment(2)=='add'?'active':"")?>"><?=anchor('servis/add','<i class="fa fa-circle-o"></i> Tambah Servis')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='servis' && $this->uri->segment(2)==''?'active':"")?>"><?=anchor('servis','<i class="fa fa-circle-o"></i> List Servis')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='servis_rekap'?'active':"")?>"><?=anchor('servis_rekap','<i class="fa fa-circle-o"></i> Rekap Servis')?></li>
						<li class="<?php echo ($this->uri->segment(1)=='servis_komponen_rekap'?'active':"")?>"><?=anchor('servis_komponen_rekap','<i class="fa fa-circle-o"></i> Rekap Servis Komponen')?></li>
          </ul>
      	</li>					      			      					
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
  	<?php echo $content ?>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Dinas Kebersihan Dan Pertamanan Kabupaten Cianjur</strong>
  </footer>
	<script src="<?php echo base_url('assets/lib/jquery-ui-1.11.4.custom/jquery-ui.min.js')?>"/></script>
	<script src="<?php echo base_url('assets/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js')?>"/></script>
	<script src="<?php echo base_url('assets/lib/AdminLTE-2.3.0/dist/js/app.js')?>"/></script>
	<script src="<?php echo base_url('assets/lib/price_format_plugin.js')?>"/></script>
	<script src="<?php echo base_url('assets/lib/AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js')?>"/></script>
	<script src="<?php echo base_url('assets/js/raphael-min.js')?>"/></script>
	<script src="<?php echo base_url('assets/lib/AdminLTE-2.3.0/plugins/morris/morris.min.js')?>"/></script>
	<script> var base_url = '<?php echo base_url()?>'</script>
	<script src="<?php echo base_url('assets/js/general.js')?>"/></script>
</body>
</html>