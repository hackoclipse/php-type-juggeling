<?php
/* http://php.net/manual/en/types.comparisons.php#49327 */
$one = 'pizza';
$two = 0;

$three = '1pizza';
$four = 1;

$json = '{"a":0,"b":1}';
$json1 = '{"a":0,"b":[]}';
$array= array();

echo "<pre>";
if($one==$two){
    echo "true no json\n\r";
}else{
    echo "false no json\n\r";
}

if($three==$four){
    echo "true no json 1\n\r";
}else{
    echo "false no json 1\n\r";
}

$array_json = json_decode($json, true); # parses json to array.
$array_json1 = json_decode($json1, true); # parses json to array gives null.
echo var_dump($array_json)."\n\r";

if($one==$array_json["a"]){
    echo "true json\n\r";
}else{
    echo "false json\n\r";
}

if(strcmp($one, $array) !== 0){
    echo "\n\rtrue strcmp array\n\r";
}else{
    echo "\n\rfalse strcmp array\n\r";
}

echo var_dump($array_json1)."\n\r";

if(strcmp($one, $array_json1["b"]) !== 0){
    echo "true strcmp null";
}else{
    echo "false strcmp null";
}

echo "</pre>";
?>
