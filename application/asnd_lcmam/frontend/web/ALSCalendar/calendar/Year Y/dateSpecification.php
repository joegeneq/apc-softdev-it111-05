<?php 

/*/for testing  /*

    $day="01";
    $month="01";
    $year="2015";

// */

//for development

    $day="01";
    $month="01";
    $year=date('Y');
    $yearAgo = date('Y', strtotime($year . 'a year ago'));
    $year=$yearAgo;

//

?>