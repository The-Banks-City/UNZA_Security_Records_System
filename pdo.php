<?php
    $pdo = new PDO('mysql:host=localhost;dbname=UNZA','adm','q123');
    //see errors folder for details
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
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


echo'<script>
document.addEventListener("contextmenu",function(event){
    event.preventDefault();
});
</script>';

?>

