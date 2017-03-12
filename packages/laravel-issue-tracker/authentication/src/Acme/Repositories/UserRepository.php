<?php
namespace LaravelIssueTracker\Authentication\Acme\Repositories;

use App\User;
use LaravelIssueTracker\User\Acme\Services\UserCreatorService;

/**
 * Class UserRepository
 * @package LaravelIssueTracker\Authentication\Acme\Repositories
 */
class UserRepository
{
    /**
     * Private attribute for the user creator service.
     */
    private $userCreatorService;

    /**
     * UserRepository constructor.
     *
     * @param UserCreatorService $userCreatorService
     */
    public function __construct(UserCreatorService $userCreatorService)
    {
        $this->userCreatorService = $userCreatorService;
    }


    /**
     * Find the user by email or create a new one if the user not exists.
     *
     * @param $userData
     * @return static
     */
    public function findByEmailOrCreate($userData)
    {
        if ( ! $this->findByEmail($userData) )
        {
            return $this->userCreatorService->make($userData);
        }

        return User::where('email', $userData['email'])->first();
    }

    /**
     * Check the email and the profile type is exists or not.
     *
     * @param $userData
     * @return mixed
     */
    public function findByEmail($userData)
    {
        return User::has('profiles', '=', $userData['profile']['type'])->where('email', $userData['email'])->exists();
    }

    /**
     * Find the user by email and password.
     *
     * @param $userData
     * @return mixed
     */
    public function findByEmailAndPassword($userData)
    {
        return User::where('email', $userData->email)->firstOrFail();
    }

}