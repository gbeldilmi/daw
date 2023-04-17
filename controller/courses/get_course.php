<?php
// get_course(id)
// get the course with the given id
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
print_r(get_course(1));
function get_course($id):array{
    return get_course_model($id);
 
} 

