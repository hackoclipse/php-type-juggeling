<?php

/*

this simple program will generate sha1 hashes without a salt and will check if it begins with 0e and end's with numbers.
this is because if it would have the format 0e1234 when you would do php type juggeling it will become 0.
this can take multiple hours to find a hash with this format.
here a few examples from the output:

string(16) "NzIxOTkxNjQ3Ng=="
string(40) "0e08022982060889486243265021262549494003"
string(16) "NTEyMDI5NzM1NDY="
string(40) "0e80111143809597966019493877526018650331"
string(16) "NTY0NjQ2NzQ1NDY="
string(40) "0e73297087481621064896553960788205847070"
string(16) "ODc1NzkxOTIwNjA="
string(40) "0e01628929681657916385720703933986816417"

*/

$i = 0;
$found = 0;
$amount = 4; // amount of hashes you want to generate.

while ($found < $amount) {
    /* 
    this will encode the output from $i into base64 because a password must be 8 characters, have numbers and have special characters.
    And hash the result with sha1 after that.
    */
    $pw = base64_encode($i); 
    $hash = sha1($pw);
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

