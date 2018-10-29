<?php

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');

require('vendor/autoload.php');

use OtherCode\Marvel\Client;
use OtherCode\Marvel\Configuration;

$marvel = new Client(new Configuration([
    'uri' => 'http://gateway.marvel.com',
    'privateKey' => '2483fbb21f03e661e6a9691c39331f1c248f8fc4',
    'publicKey' => 'dac5a1a87bd095bd64be8b4276476398',
]), new \GuzzleHttp\Client([
    'timeout' => 20,
]));

var_dump($marvel->creators());
