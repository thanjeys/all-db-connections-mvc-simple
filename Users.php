<?php

include('Model/user.php');


$userModel = new User();


// Single Record Result
echo "<h1> Get a User Record Result </h1>";
$user = $userModel->get_user_info(2);
if($user)
{ 
    print_r($user);
}
else 
    echo "no record";




// Single Record Result
echo "<h1> Get a Users Record Result </h1>";
$users = $userModel->get_users();
if($users)
{ 
    print_r($users);
}
else 
    echo "no record";



// Save a New Record 
echo "<h1> Save New Record </h1>";

$data['name'] = "Thana mvc";
$data['email'] = "thanamvc@gmail.com";
$saveuser = $userModel->save_user($data);

var_dump($saveuser);




?>