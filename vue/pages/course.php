<?php
require_once $_SERVER['DOCUMENT_ROOT']."/controller/user/is_connected.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controller/user/is_student.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/course_exists.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/is_course_owner.php";
  if (!is_connected()) {
    header('Location: index.php?p=login');
  }
  $title = "Course";
  if (isset($_GET['i']) && !course_exists($_GET['i'])) {
    header('Location: index.php?p=404');
  }
  if (is_student()) {
    if (!isset($_GET['i'])) {
      require_once("includes/course/student/list.php");
    } else {
      require_once("includes/course/student/one.php");
    }
  } else {
    if (!isset($_GET['i'])) {
      require_once("includes/course/teacher/list.php");
    } else {
      if (is_course_owner($_GET['i'])) {
        require_once("includes/course/teacher/one.php");
      } else {
        header('Location: index.php?p=404');
      }
    }
  }
  