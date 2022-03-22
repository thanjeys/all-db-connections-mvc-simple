<?php
/**
 * Get Users using User Model 
 */

include('Model/user_prepared.php');
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
$name = "Ramu";
$email = "ram@gmailc.com";
$saved = $userModel->save_user([$name, $email]);
if($saved) { 
    var_dump($saved);
} else {
    echo "Sorry, there is no record found";
}

// UPDATE RECORDS
echo "<h1> UDPATE User </h1>";
$name = "Ramu";
$email = "ram@gmailc.com";
$updated = $userModel->update_user([$name, $email,15]);
if($updated) { 
    var_dump($updated);
} else {
    echo "Sorry, Updation failed";
}

// DELETE RECORDS
echo "<h1> DELETE Users </h1>";
$deleted = $userModel->delete_user(17);
if($deleted) { 
    var_dump($deleted);
} else {
    echo "Sorry, there is no record to delete";
}


?>