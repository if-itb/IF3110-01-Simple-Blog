<?php namespace App\Core\Security;

use App\Core\ConfigLoader;
use App\Core\Exception\DecryptException;
use App\Core\Exception\EncryptException;

/**
 * Class Encrypter
 * Inspired by Laravel's Illuminate\Encryption\Encrypter class
 *
 * @package App\Core\Security
 */
class Encrypter extends BaseEncrypter
{
    protected $cipher;

    public function __construct($key, $cipher = 'AES-256-CBC') {
        $key = (string) $key;

        if (static::supported($key, $cipher)) {
            $this->key = $key;
            $this->cipher = $cipher;
        }
    }

    /**
     * Determine if the given key and cipher combination is valid
     *
     * @param string $key
     * @param string $cipher
     * @return bool
     */
    public static function supported($key, $cipher) {
        // use mbstring's strlen, for comparing multibyte string
        $length = mb_strlen($key, '8bit');

        return ($cipher === 'AES-128-CBC' && $length === 16) || ($cipher === 'AES-256-CBC' && $length === 32);
    }

    /**
     * Encrypt the given value.
     *
     * @param string $value
     * @return string
     *
     * @throws EncryptException|\RuntimeException
     */
    public function encrypt($value) {
        $iv = openssl_random_pseudo_bytes(16, $strong);

        if ($iv === false || $strong === false) {
            throw new \RuntimeException('Cannot generate random string.');
        }

        $value = openssl_encrypt(serialize($value), $this->cipher, $this->key, false, $iv);

        if ($value === false) {
            throw new EncryptException('Cannot encrypt the data.');
        }

        /**
         * After we get the encrypted value, we're going to base64_encode the initialization vector
         * and create the HMAC (defaults to sha512) for signing the encrypted value.
         * Then, we'll encode the data in a payload array using JSON.
         */
        $mac = $this->hash($iv = base64_encode($iv), $value);

        $json = json_encode(compact('iv', 'value', 'mac'));

        if (! is_string($json)) {
            throw new EncryptException('Cannot JSON-encode the encrypted value.');
        }

        return base64_encode($json);
    }

    /**
     * Decrypt the given value.
     *
     * @param  string  $payload
     * @return string
     *
     * @throws DecryptException
     */
    public function decrypt($payload)
    {
        $payload = $this->getJsonPayload($payload);

        $iv = base64_decode($payload['iv']);

        $decrypted = openssl_decrypt($payload['value'], $this->cipher, $this->key, false, $iv);

        if ($decrypted === false) {
            throw new DecryptException('Could not decrypt the data.');
        }

        return unserialize($decrypted);
    }

    /**
     * Get the initialization vector size for the cipher
     *
     * @return int
     */
    public function getIvSize() {
        return intval(ConfigLoader::env('IV_SIZE', 16));
    }
}