<?php
// create_course(name, desc)
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';

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

//Create a Course into a XML File
function course_TO_XML(array $data,$i)
{
    $cour = new SimpleXMLElement("<course$i/>");
    array_to_xml($data,$cour);
    print_r($data);
    echo $cour->asXML();
}
function array_to_xml($data, &$cour)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // If the value is an array, create a new element and call the function recursively
            array_to_xml($value,$cour);
        } else {
            // If the value is not an array, add it as a child element
            if($key=="resource"){
                $cour->addChild($key);
                $cour->resource->addAttribute("path",$value);
            }else{
                if($key=="type"){
                    $cour->resource->addAttribute("type",$value);
                }
                else{
                    if(gettype($key)=="integer")
                        $key="prerequisite";
                    $cour->addChild($key, htmlspecialchars($value));
                }
            }
        }
    }
    if ($cour->count() > 0){
        $path="../../resources/courses/".$cour->getName().".xml";
        echo $cour->saveXML($path);
    }
}