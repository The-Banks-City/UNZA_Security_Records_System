<?php

// Encryption Key (should be kept secret)
$key = '%^&$%aZZW#$__&&%uF#@!!#$';

// Function to encrypt data
function encryptData($data, $key) {
    $method = 'aes-256-cbc';
    $ivSize = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($ivSize);

    $encryptedData = openssl_encrypt($data, $method, $key, 0, $iv);

    return base64_encode($iv . $encryptedData);
}
// Function to decrypt data
function decryptData($data, $key) {
    $method = 'aes-256-cbc';
    $data = base64_decode($data);
    $ivSize = openssl_cipher_iv_length($method);
    $iv = substr($data, 0, $ivSize);
    $encryptedData = substr($data, $ivSize);

    return openssl_decrypt($encryptedData, $method, $key, 0, $iv);
}

// Example usage:
$dataToEncrypt = 'mwansa';
$encryptedData = encryptData($dataToEncrypt, $key);
echo $dataToEncrypt;
echo "<br>";
echo $encryptedData ;
// Store $encryptedData in your database.

// When you want to retrieve the data, you can decrypt it.
$decryptedData = decryptData($encryptedData, $key);
echo "<br>";
echo 'Decrypted Data: ' . $decryptedData;

?>
