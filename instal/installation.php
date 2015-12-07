<html>
	<head>
		<title>SIPPKOPS DKP 2015 Instalation</title>
		<link href="../assets/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
		<?php
			function run_sql_file($location){
			    //load file
			    $commands = file_get_contents($location);

			    //delete comments
			    $lines = explode("\n",$commands);
			    $commands = '';
			    foreach($lines as $line){
			        $line = trim($line);
			        if( $line && !startsWith($line,'--') ){
			            $commands .= $line . "\n";
			        }
			    }

			    //convert to array
			    $commands = explode(";", $commands);

			    //run commands
			    $total = $success = 0;
			    foreach($commands as $command){
			        if(trim($command)){
			            $success += (@mysql_query($command)==false ? 0 : 1);
			            $total += 1;
			        }
			    }

			    //return number of successful queries and total number of queries found
			    return array(
			        "success" => $success,
			        "total" => $total
			    );
			}


			// Here's a startsWith function
			function startsWith($haystack, $needle){
			    $length = strlen($needle);
			    return (substr($haystack, 0, $length) === $needle);
			}

			$servername = $_POST['host'];
			$username = $_POST['user'];
			$password = $_POST['pass'];

			// Create connection
			$con = mysql_connect($servername, $username, $password);
			if (!$con) {
			    die('Could not connect: ' . mysql_error());
			}
			
			$result = run_sql_file('ksk.sql');
			mysql_close($con);
		?>
		<h1>Proses Instalasi Selesai</h1>
		<p>Namun ada beberapa langkah yang harus di lakukan : </p>
		<ul>
			<li>Buka file <b>database.php</b> pada direktori ksk/application/config/database.php</li>
			<li>Lalu edit sesuai dengan username dan password mysql anda : 
				<pre>
						$db['default']['hostname'] = 'NAMA_HOST';
						$db['default']['username'] = 'USER';
						$db['default']['password'] = 'PASSWORD';
				</pre>	
			</li>
			<li>Contohnya : 
				<pre>
						$db['default']['hostname'] = 'localhost';
						$db['default']['username'] = 'root';
						$db['default']['password'] = '';
				</pre>	
			</li>
			<li>Selanjutnya hapus folder <b>instal</b> pada program ini</li>
			<li>Jalankan program dengan format <b>http://nama_hosting/ksk</b>, contohnya : <b>http://localhost/ksk</b></li>
			<li>Login dengan username dan password bawaan yakni : 
				<ul>
					<li>username : damz</li>	
					<li>password : 123</li>	
				</ul>
			</li>
			<li>Selamat mencoba</li>
		</ul>	
		</div>
	<script type="text/javascript" src="../assets/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	</body>
</html>