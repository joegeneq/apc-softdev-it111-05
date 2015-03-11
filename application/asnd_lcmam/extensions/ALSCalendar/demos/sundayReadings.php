<?php 

//for trigger
  
    $servername = "localhost";
    $username = "asnd_lcmam";
    $password = "asnd_lcmam";
    $dbname = "asnd_lcmam";

    $day="01";
    $month="01";
    $year="2015";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT sunday_cycle, week_ot_before_lent, week_ot_after_pentecost, pentecost_sunday, first_sunday_of_advent FROM event_determinant WHERE year = " . $year . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sundayCycle = $row['sunday_cycle'];
            $weeksBeforeLent = $row['week_ot_before_lent'];
            $weekAfterPentecost = $row['week_ot_after_pentecost'];
            $pentecostSunday = $row['pentecost_sunday'];
            $firstSundayofAdvent = $row['first_sunday_of_advent'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    //echo $sundayCycle;
    //echo $weeksBeforeLent;
    //echo $weekAfterPentecost;
    //echo $pentecostSunday;

//for sunday

    $trigger = $year . "-" . $month . "-" . $day;

    //echo "<br>" . date('l', strtotime($trigger)) . "<br>";

    $day1ofyear = date('l', strtotime($trigger));

    $firstSunday = "";

    //To identify what is the first sunday of the year
    if ($day1ofyear == "Sunday"){
        $firstSunday = $trigger;
    };
    if ($day1ofyear == "Monday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+6 days'));
    };
    if ($day1ofyear == "Tuesday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+5 days'));
    };
    if ($day1ofyear == "Wednesday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+4 days'));
    };
    if ($day1ofyear == "Thursday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+3 days'));
    };
    if ($day1ofyear == "Friday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+2 days'));
    };
    if ($day1ofyear == "Saturday"){
        $firstSunday = date('Y-m-d', strtotime($trigger . '+1 day'));
    };

    $secondSunday = date('Y-m-d', strtotime($firstSunday . '+7 days'));

    $sundays=$secondSunday;

    $allSundays = array();

    for ($x = 0; $x <= $weeksBeforeLent - 1; $x++) {
        
        $allSundays[$x] = $sundays;

        //echo $totalSundaysBeforeLent[$x] . "<br>";

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      
    }

    $sundays = $pentecostSunday;

    $limit = $firstSundayofAdvent;
    $x = $weeksBeforeLent;

    while ($sundays != $limit){

        //echo $sundays . "<br>";

        $allSundays[$x++] = $sundays;

        $sundays = date('Y-m-d', strtotime($sundays . '+7 days'));      

    }

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;

//for calendar

try {

    $url = 'mysql:dbname=asnd_lcmam;host=localhost';
    $username = 'asnd_lcmam';
    $password = 'asnd_lcmam';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    if ($skipCheck > 1 ){
        $skipValue = $weeksBeforeLent + 1;
        //echo "You have reached if statement." . $skipValue;
        $query = "SELECT * FROM sunday_reading WHERE sunday_cycle_type = '" . $sundayCycle. "' AND sunday_weeknum !='" . $skipValue . "'";
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
        
        $e = array();
        //$e['id'] = $row['id'];

        
        $e['title'] = $row['sunday_first_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:00";
        array_push($events, $e);
        
        // Merge the event array into the return array
    
        $e['title'] = $row['sunday_second_reading'];
        $e['start'] = $allSundays[$counter] . "T01:00:01";
        array_push($events, $e);

        $e['title'] = $row['sunday_alleluia_verse'];
        $e['start'] = $allSundays[$counter] . "T01:00:02";
        array_push($events, $e);

        $e['title'] = $row['sunday_responsorial_psalm'];
        $e['start'] = $allSundays[$counter] . "T01:00:03";
        array_push($events, $e);

        $e['title'] = $row['sunday_gospel'];
        $e['start'] = $allSundays[$counter] . "T01:00:04";
        array_push($events, $e);

        $counter++;
    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>