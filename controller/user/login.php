<?php
require_once '../../model/sql-request.php';
session_start();
isset($_COOKIE['logged'])?'':setcookie("logged", '0', time() + (86400 * 30), "/");
//setcookie("logged", '1', time() + (86400 * 30), "/");
if (get_login()) {
    setcookie("logged", '1', time() + (86400 * 30), "/");
} else {
    setcookie("logged", '0', time() + (86400 * 30), "/");
    echo "<script>alert('mot passe ou username bad');</script>";
}
//setcookie("logged", '1', time() + (86400 * 30), "/");
function get_login(): bool
{
    $userlogin = $_POST['l_username'];
    $passlogin = hash('sha256', $_POST['l_password']);
//    echo "<br>".$_POST['l_username']."  ".$_POST['l_password']."<br>";
    $userQuery = array();
    $userQuery = array_merge($userQuery, get_user_login());
    $a = array();
    for ($i = 0; $i < count($userQuery); $i++) {
        $a = array_merge($a, $userQuery[$i]);
        $username = $a["username"];
        $password = $a["password"];
        if ($username == $userlogin && $passlogin == $password){
            $_SESSION['username']=$username;
            return true;
        }
    }
    return false;
}
