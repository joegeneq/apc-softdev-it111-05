<?php 

require 'dbConnection.php';
require 'dateSpecification.php';

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM event_determinant WHERE year = '" . $year . "'";
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
        //$e['easter_sunday'] = $row['easter_sunday'];
        //$e['week_ot_after_pentecost'] = $row['week_ot_after_pentecost'];

        $e['title'] = "*Ash Wednesday";
        $e['start'] = $row['ash_wednesday'];
        array_push($events, $e);

        $e['title'] = "*Easter Sunday";
        $e['start'] = $row['easter_sunday'];
        array_push($events, $e);

        $e['title'] = "*Pentecost Sunday";
        $e['start'] = $row['pentecost_sunday'];
        array_push($events, $e);

        $e['title'] = "*1st Sunday of Advent";
        $e['start'] = $row['first_sunday_of_advent'];
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>