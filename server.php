<?php

require 'vendor/autoload.php';
require_once('vendor/econea/nusoap/src/nusoap.php');
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Jumlah Peserta Olimpiade');
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register('total_olimpiade',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Total Peserta Sains'

);
$server->register('rata2_peserta',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode menghitung rata-rata peserta'

);

$server->register('total_peserta',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode menghitung total peserta'

);

$server->register('peserta_iptek',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode menghitung peserta iptek'

);

$server->register('peserta_soshum',
    array('name' => 'xsd:integer'),
    array('return' => 'xsd:integer'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode perhitungan Sederhana'

);


$server->register('get_message',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Hello World Sederhana'
);


// Membuat method operasi matematika dasar
function get_message($name) {
    return "Data peserta olimpiade oleh $name";
}

function total_olimpiade($x) {
    return $x;
}
 
function rata2_peserta($x, $y, $z, $a) {
    return ($x+$y+$z+$a)/4;
}

function total_peserta($x, $y, $z, $a) {
    return ($x+$y+$z+$a);
}

function peserta_iptek($x, $y) {
    return ($x+$y);
}

function peserta_soshum($x, $y) {
    return ($x+$y);
}
$server->service(file_get_contents("php://input"));
exit();
?>