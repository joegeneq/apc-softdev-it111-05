<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'getSundays.php';

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //echo $firstSunday;
    //$firstSunday = "2015-01-06"; // for testing

    if ($firstSunday == $year . "-01-01"){
        $firstSunday = date('Y-m-d', strtotime($firstSunday . '+7 days'));
    }    

    if ($firstSunday == $year . "-01-02"){
        $sql = "SELECT * FROM event WHERE date != '-01-02' AND date != '-01-03' AND date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07' AND date != ''";
    }

    if ($firstSunday == $year . "-01-03"){
        $sql = "SELECT * FROM event WHERE date != '-01-03' AND date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07' AND date != ''";
    }

    if ($firstSunday == $year . "-01-04"){
        $sql = "SELECT * FROM event WHERE date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07' AND date != ''";
    }

     if ($firstSunday == $year . "-01-05"){
        $sql = "SELECT * FROM event WHERE date != '-01-05' AND date != '-01-06' AND date != '-01-07' AND date != ''";
    }

     if ($firstSunday == $year . "-01-06"){
        $sql = "SELECT * FROM event WHERE date != '-01-06' AND date != '-01-07' AND date != ''";
    }

    if ($firstSunday == $year . "-01-07"){
        $sql = "SELECT * FROM event WHERE date != '-01-07' AND date != ''";
    }

    if ($firstSunday == $year . "-01-08"){
        $sql = "SELECT * FROM event WHERE date != ''";
    }


    //$sql = "SELECT * FROM solemnities_or_feasts";
    $result = $conn->query($sql);

    $events = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $e['title'] = $row['event_name'];
            $e['start'] = $year . $row['date'] . "T01:00:02";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_name'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:02";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:08";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:14";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:02";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:08";}
            if ($e['title'] != ""){ array_push($events, $e); }

            $e['title'] = $row['event_first_reading'];
            $e['start'] = $year . $row['date'] . "T01:00:03";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_first_reading'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:03";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:09";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:08";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:15";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:03";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:09";}
            if ($e['title'] != ""){ array_push($events, $e); }

            $e['title'] = $row['event_second_reading'];
            $e['start'] = $year . $row['date'] . "T01:00:04";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_second_reading'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:04";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:10";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:16";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:04";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:10";}
            if ($e['title'] != ""){ array_push($events, $e); }

            $e['title'] = $row['event_alleluia_verse'];
            $e['start'] = $year . $row['date'] . "T01:00:05";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_alleluia_verse'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:05";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:11";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:17";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:05";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:11";}
            if ($e['title'] != ""){ array_push($events, $e); }

            $e['title'] = $row['event_responsorial_psalm'];
            $e['start'] = $year . $row['date'] . "T01:00:06";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_responsorial_psalm'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:06";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:12";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:18";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:06";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:12";}
            if ($e['title'] != ""){ array_push($events, $e); }

            $e['title'] = $row['event_gospel'];
            $e['start'] = $year . $row['date'] . "T01:00:07";
            $e['color'] = '#99FF66';
            $e['tip'] = $row['event_gospel'];
            $e['textColor'] = 'Black';
            if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:07";}
            if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:13";}
            if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:19";}
            if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:07";}
            if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:13";}
            if ($e['title'] != ""){ array_push($events, $e); }

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
    echo json_encode($events);
    $conn->close();
    exit();

} catch (PDOException $e){
     die('Database connection could not be established.');
}

?>