<?php
/**
 * Get Users using User Model 
 */

include('Model/user_pdo.php');
$userModel = new User();


 // Get a User details
echo "<h1> Get a User : 4 </h1>";
$user_info = $userModel->get_user(4);
if($user_info) { 
    var_dump($user_info);
} else { 
    echo "Sorry, there is no record";
}



// Get all Users
echo "<h1> Get a ALL Users </h1>";
$users = $userModel->get_users(10);
if($users) { 
    var_dump($users);
} else {
    echo "Sorry, there is no record found";
}

// INSERT RECORDS
echo "<h1> Add new User </h1>";
$data['name'] = "Ramupdo";
$data['email'] = "ram@gmailc.compdo";

$saved = $userModel->save_user($data);
if($saved) { 
    var_dump(get_class_methods($saved));
} else {
    echo "Sorry, there is no record found";
}

// UPDATE RECORDS
echo "<h1> UDPATE User </h1>";
$data['name'] = "Ramupdoupdated";
$data['email'] = "ram@gmailc.compdo";
$data['id'] = 10;

$updated = $userModel->update_user($data);
if($updated) { 
    var_dump(get_class_methods($updated));
} else {
    echo "Sorry, Updation failed";
}

// DELETE RECORDS
echo "<h1> DELETE Users </h1>";
$datas['id'] = 18;
$deleted = $userModel->delete_user($datas);
if($deleted) { 
    var_dump(get_class_methods($deleted));
} else {
    echo "Sorry, there is no record to delete";
}


?>