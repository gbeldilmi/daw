<?php
//send_message_forum($id_forum,$message)
//send the message to a forum
require_once $_SERVER["DOCUMENT_ROOT"].'/model/sql-request.php';

echo send_message_forum($_POST["forum"],$_POST["message"]);

function send_message_forum($id_forum,$message):bool{
    $id_user=get_ID_User($_SESSION['username']);
    return send_message_forum_model($id_forum,$message,$id_user);
}
