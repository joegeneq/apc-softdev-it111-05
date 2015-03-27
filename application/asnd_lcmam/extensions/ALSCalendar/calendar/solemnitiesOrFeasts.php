<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'functions.php';

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

            $OTWeekdays = getWeekdaysOfOT();
            $LentWeekdays = getWeekdaysOfLent();
            $EasterWeekdays = getWeekdaysOfEaster();
            $AdventWeekdays = getWeekdaysOfAdvent();
                    
            $OTSundays = getSundaysOfOT();
            $LentSundays = getSundaysOfLent();
            $EasterSundays = getSundaysOfEaster();
            $AdventSundays = getSundaysOfEaster();

            $otCount = count($OTWeekdays);
            $lentwCount = count($LentWeekdays);
            $easterwCount = count($EasterWeekdays);
            $adventwCount = count($AdventWeekdays);
            
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
                        
                        if ($OTWeekdays[$x] == $dateToTest){
                            $datesSFM[$counter] = $dateToTest;
                            $counter++;
                        }

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
                for ($x=0; $x < $adventwCount; $x++){
                        
                        if ($AdventWeekdays[$x] == $dateToTest){
                                
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                                
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

                    for ($x=0; $x < count($AdventSundays); $x++){

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
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM solemnities_or_feasts";
    $result = $conn->query($sql);

    $events = array();

    $countArray = count($datesSFM);

    $counter = 0;

    if ($result->num_rows > 0) {

        $e = array();
        // output data of each row

        while($row = $result->fetch_assoc()) {
                
                for ($x = 0; $x < $countArray; $x++){
                
                if ($row['type'] == "S"){
                    $e['color'] = '#FF6699';
                }
                if ($row['type'] == "F"){
                    $e['color'] = '#6633CC';
                }

                $e['title'] = $row['title'];
                $e['start'] = $year . $row['date'] . "T01:00:07";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['first_reading'];
                $e['start'] = $year . $row['date'] . "T01:00:08";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['responsorial_psalm'];
                $e['start'] = $year . $row['date'] . "T01:00:09";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['second_reading'];
                $e['start'] = $year . $row['date'] . "T01:00:10";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['alleluia_verse'];
                $e['start'] = $year . $row['date'] . "T01:00:11";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }

                $e['title'] = $row['gospel'];
                $e['start'] = $year . $row['date'] . "T01:00:012";
                if ($datesSFM[$x] == $year . $row['date'] && $e['title'] != ""){
                    array_push($events, $e);
                }
                
                //echo $e['start'] . " vs. " . $datesSFM[$counter] . "<br>";

               
               }
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