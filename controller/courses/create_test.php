<?php
// create_course(name, desc)
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';

create_test($_POST["name"],$_POST["prerequisite"],$_POST["description"],$_POST["path"]);


function create_test($name,array $prerequisite,$description,$path):bool{
    $data=array(
        "test" => array(
            'name'=>"$name",
            'resource' => "$path",
            'prerequisite'=> array($prerequisite)
        )
    );
    $i=create_test_model($name,$description);
    print_r($data);
    test_TO_XML($data,$i);
    return true;
}

//Create a Course into a XML File
function test_TO_XML(array $data,$i)
{
    $test = new SimpleXMLElement("<test$i/>");
    array_to_xml($data,$test);
    print_r($data);
    echo $test->asXML();
}
function array_to_xml($data, &$test)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // If the value is an array, create a new element and call the function recursively
            array_to_xml($value,$test);
        } else {
            // If the value is not an array, add it as a child element
            if($key=="resource"){
                $test->addChild($key);
                $test->resource->addAttribute("path",$value);
            }else{
                if($key=="type"){
                    $test->resource->addAttribute("type",$value);
                }
                else{
                    if(gettype($key)=="integer")
                        $key="prerequisite";
                    $test->addChild($key, htmlspecialchars($value));
                }
            }
        }
    }
    if ($test->count() > 0){
        $path="../../resources/tests/".$test->getName().".xml";
        echo $test->saveXML($path);
    }
}