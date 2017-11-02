<?php
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$columns = array('CustomerName'=>'Cardinal','ContactName'=>'Tom B. Erichsen','Address'=>'Skagen 21','City'=>'Stavanger','PostalCode'=>'4006','Country'=>'Norway');

$columnString = implode(',', array_flip($columns));
$valueString = ":".implode(',:', array_flip($columns));

echo "INSERT INTO Customers (" . $columnString . ") VALUES (" . $valueString . ")</br>";

echo 'INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES (\'Cardinal\', \'Tom B. Erichsen\', \'Skagen 21\', \'Stavanger\', \'4006\', \'Norway\')';

?>