 <?php

	$typedb = "mysql";
	$host = "localhost";
	$dbname = "pruebas";
	$user = "root";
	$pw = "";


	try {
		$con = new PDO($typedb . ":host=" . $host . ";dbname=" . $dbname . ";charset=UTF8mb4", $user, $pw);
	} catch (PDOException $exception) {
		echo $exception->getMessage();
	}
