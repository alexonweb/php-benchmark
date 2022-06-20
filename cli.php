<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$globalstarttime = microtime(true); 

require 'Alexonweb/ServerTest/ServerTest.php';

$serverTests = new Alexonweb\ServerTest\ServerTest();

echo "-- Working with JSON files --\n";
echo "Create random JSON files\n";
$serverTests->createRandomFiles('data/json', 'json', 1000);
echo "\n\n";

echo "Search in JSON files \n";
$serverTests->findinfiles('data/json', 'json', 'abc');
echo "\n\n";


echo "Delete JSON files \n";
$serverTests->removefiles('data/json');
echo "\n\n";


echo "-- Working with YAML files --\n";


echo "Create random YAML files \n";
$serverTests->createRandomFiles('data/yaml', 'yaml', 1000);
echo "\n\n";

echo "Search in YAML files \n";
$serverTests->findinfiles('data/yaml', 'yaml', 'abc');
echo "\n\n";


echo "Delete YAML files \n";
$serverTests->removefiles('data/yaml');
echo "\n\n";

$globalendtime = microtime(true);
printf("Generated in %f seconds", $globalendtime - $globalstarttime );

echo "\n\n";

?>
