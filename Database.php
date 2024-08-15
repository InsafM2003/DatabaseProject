<?php
//Insaf Mohamed Umar, 1001808683
//Darshan Bastola, 1001901484
class Database {

	public function getDatabaseConnection(){

		$dbHost = "localhost:3306";
		$dbName = "mydatabase";
		$dbUser = "root";
		$dbPassword = "";

		try {
			// PDO in PHP (PHP Data Objects)
			$dbConnection = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPassword);
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}