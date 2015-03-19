<?php 


    //$timestamp=strtotime("7 March 2016 ");
    //echo gmdate("Y-m-d\TH:i:s\Z", $timestamp);
    //echo gmdate("Y-m-d", $timestamp);

    $day="01";
    $month="01";
    $year="2015";

    $trigger = $year . "-" . $month . "-" . $day;

    echo "<br>" . date('l', strtotime($trigger)) . "<br>";

    $day1ofyear = date('l', strtotime($trigger));

    //To identify what day January 1 is
    if ($day1ofyear == "Sunday") echo "Jan 1 is a Sunday. ";
    if ($day1ofyear == "Monday") echo "Jan 1 is a Monday. ";
    if ($day1ofyear == "Tuesday") echo "Jan 1 is a Tuesday. ";
    if ($day1ofyear == "Wednesday") echo "Jan 1 is a Wednesday. ";
    if ($day1ofyear == "Thursday") echo "Jan 1 is a Thursday. ";
    if ($day1ofyear == "Friday") echo "Jan 1 is a Friday. ";
    if ($day1ofyear == "Saturday") echo "Jan 1 is a Saturday. ";

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

    echo "<br>" . $firstSunday . " is the first Sunday of the year"; 

    $secondSunday = date('Y-m-d', strtotime($firstSunday . '+7 days'));

    echo "<br>" . $secondSunday . " is the second Sunday of the year"; 

    //To list all Sundays within the first month (Y-m-d)
    $sundays=$firstSunday;

    echo "<br>" . "These are the all the sundays in the month of January" . "<br>";

    $limit = $year . "-" . $month . "-" . "31";

    echo "And the limit used for this is: " . $limit . "<br><br>";

    while ($sundays < $limit){

        echo $sundays . "<br>";

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      

    }

    echo "<br>" . "These are the all the sundays in the year 2015" . "<br>";

    //To identify all the Sundays within the first year (Y-m-d)
    //Set limit to December 31

    $month = "12";

    $limit = $year . "-" . $month . "-" . "31";

    $sundays = $firstSunday;

    while ($sundays < $limit){

        echo date('l jS F (Y-m-d)', strtotime($sundays)) . " - " . $sundays . "<br>";

        //Display in CALENDAR-ACCEPTABLE date unit
        //$sundays = date('Y-m-d', strtotime($sundays . '+7 days'));        

        //Display in COMPREHENSIBLE date unit
        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));          

    }


    //$x = date("W",strtotime("1 April 2015"));
    //$y = date("W",strtotime("1 March 2015"));
    //echo "<br>". $x . "<br>";

?>
