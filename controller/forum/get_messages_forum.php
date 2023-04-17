<?php
//get_messages_forum($id_forum)
//return the all messages of a forum
require_once $_SERVER["DOCUMENT_ROOT"].'/model/sql-request.php';
//print_r(get_messages_forum(1));
function get_messages_forum($id_forum):array{
    return get_messages_forum_model($id_forum);
}