<?php 
//course_exists(id)
//check if the course with the given id exists ==> boolean
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
function course_exists($id):bool{
    return course_exists_model($id);
 
} 