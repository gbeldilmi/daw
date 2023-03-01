<?php
$page_dir = 'pages';
$page = $_GET['p'];
if (isset($page) && $page !== '') {
  if (file_exists($page_dir . '/' . $page . '.php')) {
    // Page
    // echo $page_dir . '/' . $page . '.php';
    // Check if user is autorized to access this page
    $headers = get_headers($page_dir . '/' . $page . '.php');
    $status=substr($headers[0], 9, 3);
    if($status==200) {
      require_once($page_dir . '/' . $page . '.php');
    } else {
      require_once($page_dir . '/403.php');
    }
  } else {
    // 404
    require_once($page_dir . '/404.php');
  }
} else {
  // Home
  require_once($page_dir . '/home.php');
}

require_once('layout.php');
