<?php 

try {

    $url = 'mysql:dbname=als;host=localhost';
    $username = 'root';
    $password = '';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT id FROM date";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();
        $e['id'] = $row['id'];
        $e['title'] = $row['sunday_reading'];
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