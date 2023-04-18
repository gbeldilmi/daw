<?php
require_once "../controller/user/is_connected.php";
require_once "../controller/user/is_student.php";
  if (!is_connected()) {
    header('Location: index.php?p=login');
  }

  $id = $_GET['i'];
  if (!isset($id)) {
    require_once("vue/pages/includes/forum/list.php");
  }else {
    require_once("vue/pages/includes/forum/thread.php");
  }
