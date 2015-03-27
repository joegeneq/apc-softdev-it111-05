<?php 

include 'dbConnection.php';
include_once 'dateSpecification.php';
include_once 'functions.php';

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

    //echo count($OTSundays);
    //print_r($OTSundays);
print_r($EasterWeekdays);
/*echo $x . "<br>";
                            echo $dateToTest . "<br>";                                
                            echo $dateTotest;
                                echo $dateToTest;
                                                                echo $dateToTest . "<br>";
                            echo $dateToTest . "<br>";
$dateToTest = "2015-03-29";
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

                    }*/
/*$dateToTest = "2015-04-26";
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

                    */


/*
                if (date('l', strtotime($dateToTest)) != "Sunday"){
                    
                    for ($x=0; $x < $lentwCount; $x++){

                        //echo "<br>" . $x . "<br>";

                        if ($LentWeekdays[$x] == $dateToTest){
                            
                            echo "<br>" . $x . "<br>";


                            if ($x < 29){
                                
                                if (date('l', strtotime($dateToTest)) != "Saturday"){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                }

                                if (date('l', strtotime($dateToTest)) == "Saturday"){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . '+2 days'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                }

                            }

                            if ($x >= 29){
                                
                                if ($x == 29){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                }
                                
                                if ($x != 29){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                }
                            }



                        }

                    }
                    
                }
*/

$dateToTest = "2015-04-11";
$dateValue = date('l', strtotime($dateToTest));
echo "<br>" . $dateToTest . "<br>";
//echo "<br>" . $lentwCount . "<br>";

if (date('l', strtotime($dateToTest)) != "Sunday"){
              
                    for ($x=0; $x < $easterwCount; $x++){
                        
                        if ($EasterWeekdays[$x] == $dateToTest){
                            
                            if ($x <= 5){
                                    $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                    $datesSFM[$counter] = $dateToTest;
                                    $counter++;
                                
                            }

                            if ($x > 5){
                                
                                $datesSFM[$counter] = $dateToTest;
                                $counter++;
                                
                            }

                        }
                        
                    }
                    
                }

echo "<br>" . $dateToTest . "<br>";
/*    $x = 1; // Initially Sunday is to be used (Verification of Usage)
    $sundaysOfOT = listAllSFMs();

    for ($x=0; $x > count($sundaysOfOT); $x++){

        if ($sundaysOfOT[$x] == $dateForChecking){
            $x = 0; // If Sunday is within the list, Sunday is no longer to be used
        }

    }
*/
?>