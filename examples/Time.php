<?php

// Include class (if not using Composer's vendor/autoload.php)
require __DIR__ . '/../src/Time.php';

$current_time = time();

$output = '';

print('Now is ' . $current_time . PHP_EOL);

try{
    $output = MarkRoland\StringParser\Time::Ago($current_time);
    print($current_time . ' is ' .$output . PHP_EOL);
} catch(\Exception $e) {
    print($e->getMessage() . PHP_EOL);
}

try{
    $output = MarkRoland\StringParser\Time::Ago(($current_time - 86399));
    print(($current_time - 86399) . ' is ' . $output . PHP_EOL);
} catch(\Exception $e) {
    print($e->getMessage() . PHP_EOL);
}
