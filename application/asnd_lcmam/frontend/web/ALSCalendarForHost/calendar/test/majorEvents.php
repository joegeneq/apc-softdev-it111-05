<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'functions.php';
require 'eventDeterminant.php';


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $yearNew = date('Y', strtotime($sundays . '+1 year')); // Advent is always considered using next year's cycle type

    $sql = "SELECT sunday_cycle FROM event_determinant WHERE year = " . $yearNew . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $newSundayCycle = $row['sunday_cycle'];
        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $epiphanySunday = getFirstSundayInOT();

    //echo $firstSunday;
    //$firstSunday = "2015-01-06"; // for testing

    if ($epiphanySunday == $year . "-01-01"){
        $epiphanySunday = date('Y-m-d', strtotime($firstSunday . '+7 days'));
    }    

    if ($epiphanySunday == $year . "-01-02"){
        $sql = "SELECT * FROM event WHERE date != '-01-02' AND date != '-01-03' AND date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07'";
    }

    if ($epiphanySunday == $year . "-01-03"){
        $sql = "SELECT * FROM event WHERE date != '-01-03' AND date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07'";
    }

    if ($epiphanySunday == $year . "-01-04"){
        $sql = "SELECT * FROM event WHERE date != '-01-04' AND date != '-01-05' AND date != '-01-06' AND date != '-01-07'";
    }

     if ($epiphanySunday == $year . "-01-05"){
        $sql = "SELECT * FROM event WHERE date != '-01-05' AND date != '-01-06' AND date != '-01-07'";
    }

     if ($epiphanySunday == $year . "-01-06"){
        $sql = "SELECT * FROM event WHERE date != '-01-06' AND date != '-01-07'";
    }

    if ($epiphanySunday == $year . "-01-07"){
        $sql = "SELECT * FROM event WHERE date != '-01-07'";
    }

    if ($epiphanySunday == $year . "-01-08"){
        $sql = "SELECT * FROM event WHERE date != ''";
    }


    //$sql = "SELECT * FROM solemnities_or_feasts";
    $result = $conn->query($sql);

    $events = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            if ($row['date'] != ''){

                $sundayValidation = date('l', strtotime($year . $row['date']));
                //echo $sundayValidation;

                $e['title'] = $row['event_name'];
                $e['start'] = $year . $row['date'] . "T01:00:02";
                $e['color'] = '#FF6600';
                $e['textColor'] = 'White';
                $e['description'] = "This is the Marker for this Day's Mass during Advent.";
                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:02";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:08";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:14";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:02";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:08";}
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);} 
                }

                $e['title'] = $row['event_first_reading'];
                $e['start'] = $year . $row['date'] . "T01:00:03";
                $e['color'] = '#009933';
                $e['textColor'] = '#White';

                    if ($row['event_first_optional'] == ""){
                        $e['description'] = "This is the First Reading for this mass during Advent/Christmas." . "<br>" . "No optional readings.";}
                    else{
                        $e['description'] = "This is the First Reading for this mass during Advent/Christmas." . "<br>" . "Optional: " . $row['event_first_optional'];
                    }

                    if ($row['event_first_audio'] == ""){
                        $e['url'] = "/";
                    }
                    if ($row['event_first_audio'] != ""){
                        $e['url'] = $row['event_first_audio'];
                    }

                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:03";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:09";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:08";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:15";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:03";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:09";}
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);}
                }

                $e['title'] = $row['event_second_reading'];
                $e['start'] = $year . $row['date'] . "T01:00:04";

                    if ($row['event_second_optional'] == ""){
                        $e['description'] = "This is the Second Reading for this mass during Advent/Christmas." . "<br>" . "No optional readings.";}
                    else{
                        $e['description'] = "This is the Second Reading for this mass during Advent/Christmas." . "<br>" . "Optional: " . $row['event_second_optional'];
                    }

                    if ($row['event_second_audio'] == ""){
                        $e['url'] = "/";
                    }
                    if ($row['event_second_audio'] != ""){
                        $e['url'] = $row['event_second_audio'];
                    }

                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:04";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:10";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:16";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:04";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:10";}
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);}
                }

                $e['title'] = $row['event_alleluia_verse'];
                $e['start'] = $year . $row['date'] . "T01:00:05";

                    if ($row['event_alleluia_optional'] == ""){
                        $e['description'] = "This is the Alleluia Verse for this mass during Advent/Christmas." . "<br>" . "No optional readings.";}
                    else{
                        $e['description'] = "This is the Alleluia Verse for this mass during Advent/Christmas." . "<br>" . "Optional: " . $row['event_alleluia_optional'];
                    }

                    if ($row['event_alleluia_audio'] == ""){
                        $e['url'] = "/";
                    }
                    if ($row['event_alleluia_audio'] != ""){
                        $e['url'] = $row['event_alleluia_audio'];
                    }

                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:05";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:11";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:17";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:05";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:11";}
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);}
                }

                $e['title'] = $row['event_responsorial_psalm'];
                $e['start'] = $year . $row['date'] . "T01:00:06";

                    if ($row['event_responsorial_optional'] == ""){
                        $e['description'] = "This is the Responsorial Psalm for this mass during Advent/Christmas." . "<br>" . "No optional readings.";}
                    else{
                        $e['description'] = "This is the Responsorial Psalm for this mass during Advent/Christmas." . "<br>" . "Optional: " . $row['event_responsorial_optional'];
                    }

                    if ($row['event_responsorial_audio'] == ""){
                        $e['url'] = "/";
                    }
                    if ($row['event_responsorial_audio'] != ""){
                        $e['url'] = $row['event_responsorial_audio'];
                    }

                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:06";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:12";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:18";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:06";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:12";}
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);}
                }

                $e['title'] = $row['event_gospel'];
                $e['start'] = $year . $row['date'] . "T01:00:07";

                    if ($row['event_gospel_optional'] == ""){
                        $e['description'] = "This is the Gospel for this mass during Advent/Christmas." . "<br>" . "No optional readings.";}
                    else{
                        $e['description'] = "This is the Gospel for this mass during Advent/Christmas." . "<br>" . "Optional: " . $row['event_gospel_optional'];
                    }

                    if ($row['event_gospel_audio'] == ""){
                        $e['url'] = "/";
                    }
                    if ($row['event_gospel_audio'] != ""){
                        $e['url'] = $row['event_gospel_audio'];
                    }

                if ($row['event_type'] == "Christmas Dawn"){$e['start'] = $year . $row['date'] . "T01:00:07";}
                if ($row['event_type'] == "Christmas Day"){$e['start'] = $year . $row['date'] . "T01:00:13";}
                if ($row['event_type'] == "Christmas Night"){$e['start'] = $year . $row['date'] . "T01:00:19";}
                if ($row['event_type'] == "Solemnity, Christmas - Nativity"){$e['start'] = $year . $row['date'] . "T01:00:07";}
                if ($row['event_type'] == "Advent - Morning Mass"){$e['start'] = $year . $row['date'] . "T01:00:13";}
                
                if ($e['title'] != ""){ 
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Advent" ){array_push($events, $e); }
                    if ($sundayValidation != "Sunday" && $row['event_type'] == "Christmas Octave"){array_push($events, $e);}
                    if ($row['event_type'] != "Advent" && $row['event_type'] != "Christmas Octave"){array_push($events, $e);}
                }

            }

            if ($row['date'] == ''){
                    $dayConversion = "";
                if ($row['event_name'] == "Monday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+1 day'));} 
                if ($row['event_name'] == "Tuesday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+2 days'));}
                if ($row['event_name'] == "Wednesday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+3 days'));}    
                if ($row['event_name'] == "Thursday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+4 days'));}    
                if ($row['event_name'] == "Friday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+5 days'));}    
                if ($row['event_name'] == "Saturday after Epiphany"){ $dayConversion = date('Y-m-d', strtotime($epiphanySunday . '+6 days'));}    
                        
                        $e['title'] = $row['event_name'];
                        $e['start'] = $dayConversion . "T01:00:03";
                        $e['color'] = '#3399FF';
                        $e['textColor'] = 'White';
                        $e['description'] = "This is the Marker for this Day after the Epiphany.";
                        if ($e['title'] != ""){ array_push($events, $e); }

                        $e['title'] = $row['event_first_reading'];
                        $e['start'] = $dayConversion . "T01:00:04";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';

                            if ($row['event_first_optional'] == ""){
                                $e['description'] = "This is the First Reading for this day after the Epiphany." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the First Reading for this day after the Epiphany." . "<br>" . "Optional: " . $row['event_first_optional'];
                            }

                            if ($row['event_first_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['event_first_audio'] != ""){
                                $e['url'] = $row['event_first_audio'];
                            }

                        if ($e['title'] != ""){ array_push($events, $e); }

                        $e['title'] = $row['event_second_reading'];
                        $e['start'] = $dayConversion . "T01:00:05";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';

                            if ($row['event_second_optional'] == ""){
                                $e['description'] = "This is the Second Reading for this day after the Epiphany." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Second Reading for this day after the Epiphany." . "<br>" . "Optional: " . $row['event_second_optional'];
                            }

                            if ($row['event_second_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['event_second_audio'] != ""){
                                $e['url'] = $row['event_second_audio'];
                            }

                        if ($e['title'] != ""){ array_push($events, $e); }

                        $e['title'] = $row['event_alleluia_verse'];
                        $e['start'] = $dayConversion . "T01:00:06";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';

                            if ($row['event_alleluia_optional'] == ""){
                                $e['description'] = "This is the Alleluia Verse for this day after the Epiphany." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Alleluia Verse for this day after the Epiphany." . "<br>" . "Optional: " . $row['event_alleluia_optional'];
                            }

                            if ($row['event_alleluia_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['event_alleluia_audio'] != ""){
                                $e['url'] = $row['event_alleluia_audio'];
                            }

                        if ($e['title'] != ""){ array_push($events, $e); }

                        $e['title'] = $row['event_responsorial_psalm'];
                        $e['start'] = $dayConversion . "T01:00:07";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';

                            if ($row['event_responsorial_optional'] == ""){
                                $e['description'] = "This is the Responsorial Psalm for this day after the Epiphany." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Responsorial Psalm for this day after the Epiphany." . "<br>" . "Optional: " . $row['event_responsorial_optional'];
                            }

                            if ($row['event_responsorial_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['event_responsorial_audio'] != ""){
                                $e['url'] = $row['event_responsorial_audio'];
                            }

                        if ($e['title'] != ""){ array_push($events, $e); }

                        $e['title'] = $row['event_gospel'];
                        $e['start'] = $dayConversion . "T01:00:08";
                        $e['color'] = '#FFFF99';
                        $e['textColor'] = 'Black';

                            if ($row['event_gospel_optional'] == ""){
                                $e['description'] = "This is the Gospel for this day after the Epiphany." . "<br>" . "No optional readings.";}
                            else{
                                $e['description'] = "This is the Gospel for this day after the Epiphany." . "<br>" . "Optional: " . $row['event_gospel_optional'];
                            }

                            if ($row['event_gospel_audio'] == ""){
                                $e['url'] = "/";
                            }
                            if ($row['event_gospel_audio'] != ""){
                                $e['url'] = $row['event_gospel_audio'];
                            }

                        if ($e['title'] != ""){ array_push($events, $e); }

            }

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
    $sql = "SELECT * FROM sunday_reading";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            if ($row['sunday_name'] == "Epiphany of the Lord" && $row['sunday_cycle_type'] == $sundayCycle){
                        
                    $e['title'] = $row['sunday_name'];
                    $e['start'] = $epiphanySunday . "T01:00:19";
                    $e['color'] = '#3366FF';
                    $e['textColor'] = 'White';
                    $e['description'] = "This is the Marker for this Sunday of Epiphany.";
                    if ($e['start'] != "T01:00:19"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_first_reading'];
                    $e['start'] = $epiphanySunday . "T01:00:20";
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_first_optional'] == ""){
                            $e['description'] = "This is the First Reading for this Sunday of Epiphany." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the First Reading for this Sunday of Epiphany." . "<br>" . "Optional: " . $row['sunday_first_optional'];
                        }

                        if ($row['sunday_first_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_first_audio'] != ""){
                            $e['url'] = $row['sunday_first_audio'];
                        }

                    if ($e['start'] != "T01:00:20"){ array_push($events, $e); }
                
                    $e['title'] = $row['sunday_second_reading'];
                    $e['start'] = $epiphanySunday . "T01:00:21";
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_second_optional'] == ""){
                            $e['description'] = "This is the Second Reading for this Sunday of Epiphany." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Second Reading for this Sunday of Epiphany." . "<br>" . "Optional: " . $row['sunday_second_optional'];
                        }

                        if ($row['sunday_second_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_second_audio'] != ""){
                            $e['url'] = $row['sunday_second_audio'];
                        }

                    if ($e['start'] != "T01:00:21"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_alleluia_verse'];
                    $e['start'] = $epiphanySunday . "T01:00:22";
                    $e['tip'] = $row['sunday_alleluia_verse'];
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_alleluia_optional'] == ""){
                            $e['description'] = "This is the Alleluia Verse for this Sunday of Epiphany." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Alleluia Verse for this Sunday of Epiphany." . "<br>" . "Optional: " . $row['sunday_alleluia_optional'];
                        }

                        if ($row['sunday_alleluia_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_alleluia_audio'] != ""){
                            $e['url'] = $row['sunday_alleluia_audio'];
                        }

                    if ($e['start'] != "T01:00:22"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_responsorial_psalm'];
                    $e['start'] = $epiphanySunday . "T01:00:23";
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_responsorial_optional'] == ""){
                            $e['description'] = "This is the Responsorial Psalm for this Sunday of Epiphany." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Responsorial Psalm for this Sunday of Epiphany." . "<br>" . "Optional: " . $row['sunday_responsorial_optional'];
                        }

                        if ($row['sunday_responsorial_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_responsorial_audio'] != ""){
                            $e['url'] = $row['sunday_responsorial_audio'];
                        }

                    if ($e['start'] != "T01:00:23"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_gospel'];
                    $e['start'] = $epiphanySunday . "T01:00:24";
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_gospel_optional'] == ""){
                            $e['description'] = "This is the Gospel for this Sunday of Epiphany." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Gospel for this Sunday of Epiphany." . "<br>" . "Optional: " . $row['sunday_gospel_optional'];
                        }

                        if ($row['sunday_gospel_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_gospel_audio'] != ""){
                            $e['url'] = $row['sunday_gospel_audio'];
                        }

                    if ($e['start'] != "T01:00:24"){ array_push($events, $e); }

            }
            if ($row['sunday_name'] == "Pentecost Sunday" && $row['sunday_cycle_type'] == $sundayCycle){
                        
                    $e['title'] = $row['sunday_name'];
                    $e['start'] = $pentecostSunday . "T01:00:04";
                    $e['color'] = '#FFFF99';
                    $e['textColor'] = 'White';
                    $e['description'] = "This is the Marker for this Pentecost Sunday.";
                    if ($e['start'] != "T01:00:04"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_first_reading'];
                    $e['start'] = $pentecostSunday . "T01:00:05";
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_first_optional'] == ""){
                            $e['description'] = "This is the First Reading for this Pentecost Sunday." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the First Reading for this Pentecost Sunday." . "<br>" . "Optional: " . $row['sunday_first_optional'];
                        }

                        if ($row['sunday_first_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_first_audio'] != ""){
                            $e['url'] = $row['sunday_first_audio'];
                        }

                    if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
                
                    $e['title'] = $row['sunday_second_reading'];
                    $e['start'] = $pentecostSunday . "T01:00:06";
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_second_optional'] == ""){
                            $e['description'] = "This is the Second Reading for this Pentecost Sunday." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Second Reading for this Pentecost Sunday." . "<br>" . "Optional: " . $row['sunday_second_optional'];
                        }

                        if ($row['sunday_second_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_second_audio'] != ""){
                            $e['url'] = $row['sunday_second_audio'];
                        }

                    if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_alleluia_verse'];
                    $e['start'] = $pentecostSunday . "T01:00:07";
                    $e['tip'] = $row['sunday_alleluia_verse'];
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_alleluia_optional'] == ""){
                            $e['description'] = "This is the Alleluia Verse for this Pentecost Sunday." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Alleluia Verse for this Pentecost Sunday." . "<br>" . "Optional: " . $row['sunday_alleluia_optional'];
                        }

                        if ($row['sunday_alleluia_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_alleluia_audio'] != ""){
                            $e['url'] = $row['sunday_alleluia_audio'];
                        }

                    if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_responsorial_psalm'];
                    $e['start'] = $pentecostSunday . "T01:00:08";
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_responsorial_optional'] == ""){
                            $e['description'] = "This is the Responsorial Psalm for this Pentecost Sunday." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Responsorial Psalm for this Pentecost Sunday." . "<br>" . "Optional: " . $row['sunday_responsorial_optional'];
                        }

                        if ($row['sunday_responsorial_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_responsorial_audio'] != ""){
                            $e['url'] = $row['sunday_responsorial_audio'];
                        }

                    if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_gospel'];
                    $e['start'] = $pentecostSunday . "T01:00:09";
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_gospel_optional'] == ""){
                            $e['description'] = "This is the Gospel for this Pentecost Sunday." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Gospel for this Pentecost Sunday." . "<br>" . "Optional: " . $row['sunday_gospel_optional'];
                        }

                        if ($row['sunday_gospel_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_gospel_audio'] != ""){
                            $e['url'] = $row['sunday_gospel_audio'];
                        }

                    if ($e['start'] != "T01:00:09"){ array_push($events, $e); }

            }
            if ($row['sunday_name'] == "Octave of Christmas: The Holy Family of Jesus" && $row['sunday_cycle_type'] == $newSundayCycle){
                        
                    $lastChristmasSunday = date('Y-m-d', strtotime($firstSundayofAdvent . '+28 days'));

                if ($lastChristmasSunday > $year . "-12-25"){

                    $e['title'] = $row['sunday_name'];
                    $e['start'] = $lastChristmasSunday . "T01:00:04";
                    $e['color'] = '#3366FF';
                    $e['textColor'] = 'White';
                    $e['description'] = "This is the Marker for this Day.";
                    if ($e['start'] != "T01:00:04"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_first_reading'];
                    $e['start'] = $lastChristmasSunday . "T01:00:05";
                    $e['color'] = '#FFCC00';
                    $e['textColor'] = 'Black';

                        if ($row['sunday_first_optional'] == ""){
                            $e['description'] = "This is the First Reading for this Octave of Christmas." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the First Reading for this Octave of Christmas." . "<br>" . "Optional: " . $row['sunday_first_optional'];
                        }

                        if ($row['sunday_first_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_first_audio'] != ""){
                            $e['url'] = $row['sunday_first_audio'];
                        }

                    if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
                
                    $e['title'] = $row['sunday_second_reading'];
                    $e['start'] = $lastChristmasSunday . "T01:00:06";

                        if ($row['sunday_second_optional'] == ""){
                            $e['description'] = "This is the Second Reading for this Octave of Christmas." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Second Reading for this Octave of Christmas." . "<br>" . "Optional: " . $row['sunday_second_optional'];
                        }

                        if ($row['sunday_second_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_second_audio'] != ""){
                            $e['url'] = $row['sunday_second_audio'];
                        }

                    if ($e['start'] != "T01:00:06"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_alleluia_verse'];
                    $e['start'] = $lastChristmasSunday . "T01:00:07";

                        if ($row['sunday_alleluia_optional'] == ""){
                            $e['description'] = "This is the Alleluia Verse for this Octave of Christmas." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Alleluia Verse for this Octave of Christmas." . "<br>" . "Optional: " . $row['sunday_alleluia_optional'];
                        }

                        if ($row['sunday_alleluia_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_alleluia_audio'] != ""){
                            $e['url'] = $row['sunday_alleluia_audio'];
                        }

                    if ($e['start'] != "T01:00:07"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_responsorial_psalm'];
                    $e['start'] = $lastChristmasSunday . "T01:00:08";

                        if ($row['sunday_responsorial_optional'] == ""){
                            $e['description'] = "This is the Responsorial Psalm for this Octave of Christmas." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Responsorial Psalm for this Octave of Christmas." . "<br>" . "Optional: " . $row['sunday_responsorial_optional'];
                        }

                        if ($row['sunday_responsorial_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_responsorial_audio'] != ""){
                            $e['url'] = $row['sunday_responsorial_audio'];
                        }


                    if ($e['start'] != "T01:00:08"){ array_push($events, $e); }

                    $e['title'] = $row['sunday_gospel'];
                    $e['start'] = $lastChristmasSunday . "T01:00:09";

                        if ($row['sunday_gospel_optional'] == ""){
                            $e['description'] = "This is the Gospel for this Octave of Christmas." . "<br>" . "No optional readings.";}
                        else{
                            $e['description'] = "This is the Gospel for this Octave of Christmas." . "<br>" . "Optional: " . $row['sunday_gospel_optional'];
                        }

                        if ($row['sunday_gospel_audio'] == ""){
                            $e['url'] = "/";
                        }
                        if ($row['sunday_gospel_audio'] != ""){
                            $e['url'] = $row['sunday_gospel_audio'];
                        }
                    
                    if ($e['start'] != "T01:00:09"){ array_push($events, $e); }
                }
            }

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