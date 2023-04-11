<?php
  // is_test_owner(id_test, id_user)
  // check if the user with the given id is the owner of the test with the given id ==> boolean
  session_start();
  require_once '../../model/sql-request.php';
  function is_test_owner($id_test,$id_user):bool{
      return is_test_owner_model($id_test,$id_user);
   
  } 