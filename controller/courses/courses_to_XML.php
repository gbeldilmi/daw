<?php
//course_TO_XML($data):SimpleXMLElement this method return the XML element
// get the course(s) and convert it in the XML syntax

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