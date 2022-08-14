<?php


namespace Patterns\Observer\RealWorld;

use SplObjectStorage;

class Server implements \SplSubject
{
    // properties
    public $users = array();
    public $operation = "";
    protected $observers;
    public $user = NULL;
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
        define("ADDED", 'User add to the server');
        define("REMOVED", 'User removed to the server');
    }

    // subscription management
    public function attach(\SplObserver $observer): void
    {

        $this->observers->attach($observer);
    }
    public function detach(\SplObserver $observer): void
    {

        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }


    // business logic
    public function addUser(User $user)
    {
        $this->users[] = $user;
        $this->operation = ADDED;
        $this->user = $user;
        $this->notify();
    }
    public function remove(User $user)
    {
        if (($key = array_search($user, $this->users)) !== false) {
            unset($this->users[$key]);
        }
        $this->operation = REMOVED;
        $this->user = $user;
        $this->notify();
    }


    public function logAll()
    {

        // print all observers
        $obs_mask = "|%10s |%-45s  | \n";
        printf("    <---------- Observers ----------> \n");
        printf($obs_mask, 'No#', 'Observer Class');
        foreach ($this->observers as $key => $observer)
            printf($obs_mask, $key + 1, get_class($observer));

        // print all users
        printf("    <---------- Users ----------> \n");
        $usr_mask = "|%10s |%-15s|%-15s|%-15s| \n";
        printf($usr_mask, 'ID#', 'Name', 'Email', 'Age');
        foreach ($this->users as $user)
            printf($usr_mask, $user->id, $user->name, $user->email, $user->age);
    }
}
