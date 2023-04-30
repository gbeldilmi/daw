<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/user/is_connected.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/user/is_student.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/test_exists.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/is_test_owner.php";
  if (!is_connected()) {
    header('Location: index.php?p=login');
  }
  $title = "Test";
  $id = $_GET['i'];
  if ((isset($id) && !test_exists($id)) || !isset($id)) {
    header('Location: index.php?p=404');
  }
  if (is_student()) {
    require_once("includes/test/student.php");
  } else {
    if (is_test_owner($id)) {
      require_once("includes/test/teacher.php");
    } else {
      header('Location: index.php?p=404');
    }
  }
