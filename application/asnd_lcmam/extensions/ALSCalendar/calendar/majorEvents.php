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
            $e['start'] = $allSundays[$counter] . "T01:00:01";
            $e['color'] = '#FFCC00';
            $e['tip'] = $row['event_name'];
            $e['textColor'] = 'Black';
            if ($e['title'] != ""){ array_push($events, $e); }

            //echo $e['start'];
            array_push($events, $e);
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