<?php

namespace Patterns\Observer\RealWorld;

use DateTime;

class Logger implements \SplObserver
{

    private $filename = "./src/RealWorld/server_log.txt";
    private $content = NULL;
    public function __construct()
    {
        // $this->readFile();
    }
    public function readFile()
    {
        $this->content = file_get_contents($this->filename) or die($this->filename . " could not be opened!");
    }
    public function writeFile(String $text)
    {

        $this->content .= $text;
        file_put_contents($this->filename, $this->content);
    }
    public function update(\SplSubject $server): void
    {

        switch ($server->operation) {

            case ADDED:
                $this->writeFile(date("Y-m-d h:i:sa", time()) . " User created with id:" . $server->user->id . "\n");
                break;
            case REMOVED:
                $this->writeFile(date("Y-m-d h:i:sa", time()) . " User removed with id:" . $server->user->id . "\n");
                break;
            default:
                break;
        }
    }
    public function log()
    {
        $this->readFile();

        printf("    <---------- Server Logs ----------> \n");
        echo $this->content;
    }
}
