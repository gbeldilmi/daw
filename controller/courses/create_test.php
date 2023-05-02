<?php
// create_test(data)
require_once $_SERVER['DOCUMENT_ROOT'].'/model/sql-request.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/user/is_student.php';
//$test = array(
//    'name'=>'test1',
//    'course'=>2,
//    'question' =>array(
//        array(
//            'text' => 'Qu\'est ce que Python?',
//            'answer' => array(
//                array(
//                    'value' => 'un langage de prog',
//                    'valid' => 'true'
//                ),
//                array(
//                    'value' => 'un jeu',
//                    'valid' => 'false'
//                ),
//                array(
//                    'value' => 'une serie televise',
//                    'valid' => 'false'
//                ),
//                array(
//                    'value' => 'un serpent',
//                    'valid' => 'false'
//                )
//            )
//        ),
//    array(
//        'text' => 'Comment definir un titre dans le html?',
//        'answer' => array(
//            array(
//                'value' => 'avec une balise "nav"',
//                'valid' => 'false'
//            ),
//            array(
//                'value' => 'avec un #',
//                'valid' => 'false'
//            ),
//            array(
//                'value' => 'avec la balise "title"',
//                'valid' => 'true'
//            ),
//            array(
//                'value' => 'avec "//"',
//                'valid' => 'false'
//            )
//        )
//    )
//    )
//);
//
//
//create_test($test);


function create_test($data):bool{
    if(is_student()) return false;
    $i=create_test_model($data);
    print_r($data);
    if($i!=-1)
        test_TO_XML($data["question"],$i);
    else
        return false;
    return true;
}
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
            array_to_xml($value,$test);
        } else {
            if($key=="value"){
                $test->xpath("//question[last()]")[0]->addChild($key, htmlspecialchars($value));
                $test->xpath("//question[last()]/value[last()]")[0]->addAttribute("valid",htmlspecialchars($data["valid"]));

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