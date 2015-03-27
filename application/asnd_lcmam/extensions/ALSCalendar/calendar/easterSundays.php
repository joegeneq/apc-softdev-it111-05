<?php 

require 'dbConnection.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Calendar
    
    $allEasterSundays = getSundaysOfEaster();

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM solemnities_or_feasts";
    $result = $conn->query($sql);

    $datesSFM = array();
    $counter = 0;

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $dateToTest = $year . $row['date'];

            if ($row['rule'] == "replace SOT but not LEA"){

                if (date('l', strtotime($dateToTest)) != "Sunday"){
                    $datesSFM[$counter] = $dateToTest;
                    $counter++;
                }
                if (date('l', strtotime($dateToTest)) == "Sunday"){
                    
                    $OTSundays = getSundaysOfOT();
                    $LentSundays = getSundaysOfLent();
                    $EasterSundays = getSundaysOfEaster();
                    $AdventSundays = getSundaysOfEaster();

                    $otsCount = count($OTSundays);
                    $lentsCount = count($OTSundays);
                    $eastersCount = count($OTSundays);
                    $adventsCount = count($OTSundays);

                    for ($x=0; $x < $otsCount; $x++){

                        if ($OTSundays[$x] == $dateToTest){
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }
                    
                    for ($x=0; $x < $lentsCount; $x++){

                        if ($LentSundays[$x] == $dateToTest){
                            
                            if ($x == 5 || $x == 6){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                            }

                            if ($x < 5){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                            }

                        }

                    }

                    for ($x=0; $x < $eastersCount; $x++){

                        if ($EasterSundays[$x] == $dateToTest){

                            if ($x == 0 || $x == 1){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                            }

                            if ($x > 1){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                            }
                        }

                    }

                    for ($x=0; $x < $adventsCount; $x++){

                        if ($AdventSundays[$x] == $dateToTest){
                            $dateTotest = date('Y-m-d', strtotime($dateTotest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }

                }

            }

            if ($row['rule'] == "omitted if falls on a sunday"){
                
                    if (date('l', strtotime($dateToTest)) != "Sunday"){
                        
                                $datesSFM[] = $dateToTest;
                    }
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

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
        $query = "SELECT * FROM sunday_reading WHERE sunday_reading_type = 'easter' AND sunday_cycle_type = '" . $sundayCycle. "'";
    
    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        $verification = 1; // Initially Sunday is to be used (Verification of Usage)
        $dateForChecking = $allSundays[$counter];

        for ($x=0; $x < count($datesSFM); $x++){

            if ($datesSFM[$x] == $dateForChecking){
                $verification = 0; // If Sunday is within the list, Sunday is no longer to be used
            }

        }

        $e = array();
        
        $e['title'] = $row['sunday_name'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:04";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_name'];
        $e['textColor'] = 'Black';
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:04";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:10";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:05";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_first_reading'];
        $e['textColor'] = 'Black';
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:05";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:11";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_second_reading'];
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:06";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:12";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:07";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_responsorial_psalm'];
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:07";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:13";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_before_gospel'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_before_gospel'];
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:08";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:14";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allEasterSundays[$counter] . "T01:00:09";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_gospel'];
        if ($row['sunday_name'] == "The Mass of Easter Day"){$e['start'] = $allEasterSundays[$counter] . "T01:00:09";}
        if ($row['sunday_name'] == "Easter Vigil in the Holy Night"){$e['start'] = $allEasterSundays[$counter] . "T01:00:15";}
        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>