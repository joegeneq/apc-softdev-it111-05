<?php 

include 'getSundays.php';

//For Calendar

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

                if (date('l', strtotime($dateToTest)) == "Sunday"){
                    
                    $OTSundays = getSundaysOfOT();
                    $LentSundays = getSundaysOfLent();
                    $EasterSundays = getSundaysOfEaster();
                    $AdventSundays = getSundaysOfEaster();

                    for ($x=0; $x < count($OTSundays); $x++){

                        if ($OTSundays[$x] == $dateToTest){
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }
                    
                    for ($x=0; $x < count($LentSundays); $x++){

                        if ($LentSundays[$x] == $dateToTest){
                            $dateTotest = date('Y-m-d', strtotime($dateTotest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }

                    for ($x=0; $x < count($EasterSundays); $x++){

                        if ($EasterSundays[$x] == $dateToTest){
                            $dateTotest = date('Y-m-d', strtotime($dateTotest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }

                    for ($x=0; $x < count($AdventSundays); $x++){

                        if ($AdventSundays[$x] == $dateToTest){
                            $dateTotest = date('Y-m-d', strtotime($dateTotest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }

                }
                if (date('l', strtotime($dateToTest)) != "Sunday"){
                    $datesSFM[$counter] = $dateToTest;
                    $counter++;
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

//print_r($datesSFM);

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    if ($skipCheck > 1 ){
        $skipValue = $weeksBeforeLent + 1;
        $skipValue2 = $skipValue + 1;
        //echo "You have reached if statement." . $skipValue;
        $query = "SELECT * FROM sunday_reading WHERE sunday_cycle_type = '" . $sundayCycle. "' AND sunday_weeknum !='" . $skipValue . "' AND sunday_weeknum !='" . $skipValue2 . "'";
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

        $verification = 1; // Initially Sunday is to be used (Verification of Usage)
        $dateForChecking = $allSundays[$counter];

        for ($x=0; $x < count($datesSFM); $x++){

            if ($datesSFM[$x] == $dateForChecking){
                $verification = 0; // If Sunday is within the list, Sunday is no longer to be used
            }

        }

        $e = array();
        
        $e['title'] = $row['sunday_name'];
        $e['start'] = $allSundays[$counter] . "T01:00:04";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_name'];
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:04" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:05";
        $e['color'] = '#FFCC00';
        $e['tip'] = $row['sunday_first_reading'];
        $e['textColor'] = 'Black';
        if ($e['start'] != "T01:00:05" && $verification == 1){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:06";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_second_reading'];
        if ($e['start'] != "T01:00:06" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_alleluia_verse'];
        $e['start'] = $allSundays[$counter] . "T01:00:07";
        $e['tip'] = $row['sunday_alleluia_verse'];
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_alleluia_verse'];
        if ($e['start'] != "T01:00:07" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allSundays[$counter] . "T01:00:08";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_responsorial_psalm'];
        if ($e['start'] != "T01:00:08" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allSundays[$counter] . "T01:00:09";
        //$e['color'] = '#33CC00';
        $e['tip'] = $row['sunday_gospel'];
        if ($e['start'] != "T01:00:09" && $verification == 1){ array_push($events, $e); }

        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}



?>