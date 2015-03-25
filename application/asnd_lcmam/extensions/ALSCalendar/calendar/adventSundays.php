<?php 

require 'dbConnection.php';
require 'getSundays.php';
require 'eventDeterminant.php';

//For Calendar

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $year = date('Y', strtotime($sundays . '+1 year')); // Advent is always considered using next year's cycle type

    $sql = "SELECT sunday_cycle FROM event_determinant WHERE year = " . $year . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sundayCycle = $row['sunday_cycle'];
        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }

    $conn->close();

    $sundays=$firstSundayofAdvent; //first Sunday of Advent

    $allAdventSundays = array();

    for ($x = 0; $x <= 3; $x++) { // There will always be 4 Sundays for Advent
        
        $allAdventSundays[$x] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      
    }
    
    /*foreach ($allAdventSundays as $item => $x){
        echo $x . "<br>";
    }*/
//    $sundays = $pentecostSunday;

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
        $query = "SELECT * FROM sunday_reading WHERE sunday_reading_type = 'advent' AND sunday_cycle_type = '" . $sundayCycle. "'";
    
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
        $e['start'] = $allAdventSundays[$counter] . "T01:00:04";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_name'];
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:04"){ array_push($events, $e); }

        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allAdventSundays[$counter] . "T01:00:05";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_first_reading'];
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allAdventSundays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_second_reading'];
        if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

        $e['title'] = $row['sunday_alleluia_verse'];
        $e['start'] = $allAdventSundays[$counter] . "T01:00:07";
        $e['tip'] = $row['sunday_alleluia_verse'];
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_alleluia_verse'];
        if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allAdventSundays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_responsorial_psalm'];
        if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allAdventSundays[$counter] . "T01:00:09";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_gospel'];
        if ($e['start'] != "T01:00:09"){ array_push($events, $e); }

        $counter++;

        
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>