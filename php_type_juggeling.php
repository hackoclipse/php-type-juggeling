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

# parses json to array.
$array_json = json_decode($json, true);
$array_json1 = json_decode($json1, true);

echo var_dump($array_json)."\n\r";

if($one==$array_json["a"]){ // int 0 to string comparison.
    echo "true json\n\r";
}else{
    echo "false json\n\r";
}

if(strcmp($one, $array) !== 0){ // string to array comparison.
    echo "\n\rtrue strcmp array\n\r";
}else{
    echo "\n\rfalse strcmp array\n\r";
}

echo var_dump($array_json1)."\n\r";

if(strcmp($one, $array_json1["b"]) !== 0){ // string to array comparison.
    echo "true strcmp null";
}else{
    echo "false strcmp null";
}

echo "</pre>";
?>
