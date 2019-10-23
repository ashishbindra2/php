<?php
	/**
	 * 
	 */
	class DbConnect 
	{
		private $host   = "localhost";
		private $dbName = "db";
		private $user   = "journals";
		private $pass  = "journals*001";
		
		public function connect()
		{
			try{
				$conn = new PDO('mysql:host='.$this->host .'; dbname='. $this->dbName, $this->user ,$this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
				// echo "successfull";

			}catch(PDOException $e){
				echo "Database Error: ".$e->getMessage();
			}
		}
		// connect();
	}
			// $st=new DbConnect();
   //           $st->connect();
?>