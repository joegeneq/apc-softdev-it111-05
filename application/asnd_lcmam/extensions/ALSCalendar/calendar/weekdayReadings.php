<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';

//For Weekday
	
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
        
    	/*
    	if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));        
        }if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        }if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        }if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        }if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+1 day'));
        }if ($weekdays < $ashWednesday){
        echo $allWeekdays[$x] = date('Y-m-d, l', strtotime($weekdays)) . "<br>";
        $weekdays = date('Y-m-d', strtotime($weekdays . '+2 day'));
        }
        */

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

    $countOfWeekdays = count($allWeekdays); //count of Sundays

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;


//For Calendar

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    if ($skipCheck > 1 ){
        $skipValue = $weeksBeforeLent + 1;
        //echo "You have reached if statement." . $skipValue;
        $query = "SELECT * FROM weekday_reading WHERE weekday_cycle_num = '" . $weekdayCycle. "' AND weekday_weeknum !='" . $skipValue . "'";
    }else{
        $query = "SELECT * FROM weekday_reading WHERE weekday_cycle_type = '" . $weekdayCycle. "'";
        //echo "You have reached else statement.";
    }

    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        $e = array();
        
        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:05";
        $e['color'] = '#33FF66';
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:07";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

//*/
?>