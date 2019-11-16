<?php
use FilippoFinke\DiffieHellman;
require __DIR__.'/vendor/autoload.php';

$base = mt_rand();
echo "Generating generator...".PHP_EOL;
$generator = DiffieHellman::getRandomGenerator();

echo "Alice: Computing data to share (1/2)".PHP_EOL;
$alice = new DiffieHellman($base, $generator, 7);
$aliceToShare = $alice->toShare();

echo "Bob: Computing data to share (2/2)".PHP_EOL;
$bob = new DiffieHellman($base, $generator, 5);
$bobToShare = $bob->toShare();

echo "Alice: Computing shared key...".PHP_EOL;
$aliceKey = $alice->getSharedKey($bobToShare);

echo "Bob: Computing shared key...".PHP_EOL;
$bobKey = $bob->getSharedKey($aliceToShare);

echo "Alice key: $aliceKey".PHP_EOL;
echo "Bob key: $bobKey".PHP_EOL;
if($aliceKey == $bobKey) {
    echo "Alice and Bob keys are equals!".PHP_EOL;
} else {
    echo "! KEYS MISMATCH".PHP_EOL;
}