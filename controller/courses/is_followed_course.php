<?php
  // is_followed_course(id_user,$id_course); ---> bool
  // return true if the user is following the course
  session_start();
  require_once '../../model/sql-request.php';
  function is_followed_course($id_user,$id_course):bool{
      return is_followed_course_model($id_user,$id_course);
   
  } 