<?php 

$aX = ['doan', 'anh', 'quan'];
global $i;
$i=0;
$result = array_reduce($aX, function($carry, $item){
    // if ($i==1) {
    //     echo
    // }
    $carry .= ' ' . $item;
    return $carry;
});
echo $result;