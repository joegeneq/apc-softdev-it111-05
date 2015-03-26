<?php 

require 'dbConnection.php';
require 'dateSpecification.php';

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

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $e['title'] = $row['title'];
            $e['start'] = $year . $row['date'];
            $e['tip'] = $row['title'];

            if ($row['type'] == "S"){
                $e['color'] = '#FF6699';
            }
            if ($row['type'] == "F"){
                $e['color'] = '#6633CC';
            }

            //echo $e['start'];
            array_push($events, $e);
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