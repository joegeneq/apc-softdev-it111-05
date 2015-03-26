<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';

//For Weekday
	
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

    /*foreach ($allWeekdays as $item => $x){
        echo $x . "<br>";
    }*/

    $countOfWeekdays = count($allWeekdays); //count of Sundays

//For Calendar

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
        $query = "SELECT * FROM weekday_reading WHERE weekday_reading_type = 'easter'";

    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        

        $e = array();
        
        $e['title'] = $row['weekday_name'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:04";
        $e['color'] = '#33FF66';
        $e['textColor'] = 'Black';
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:05";
        $e['color'] = '#33FF66';
        $e['textColor'] = 'Black';
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:07";
        //$e['color'] = '#33CC00';
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        if ($e['title'] != ""){ array_push($events, $e); }

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