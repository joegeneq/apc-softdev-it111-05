<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Weekday
	
    $allWeekdays = getWeekdaysOfOT();

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