<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" href="http://www.cianjurkab.go.id/images/cjr_icon.png" type="image/x-icon"/>
	<title>Welcome to <?=APP_NAME?></title>	
	<link href="<?=base_url('assets/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/sticky-footer.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/signin.css')?>" type="text/css" rel="stylesheet"/>
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
				<?=anchor('home',APP_NAME,array('class'=>'navbar-brand','title'=>APP_TITLE))?>
			</div>
		</div>
	</nav>
  <div class="container">
	<?=form_open('login',array('class'=>'form-signin'))?>
		<h2 class="form-signin-heading">
			<?=img(array('src'=>'assets/img/logo.gif','alt'=>'KSK'))?>
			Please sign in
		</h2>
		<?=validation_errors()?>
		<label for="username" class="sr-only">Username</label>
		<input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" maxlength="20" required autofocus>
		<label for="password" class="sr-only">Password</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password"  maxlength="20" required>
		<button class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
	<?=form_close()?>
  </div>
  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted text-center">Copyright &copy; 2015 | Dinas Kebersihan Dan Pertamanan Kabupaten Cianjur</p>
    </div>
  </footer>  
</body>
</html>