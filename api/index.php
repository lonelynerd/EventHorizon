<?php

include "utils/getEDT.php";
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *", false);

if (!isset($_GET["url"])) {
    echo json_encode(["error" => "No URL provided."]);
    die();
}

$obj = null;

try {
    $obj = edt(urldecode($_GET["url"]));
} catch (TypeError) {
    echo json_encode(["error" => "An error occured while fetching the calendar.", "value" => $_GET["url"]]);
    die();
}

if (!$obj) {
    echo json_encode(["error" => "An error occured while fetching the calendar.",
        "value" => $obj]);
    die();
}
echo json_encode($obj);

?>