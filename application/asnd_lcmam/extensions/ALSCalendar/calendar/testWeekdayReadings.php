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

    $firstWeekday = "";

    //To identify what is the first sunday of the year
    if ($day1ofyear == "Sunday"){
    	$firstWeekday = date('Y-m-d', strtotime($trigger . '+1 day'));
    };
    if ($day1ofyear == "Monday"){
    	$firstWeekday = $trigger;
    };
    if ($day1ofyear == "Tuesday"){
    	$firstWeekday = $trigger;
    };
    if ($day1ofyear == "Wednesday"){
    	$firstWeekday = $trigger;
    };
    if ($day1ofyear == "Thursday"){
    	$firstWeekday = $trigger;
    };
    if ($day1ofyear == "Friday"){
    	$firstWeekday = $trigger;
    };
    if ($day1ofyear == "Saturday"){
    	$firstWeekday = $trigger;
    };

    echo "<br>" . $firstWeekday . " is the first Weekday of the year"; 

    //To list all Sundays within the first month (Y-m-d)
    $weekdays=$firstWeekday;

    echo "<br>" . "These are the all the weekdays in the month of January" . "<br>";

    $limit = $year . "-" . $month . "-" . "31";

    echo "<br>Limit is: " . $limit . "<br><br>";

    while ($weekdays < $limit){

    	echo $weekdays . "<br>";

		$weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
       
        $checkIfSunday = date('l', strtotime($weekdays));

        if ($checkIfSunday == "Sunday"){
        
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        };  	

    }

	echo "<br>" . "These are the all the weekdays in the year 2015" . "<br><br>";

    //To identify all the Sundays within the first year (Y-m-d)
    //Set limit to December 31

    $month = "12";

    $limit = $year . "-" . $month . "-" . "31";

    $weekdays = $firstWeekday;

    while ($weekdays < $limit){

    	echo date('l jS F (Y-m-d)', strtotime($weekdays)) . " - " . $weekdays . "<br>";

    	//Display in CALENDAR-ACCEPTABLE date unit
		//$weekdays = date('Y-m-d', strtotime($weekdays . '+1 days'));    	

    	//Display in COMPREHENSIBLE date unit
		$weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));

        $checkIfSunday = date('l', strtotime($weekdays));

        if ($checkIfSunday == "Sunday"){
        
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        };      

    }


    //$x = date("W",strtotime("1 April 2015"));
    //$y = date("W",strtotime("1 March 2015"));
    //echo "<br>". $x . "<br>";

?>
