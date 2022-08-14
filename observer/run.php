<?php
require 'vendor/autoload.php';

$mode = (int) readline('Select example type: 1.Conceptual  2.Real World ');

switch ($mode) {

    case 1:
        include("./src/Conceptual/app.php");
        break;
    default:
        include("./src/RealWorld/app.php");
        break;
}
