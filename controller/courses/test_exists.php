<?php
//test_exists(id)
//check if the test with the given id exists ==> boolean
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
function test_exists($id):bool{
    return test_exists_model($id);
}