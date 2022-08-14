<?php



namespace Patterns\Facade\RealWorld;


class Validator
{
    protected User $user;
    protected $isValidated = FALSE;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function isValidName(): String
    {
        $this->isValidated = TRUE;
        return  "Name validated.\n";
    }
    public function isValidEmail(): String
    {
        $this->isValidated = TRUE;
        return "Email validated.\n";
    }
    public function isValidPortfolio(): String
    {
        $this->isValidated = TRUE;
        return "Portfolio validated.\n";
    }
      public function isValidated(): bool
    {
        return $this->isValidated;
    }
}
