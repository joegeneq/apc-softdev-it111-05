<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';

//For Sunday

    error_reporting(E_ERROR); // attempting to remove errors and notices

    $trigger = $year . "-" . $month . "-" . $day;

    //echo "<br>" . date('l', strtotime($trigger)) . "<br>";

    $day1ofyear = date('l', strtotime($trigger));

    $firstSunday = "";

    //To identify what is the first sunday of the year
    if ($day1ofyear == "Sunday"){
        $firstSunday = $trigger;
    };
    if ($day1ofyear == "Monday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+6 days'));
    };
    if ($day1ofyear == "Tuesday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+5 days'));
    };
    if ($day1ofyear == "Wednesday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+4 days'));
    };
    if ($day1ofyear == "Thursday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+3 days'));
    };
    if ($day1ofyear == "Friday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+2 days'));
    };
    if ($day1ofyear == "Saturday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+1 day'));
    };

    $secondSunday = date('Y-m-d', strtotime($firstSunday . '+7 days')); //Because the Second Sunday is the Baptism of the Lord

    $sundays=$secondSunday; //

    $allSundays = array();

    for ($x = 0; $x <= $weeksBeforeLent - 1; $x++) {
        
        $allSundays[$x] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      
    }

    $sundays = $pentecostSunday;

    $limit = $firstSundayofAdvent;
    
    $x = $weeksBeforeLent;

    while ($sundays != $limit){

        //echo $sundays . "<br>";

        $allSundays[$x++] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      

    }

    $countOfSundays = count($allSundays); //count of Sundays

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;

?>