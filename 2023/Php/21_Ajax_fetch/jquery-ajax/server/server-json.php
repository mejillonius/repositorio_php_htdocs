<?php

$id = -1;
$res = false;
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $lenguajes = [
        'PHP','HTML', 'CSS', 'Javascript', 'JSON', 
        'XML', 'SQL', 'SOAP', 'Ajax', 'Java'];
    if (isset($lenguajes[$id])) {
        $res = $lenguajes[$id];
    }
}

$result = [
    'id' => $id,
    'text' => $res
];
sleep(1);
$result = json_encode($result);

echo $result;
