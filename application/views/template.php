<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" href="http://www.cianjurkab.go.id/images/cjr_icon.png" type="image/x-icon"/>
	<title><?=APP_NAME?></title>	
	<link href="<?=base_url('assets/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/lib/jquery-ui-1.11.4.custom/jquery-ui.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/sticky-footer.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet"/>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-70699667-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?=anchor('home',APP_NAME,array('class'=>'navbar-brand'))?>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown <?=($this->uri->segment(1)=='master'?'active':"")?> <?=($this->session->userdata('user_level')<>'ABK'?"hide":"")?>">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-hdd"></span> Master Data <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li class="<?=($this->uri->segment(2)=='kendaraan_tipe'?'active':"")?>"><?=anchor('master/kendaraan_tipe','<span class="glyphicon glyphicon-bed"></span> Tipe Kendaraan')?></li>
							<li class="<?=($this->uri->segment(2)=='kendaraan_status'?'active':"")?>"><?=anchor('master/kendaraan_status','<span class="glyphicon glyphicon-bed"></span> Status Kendaraan')?></li>
							<li role="separator" class="divider"></li>
							<li class="<?=($this->uri->segment(2)=='komponen_group'?'active':"")?>"><?=anchor('master/komponen_group','<span class="glyphicon glyphicon-cog"></span> Group Komponen')?></li>
							<li class="<?=($this->uri->segment(2)=='komponen_satuan'?'active':"")?>"><?=anchor('master/komponen_satuan','<span class="glyphicon glyphicon-cog"></span> Satuan Komponen')?></li>
							<li role="separator" class="divider"></li>
							<li class="<?=($this->uri->segment(2)=='servis_tipe'?'active':"")?>"><?=anchor('master/servis_tipe','<span class="glyphicon glyphicon-edit"></span> Servis Tipe')?></li>
							<li class="<?=($this->uri->segment(2)=='servis_aksi'?'active':"")?>"><?=anchor('master/servis_aksi','<span class="glyphicon glyphicon-edit"></span> Servis Aksi')?></li>
							<li role="separator" class="divider"></li>
							<li class="<?=($this->uri->segment(2)=='user_level'?'active':"")?>"><?=anchor('master/user_level','<span class="glyphicon glyphicon-user"></span> User Level')?></li>
							<li class="<?=($this->uri->segment(2)=='user_status'?'active':"")?>"><?=anchor('master/user_status','<span class="glyphicon glyphicon-user"></span> User Status')?></li>
	          </ul>
        	</li>					
					<li class="dropdown <?=($this->uri->segment(1)=='user'?'active':"")?> <?=($this->session->userdata('user_level')<>'ABK'?"hide":"")?>">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><?=anchor('user/add','<span class="glyphicon glyphicon-user"></span> Tambah User')?></li>
							<li><?=anchor('user','<span class="glyphicon glyphicon-user"></span> List User')?></li>
	          </ul>
        	</li>					
					<li class="dropdown <?=($this->uri->segment(1)=='kendaraan'?'active':"")?> ">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bed"></span> Kendaraan <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><?=anchor('kendaraan/add','<span class="glyphicon glyphicon-bed"></span> Tambah Kendaraan')?></li>
							<li><?=anchor('kendaraan','<span class="glyphicon glyphicon-bed"></span> List Kendaraan')?></li>
	          </ul>
        	</li>					
					<li class="dropdown <?=($this->uri->segment(1)=='komponen'?'active':"")?> ">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Komponen <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><?=anchor('komponen/add','<span class="glyphicon glyphicon-cog"></span> Tambah Komponen')?></li>
							<li><?=anchor('komponen','<span class="glyphicon glyphicon-cog"></span> List Komponen')?></li>
	          </ul>
        	</li>					
					<li class="dropdown <?=($this->uri->segment(1)=='servis'?'active':"")?> ">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span> Servis <span class="caret"></span></a>
	          <ul class="dropdown-menu">
							<li><?=anchor('servis/add','<span class="glyphicon glyphicon-edit"></span> Tambah Servis')?></li>
							<li><?=anchor('servis','<span class="glyphicon glyphicon-edit"></span> List Servis')?></li>
							<li role="separator" class="divider"></li>
							<li><?=anchor('servis_rekap','<span class="glyphicon glyphicon-th-list"></span> Rekap Servis')?></li>
							<li><?=anchor('servis_komponen_rekap','<span class="glyphicon glyphicon-th-list"></span> Rekap Servis Komponen')?></li>
	          </ul>
        	</li>					
				</ul>		
				<div class="navbar-right">		
					<ul class="nav navbar-nav">
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?=$this->general_lib->get_username()?></a></li>
						<li class="<?=($this->uri->segment(2)=='change_password'?'active':"")?>"><?=anchor('home/change_password','<span class="glyphicon glyphicon-cog"></span> Change Password')?></li>
						<li><?=anchor('home/logout','<span class="glyphicon glyphicon-log-out"></span> Logout')?></li>
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	
	<div class="container-fluid">
		<?=$content?>
	</div>

  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted text-center">Copyright &copy; 2015 | Dinas Kebersihan Dan Pertamanan Kabupaten Cianjur</p>
    </div>
  </footer>  

	<script src="<?=base_url('assets/lib/jquery-1.11.3.min.js')?>"/></script>
	<script src="<?=base_url('assets/lib/jquery-ui-1.11.4.custom/jquery-ui.min.js')?>"/></script>
	<script src="<?=base_url('assets/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js')?>"/></script>
	<script src="<?=base_url('assets/lib/price_format_plugin.js')?>"/></script>
	<script> var base_url = '<?php echo base_url()?>'</script>
	<script src="<?=base_url('assets/js/general.js')?>"/></script>
</body>
</html>