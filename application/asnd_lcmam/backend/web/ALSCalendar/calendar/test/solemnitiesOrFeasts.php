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
    $events = array();
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
        $e = array();
        // output data of each row
        while($row = $result->fetch_assoc()) {
              
            $dateToTest = $year . $row['date'];
            
              if ($row['type'] == "S"){
                    $e['color'] = '#FF6699';
                    $e['description'] = "This is the Solemnity's name.";
              }
              if ($row['type'] == "F"){
                    $e['color'] = '#6633CC';
                    $e['description'] = "This is the Feast's name.";
              }
              if ($row['type'] == "M"){
                    $e['color'] = '#52CC29';
                    $e['description'] = "This is the Memorial's name.";
              }

            if ($row['rule'] == "replace SOT but not LEA"){

                if (date('l', strtotime($dateToTest)) != "Sunday"){
              
                    for ($x=0; $x < $otCount; $x++){
                        if ($OTWeekdays[$x] == $dateToTest){

                            $e['title'] = $row['title'];
                            $e['start'] = $dateToTest . "T01:00:07";
                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['first_reading'];
                            $e['start'] = $dateToTest . "T01:00:08";

                                $e['description'] = "This is the First Reading for this day.";

                                if ($row['first_reading_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['first_reading_audio'] != ""){
                                    $e['url'] = $row['first_reading_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['responsorial_psalm'];
                            $e['start'] = $dateToTest . "T01:00:09";

                                $e['description'] = "This is the Responsorial Psalm for this day.";

                                if ($row['responsorial_psalm_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['responsorial_psalm_audio'] != ""){
                                    $e['url'] = $row['responsorial_psalm_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['second_reading'];
                            $e['start'] = $dateToTest . "T01:00:10";

                                $e['description'] = "This is the Second Reading for this day.";

                                if ($row['second_reading_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['second_reading_audio'] != ""){
                                    $e['url'] = $row['second_reading_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['alleluia_verse'];
                            $e['start'] = $dateToTest . "T01:00:11";

                                $e['description'] = "This is the Alleluia Verse for this day.";

                                if ($row['alleluia_verse_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['alleluia_verse_audio'] != ""){
                                    $e['url'] = $row['alleluia_verse_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['gospel'];
                            $e['start'] = $dateToTest . "T01:00:12";

                                $e['description'] = "This is the Gospel for this day.";

                                if ($row['gospel_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['gospel_audio'] != ""){
                                    $e['url'] = $row['gospel_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}
                        }
                    }

                    for ($x=0; $x < $easterwCount; $x++){
                        
                        if ($EasterWeekdays[$x] == $dateToTest){
                            
                            if ($x >= 30){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));

                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                                
                            }

                            if ($x < 30){
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                                
                            }

                        }
                        
                    }

                    for ($x=0; $x < $lentwCount; $x++){

                        if ($LentWeekdays[$x] == $dateToTest){
                            
                            if ($x >= 30){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));

                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                                
                            }

                            if ($x < 30){

                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                                
                            }

                        }
                        
                    }
                    
                }
                for ($x=0; $x < $adventwCount; $x++){
                        
                        if ($AdventWeekdays[$x] == $dateToTest){
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                                
                            }

                        }
                if (date('l', strtotime($dateToTest)) == "Sunday"){

                    for ($x=0; $x < count($OTSundays); $x++){

                        if ($OTSundays[$x] == $dateToTest){
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                        }

                    }
                    
                    for ($x=0; $x < count($LentSundays); $x++){

                        if ($LentSundays[$x] == $dateToTest){
                            
                            if ($x == 5 || $x == 6){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                            }

                            if ($x < 5){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                            }

                        }

                    }

                    for ($x=0; $x < count($EasterSundays); $x++){

                        if ($EasterSundays[$x] == $dateToTest){

                            if ($x == 0 || $x == 1){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . 'Next Monday'));
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                            }

                            if ($x > 1){
                                $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                            }
                        }

                    }

                    for ($x=0; $x < count($AdventSundays); $x++){

                        if ($AdventSundays[$x] == $dateToTest){
                            $dateToTest = date('Y-m-d', strtotime($dateToTest . '+1 day'));
                                $e['title'] = $row['title'];
                                $e['start'] = $dateToTest . "T01:00:07";
                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['first_reading'];
                                $e['start'] = $dateToTest . "T01:00:08";

                                    $e['description'] = "This is the First Reading for this day.";

                                    if ($row['first_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['first_reading_audio'] != ""){
                                        $e['url'] = $row['first_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['responsorial_psalm'];
                                $e['start'] = $dateToTest . "T01:00:09";

                                    $e['description'] = "This is the Responsorial Psalm for this day.";

                                    if ($row['responsorial_psalm_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['responsorial_psalm_audio'] != ""){
                                        $e['url'] = $row['responsorial_psalm_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['second_reading'];
                                $e['start'] = $dateToTest . "T01:00:10";

                                    $e['description'] = "This is the Second Reading for this day.";

                                    if ($row['second_reading_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['second_reading_audio'] != ""){
                                        $e['url'] = $row['second_reading_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['alleluia_verse'];
                                $e['start'] = $dateToTest . "T01:00:11";

                                    $e['description'] = "This is the Alleluia Verse for this day.";

                                    if ($row['alleluia_verse_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['alleluia_verse_audio'] != ""){
                                        $e['url'] = $row['alleluia_verse_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}

                                $e['title'] = $row['gospel'];
                                $e['start'] = $dateToTest . "T01:00:12";

                                    $e['description'] = "This is the Gospel for this day.";

                                    if ($row['gospel_audio'] == ""){
                                        $e['url'] = "/";
                                    }
                                    if ($row['gospel_audio'] != ""){
                                        $e['url'] = $row['gospel_audio'];
                                    }

                                if ($e['title'] != ""){
                                array_push($events, $e);}
                        }
                    }

                }

            }

            if ($row['rule'] == "omitted if falls on a sunday"){
                
                    if (date('l', strtotime($dateToTest)) != "Sunday"){
                            $e['title'] = $row['title'];
                            $e['start'] = $dateToTest . "T01:00:07";
                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['first_reading'];
                            $e['start'] = $dateToTest . "T01:00:08";

                                $e['description'] = "This is the First Reading for this day.";

                                if ($row['first_reading_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['first_reading_audio'] != ""){
                                    $e['url'] = $row['first_reading_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['responsorial_psalm'];
                            $e['start'] = $dateToTest . "T01:00:09";

                                $e['description'] = "This is the Responsorial Psalm for this day.";

                                if ($row['responsorial_psalm_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['responsorial_psalm_audio'] != ""){
                                    $e['url'] = $row['responsorial_psalm_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['second_reading'];
                            $e['start'] = $dateToTest . "T01:00:10";

                                $e['description'] = "This is the Second Reading for this day.";

                                if ($row['second_reading_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['second_reading_audio'] != ""){
                                    $e['url'] = $row['second_reading_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['alleluia_verse'];
                            $e['start'] = $dateToTest . "T01:00:11";

                                $e['description'] = "This is the Alleluia Verse for this day.";

                                if ($row['alleluia_verse_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['alleluia_verse_audio'] != ""){
                                    $e['url'] = $row['alleluia_verse_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}

                            $e['title'] = $row['gospel'];
                            $e['start'] = $dateToTest . "T01:00:12";

                                $e['description'] = "This is the Gospel for this day.";

                                if ($row['gospel_audio'] == ""){
                                    $e['url'] = "/";
                                }
                                if ($row['gospel_audio'] != ""){
                                    $e['url'] = $row['gospel_audio'];
                                }

                            if ($e['title'] != ""){
                            array_push($events, $e);}
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
     //exit(0);
}

?>