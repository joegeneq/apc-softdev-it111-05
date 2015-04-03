<?php 

/*/for testing  /*

    $day="01";
    $month="01";
    $year="2015";

// */

//for development
error_reporting(E_ERROR);
    $day="01";
    $month="01";
    $year=date('Y');
    $yearAhead = date('Y', strtotime('+1 year'));
    $year=$yearAhead;

//

?>