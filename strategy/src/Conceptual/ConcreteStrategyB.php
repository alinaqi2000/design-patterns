<?php

namespace Patterns\Strategy\Conceptual;


class ConcreteStrategyB implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        rsort($data);

        return $data;
    }
}
