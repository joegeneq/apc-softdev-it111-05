<?php 

include_once 'eventDeterminant.php';
include_once 'functions.php';

//For Sunday

    

    $allSundays = getSundaysOfOT();

    $countOfSundays = count($allSundays); //count of Sundays

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;

?>