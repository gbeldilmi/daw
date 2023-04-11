<?php
  // add_to_followed_courses(id_course); ajoute le cours à la liste des cours suivis par l'utilisateur
session_start();
require_once '../model/sql-request.php';
function add_to_followed_courses($id_course):bool{
  $username=$_SESSION['username'];
  return add_to_followed_courses_model($username,$id_course);
}