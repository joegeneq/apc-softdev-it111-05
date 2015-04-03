<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';

try {

    $url = 'mysql:dbname='.$dbname.';host='.$servername.'';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM weekday_reading WHERE weekday_reading_type = 'ash'";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();

        $e['title'] = $row['weekday_name'];
        $e['start'] = $ashWednesday . "T01:00:05";
        $e['color'] = '#3399FF';
        $e['textColor'] = 'White';
        $e['description'] = "This is the Marker for this Ash Wednesday.";
        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }
        
        $e['title'] = $row['weekday_first_reading'];
        $e['start'] = $ashWednesday . "T01:00:05";
        $e['color'] = '#FFFF99';
        $e['textColor'] = 'Black';
            
            if ($row['weekday_first_optional'] == ""){
                $e['description'] = "This is the First Reading for Ash Wednesday." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the First Reading for Ash Wednesday." . "<br>" . "Optional: " . $row['weekday_first_optional'];
            }

            if ($row['weekday_first_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_first_audio'] != ""){
                $e['url'] = $row['weekday_first_audio'];
            }

        if ($e['start'] != "T01:00:05"){ array_push($events, $e); }

        $e['title'] = $row['weekday_alleluia_verse'];
        $e['start'] = $ashWednesday . "T01:00:06";

            if ($row['weekday_alleluia_optional'] == ""){
                $e['description'] = "This is the Alleluia Verse for Ash Wednesday." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Alleluia Verse for Ash Wednesday." . "<br>" . "Optional: " . $row['weekday_alleluia_optional'];
            }

            if ($row['weekday_alleluia_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_alleluia_audio'] != ""){
                $e['url'] = $row['weekday_alleluia_audio'];
            }


        if ($e['start'] != "T01:00:06" ){ array_push($events, $e); }

        $e['title'] = $row['weekday_responsorial_psalm'];
        $e['start'] = $ashWednesday . "T01:00:07";

            if ($row['weekday_responsorial_optional'] == ""){
                $e['description'] = "This is the Responsorial Psalm for Ash Wednesday." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Responsorial Psalm for Ash Wednesday." . "<br>" . "Optional: " . $row['weekday_responsorial_optional'];
            }

            if ($row['weekday_responsorial_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_responsorial_audio'] != ""){
                $e['url'] = $row['weekday_responsorial_audio'];
            }

        if ($e['start'] != "T01:00:07" ){ array_push($events, $e); }

        $e['title'] = $row['weekday_gospel'];
        $e['start'] = $ashWednesday . "T01:00:08";

            if ($row['weekday_gospel_optional'] == ""){
                $e['description'] = "This is the Gospel for Ash Wednesday." . "<br>" . "No optional readings.";}
            else{
                $e['description'] = "This is the Gospel for Ash Wednesday." . "<br>" . "Optional: " . $row['weekday_gospel_optional'];
            }

            if ($row['weekday_gospel_audio'] == ""){
                $e['url'] = "/";
            }
            if ($row['weekday_gospel_audio'] != ""){
                $e['url'] = $row['weekday_gospel_audio'];
            }

        if ($e['start'] != "T01:00:08" ){ array_push($events, $e); }


    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>