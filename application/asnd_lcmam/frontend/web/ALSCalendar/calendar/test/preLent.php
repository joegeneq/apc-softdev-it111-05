<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'getSundays.php';
require 'eventDeterminant.php';

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

        $sql = "SELECT * FROM weekday_reading WHERE weekday_reading_type = 'pre-lent'";
    
    //$sql = "SELECT * FROM solemnities_or_feasts";
    $result = $conn->query($sql);

    $preLentDays = array();

    $incrementDates = $ashWednesday;

    for ($x = 0; $x <= 2; $x++) { // There will always be 3 days after Ash Wed, before the first Sunday of Lent
        
        $incrementDates = date('Y-m-d', strtotime($incrementDates . '+1 day'));     

        $preLentDays[$x] = $incrementDates;
    }

    /*foreach ($preLentDays as $item => $x){
        echo $x . "<br>";
    }*/

    $events = array();

    $counter = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

        $e = array();

        $e['title'] = $row['weekday_name'];
        $e['start'] = $preLentDays[$counter] . "T01:00:04";
        $e['color'] = '#3399FF';
        $e['textColor'] = 'White';
        if ($e['start'] != "T01:00:04" && $e['title'] != ""){ array_push($events, $e); } // Allowed for displaying week number

        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $preLentDays[$counter] . "T01:00:05";
        $e['color'] = '#FFFF99';
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $preLentDays[$counter] . "T01:00:06";
        if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $preLentDays[$counter] . "T01:00:07";
        if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $preLentDays[$counter] . "T01:00:08";
        if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

        $counter++;

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
    /*
    $sql = "SELECT * FROM sunday_reading";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            if ($row['sunday_name'] == "Epiphany of the Lord" && $row['sunday_cycle_type'] == $sundayCycle){
                        
                        $e['title'] = $row['sunday_name'];
                        $e['start'] = $epiphanySunday . "T01:00:04";
                        $e['color'] = '#3366FF';
                        $e['textColor'] = 'White';
                        if ($e['start'] != "T01:00:04"){ array_push($events, $e); }

                        $e['title'] = $row['sunday_first_reading'];
                        $e['start'] = $epiphanySunday . "T01:00:05";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';
                        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
                    
                        $e['title'] = $row['sunday_second_reading'];
                        $e['start'] = $epiphanySunday . "T01:00:06";
                        //$e['color'] = '#33CC00';
                        $e['tip'] = $row['sunday_second_reading'];
                        if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

                        $e['title'] = $row['sunday_alleluia_verse'];
                        $e['start'] = $epiphanySunday . "T01:00:07";
                        if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

                        $e['title'] = $row['sunday_responsorial_psalm'];
                        $e['start'] = $epiphanySunday . "T01:00:08";
                        if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

                        $e['title'] = $row['sunday_gospel'];
                        $e['start'] = $epiphanySunday . "T01:00:09";
                        if ($e['start'] != "T01:00:09"){ array_push($events, $e); }

            }

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }*/
    

    echo json_encode($events);
    $conn->close();
    exit();

} catch (PDOException $e){
     die('Database connection could not be established.');
}

?>