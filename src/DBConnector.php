<?php

/**
 * The DBConnector manages the connection to the Database, it is developed with the singletonpattern to make sure that only one instance is running on this server.
 * The Connector makes also sure that no Querys can be injected that will harm the server.
 **/
class DBConnector
{
    //The following data represents the Database login, please make sure that you don't use ROOT ACCESS!!!
    private $url;
    private $user;
    private $pw;
    private $db;

    //The conn variable holds the activ connection to the Database.
    private static $conn;

    /**
     * The Constructor creates the activ connection to the Database and tests the connection, if it fails it will output a error message.
     **/
    private function __construct()
    {
        $dbConfig = require_once(BASEPATH . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php");
        $this->url = $dbConfig["host"];
        $this->user = $dbConfig["user"];
        $this->pw = $dbConfig["password"];
        $this->db = $dbConfig["db"];

        self::$conn = mysqli_connect($this->url, $this->user, $this->pw, $this->db);

        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }
    }

    /**
     * This function returns the instance of the DBConnector, if there is no activ instance it will create a new one.
     * @return mysqli object which represents the connection to a MySQL Server.
     **/
    public static function getInstance()
    {
		$conn = self::$conn;
        if ($conn === null) {
            $conn = new DBConnector();
        }
        return $conn;
    }

    //This function will be called by the Garbagecollector and will close the connection.
    public function __destruct()
    {
        $this->closeConnection();
    }

    /**
     * This function will execute a SQL-Query and return the result.
     * @param query string The Query that needs to be executed at the database.
     * @return string
     **/
    public function executeQuery($query)
    {
        return self::$conn->query(mysqli_real_escape_string(self::$conn, $query));
    }

    //This function closes the Connection.
    public function closeConnection()
    {
        self::$conn->close();
    }

    //This function is to prevent to create another instance of the DBConnector, if someone trys to clone the instance it will fail.
    protected function __clone()
    {
    }
}

?>
