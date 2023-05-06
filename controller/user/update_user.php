<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
$data=get_object_vars(json_decode($_POST["data"]));

var_dump($data);

//    json_decode($_POST["data"]);

//$data = array(
//        "id"=>2,
//        "email"=> "test@test.it",
//        "niveau"=> 2,
//        "username"=>"charle",
//        "role"=>"student"
//    );
update_user($data);
function update_user(array $user){
    var_dump($user);
    update_user_model($user["id"],$user["email"],$user["username"],$user["niveau"],$user["role"]);
}