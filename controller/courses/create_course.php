<?php
// create_course(name, desc)
session_start();
require_once '../../model/sql-request.php';
require_once 'courses_to_XML.php';

create_course($_POST["name"],$_POST["prerequisite"],$_POST["description"],$_POST["path"]);


function create_course($name,array $prerequisite,$description,$path):bool{
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $type=($ext=="ppt"||$ext=="ppt")?"slide":"video";
    $data=array(
        "cour" => array(
            'name'=>"$name",
            'resource' => "$path",
            'type' => "$type",
            'prerequisite'=> array($prerequisite)
        )
    );
    $i=create_course_model($name,$description);
    print_r($data);
    course_TO_XML($data,$i);
    return true;
}