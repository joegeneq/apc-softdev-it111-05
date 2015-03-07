<?php 

try {

        $timestamp=strtotime("7 March 2016 ");
        //echo gmdate("Y-m-d\TH:i:s\Z", $timestamp);
        echo gmdate("Y-m-d", $timestamp);

    $x = date("W",strtotime("1 April 2015"));
    $y = date("W",strtotime("1 March 2015"));
    echo "<br>". $x - $y . "<br>";

    $url = 'mysql:dbname=event;host=localhost';
    $username = 'root';
    $password = '';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM events";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();
        $e['id'] = $row['event_id'];
        $e['title'] = $row['event_name'];
        $e['start'] = $row['start_event'];

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