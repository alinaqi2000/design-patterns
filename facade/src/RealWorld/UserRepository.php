<?php



namespace Patterns\Facade\RealWorld;


class UserRepository
{
    protected User $user;

    private $users_storage_dir = "./src/RealWorld/users/";

    public function __construct(User $user)
    {
        $this->user = $user;
        if (!file_exists($this->users_storage_dir)) {
            mkdir($this->users_storage_dir, 0777, true);
        }
    }

    public function addUser(): String
    {
        $result = "";
        file_put_contents($this->users_storage_dir . $this->user->getId(), serialize($this->user));
        $result .= "User data stored.\n";
        return $result;
    }
    public function displayAllUsers(): void
    {
        $users = array_diff(scandir($this->users_storage_dir), array('.', '..'));

        echo "\n    <----------- Users List ---------->\n";
        $mask = "|%-15s|%-30s|%-30s|%-40s| \n";
        printf($mask, "ID#", "Name", "Email", "Portfolio");
        foreach ($users as $userId) {
            if (file_exists($this->users_storage_dir . $userId)) {
                $user = unserialize(file_get_contents($this->users_storage_dir . $userId));
                printf($mask, $userId, $user->name, $user->email, $user->portfolio);
            }
        }

        return;
    }
}
