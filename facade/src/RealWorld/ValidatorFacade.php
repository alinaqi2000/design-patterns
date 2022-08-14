<?php


namespace Patterns\Facade\RealWorld;


class ValidatorFacade
{
    protected $isValidated = FALSE;
    public function __construct(User $user)
    {
        echo "Got user inputs.\n";
        $this->user = $user;
        $validator = new Validator($user);
        echo $validator->isValidName();
        echo $validator->isValidEmail();
        echo $validator->isValidPortfolio();
        if ($validator->isValidated()) {
            echo "All user inputs are validated.\n";
            $user_repo = new UserRepository($user);
            echo $user_repo->addUser();
            $user_repo->displayAllUsers();
        } else {
            echo "Invalid user inputs.\n";
        }
    }
}
