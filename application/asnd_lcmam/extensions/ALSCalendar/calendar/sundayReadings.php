<?php 

require 'getSundays.php';

//For Calendar

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    if ($skipCheck > 1 ){
        $skipValue = $weeksBeforeLent + 1;
        //echo "You have reached if statement." . $skipValue;
        $query = "SELECT * FROM sunday_reading WHERE sunday_cycle_type = '" . $sundayCycle. "' AND sunday_weeknum !='" . $skipValue . "'";
    }else{
        $query = "SELECT * FROM sunday_reading WHERE sunday_cycle_type = '" . $sundayCycle. "'";
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
        
        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:01";
        $e['color'] = '#FFCC00';
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:01"){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:02";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:02"){ array_push($events, $e); }

        $e['title'] = $row['sunday_alleluia_verse'];
        $e['start'] = $allSundays[$counter] . "T01:00:03";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:03"){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allSundays[$counter] . "T01:00:04";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:04"){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allSundays[$counter] . "T01:00:05";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }

        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>