<?php

/*

this simple program will generate hashes without a salt using a hmac and will check if it begins with 0e and end's with numbers.
this is because if it would have the format 0e1234 when you would do php type juggeling it will become 0.
this can take quite a while to find a hash that has this format.
here a few examples from the output when using md5 and pizza as secret key:

string(12) "Mjk3NzIyNzU5"
string(32) "0e896041458539246548845138679448"
string(12) "NzIxOTYxMjQw"
string(32) "0e206669756195635015632851532542"

*/

$key = "pizza"; // shared secret key used for generating the HMAC.
$hash_function = "md5"; // the hash format you want to use. it supports md5 and sha1.
$amount = 2; // amount of hashes you want to generate.
$found = 0;
$i = 0;

while ($found < $amount) {
    /* 
    this will encode the output from $i into base64 because a password must be 8 characters, have numbers and have special characters.
    And hash the result using the secret key.
    */
    $pw = base64_encode($i);
    $hash = hash_hmac($hash_function, $pw, $key); 
    /* 
    this 'if' would check if the output of the sha1 hash begins with 0e and after that has only numbers.
    if it is it will return true and do a var dump with the right answer and hash. 
    */
    if (substr($hash,0,2) === "0e" && (ctype_digit(substr($hash,2))) === true) {
        var_dump($pw,$hash);
	$found++;
    }
    $i++;
}

?>

