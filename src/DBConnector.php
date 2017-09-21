<?php
	class DBConnector {
		private $url = "localhost";
		private $user = "root";
		private $pw = "";
		private $db = "design_pattern";
		
		private $conn;
		
		function __construct() {
			$this->conn = mysqli_connect($this->url, $this->user, $this->pw, $this->db);
			
			if( $this->conn->connect_error ) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}
		
		function __destruct() {
			$this->closeConnection();
		}
		
		function executeQuery( $query ) {
			return $this->conn->query( $query );
		}
		
		function closeConnection() {
			$this->conn->close();
		}
	}
?>