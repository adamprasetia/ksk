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
					<li class="<?=($this->session->userdata('user_level')<>1?"hide":"")?><?=($this->uri->segment(1)=='user'?'active':"")?>"><?=anchor('user','<span class="glyphicon glyphicon-lock"></span> Security')?></li>
					<li class="<?=($this->session->userdata('user_level')<>1?"hide":"")?><?=($this->uri->segment(1)=='kendaraan'?'active':"")?>"><?=anchor('kendaraan','<span class="glyphicon glyphicon-bed"></span> Kendaraan')?></li>
					<li class="<?=($this->session->userdata('user_level')<>1?"hide":"")?><?=($this->uri->segment(1)=='komponen'?'active':"")?>"><?=anchor('komponen','<span class="glyphicon glyphicon-cog"></span> Komponen')?></li>
					<li class="<?=($this->session->userdata('user_level')<>1?"hide":"")?><?=($this->uri->segment(1)=='servis'?'active':"")?>"><?=anchor('servis','<span class="glyphicon glyphicon-edit"></span> Servis')?></li>
					<li class="<?=($this->session->userdata('user_level')<>1?"hide":"")?><?=($this->uri->segment(1)=='servis_rekap'?'active':"")?>"><?=anchor('servis_rekap','<span class="glyphicon glyphicon-print"></span> Rekap Servis')?></li>
				</ul>		
				<div class="navbar-right">		
					<ul class="nav navbar-nav">
						<li><a href="#"><?=$this->general_lib->get_username()?></a></li>
						<li><?=anchor('login/change_password','Change Password')?></li>
						<li><?=anchor('login/logout','Logout')?></li>
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