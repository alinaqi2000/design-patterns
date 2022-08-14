<?php

namespace Patterns\Singleton;

class Singleton
{

    private static $instances = [];

    protected function __construct()
    {
    }
    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Can't serialize singleton!");
    }


    public static function getInstance(): Singleton
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}
