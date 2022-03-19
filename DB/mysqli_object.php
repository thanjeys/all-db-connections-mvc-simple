<?php
/**
 * Connecting Database Transactions using Mysqli Object Oriented
 */

 class MYSQL { 

    private $username = "root";
    private $password = "";
    private $dbname = "join";
    private $server = "localhost";
    private $con; 

    public function connect()
    {
        $this->con = new mysqli($this->server, $this->username, $this->password, $this->dbname);

        if($this->con->connect_error) { 
            die("DB Connection Failed ". $this->con->connect_error);
        }
    }

    public function getSingleRecord($sql)
    {
        $this->connect();
        $result = $this->con->query($sql);
        if($this->con->error) { 
            echo "Error :: $this->con->error, Query:: ". $sql;
        } 
        else
        {
            if($result->num_rows > 0)
            { 
                return $result->fetch_assoc(); 
            } else { 
                return false;
            }
        }
    }

    
    function getMultipleRecords($sql)
    {
        $this->connect();

        $result = $this->con->query($sql);
        if($this->con->error)
        {
            echo "Error :: ".$this->con->error .", Query :: $sql";
            return false;
        }    
        if($result->num_rows > 0) { 
            return $row = $result->fetch_all(MYSQLI_ASSOC);
        }
        else 
            return false;
        
    }


    function ModifyRecord($sql)
    {
        $this->connect();
        $result = $this->con->query($sql);

        if($this->con->error) { 
            echo "Error :: ". $this->con->error . ", Query:: $sql";         
            return false;
        }
        if($result)
        { 
            return $this->con;
        }
    }

    
 }
















?>