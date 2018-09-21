<?php

/*

this simple program will generate md5 hashes without a salt and will check if it begins with 0e and end's with numbers.
this is because if it would have the format 0e1234 when you would do php type juggeling it will become 0.
this can take quite a while to find a hash that has this format.
here a few examples from the output:

string(12) "NDAzMTUzMDcz"
string(32) "0e679819181710896705093052186023"
string(16) "MTIwMDU4NTQ0MQ=="
string(32) "0e792822706048475377604680726181"

*/

$i = 0;
$found = 0;
$amount = 4; // amount of hashes you want to generate.

while ($found < $amount) {
    /* 
    this will encode the output from $i into base64 because a password must be 8 characters, have numbers and have special characters.
    And hash the result with md5 after that.
    */
    $pw = base64_encode($i); 
    $hash = md5($pw);
    /* 
    this 'if' would check if the output of the md5 hash begins with 0e and after that has only numbers.
    if it is it will return true and do a var dump with the right answer and hash. 
    */
    if (substr($hash,0,2) === "0e" && (ctype_digit(substr($hash,2))) === true) {
        var_dump($pw,$hash);
	$found++;
    }
    $i++;
}

?>

