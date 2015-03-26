<?php 

require 'dbConnection.php';
require 'dateSpecification.php';
require 'eventDeterminant.php';
require 'functions.php';

//For Sunday

    error_reporting(E_ERROR); // attempting to remove errors and notices

    $allSundays = getSundaysOfOT();

    $countOfSundays = count($allSundays); //count of Sundays

    $skipCheck = $weekAfterPentecost - $weeksBeforeLent;
    //echo $skipCheck;

?>