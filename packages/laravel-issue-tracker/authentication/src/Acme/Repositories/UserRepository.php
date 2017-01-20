<?php namespace LaravelIssueTracker\Authentication\Acme\Repositories;

use App\User;
use LaravelIssueTracker\User\Acme\Services\UserCreatorService;

class UserRepository {

    /**
     * @var UserCreatorService
     */
    private $userCreatorService;

    /**
     * UserRepository constructor.
     * @param UserCreatorService $userCreatorService
     */
    public function __construct(UserCreatorService $userCreatorService)
    {
        $this->userCreatorService = $userCreatorService;
    }


    /**
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
     * @param $userData
     * @return mixed
     */
    public function findByEmail($userData)
    {
        return User::has('profiles', '=', $userData['profile']['type'])->where('email', $userData['email'])->exists();
    }

    /**
     * @param $userData
     * @return mixed
     */
    public function findByEmailAndPassword($userData)
    {
        return User::where('email', $userData->email)->firstOrFail();
    }

}