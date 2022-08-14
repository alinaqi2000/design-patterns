<?php

use Patterns\Singleton\RealWorld\Logger;
use Patterns\Singleton\RealWorld\User;

$user1 = User::setLogin(uniqid("user_") . "@gmail.com");
$log1 = Logger::setLog("User login set to: " . $user1::getLogin());
echo "User login set and log message generated.\n";

$user2 = User::setPassword(rand(11111, 99999));
$log2 = Logger::setLog("User password set to: " . $user1::getPassword());
echo "User password set and log message generated.\n";

echo "\n    <----------- Conclusion ---------->\n";
if ($log1 === $log2) {
    echo "Logger has the single instance of the singleton.\n";
} else {
    echo "Logger does not have the single instance of the singleton.\n";
}
if ($user1::getLogin() === $user2::getLogin() && $user1::getPassword() === $user2::getPassword()) {
    echo "Both users have the single instance of the singleton.\n";
} else {
    echo "Both users do not have the single instance of the singleton.\n";
}

Logger::logAll();
exit;
