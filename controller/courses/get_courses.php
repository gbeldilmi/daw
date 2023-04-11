<?php
// get_courses(owner_id)
// get the courses owned by the user with the given id
//function get_courses(owner_id):{}
session_start();
require_once '../../model/sql-request.php';
function get_courses($owner_id):array{
    return get_courses_model($owner_id);
} 
