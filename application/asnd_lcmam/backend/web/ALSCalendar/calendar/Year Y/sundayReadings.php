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
                            $dateTotest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
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

            //For Trinity Sunday

            if ($row['rule'] == "after pentecost"){
                
                $verifyDate = date('Y-m-d', strtotime($pentecostSunday . '+7 days'));
                $datesSFM[] = $verifyDate;
                $datesSFM = array_unique($datesSFM);
            }
            //For Corpus Christi

            if ($row['rule'] == "after trinity"){
                
                $verifyDate = date('Y-m-d', strtotime($pentecostSunday . '+14 days'));
                $datesSFM[] = $verifyDate;
                $datesSFM = array_unique($datesSFM);
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
        if ($allSundays[$counter] != $pentecostSunday){
        $e['title'] = $row['sunday_name'];
        $e['start'] = $allSundays[$counter] . "T01:00:04";
        $e['color'] = '#3366FF';
        $e['textColor'] = 'White';
        $e['description'] = "This is the Marker for this Sunday.";
        if ($e['start'] != "T01:00:04" && $verification == 1 && $e['title'] != ""){ array_push($events, $e); }

        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:05";
        $e['color'] = '#FFCC99';
        $e['textColor'] = 'Black';

            if ($row['sunday_first_optional'] == ""){
                $e['description'] = "This is the First Reading for this Sunday in Ordinary Time." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the First Reading for this Sunday in Ordinary Time." . "<br>" . "Optional: " . $row['sunday_first_optional'];
            }

            if ($row['sunday_first_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['sunday_first_audio'] != ""){
                $e['url'] = $row['sunday_first_audio'];
            }

        if ($e['start'] != "T01:00:05" && $verification == 1){ array_push($events, $e); }
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:06";

            if ($row['sunday_second_optional'] == ""){
                $e['description'] = "This is the Second Reading for this Sunday in Ordinary Time." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Second Reading for this Sunday in Ordinary Time." . "<br>" . "Optional: " . $row['sunday_second_optional'];
            }

            if ($row['sunday_second_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['sunday_second_audio'] != ""){
                $e['url'] = $row['sunday_second_audio'];
            }

        if ($e['start'] != "T01:00:06" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_alleluia_verse'];
        $e['start'] = $allSundays[$counter] . "T01:00:07";

            if ($row['sunday_alleluia_optional'] == ""){
                $e['description'] = "This is the Alleluia Verse for this Sunday in Ordinary Time." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Alleluia Verse for this Sunday in Ordinary Time." . "<br>" . "Optional: " . $row['sunday_alleluia_optional'];
            }

            if ($row['sunday_alleluia_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['sunday_alleluia_audio'] != ""){
                $e['url'] = $row['sunday_alleluia_audio'];
            }

        if ($e['start'] != "T01:00:07" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allSundays[$counter] . "T01:00:08";

            if ($row['sunday_responsorial_optional'] == ""){
                $e['description'] = "This is the Responsorial Psalm for this Sunday in Ordinary Time." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Responsorial Psalm for this Sunday in Ordinary Time." . "<br>" . "Optional: " . $row['sunday_responsorial_optional'];
            }

            if ($row['sunday_responsorial_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['sunday_responsorial_audio'] != ""){
                $e['url'] = $row['sunday_responsorial_audio'];
            }

        if ($e['start'] != "T01:00:08" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allSundays[$counter] . "T01:00:09";

            if ($row['sunday_gospel_optional'] == ""){
                $e['description'] = "This is the Gospel for this Sunday in Ordinary Time." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Gospel for this Sunday in Ordinary Time." . "<br>" . "Optional: " . $row['sunday_gospel_optional'];
            }

            if ($row['sunday_gospel_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['sunday_gospel_audio'] != ""){
                $e['url'] = $row['sunday_gospel_audio'];
            }

        if ($e['start'] != "T01:00:09" && $verification == 1){ array_push($events, $e); }
}
        $counter++;
    
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}



?>