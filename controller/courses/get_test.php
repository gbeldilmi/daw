<?php
// get_test(id)
// get the test with the given id
session_start();
require_once '../../model/sql-request.php';
function get_test($id):array{
  return get_test_model($id);
}