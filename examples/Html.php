<?php

// Include class (if not using Composer's vendor/autoload.php)
require __DIR__ . '/../src/Html.php';

$input = <<<EOT
This should link to http://markroland.com
This should link mark@gmail.com
EOT;

$output = MarkRoland\StringParser\Html::Linkify($input);

// Display response
print($output . PHP_EOL);
