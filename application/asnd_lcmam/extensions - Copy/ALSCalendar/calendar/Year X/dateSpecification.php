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
    
    $yearX = $year."-".$month."-".$date;
    $year=date('Y', strtotime( $yearX . '-1 year'));

//

?>