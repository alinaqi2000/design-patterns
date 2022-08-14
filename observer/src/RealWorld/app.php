<?php

use Patterns\Observer\RealWorld\Email;
use Patterns\Observer\RealWorld\Logger;
use Patterns\Observer\RealWorld\Server;
use Patterns\Observer\RealWorld\User;

$server = new Server();
$email_log = new Email();
$server_log = new Logger();

$server->attach($email_log);
$server->attach($server_log);

echo "Attach email and logger class to observers\n\n";

$user1 = new User("User 1", 11, "a1@a.com", "aa1");
$server->addUser($user1);
echo "Create user 1\n";
echo "Email and log for user 1\n\n";


$user2 = new User("User 2", 12, "a2@a.com", "aa2");
$server->addUser($user2);
echo "Create user 2\n";
echo "Email and log for user 2\n\n";

$server->detach($email_log);
echo "Detach email from observers\n\n";

$user3 = new User("User 3", 13, "a3@a.com", "aa3");
$server->addUser($user3);
echo "Create user 3\n";
echo "Only log for user 3\n\n";

$server->attach($email_log);
echo "Attach email class to observers\n\n";


$user4 = new User("User 4", 14, "a4@a.com", "aa4");
$server->addUser($user4);
echo "Create user 4\n";
echo "Email and log for user 4\n\n";

$server->logAll();
$email_log->log();
$server_log->log();
exit;
