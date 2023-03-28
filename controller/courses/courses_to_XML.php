<?php
// get_tests(course_id)
// get the tests in the course with the given id

// Sample array
$data = array(
    0 => array(
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'johndoe@example.com'
    ),
    1 => array(
        'name' => 'JohnDoe',
        'age' => 30,
        'email' => 'johndoe@example.com'
    ),
    2 => array(
        'name' => 'John oe',
        'age' => 30,
        'email' => 'johndoe@example.com'
    )
);

// Create a new SimpleXMLElement object
$xml = new SimpleXMLElement('<courses/>');

// Function to convert array to XML
function array_to_xml($data, &$xml)
{   $cour = new SimpleXMLElement('<course/>');

    foreach ($data as $key => $value) {
        $keycour=$key;
        if (is_array($value)) {
            // If the value is an array, create a new element and call the function recursively
            array_to_xml($value, $cour);
        } else {
            // If the value is not an array, add it as a child element
            $cour->addChild($key, htmlspecialchars($value));
        }
    }

    $xml->addChild((string)$cour->key(),$cour);

    echo $cour->asXML()."<br>";
}

// Call the function to convert the array to XML
array_to_xml($data, $xml);

// Output the XML
echo $xml->asXML();

