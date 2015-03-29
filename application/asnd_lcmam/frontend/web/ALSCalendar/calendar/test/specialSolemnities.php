<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';
require 'functions.php';

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM solemnities_or_feasts WHERE date = ''";
    $result = $conn->query($sql);

    $datesSFM = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            //Trinity Sunday
            if ($row['rule'] == "after pentecost"){
                
                $verifyDate = date('Y-m-d', strtotime($pentecostSunday . '+7 days'));
                $datesSFM[] = $verifyDate;
                
            }
            
            //Corpus Christi
            if ($row['rule'] == "after trinity"){
                
                $verifyDate = date('Y-m-d', strtotime($pentecostSunday . '+14 days'));
                $datesSFM[] = $verifyDate;
                
            }

            // SacredHeart
            if ($row['rule'] == "always on a friday"){
                $checkForFriday = date('Y-m-d', strtotime($pentecostSunday . '+19 days'));
                $datesSFM[] = $checkForFriday;
                
            }
        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
    $conn->close();

} catch (PDOException $e){
     die('Database connection could not be established.');
     //exit(0);
}

$datesSFM = array_unique($datesSFM);

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM solemnities_or_feasts WHERE cycle_type = '" . $sundayCycle . "'";
    $result = $conn->query($sql);

    $events = array();

    $countArray = count($datesSFM);

    //$datesSFM = array_unique($datesSFM);

    $counter = 0;

    if ($result->num_rows > 0) {

        $e = array();
        // output data of each row

        while($row = $result->fetch_assoc()) {
                

                $e['title'] = $row['title'];
                $e['start'] = $datesSFM[$counter] . "T01:00:07";
                $e['color'] = '#3366FF';
                $e['textColor'] = 'White';
                if ($e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['first_reading'];
                $e['start'] = $datesSFM[$counter] . "T01:00:08";
                $e['color'] = '#00CC66';
                $e['textColor'] = 'White';
                if ($e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['responsorial_psalm'];
                $e['start'] = $datesSFM[$counter]  . "T01:00:09";
                if ($e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['second_reading'];
                $e['start'] = $datesSFM[$counter]  . "T01:00:10";
                if ($e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['alleluia_verse'];
                $e['start'] = $datesSFM[$counter] . "T01:00:11";
                if ($e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['gospel'];
                $e['start'] = $datesSFM[$counter] . "T01:00:12";
                if ($e['title'] != ""){
                    array_push($events, $e);
                }
                
                //echo $e['start'] . " vs. " . $datesSFM[$counter] . "<br>";

            $counter++;

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
//print_r($datesSFM);
    
    echo json_encode($events);
    $conn->close();
    exit();

} catch (PDOException $e){
     die('Database connection could not be established.');
}

?>