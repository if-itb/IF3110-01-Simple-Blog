<?php namespace App\Core\Security;

use App\Core\ConfigLoader as Config;
use App\Core\Exception\DecryptException;
use RuntimeException;

/**
 * Class BaseEncrypter
 * Inspired by Laravel's Illuminate\Encryption\BaseEncrypter class
 * 
 * @package App\Core
 */
abstract class BaseEncrypter {

    /**
     * The encryption key.
     * @var string
     */
    protected $key;

    /**
     * Create a HMAC for the given value
     * @param  string $iv    the initialization vector
     * @param  string $value the value to be hashed
     * @return string        the HMAC
     */
    protected function hash($iv, $value) {
        return hash_hmac(Config::env('DEFAULT_HASH_ALGO', 'sha512'), $iv.$value, $this->key);
    }

    /**
     * Get the JSON array from the given payload
     *
     * @param  string $payload
     * @return array
     *
     * @throws DecryptException
     */
    protected function getJsonPayload($payload) {
        $payload = json_decode(base64_decode($payload), true);

        if (! $payload || $this->invalidPayload($payload)) {
            throw new DecryptException('The payload is invalid.');
        }

        if (! $this->validHmac($payload)) {
            throw new DecryptException('The HMAC is invalid.');
        }

        return $payload;
    }

    /**
     * Check whether a payload data is valid or not
     * @param  mixed $data the payload data
     * @return boolean
     */
    protected function invalidPayload($data) {
        return ! is_array($data) || ! isset($data['iv']) || ! isset($data['value']) || ! isset($data['mac']);
    }

    /**
     * Checks whether a HMAC is valid or not
     *
     * @param  array  $payload 
     * @return boolean         
     *
     * @throws RuntimeException
     */
    protected function validHmac(array $payload) {
        $bytes = openssl_random_pseudo_bytes(16, $strong);

        if ($bytes === false || $strong === false) {
            throw new RuntimeException('Cannot generate random string.');
        }

        $calculatedMac = hash_hmac(Config::env('DEFAULT_HASH_ALGO', 'sha512'), $this->hash($payload['iv'], $payload['value']), $bytes, true);
        $payloadMac = hash_hmac(Config::env('DEFAULT_HASH_ALGO', 'sha512'), $payload['mac'], $bytes, true);

        return $this->isHashEqual($calculatedMac, $payloadMac);
    }

    /**
     * Checks whether two hashes are equal or not.
     * Used to prevent timing attacks.
     *
     * @see http://php.net/manual/en/function.hash-hmac.php#111435
     * @param  mixed  $a
     * @param  mixed  $b
     * @return boolean
     */
    public function isHashEqual($a, $b) {
        if (!is_string($a) || !is_string($b)) {
            return false;
        }
       
        $len = strlen($a);
        if ($len !== strlen($b)) {
            return false;
        }

        // compare based on its ASCII value
        $status = 0;
        for ($i = 0; $i < $len; $i++) {
            $status |= ord($a[$i]) ^ ord($b[$i]);
        }
        return $status === 0; 
    }
}