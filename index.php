<!DOCTYPE html>

<html lang="fr" prefix="og: https://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <title>Timetable - SAGBOT</title>
        <meta property="og:title" content="Timetable"/>
        <meta property="og:url" content="https://www.sagbot.com/edt2"/>
        <meta property="og:image" content="https://www.sagbot.com/edt2/icon/favicon-1024.png"/>
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="1024">
        <meta property="og:image:height" content="1024"/>
        <meta property="og:image:alt" content="Logo SAGBOT"/>
        <meta property="og:site_name" content="SAGBOT"/>
        <meta property="og:locale" content="fr_FR">
        <link rel="icon" href="icon/favicon.ico" sizes="any">
        <link rel="icon" href="icon/favicon.svg" type="image/svg+xml">
        <link rel="manifest" href="/manifest.webmanifest">
        <link rel="stylesheet" type="text/css" href="./styles/main.css">
    </head>

    <body>
        <div id="date">
            <p id="day_num"><?php
                    date_default_timezone_set('Europe/Paris');
                    echo date('d');
                ?></p>
            <p id="mouth"><?php echo date("D")."<br>".date("F Y") ?></p>
            <div id="day_rela">
                <a>Today</a>
            </div>
        </div>
        <div id="schedule">
            <div id="calendar">
                <div id="week">
                    <p>Week<br><span class="number"><?php echo(date('W') . "/" . (date('W') + 1)); ?></span></p>
                </div>
                <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    
                    include("./utils/getEDT.php");
                    $edt = edt();
                ?>
                <div id="days">
                    <?php
                        foreach ($edt as $day => $data){
                            $dateTime = DateTime::createFromFormat("Y-m-d", $day);
                            echo "<p class=\"day\">".substr($dateTime->format("D"), 0, 1)."<br><span>". $dateTime->format("d") ."</span></p>\n";
                        }
                    ?>
                </div>
            </div>
            <div id="courses">
                <?php
                    foreach ($edt as $day => $data){
                        $dateTime = DateTime::createFromFormat("Y-m-d", $day);
                        echo "<div class=\"course\">\n"; 
                        echo "<p class=\"date\">". $dateTime->format("l d M") ."</p>\n";
                        echo "<div class=\"sb\">\n";
                        echo "<div class=\"time\">\n";
                        foreach ($data as $course){
                            echo "<div class=\"time-se\">\n";
                            echo "<p class=\"start\">". $course["DTSTART"][0]->format("H:i") ."</p>\n";
                            echo "<p class=\"end\">". $course["DTEND"][0]->format("H:i") ."</p>\n";
                            echo "</div>\n";
                        }
                        echo "</div>\n";
                        echo "<div class=\"bar\"></div>\n";
                        echo "<div class=\"course-block\">\n";
                        foreach ($data as $course){
                            echo "<div class=\"course-sb ";
                            if (date("U") <= $course["DTEND"][0]->format("U") && date("U") >= $course["DTSTART"][0]->format("U")){
                                echo "select-c";
                            }
                            echo "\">\n";
                            echo "<p class=\"name\">". $course["SUMMARY"] ."</p>\n";
                            preg_match("/^(\w[a-zA-Z@#0-9.]* \w[a-zA-Z@#0-9.]*) \(.*\) ?([A-Z]{0,1})?.*$/", $course["LOCATION"], $matchs);
                            array_shift($matchs);
                            $string = implode(" ", $matchs);
                            echo "<p class=\"where\"><img alt=\"location\" src=\"./styles/location.svg\">". $string ."</p>\n";
                            echo "<p class=\"prof\">". $course["DESCRIPTION"] ."</p>\n";
                            echo "</div>\n";
                        }
                        echo "</div>\n";
                        echo "</div>\n";
                        echo "</div>\n";
                    }
                ?>
            </div>
        </div>
        <script src="./utils/app.js"></script>
    </body>
</html>