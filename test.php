<?php
$array = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "four" => 4
);
$count = count($array);
$i=1;
while($element = current($array)) {
    if ($i < $count)
        echo key($array).$element."<br>";
    else
        echo key($array)."---><br>";
    next($array);
    $i++;
}

foreach($array as $id)
{
    echo $id;
}
?>
