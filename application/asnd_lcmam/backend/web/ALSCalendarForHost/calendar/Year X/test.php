<?php 
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

    //$countArray = count($datesSFM);

    $counter = 0;

    if ($result->num_rows > 0) {

        $e = array();
        // output data of each row
        while($row = $result->fetch_assoc()) {
            


                $e['title'] = $row['title'];
                $e['start'] = $year . $row['date'];

                if ($datesSFM[$counter] == $e['start']){
                    array_push($events, $e);
                }

               $counter++;

        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
print_r($);
    
    echo json_encode($events);
    $conn->close();
    exit();

} catch (PDOException $e){
     die('Database connection could not be established.');
}

?>