<?php


namespace App\BaseCode;


class EncryptorAndDecryptor {

    private static $OPENSSL_CIPHER_NAME = "aes-128-cbc"; //Name of OpenSSL Cipher
    private static $CIPHER_KEY_LEN = 16; //128 bits
    private static $KEY = "@m@z@@r@ndroid@p";

    /**
     * Encrypt data using AES Cipher (CBC) with 128 bit key
     *
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $iv - initialization vector
     * @param type $data - data to encrypt
     * @return string
     */

    static function encrypt($key, $iv, $data) {
        if (strlen($key) < EncryptorAndDecryptor::$CIPHER_KEY_LEN) {
            $key = str_pad("$key", EncryptorAndDecryptor::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen($key) > EncryptorAndDecryptor::$CIPHER_KEY_LEN) {
            $str ='';
            $key = substr($str, 0, EncryptorAndDecryptor::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }

        $encodedEncryptedData = base64_encode(openssl_encrypt($data, EncryptorAndDecryptor::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, $iv));
        $encodedIV = base64_encode($iv);
        $encryptedPayload = $encodedEncryptedData.":".$encodedIV;

        return $encryptedPayload;

    }

    /**
     * Decrypt data using AES Cipher (CBC) with 128 bit key
     *
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $data - data to be decrypted in base64 encoding with iv attached at the end after a :
     * @return false|string
     */
    static function decrypt($data) {
        $key = EncryptorAndDecryptor::$KEY;
        if (strlen($key) < EncryptorAndDecryptor::$CIPHER_KEY_LEN) {
            $key = str_pad("$key", EncryptorAndDecryptor::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen($key) > EncryptorAndDecryptor::$CIPHER_KEY_LEN) {
            $str ='';
            $key = substr($str, 0, EncryptorAndDecryptor::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }

        $parts = explode(':', $data); //Separate Encrypted data from iv.
        $decryptedData = openssl_decrypt(base64_decode($parts[0]), EncryptorAndDecryptor::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, base64_decode($parts[1]));

        return $decryptedData;
    }

}
