<?php


if(isset($_REQUEST['query'])){
    $query = $_REQUEST['query'];
    $xml = file_get_contents('mondial.xml');

    $xml = new SimpleXMLElement ($xml);
    $results = $xml->xpath($query);
}

$result = new SimpleXMLElement('<results/>');
foreach ($results as $value) {
    $result->addChild('result',$value);
}
$result = $result->asXML();

sleep(2);

echo $result;