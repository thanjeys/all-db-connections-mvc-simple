<?php
/**
 * My Connectons with Prepared Statement. 
 */

 class MYSQL { 

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "join";
    private $database_type ="mysql";

    private $con;

    public function __construct() {
        $this->connect();
    }

    public function connect()
    {
        try { 
            $this->con = new PDO("$this->database_type:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        }
        catch(Exception $e) { 
            die('DB Connection Failed'.$e->getMessage());
        }

    }

    public function getSingleRecord($sql, $params = [])
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        if($stmt->rowCount() > 0) { 
            return $result = $stmt->fetch();
        } else { 
            return false; 
        }

}
    public function getMultipleRecords($sql, $params = []) 
    {
        $stmt = $this->con->prepare($sql);
        if(!empty($params))
            $stmt->execute($params);
        else 
            $stmt->execute($params);
        
        if($stmt->rowCount() > 0) { 
            return $result = $stmt->fetchAll();
        } else { 
            return false; 
        }
                
    }
    
    public function ModifyRecord($sql, $params = [])      
    {
        $stmt = $this->con->prepare($sql);
        if($stmt->execute($params)) { 
            return $this->con;
        } else { 
            return false;
        }
    }

 }

?>