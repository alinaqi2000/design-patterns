<?php

use Patterns\Facade\Conceptual\Facade;
use Patterns\Facade\Conceptual\Subsystem1;
use Patterns\Facade\Conceptual\Subsystem2;

$subsystem1 = new Subsystem1();
$subsystem2 = new Subsystem2();
$facade = new Facade($subsystem1, $subsystem2);
echo $facade->operation();
