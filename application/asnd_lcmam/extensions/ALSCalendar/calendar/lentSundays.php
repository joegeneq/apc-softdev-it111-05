<?php 

require 'dbConnection.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Calendar

    $allLentSundays = getSundaysOfLent();

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
        $query = "SELECT * FROM sunday_reading WHERE sunday_reading_type = 'lent' AND sunday_cycle_type = '" . $sundayCycle. "'";
    
    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        $e = array();
        
        $e['title'] = $row['sunday_name'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:04";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_name'];
        $e['textColor'] = 'Black';
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:04";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:10";}
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:05";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_first_reading'];
        $e['textColor'] = 'Black';
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:05";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:11";}
        if ($e['title'] != ""){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_second_reading'];
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:06";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:12";}
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:07";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_responsorial_psalm'];
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:07";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:13";}
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['sunday_before_gospel'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_before_gospel'];
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:08";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:14";}
        if ($e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allLentSundays[$counter] . "T01:00:09";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_gospel'];
        if ($row['sunday_name'] == "Palm Sunday of the Passion of the Lord:At the Procession with Palms - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:09";}
        if ($row['sunday_name'] == "Palm Sunday: At the Mass - B"){$e['start'] = $allLentSundays[$counter] . "T01:00:14";}
        if ($e['title'] != ""){ array_push($events, $e); }

        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>