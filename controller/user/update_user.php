<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
$data=get_object_vars(json_decode($_POST["data"]));
update_user($data);
function update_user(array $user){
    var_dump($user);
    update_user_model($user["id"],$user["email"],$user["username"],$user["niveau"],$user["role"]);
}