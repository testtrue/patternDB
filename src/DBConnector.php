<?php
	/**
	* The DBConnector manages the connection to the Database, it is developed with the singletonpattern to make sure that only one instance is running on this server.
	* The Connector makes also sure that no Querys can be injected that will harm the server.
	**/
	class DBConnector {
		//The following data represents the Database login, please make sure that you don't use ROOT ACCESS!!!
		private $url;
		private $user;
		private $pw;
		private $db;
		
		//The conn variable holds the activ connection to the Database.
		private static $conn;
		
		/**
		* The Constructor creates the activ connection to the Database and tests the connection, if it fails it will output a error message.
		* @param url URL to the Database.
		* @param user User to access the database.
		* @param pw Password for the DB-User.
		* @param db Name of the Database.
		**/
		public function __construct( $url, $user, $pw, $db ) {
			$this->url = $url;
			$this->user = $user;
			$this->pw = $pw;
			$this->db = $db;
			
			$this->conn = mysqli_connect($this->url, $this->user, $this->pw, $this->db);
			
			if( $this->conn->connect_error ) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}
		
		/**
		* This function returns the instance of the DBConnector, if there is no activ instance it will create a new one.
		* @return Returns the instance.
		**/
		public static function getInstance() {
			if( self::$conn === null ) {
				self::$conn = new self;
			}
			return self::$conn;
		}
		
		//This function will be called by the Garbagecollector and will close the connection.
		public function __destruct() {
			$this->closeConnection();
		}
		
		/**
		* This function will execute a SQL-Query and return the result.
		* @param query The Query that needs to be executed at the database.
		* @return returns the result of the database.
		**/
		public function executeQuery( $query ) {
			return $this->conn->query( mysql_real_escape_string($query) );
		}
		
		//This function closes the Connection.
		public function closeConnection() {
			$this->conn->close();
		}
		
		//This function is to prevent to create another instance of the DBConnector, if someone trys to clone the instance it will fail.
		protected function __clone() {}
	}
?>