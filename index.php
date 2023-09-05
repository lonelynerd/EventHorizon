<!DOCTYPE html>

<html lang="fr" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <title>Timetable</title>
    <meta property="og:title" content="Timetable"/>
    <meta property="og:url" content="https://www.sagbot.com/edt2"/>
    <meta property="og:image" content="https://www.sagbot.com/edt2/icon/favicon-1024.png"/>
    <meta property="og:image:type" content="image/png"/>
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
    <p id="mouth"><?php echo date("D") . "<br>" . date("F Y") ?></p>
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

        include("./utils/ttWrapper.php");
        $edt = new Timetable("https://adecampus.univ-rouen.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=31782&projectId=0&calType=ical&nbWeeks=1&displayConfigId=8");
        $edt->fetchCal();
        ?>
        <div id="days">
            <?php
            for ($j = 0; $j < 6; $j += 1) {
                print_r($edt->getDay($j));
                $dateTime = $edt->getDate($edt->getDay($j));
                echo "<p class='day'>" . substr($dateTime->format("D"), 0, 1) . "<br><span>" . $dateTime->format("d") . "</span></p>\n";
            }
            ?>
        </div>
    </div>
    <div id="courses">
        <?php
        for($j = 0; $j < 6; $j += 1){
            $dateTime = $edt->getDate($edt->getDay($j));
            echo "<div class='course'>\n";
            echo "<p class='date'>" . $edt->getFormatedDate($edt->getDay($j),"l d M") . "</p>\n";
            echo "<div class='sb'>\n";
            echo "<div class='time'>\n";
            foreach ($edt->getDay($j) as $event) {
                echo "<div class='time-se'>\n";
                echo "<p class='start'>" . $edt->getHours($event)[0] . "</p>\n";
                echo "<p class='end'>" . $edt->getHours($event)[1] . "</p>\n";
                echo "</div>\n";
            }
            echo "</div>\n";
            echo "<div class='bar'></div>\n";
            echo "<div class='course-block'>\n";
            foreach ($edt->getDay($j) as $event) {
                echo "<div class='course-sb ";
                if (date("U") <= $edt->getDateFromEvent($event)->format("U") && date("U") >= $edt->getDateFromEvent($event)->format("U")) {
                    echo "select-c";
                }
                echo "'>\n";
                echo "<p class='name'>" . $edt->getTitle($event) . "</p>\n";
                preg_match("/^(\w[a-zA-Z@#0-9.]* \w[a-zA-Z@#0-9.]*) \(.*\) ?([A-Z]{0,1})?.*$/", $edt->getLocation($event), $matchs);
                array_shift($matchs);
                $string = implode(" ", $matchs);
                echo "<p class='where'><img alt='location' src='./styles/location.svg'>" . $string . "</p>\n";
                echo "<p class='prof'>" . $edt->getGroup($event) . "</p>\n";
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