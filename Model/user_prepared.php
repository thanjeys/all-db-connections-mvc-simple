<?php
/**
 * User Model with Prepared Statements
 */

 include('DB/mysqli_prepare.php');

 class User { 

    private $table = "user"; 

    public function get_user($user_id)
    {
        $db = new MYSQL(); 
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $params[]  = $user_id;
        $user = $db->getSingleRecord($sql, "i", $params);

        return $user; 
    }
    public function get_users($limit = null)
    {
        $db = new MYSQL();
        $sql = "SELECT * FROM $this->table ORDER BY name ";
        if($limit)
            $sql .= "LIMIT $limit";
        $users = $db->getMultipleRecords($sql);
        return $users;
    }
    public function save_user($datas)
    {
        $db = new MYSQL();
        $fields = array_keys($datas);
        $sql = "INSERT INTO $this->table SET name = ?, email = ? ";
        $saved = $db->ModifyRecord($sql, "ss", $datas);
        return $saved;
    }
    public function update_user($datas)
    {
       $db = new MYSQL();
       $sql = "UPDATE $this->table SET name = ?, email = ? WHERE id= ? ";
       $updated = $db->ModifyRecord($sql, "ssi", $datas);
       return $updated;
    
    }
    public function delete_user($user_id)
    {
        $db = new MYSQL();
        $sql = "DELETE FROM $this->table WHERE id = ? ";
        $deleted = $db->ModifyRecord($sql,"i",[$user_id]);
        return $deleted;
    }
 }
?>