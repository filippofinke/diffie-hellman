<?php
use FilippoFinke\DiffieHellman;
require __DIR__.'/vendor/autoload.php';

$base = mt_rand();
echo "Generating generator...".PHP_EOL;
$generator = DiffieHellman::getRandomGenerator();

echo "Computing data to share (1/2)".PHP_EOL;
$alice = new DiffieHellman($base, $generator, 7);
$aliceToBob = $alice->toShare();

echo "Computing data to share (2/2)".PHP_EOL;
$bob = new DiffieHellman($base, $generator, 5);
$bobToAlice = $bob->toShare();

echo "Computing shared key...".PHP_EOL;
$aliceKey = $alice->getSharedKey($bobToAlice);
$bobKey = $bob->getSharedKey($aliceToBob);
echo "Alice key: $aliceKey".PHP_EOL;
echo "Bob key: $bobKey".PHP_EOL;