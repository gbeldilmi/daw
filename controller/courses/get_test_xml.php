<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/courses/get_test.php';
//get_test_xml(2);
function get_test_xml($id):array{
    $temp=get_test($id);
    $test=array(
        'name'=>$temp['NAME'],
        'course'=>$temp['COURSE_ID']
    );
    $path=$_SERVER['DOCUMENT_ROOT']."/resources/tests/test".$id.".xml";
    echo $path;
    // Load the XML file
    $xml = simplexml_load_file($path)or die("Failed to load");

    $question=array();
    foreach ($xml->children() as $element) {
        $text=array(
            'text' => (string) $element->text
        );
        foreach ($element->value as $answer) {
            $answer_array=array(
                'value'=>(string) $answer,
                'valid'=>(string) $answer['valid']
            );
            $text=array_merge($text,array($answer_array));
        }
        $question=array_merge($question,array($text));
    }
    $test=array_merge($test,array(
        'question'=>$question
    ));
    print_r($test);
    return $test;
}