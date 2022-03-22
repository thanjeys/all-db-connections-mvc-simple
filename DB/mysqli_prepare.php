<?php
/**
 * My Connectons with Prepared Statement. 
 */

 class MYSQL { 

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "join";

    private $con;

    public function __construct() {
        $this->connect();
    }

    public function connect()
    {
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if($this->con->connect_error) { 
            die("DB Connection Failed". $this->con->connect_error); 
        }
    }
    public function getSingleRecord($sql, $types = null, $params = [])
    {
        $stmt = $this->con->prepare($sql);
        if(!$stmt)  {
            echo "Error Query Failed : $sql : ". $this->con->error; 
        }
        if(!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute(); 
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else 
            return false;
    }
    public function getMultipleRecords($sql, $types=null, $params = []) 
    {
        $stmt = $this->con->prepare($sql);
        if(!$stmt) { 
            echo "Error in Query : $sql :: ". $this->con->error; 
        }
        if(!empty($params))
            $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0 ) { 
            return $result->fetch_all(MYSQLI_ASSOC);
        } else
            return false; 
    }
    public function ModifyRecord($sql, $types = null, $params = [])      
    {
        $stmt = $this->con->prepare($sql);
        if(!$stmt) { 
            echo "Error in Query: $sql". $this->con->error;
        }
        if(!empty($params)) { 
            $stmt->bind_param($types, ...$params); 
        }
        if($stmt->execute()) { 
            return $stmt;
        } else { 
            return false;
        }
    }

 }

?>