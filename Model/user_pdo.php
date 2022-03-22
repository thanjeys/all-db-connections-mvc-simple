<?php
/**
 * User Model with Prepared Statements
 */

 include('DB/pdo_prepare.php');

 class User { 

    private $table = "user"; 

    public function get_user($user_id)
    {
        $db = new MYSQL(); 
        $sql = "SELECT * FROM $this->table WHERE id = :id ";
        $data['id'] = $user_id;
        $user = $db->getSingleRecord($sql, $data);

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
        $sql = "INSERT INTO $this->table SET name = :name, email = :email ";
        $saved = $db->ModifyRecord($sql, $datas);
        return $saved;
    }
    public function update_user($datas)
    {
       $db = new MYSQL();
       $sql = "UPDATE $this->table SET name = :name , email = :email WHERE id= :id ";
       $updated = $db->ModifyRecord($sql, $datas);
       return $updated;
    
    }
    public function delete_user($datas)
    {
        print_r($datas);
        $db = new MYSQL();
        $sql = "DELETE FROM $this->table WHERE id = :id ";
        $deleted = $db->ModifyRecord($sql, $datas);
        return $deleted;
    }
 }
?>