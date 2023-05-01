<?php
  // is_followed_course($id_course); ---> bool
  // return true if the user is following the course
  session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/user/get_id.php';
  function is_followed_course($id_course):bool{
      return is_followed_course_model(get_id($_SESSION['username']),$id_course);
  } 
