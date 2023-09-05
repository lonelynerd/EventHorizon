<?php
function edt($url) {
    include('CalFileParser.php');
    $cal = new CalFileParser();
    $cal->set_timezone('Europe/Paris');
    $example3 = $cal->parse($url);
    if (count($example3) == 0) return false;
    $EDT = array();
    foreach ($example3 as $key => $val) {
        $example3[$key]["DTSTART"] = array($example3[$key]["DTSTART"], $example3[$key]["DTSTART"]->format("Hi"));
        $example3[$key]["DTEND"] = array($example3[$key]["DTEND"], $example3[$key]["DTEND"]->format("Hi"));
        unset($example3[$key]["DTSTAMP"]);
        unset($example3[$key]["CREATED"]);
        unset($example3[$key]["SEQUENCE"]);
        unset($example3[$key]["UID"]);
        unset($example3[$key]["VALARM"]);
        unset($example3[$key]["LAST-MODIFIED"]);
        $desc = explode("\n", $example3[$key]["DESCRIPTION"]);
        $example3[$key]["DESCRIPTION"] = $desc[count($desc) - 3];
        $EDT[$example3[$key]["DTSTART"][0]->format("Y-m-d")][$example3[$key]["DTSTART"][1]] = $example3[$key];
    }
    ksort($EDT);
    foreach ($EDT as $key => $val) {
        ksort($EDT[$key]);
    }
    return $EDT;
}

;

?>
