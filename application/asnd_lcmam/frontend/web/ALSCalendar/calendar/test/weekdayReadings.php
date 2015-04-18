<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Weekday
    

    
    $allWeekdays = getWeekdaysOfOT();

    $countOfWeekdays = count($allWeekdays); //count of Sundays

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;

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
                            $dateTotest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }

                    for ($x=0; $x < $eastersCount; $x++){

                        if ($EasterSundays[$x] == $dateToTest){
                            $dateTotest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
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

            // For Sacred Heart Solemnity

            if ($row['rule'] == "always on a friday"){
                $checkForFriday = date('Y-m-d', strtotime($pentecostSunday . '+19 days'));
                $datesSFM[] = $checkForFriday;
                //$datesSFM = array_unique($datesSFM);
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

//For Calendar

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    if ($skipCheck > 1 ){
        $skipValue = $weeksBeforeLent + 1;
        //echo "You have reached if statement." . $skipValue;
        $query = "SELECT * FROM weekday_reading WHERE weekday_cycle_num = '" . $weekdayCycle. "' AND weekday_weeknum !='" . $skipValue . "'";
    }else{
        $query = "SELECT * FROM weekday_reading WHERE weekday_cycle_num = '" . $weekdayCycle. "'";
        //echo "You have reached else statement.";
    }

    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;
    $ashOne = date('Y-m-d', strtotime($ashWednesday . '+1 day'));
    $ashTwo = date('Y-m-d', strtotime($ashWednesday . '+2 days'));
    $ashThree = date('Y-m-d', strtotime($ashWednesday . '+3 days'));

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        if ($allWeekdays[$counter] != $ashWednesday){
            if ($allWeekdays[$counter] != $ashOne){
                if ($allWeekdays[$counter] != $ashTwo){
                    if ($allWeekdays[$counter] != $ashThree){

                         //echo $allWeekdays[$counter] . "<br>";

                        $verification = 1; // Initially Sunday is to be used (Verification of Usage)
                        $dateForChecking = $allWeekdays[$counter];


                        for ($x=0; $x < count($datesSFM); $x++){

                            if ($datesSFM[$x] == $dateForChecking){
                                $verification = 0; // If Sunday is within the list, Sunday is no longer to be used
                            }

                        }
                        
                        $e = array();
                        
                        $e['title'] = $row['weekday_name'];
                        $e['start'] = $allWeekdays[$counter] . "T01:00:01";
                        $e['color'] = '#3399FF';
                        $e['textColor'] = 'White';
                        $e['description'] = "This is the Marker for this Week in Ordinary Time.";
                        if ($e['start'] != "T01:00:01" && $e['title'] != ""){ array_push($events, $e); } // Allowed for displaying week number

                        $e['title'] = $row['weekday_first_reading'];
                        $e['start'] = $allWeekdays[$counter] . "T01:00:21";
                        $e['color'] = '#99FF66';
                        $e['textColor'] = 'Black';
                        
                            if ($row['weekday_first_optional'] == ""){
                                $e['description'] = "This is the First Reading for this day in Ordinary Time." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the First Reading for this day in Ordinary Time." . "<br>" . "Optional: " . $row['weekday_first_optional'];
                            }

                            if ($row['weekday_first_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['weekday_first_audio'] != ""){
                                $e['url'] = $row['weekday_first_audio'];
                            }

                        if ($e['start'] != "T01:00:21" && $verification == 1){ array_push($events, $e); }

                        $e['title'] = $row['weekday_alleluia_verse'];
                        $e['start'] = $allWeekdays[$counter] . "T01:00:22";

                            if ($row['weekday_alleluia_optional'] == ""){
                                $e['description'] = "This is the Alleluia Verse for this day in Ordinary Time." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Alleluia Verse for this day in Ordinary Time." . "<br>" . "Optional: " . $row['weekday_alleluia_optional'];
                            }

                            if ($row['weekday_alleluia_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['weekday_alleluia_audio'] != ""){
                                $e['url'] = $row['weekday_alleluia_audio'];
                            }

                        if ($e['start'] != "T01:00:22" && $verification == 1){ array_push($events, $e); }

                        $e['title'] = $row['weekday_responsorial_psalm'];
                        $e['start'] = $allWeekdays[$counter] . "T01:00:23";

                            if ($row['weekday_responsorial_optional'] == ""){
                                $e['description'] = "This is the Responsorial Psalm for this day in Ordinary Time." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Responsorial Psalm for this day in Ordinary Time." . "<br>" . "Optional: " . $row['weekday_responsorial_optional'];
                            }

                            if ($row['weekday_responsorial_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['weekday_responsorial_audio'] != ""){
                                $e['url'] = $row['weekday_responsorial_audio'];
                            }

                        if ($e['start'] != "T01:00:23" && $verification == 1){ array_push($events, $e); }

                        $e['title'] = $row['weekday_gospel'];
                        $e['start'] = $allWeekdays[$counter] . "T01:00:24";

                            if ($row['weekday_gospel_optional'] == ""){
                                $e['description'] = "This is the Gospel for this day in Ordinary Time." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Gospel for this day in Ordinary Time." . "<br>" . "Optional: " . $row['weekday_gospel_optional'];
                            }

                            if ($row['weekday_gospel_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['weekday_gospel_audio'] != ""){
                                $e['url'] = $row['weekday_gospel_audio'];
                            }

                        if ($e['start'] != "T01:00:24" && $verification == 1){ array_push($events, $e); }
                    }
                }
            }
        }
            $counter++;
        
    }

//print_r($datesSFM);

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

//*/
?>