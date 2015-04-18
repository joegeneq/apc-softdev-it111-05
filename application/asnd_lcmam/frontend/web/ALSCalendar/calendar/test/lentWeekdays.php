<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Weekday

    $allWeekdays = getWeekdaysOfLent();

    $countOfWeekdays = count($allWeekdays); //count of Sundays

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

            $LentWeekdays = getWeekdaysOfLent();
            $EasterWeekdays = getWeekdaysOfEaster();
                    
            $OTSundays = getSundaysOfOT();
            $LentSundays = getSundaysOfLent();
            $EasterSundays = getSundaysOfEaster();
            $AdventSundays = getSundaysOfEaster();

            $lentwCount = count($LentWeekdays);
            $easterwCount = count($EasterWeekdays);
            
            $otsCount = count($OTSundays);
            $lentsCount = count($OTSundays);
            $eastersCount = count($OTSundays);
            $adventsCount = count($OTSundays);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $dateToTest = $year . $row['date'];

            if ($row['rule'] == "replace SOT but not LEA"){

                if (date('l', strtotime($dateToTest)) != "Sunday"){
              
                    for ($x=0; $x < $lentwCount; $x++){
                        
                        if ($LentWeekdays[$x] == $dateToTest){
                            
                            if ($x >= 30){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                
                            }

                            if ($x < 30){
                                
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                                
                            }

                        }
                        
                    }
              
                    for ($x=0; $x < $easterwCount; $x++){
                        
                        if ($EasterWeekdays[$x] == $dateToTest){
                            
                            if ($x >= 30){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                
                            }

                            if ($x < 30){
                                
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                                
                            }

                        }
                        
                    }
                    
                }
                if (date('l', strtotime($dateToTest)) == "Sunday"){
  
                    for ($x=0; $x < count($OTSundays); $x++){

                        if ($OTSundays[$x] == $dateToTest){
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

                    }
                    
                    for ($x=0; $x < count($LentSundays); $x++){

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

                    for ($x=0; $x < count($EasterSundays); $x++){

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

//For Calendar

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
        $query = "SELECT * FROM weekday_reading WHERE weekday_reading_type = 'lent'";

    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    $counter = 0;

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        $verification = 1; // Initially Sunday is to be used (Verification of Usage)
        $dateForChecking = $allWeekdays[$counter];

        for ($x=0; $x < count($datesSFM); $x++){

            if ($datesSFM[$x] == $dateForChecking){
                $verification = 0; // If Sunday is within the list, Sunday is no longer to be used
            }

        }

        $e = array();
        
        $e['title'] = $row['weekday_name'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:04";
        $e['color'] = '#3399FF';
        $e['textColor'] = 'White';
        $e['description'] = "This is the Marker for this Weekday of Lent.";
        if ($e['title'] != "" ){ array_push($events, $e); } // Allowing verification of name

        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:05";
        $e['color'] = '#993399';
        $e['textColor'] = 'White';

            if ($row['weekday_first_optional'] == ""){
                $e['description'] = "This is the First Reading for this Weekday of Lent." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the First Reading for this Weekday of Lent." . "<br>" . "Optional: " . $row['weekday_first_optional'];
            }

            if ($row['weekday_first_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_first_audio'] != ""){
                $e['url'] = $row['weekday_first_audio'];
            }

        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:06";

            if ($row['weekday_alleluia_optional'] == ""){
                $e['description'] = "This is the Alleluia Verse for this Weekday of Lent." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Alleluia Verse for this Weekday of Lent." . "<br>" . "Optional: " . $row['weekday_alleluia_optional'];
            }

            if ($row['weekday_alleluia_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_alleluia_audio'] != ""){
                $e['url'] = $row['weekday_alleluia_audio'];
            }

        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:07";

            if ($row['weekday_responsorial_optional'] == ""){
                $e['description'] = "This is the Responsorial Psalm for this Weekday of Lent." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Responsorial Psalm for this Weekday of Lent." . "<br>" . "Optional: " . $row['weekday_responsorial_optional'];
            }

            if ($row['weekday_responsorial_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_responsorial_audio'] != ""){
                $e['url'] = $row['weekday_responsorial_audio'];
            }

        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $allWeekdays[$counter] . "T01:00:08";

            if ($row['weekday_gospel_optional'] == ""){
                $e['description'] = "This is the Gospel for this Weekday of Lent." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Gospel for this Weekday of Lent." . "<br>" . "Optional: " . $row['weekday_gospel_optional'];
            }

            if ($row['weekday_gospel_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_gospel_audio'] != ""){
                $e['url'] = $row['weekday_gospel_audio'];
            }

        if ($e['title'] != "" && $verification == 1){ array_push($events, $e); }

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