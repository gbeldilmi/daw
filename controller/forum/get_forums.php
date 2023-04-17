<?php
//get_forums()
//return the all forums
require_once $_SERVER["DOCUMENT_ROOT"].'/model/sql-request.php';
//print_r(get_forums());
function get_forums():array{
    return get_forums_model();
}