<?php


namespace Patterns\Singleton\RealWorld;

use Patterns\Singleton\Singleton;

class User extends Singleton
{
    protected $login;
    protected $password;

    protected static function instance()
    {
        return static::getInstance();
    }
    public static function getLogin()
    {
        $SI = static::instance();
        return $SI->login;
    }
    public static function getPassword()
    {
        $SI = static::instance();
        return $SI->password;
    }
    public static function setLogin($login): User
    {
        $SI = static::instance();
        $SI->login = $login;
        return $SI;
    }
    public static function setPassword($password): User
    {
        $SI = static::instance();
        $SI->password = $password;
        return $SI;
    }
}
