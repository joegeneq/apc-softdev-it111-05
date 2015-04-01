<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM weekday_reading WHERE weekday_reading_type = 'ash'";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();

        $e['title'] = $row['weekday_name'];
        $e['start'] = $ashWednesday . "T01:00:05";
        $e['color'] = '#33FF66';
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
        
        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $ashWednesday . "T01:00:05";
        $e['color'] = '#33FF66';
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $ashWednesday . "T01:00:06";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:06" ){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $ashWednesday . "T01:00:07";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:07" ){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $ashWednesday . "T01:00:08";
        //$e['color'] = '#33CC00';
        if ($e['start'] != "T01:00:08" ){ array_push($events, $e); }


    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>