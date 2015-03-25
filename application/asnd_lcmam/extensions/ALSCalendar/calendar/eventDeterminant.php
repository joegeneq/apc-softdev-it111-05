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

    $sql = "SELECT * FROM event_determinant WHERE year = " . $year . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sundayCycle = $row['sunday_cycle'];
            $weekdayCycle = $row['weekday_cycle'];
            $weeksBeforeLent = $row['week_ot_before_lent'];
            $weekAfterPentecost = $row['week_ot_after_pentecost'];
            $pentecostSunday = $row['pentecost_sunday'];
            $easterSunday = $row['easter_sunday'];
            $firstSundayofAdvent = $row['first_sunday_of_advent'];
            $ashWednesday = $row['ash_wednesday'];
        }
    } else {
        echo "Error on database connection. No results may be displayed.";
    }
    
    $conn->close();

//Testing for displays

    //echo $sundayCycle;
    //echo $weekdayCycle;
    //echo $weeksBeforeLent;
    //echo $weekAfterPentecost;
    //echo $pentecostSunday;

} catch (PDOException $e){
     die('Database connection could not be established.');
}

?>