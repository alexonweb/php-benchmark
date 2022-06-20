<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🚀 Server test page</title>
    <style>
        body {
            font-family: Consolas, monospace;
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>

<?php
/** 
 * 
 * Тестовый скрипт для проверки производительности веб-сервера.
 * 
 * Тест на создание файлов YAML и JSON
 * Тест на поиск в файлах YAML и JSON
 * Тест на удаление файлов YAML и JSOn
 * 
 * 
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$globalstarttime = microtime(true); 

require 'Alexonweb/ServerTest/ServerTest.php';

$serverTests = new Alexonweb\ServerTest\ServerTest();

?>
<h1>Server test page</h1>
<p>Description

<h2>Working with JSON files</h2>
<p>

<h3>💾 Create random JSON files</h3>
<p><?php

$serverTests->createRandomFiles('data/json', 'json', 100);

?>
<h3>🔍 Search in JSON files</h3>
<p><?php
$serverTests->findinfiles('data/json', 'json', 'abc');
?>
<h3>❌ Delete JSON files</h3>
<p><?php

$serverTests->removefiles('data/json');

?>
<h2>Working with YAML files</h2>
<p>Description
<h3>💾 Create random YAML files</h3>
<p><?php

$serverTests->createRandomFiles('data/yaml', 'yaml', 100);

?>
<h3>🔍 Search in YAML files</h3>
<p><?php
$serverTests->findinfiles('data/yaml', 'yaml', 'abc');
?>
<h3>❌ Delete YAML files</h3>
<p><?php

$serverTests->removefiles('data/yaml');

?>

<p><em>
<?php
$globalendtime = microtime(true);
printf("Generated in %f seconds", $globalendtime - $globalstarttime );
?>
</em></p>
</body>
</html>