<?php
//$str = "/start __p428148128412__stg__mkanal__cnew__g18089602831451289443__r1902282__t18512512";

$data = json_decode(file_get_contents('php://input'), true);

$str = $data["url"];

$json = [];

function returnValue($pattern, $str, $key, $arr) {
    preg_match($pattern, $str, $matches);
    if(count($matches) > 0) {
        $arr[$key] = $matches[0];
    }
    return $arr;
}

$json = returnValue('/(?<=__p)[a-zA-Z0-9]+/', $str, 'phone', $json);
$json = returnValue('/(?<=__s)[a-zA-Z0-9]+/', $str, 'utm_source', $json);
$json = returnValue('/(?<=__m)[a-zA-Z0-9]+/', $str, 'utm_medium', $json);
$json = returnValue('/(?<=__g)[a-zA-Z0-9]+/', $str, 'google_id', $json);
$json = returnValue('/(?<=__r)[a-zA-Z0-9]+/', $str, 'partner_id', $json);
$json = returnValue('/(?<=__t)[a-zA-Z0-9]+/', $str, 'maintask_id', $json);

echo json_encode($json);