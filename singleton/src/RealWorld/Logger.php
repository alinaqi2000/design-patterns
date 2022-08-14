<?php


namespace Patterns\Singleton\RealWorld;

use Patterns\Singleton\Singleton;

class Logger extends Singleton
{
    protected $filename = "./src/RealWorld/user_logs.txt";
    protected $content = NULL;
    protected static function instance(): Logger
    {
        return static::getInstance();
    }

    protected function readFile()
    {
        $this->content = file_exists($this->filename) ? file_get_contents($this->filename) : "";
    }
    protected function writeFile()
    {
        file_put_contents($this->filename, $this->content);
    }
    public static function setLog(String $log)
    {
        $SI = static::instance();
        $SI->readFile();
        $SI->content .=  date("Y-m-d h:i:sa", time()) . " " . $log . "\n";
        $SI->writeFile();
    }
    public static function logAll()
    {
        $SI = static::instance();
        $SI->readFile();
        echo  "\n    <---------- User Logs ---------->\n";
        echo $SI->content;
    }
}
