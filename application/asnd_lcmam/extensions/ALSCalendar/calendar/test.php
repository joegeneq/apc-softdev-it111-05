<?php
try {

    $url = 'mysql:dbname=asnd_lcmam;host=localhost';
    $username = 'root';
    $password = '';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM sunday_reading WHERE sunday_cycle_type = 'B'";
    
    //echo $query;
    
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $e = array();
        //$e['id'] = $row['id'];
        //$e['year'] = $row['year'];
        //$e['sunday_cycle'] = $row['sunday_cycle'];
        //$e['weekday_cycle'] = $row['weekday_cycle'];
        //$e['week_ot_before_lent'] = $row['week_ot_before_lent'];
        echo $row['sunday_first_reading'];

        //$e['title'] = $row['sunday_first_reading'];
        //$e['start'] = $totalSundaysBeforeLent[$counter];
        

        //$e['easter_sunday'] = $row['easter_sunday'];
        //$e['pentecost_sunday'] = $row['pentecost_sunday'];
        //$e['week_ot_after_pentecost'] = $row['week_ot_after_pentecost'];
        //$e['first_sunday_of_advent'] = $row['first_sunday_of_advent'];

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>