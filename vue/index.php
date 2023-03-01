<?php
$page_dir = '../vue';
$page = $_GET['p'];
if (isset($page) && $page !== '') {
    if (file_exists($page_dir . '/' . $page . '.php')) {
        echo $page_dir . '/' . $page . '.php';
        // Page
        // Check if user is autorized to access this page
        $headers = get_headers($page_dir . '/' . $page . '.php');
        $status=substr($headers[0], 9, 3);
        if($status==200){
            require_once($page_dir . '/' . $page . '.php');
        } else
        {
            require_once($page_dir . '/403.php');
        }
    } else {
        require_once($page_dir . '/404.php');
        // 404
    }
} else {
    // Home
    require_once($page_dir . '/home.php');
}

require_once('layout.php');
