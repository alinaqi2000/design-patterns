<?php


namespace Patterns\Facade\RealWorld;


class User
{
    protected $id;
    public $name;
    public $email;
    public $portfolio;
    public function __construct($name = "", $email = "", $portfolio = "")
    {
        $this->setId();
        $this->name = $name;
        $this->email = $email;
        $this->portfolio = $portfolio;
    }
    public function setId()
    {
        $this->id = uniqid();
    }
    public function getId()
    {
        return $this->id;
    }
}
