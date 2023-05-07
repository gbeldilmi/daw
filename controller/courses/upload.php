<?php
require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/get_course_xml.php";
require_once $_SERVER['DOCUMENT_ROOT']."/controller/courses/edit_course.php";
$id = $_GET['id'];
$targetDir = $_SERVER['DOCUMENT_ROOT']."/resources/courses/media/";
$targetFile = $targetDir . basename($_FILES["new_ressource"]["name"]);
//  $course = get_course($id); // data
$course_xml = get_course_xml($id); // xml

if (!is_dir($targetDir)) {
    mkdir($targetDir);
}

if (is_uploaded_file($_FILES["new_ressource"]["tmp_name"])) {
    if (move_uploaded_file($_FILES["new_ressource"]["tmp_name"], $targetFile)) {
//        echo "The file ". basename( $_FILES["new_ressource"]["name"]). " has been uploaded.";
        $course_xml["resource"][]=$_FILES["new_ressource"]["name"];
        var_dump($course_xml);
//        header("Location: http://localhost/vue/index.php?p=course&id=".$id."");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Sorry, invalid file upload attempt.";
}

