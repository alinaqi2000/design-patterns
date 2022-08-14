<?php

use Patterns\Strategy\Conceptual\ConcreteStrategyA;
use Patterns\Strategy\Conceptual\ConcreteStrategyB;
use Patterns\Strategy\Conceptual\Context;

$context = new Context(new ConcreteStrategyA());
echo "Client: Strategy is set to normal sorting.\n";
$context->doSomeBusinessLogic();

echo "\n";

echo "Client: Strategy is set to reverse sorting.\n";
$context->setStrategy(new ConcreteStrategyB());
$context->doSomeBusinessLogic();
