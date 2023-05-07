<?php
  // update test (form from vue/pages/includes/test/teacher.php)
if(!isset($_SESSION))
{
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/user/is_student.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/courses/get_test.php';

function update_test($data):bool{
//    $i=2;
//    if(is_student()) return false;
    $i=$data["id"];
    if($i!=-1)
        test_TO_XML($data["question"],$i);
    else
        return false;
    header('Location: index.php?p=testid=' . $i);
    return true;
}

function test_TO_XML(array $data,$i)
{
    $test = new SimpleXMLElement("<test$i/>");
    array_to_xml($data,$test);
    echo $test->asXML();
}
function array_to_xml($data, &$test)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            array_to_xml($value,$test);
        } else {
            if($key=="answer"){
                $test->xpath("//question[last()]")[0]->addChild($key, htmlspecialchars($value));
                $test->xpath("//question[last()]/answer[last()]")[0]->addAttribute("valid",htmlspecialchars($data["valid"]));

            }else{
                if($key=="text"){
                    $test->addChild("question");
                    $test->xpath("//question[last()]")[0]->addChild($key, htmlspecialchars($value));
                }
            }
        }
    }

    if ($test->count() > 0){
        $path=$_SERVER['DOCUMENT_ROOT']."/resources/tests/".$test->getName().".xml";
        echo $test->saveXML($path);
    }

}
