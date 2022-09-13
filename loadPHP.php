<?php

$playerJSON = json_decode($_POST['submitData']);

$forename = $playerJSON->{'forename'};
$surname = $playerJSON->{'surname'};

//set up connection to the database
$db = new mysqli('localhost', 'root', '', 'creigiaucc');

$activeStartDate = "2018-01-01";

//sprintf() like printf this returns the string as a return value to be printed
$sql = sprintf("INSERT INTO players (forename, surname, activeStartDate, activeEndDate)
                VALUES ('%s', '%s', CAST('" . $activeStartDate . "' AS DATE), '')", 
                $db->real_escape_string($forename),
                $db->real_escape_string($surname));
  echo $sql;      
$db->query($sql);

$db->close();

//echo "Player Added";
