<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Welcome to <?=APP_NAME?></title>	
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/signin.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/sticky-footer.css')?>" type="text/css" rel="stylesheet"/>
	<link href="<?=base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet"/>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<?=anchor('home',APP_NAME,array('class'=>'navbar-brand'))?>
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
		<button class="btn btn-lg btn-warning btn-block" type="submit">Login</button>
	<?=form_close()?>
  </div>
  <footer class="footer">
    <div class="container-fluid">
      <p class="text-muted text-center">Copyright &copy; 2015 | Dinas Kebersihan Dan Pertamanan Kabupaten Cianjur</p>
    </div>
  </footer>  
</body>
</html>