<?php
/**
 * Filippo Finke
 */
namespace FilippoFinke;

/**
 * Simple DiffieHellman implementation.
 */
class DiffieHellman {

    /**
     * The shared generator.
     */
    private $generator;

    /**
     * The shared base.
     */
    private $base;

    /**
     * The secred key.
     */
    private $secret;

    /**
     * Getter method for the generator.
     * 
     * @return int The generator.
     */
    public function getGenerator() {
        return $this->generator;
    }

    /**
     * Getter method for the base.
     * 
     * @return int The base.
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Getter method for the secret key.
     * 
     * @return int The secret key.
     */
    public function getSecret() {
        return $this->secret;
    }

    /**
     * Method that calculate what to share.
     * 
     * @return int To share.
     */
    public function toShare() {
        return gmp_pow($this->base, $this->secret) % $this->generator;
    }

    /**
     * Method that calculate the shared key.
     * 
     * @return int The shared key.
     */
    public function getSharedKey($shared) {
        return gmp_pow($shared, $this->secret) % $this->generator;
    }

    /**
     * Constructor methods.
     * 
     * @param int $base The base.
     * @param int $generator The generator.
     * @param int $secret The secret key.
     */
    public function __construct($base, $generator, $secret) {
        $this->base = $base;
        $this->generator = $generator;
        $this->secret = $secret;
    }

    /**
     * Method used to generate a random prime.
     * 
     * @param int $bits The prime size in bits.
     * @return int The prime number.
     */
    public static function getRandomGenerator($bits = 2048) {
        $number = gmp_random_bits($bits);
        return gmp_nextprime($number);
    }


}
