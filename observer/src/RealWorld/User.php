<?php


namespace Patterns\Observer\RealWorld;


class User
{
    public $id;
    public $name;
    public $age;
    public $email;
    protected $password;
    public function __construct($name, $age, $email, $password)
    {
        $this->id = rand(11111111, 99999999);
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
    }
}
