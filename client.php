<?php
 
require 'vendor/autoload.php';
require 'vendor/econea/nusoap/src/nusoap.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_message', array(
    'name' => 'Fairuz Elqi Mochammad'
));
echo $response;

echo '<br>';

// Total peserta olimpiade
$oli_sains = 200;
$oli_soshum = 350;
$oli_it = 100;
$oli_ekonomi = 220; 

// Total Olimpiade Sains
$result1 = $client->call('total_olimpiade', array('x' => $oli_sains));
 
echo "<p>Total Peserta Olimpiade Sains adalah ".$result1."</p>";

// Total Olimpiade Soshum 
$result2 = $client->call('total_olimpiade', array('x' => $oli_soshum));
 
echo "<p>Total Peserta Olimpiade Soshum adalah ".$result2."</p>";

// Total Olimpiade IT
$result2_1 = $client->call('total_olimpiade', array('x' => $oli_it));
 
echo "<p>Total Peserta Olimpiade IT adalah ".$result2_1."</p>";

// Total Olimpiade Ekonomi
$result2_2 = $client->call('total_olimpiade', array('x' => $oli_ekonomi));
 
echo "<p>Total Peserta Olimpiade Ekonomi adalah ".$result2_2."</p>";

// Jumlah rata-rata peserta
$result3 = $client->call('rata2_peserta', array('x' => $oli_sains, 'y' => $oli_soshum, 'z' => $oli_it, 'a' => $oli_ekonomi));
 
echo "<p>Jumlah rata-rata peserta adalah ".$result3."</p>";

// Jumlah total peserta
$result4 = $client->call('total_peserta', array('x' => $oli_sains, 'y' => $oli_soshum, 'z' => $oli_it, 'a' => $oli_ekonomi));
 
echo "<p>Jumlah peserta adalah ".$result4."</p>";

// Jumlah total peserta iptek
$result5 = $client->call('peserta_iptek', array('x' => $oli_sains, 'y' => $oli_it));
 
echo "<p>Jumlah peserta iptek adalah ".$result5."</p>";

// Jumlah total peserta iptek
$result6 = $client->call('peserta_soshum', array('x' => $oli_soshum, 'y' => $oli_ekonomi));
 
echo "<p>Jumlah peserta soshum adalah ".$result6."</p>";
?>