<?php 

function getFirstSundayInOT(){

    include 'dateSpecification.php';
    include 'eventDeterminant.php';

  

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

return $firstSunday;

}

function getSundaysOfOT(){

    include 'dbConnection.php';
    include 'dateSpecification.php';
    include 'eventDeterminant.php';

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

    $sundays = date('Y-m-d', strtotime($pentecostSunday . '+7 days')); 

    $limit = $firstSundayofAdvent;
    
    $x = $weeksBeforeLent;

    while ($sundays != $limit){

        //echo $sundays . "<br>";

        $allSundays[$x++] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      

    }

    return $allSundays;
}

function getWeekdaysOfOT(){

    include 'dbConnection.php';
    include 'dateSpecification.php';
    include 'eventDeterminant.php';

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
    
    $secondWeekday = date('Y-m-d', strtotime($secondSunday . '+1 day')); 

    $weekdays = $secondWeekday;

    $allWeekdays = array();

    $weekdayCounter = 0;

    $weekdayLimit = date('Y-m-d', strtotime($ashWednesday . '-1 day')); 

    for ($x = 0; $x <= $weeksBeforeLent - 1; $x++) {
        

        if ($weekdays < $weekdayLimit){
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
        }
        if ($weekdays < $weekdayLimit){
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
        }
        if ($weekdays < $weekdayLimit){
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
        }
        if ($weekdays < $weekdayLimit){
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
        }
        if ($weekdays < $weekdayLimit){
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
        }
        if ($weekdays < $weekdayLimit){
            $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
            $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays)); //echo $weekdayCounter . "<br>";
            $weekdays = date('Y-m-d', strtotime($weekdays . '+2 days'));
        }
        
        
    }


    $weekdays = date('Y-m-d', strtotime($pentecostSunday . '+1 day'));

    $limit = $firstSundayofAdvent;
    
    while ($weekdays < $limit){

        $allWeekdays[$weekdayCounter++] = $weekdays;
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));
        $weekdays = date('Y-m-d', strtotime($weekdays . '+2 days'));

    }

    return $allWeekdays;

}

function getSundaysOfLent(){

    include 'dbConnection.php';
    include 'eventDeterminant.php';

    $sundays = date('Y-m-d', strtotime($ashWednesday . '+4 days')); //first Sunday of Advent

    //echo $sundays;

    $allLentSundays = array();

    for ($x = 0; $x <= 6; $x++) { // There will always be 6 Sundays for Lent, but the last Sunday has 2 readings
        
        $allLentSundays[$x] = $sundays;

        if ($x != 5){ $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));}
    }

    return $allLentSundays;
}

function getWeekdaysOfLent(){

    include 'dbConnection.php';
    include 'dateSpecification.php';
    include 'eventDeterminant.php';

    error_reporting(E_ERROR); // attempting to remove errors and notices

    $weekdayCounter = 0;

    $allWeekdays = array();

    $firstSundayofLent = date('Y-m-d', strtotime($ashWednesday . '+4 days'));

    $weekdays = date('Y-m-d', strtotime($firstSundayofLent . '+1 day'));

    $limit = $easterSunday;
    
    while ($weekdays < $limit){

        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = $weekdays;}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+2 days'));

    }

    return $allWeekdays;
}

function getSundaysOfEaster(){

    include 'dbConnection.php';
    include 'eventDeterminant.php';

    //$sundays = $pentecostSunday;

    $sundays = $easterSunday; //first Sunday of Advent

    //echo $sundays;

    $allEasterSundays = array();

    for ($x = 0; $x <= 7; $x++) { // There will always be 7 Sundays for Easter, but the first Sunday has 2 sets of readings
        
        $allEasterSundays[$x] = $sundays;

        if ($x > 0 ){ $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));}
    }

    return $allEasterSundays;
}

function getWeekdaysOfEaster(){

    include 'dbConnection.php';
    include 'dateSpecification.php';
    include 'eventDeterminant.php';

    error_reporting(E_ERROR); // attempting to remove errors and notices

    $weekdayCounter = 0;

    $allWeekdays = array();

    $weekdays = date('Y-m-d', strtotime($easterSunday . '+1 day'));

    $limit = $pentecostSunday;
    
    while ($weekdays < $limit){

        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = $weekdays;}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+2 days'));

    }

    return $allWeekdays;
}

function getSundaysOfAdvent(){

    include 'dbConnection.php';
    include 'eventDeterminant.php';

    $sundays=$firstSundayofAdvent; //first Sunday of Advent

    $allAdventSundays = array();

    for ($x = 0; $x <= 3; $x++) { // There will always be 4 Sundays for Advent
        
        $allAdventSundays[$x] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      
    }

    return $allAdventSundays;

}

function getWeekdaysOfAdvent(){

    include 'dbConnection.php';
    include 'dateSpecification.php';
    include 'eventDeterminant.php';    

    error_reporting(E_ERROR); // attempting to remove errors and notices

    $weekdayCounter = 0;

    $allWeekdays = array();

    $weekdays = date('Y-m-d', strtotime($firstSundayofAdvent . '+1 day'));

    $limit = $year . "-12-17";
    
    while ($weekdays < $limit){

        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = $weekdays;}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        
        if ($weekdays < $limit){ $allWeekdays[$weekdayCounter++] = date('Y-m-d', strtotime($weekdays));}
        $weekdays = date('Y-m-d', strtotime($weekdays . '+2 days'));

    }

    return $allWeekdays;
    
}

?>