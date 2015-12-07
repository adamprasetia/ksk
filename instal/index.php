<html>
	<head>
		<title>SIPPKOPS DKP 2015 Instalation</title>
		<link href="../assets/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<form action="installation.php" method="post">
		<div class="container">
			<h1>Instalation - SIPPKOPS DKP 2015</h1>
			<hr>
			<div class="form-group">
				<label for="host">Host</label>
				<input name="host" class="form-control">
			</div>	
			<div class="form-group">
				<label for="user">User</label>
				<input type="text" name="user" class="form-control">
			</div>	
			<div class="form-group">
				<label for="pass">Password</label>
				<input type="password" name="pass" class="form-control">
			</div>	
			<hr>
			<input type="submit" class="btn btn-default btn-primary" value="Install" onclick="return confirm('are you sure')">
			</form>
		</div>	
		<script type="text/javascript" src="../assets/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	</body>
</html>