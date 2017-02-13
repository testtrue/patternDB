<?php

/**
 * Description of Db
 *
 * @author bjoern.bass@esfl.de
 */
class Db {
    private $dbh = null;
    private $host = '';
    private $database = '';
    private $username = '';
    private $password = '';

    /**
     * @todo Description
     * @param type $host
     * @param type $database
     * @param type $username
     * @param type $password
     */
    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    public function __destruct()
    {
        if ($this->dbh)
        {
            $this->dbh->close();
        }
    }

    /**
     * @todo Check if tables exists, otherwise install (create) tables.
     * @return return handle for the database connection
     */
    public function connect()
    {
        $this->dbh = new mysqli($this->host, $this->username, $this->password);
        if (mysqli_connect_errno())
        {
            echo('Can\'t reach database. The following error occurred: "' . mysqli_connect_errno() . ' : ' . mysqli_connect_error() . '"');
        }
        if (!$this->dbh)
        {
            return false;
        }
        $selected = $this->dbh->select_db($this->database);
        if (!$selected)
        {
            echo 'Can\'t open database.';
        }
        $this->dbh->set_charset('utf8');
        return $this->dbh;
    }

    /**
     * @todo Description
     * @param string $querystring
     */
    public function query($querystring)
    {
        if ($this->dbh == null)
        {
            $this->connect();
        }
        // use uft-8 characterset for the queries
        $result = $this->dbh->query($querystring);
        return $result;
    }

    /**
     * @todo Description
     * @param type $result
     * @return type
     */
    public function fetch($result)
    {
        return $result->fetch_assoc();
    }

    public function fetchObject($result)
    {
        return $result->fetch_object();
    }

    /**
     * @todo Description
     * @param type $result
     * @return type
     */
    public function num_rows($result)
    {
        return $result->num_rows;
    }

    /**
     * @todo Description
     * @param string $variable
     * @return string
     */
    public function escape($variable)
    {
        if ($this->dbh == null)
        {
            $this->connect();
        }
        return mysqli_real_escape_string($this->dbh, $variable);
    }

    /**
     * @todo Description
     * @param type $variable
     * @return type
     */
    public function escape_trim($variable)
    {
        if ($this->dbh == null)
        {
            $this->connect();
        }
        $variable = trim($variable);
        return mysqli_real_escape_string($this->dbh, $variable);
    }

}
