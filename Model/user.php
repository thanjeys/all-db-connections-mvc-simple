<?php
include ("DB/mysqli_object.php"); 


class User {

    private $table = "user"; 

    function get_user_info($user_id)
    { 
        $database = new MYSQL();
        $sql = "SELECT * FROM $this->table WHERE id = $user_id";
        $user = $database->getSingleRecord($sql); 
        return $user;
    }

    function get_users($limit = null)
    {
        $database = new MYSQL();
        $sql = "SELECT * FROM $this->table ORDER BY name";
        if($limit) 
            $sql .=  " LIMIT $limit"; 

        $users = $database->getMultipleRecords($sql);

        return $users;
    }

    function save_user(array $data) { 

        $database = new MYSQL();
        
        $fields = implode("," , array_keys($data));
        $values = "'" . implode(" ' , ' ", $data). "'";
   
        $sql = "INSERT INTO $this->table($fields) VALUES($values)"; 
        $result = $database->ModifyRecord($sql);
        
        return $result;

    } 

}



?>