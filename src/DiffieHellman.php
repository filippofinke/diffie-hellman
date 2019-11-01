<?php
/**
 * Filippo Finke
 */
namespace FilippoFinke;

class DiffieHellman {

    private $generator;

    private $base;

    private $secret;

    public function getGenerator() {
        return $this->generator;
    }

    public function getBase() {
        return $this->base;
    }

    public function getSecret() {
        return $this->secret;
    }

    public function toShare() {
        return gmp_pow($this->base, $this->secret) % $this->generator;
    }

    public function getSharedKey($shared) {
        return gmp_pow($shared, $this->secret) % $this->generator;
    }
    public function __construct($base, $generator, $secret) {
        $this->base = $base;
        $this->generator = $generator;
        $this->secret = $secret;
    }

    public static function getRandomGenerator($bits = 2048) {
        $number = gmp_random_bits($bits);
        return gmp_nextprime($number);
    }


}
