<?php
require_once '../model/sql-request.php';
session_start();
if(Login()==-1){
    echo "<script>alert('mot passe ou username error');</script>";
}
else
    Redirect('https://example.com/', 200);
    function Redirect($url, $status)
    {
        header('Location: ' . $url, true, $status);
        exit();
    }

function Login():int{
$userlogin=$_POST['username'];
$passlogin=hash('sha256', $_POST['password']);
//    $userlogin='ciccio';
//    $passlogin=hash('sha256', 'tooor');
    $userQuery=array();
    $userQuery=array_merge($userQuery,getUserLogin());
    $a=array();
    for ($i=0;$i<count($userQuery);$i++){
        $a=array_merge($a,$userQuery[$i]);
        $id=$a["id"];
        $username=$a["username"];
        $password=$a["password"];
        if($username==$userlogin && $passlogin==$password)
            return $id;
    }
//    print_r($userQuery);
    return -1;
}