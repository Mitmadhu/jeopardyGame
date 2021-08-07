<?php 
	function view($path, $data = NULL){
		require_once __DIR__."./../view/header.php";
		require_once __DIR__."./../view/". $path . ".php";
		require_once __DIR__."./../view/footer.php";
	}

	function getCon()
	{
		$host = 'localhost';
		$db   = 'jeopardy';
		$user = 'jeopardy';
		$pass = 'jeopardy@12345';

		$options = [
		    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		    \PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$dsn = "mysql:host=$host;dbname=$db;";
		try {
		     $con = new \PDO($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
		return $con;
	}

	function convertNumber($num){
		$million = 1000000;
		$thousand = 1000;
		if($num >= $million){
			return round($num / $million, 2). "M";
		}

		if($num >= $thousand){
			return round($num / $thousand, 2). "k";
		}
		return $num;
	}