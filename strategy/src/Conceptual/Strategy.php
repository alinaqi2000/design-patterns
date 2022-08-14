<?php

namespace Patterns\Strategy\Conceptual;

interface Strategy
{
    public function doAlgorithm(array $data): array;
}
