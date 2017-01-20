<?php namespace LaravelIssueTracker\User\Acme\Services;

use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\User\Acme\Validators\UserValidator;
use LaravelIssueTracker\User\Models\User;

class UserCreatorService {

    protected $validator;
    /**
     * @var ProfileCreatorService
     */
    private $profileCreatorService;

    /**
     * UserCreatorService constructor.
     * @param UserValidator $validator
     * @param ProfileCreatorService $profileCreatorService
     */
    public function __construct(UserValidator $validator, ProfileCreatorService $profileCreatorService)
    {
        $this->validator = $validator;
        $this->profileCreatorService = $profileCreatorService;
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws ValidationException
     */
    public function make(array $attributes)
    {
        $user = $this->validator->exists($attributes['email']);

        if ( $user->exists() )
        {
            $attributes['profile']['user_id'] = $user->first()->id;
            $this->profileCreatorService->make($attributes['profile']);

            return $user->first();
        }

        $user = $this->makeWithProfile($attributes);

        event('UserWasCreated', $user);
        return $user;
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValid($attributes) )
        {
            $user = \DB::transaction(function () use ($attributes, $id) {
                $user = User::find($id)->update($attributes);
                $this->profileCreatorService->update($attributes['profile'],  $attributes['profile']['id']);

                return $user;
            });

            event('UserWasUpdated', $user);

            return true;
        }

        throw new ValidationException('User validation failed', $this->validator->getErrors());
    }

    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( User::find($id)->exists() )
        {
            $comment = User::destroy($id);
            event('UserWasDestroyed', $comment);

            return true;
        }

        throw new ValidationException('User does not exist!', '');
    }

    /**
     * @param $attributes
     * @return bool
     * @throws ValidationException
     */
    protected function makeWithProfile($attributes)
    {
        if( $this->validator->isValid($attributes) )
        {
            $user = \DB::transaction(function ($attributes) use ($attributes) {
                $user = User::create($attributes);
                $attributes['profile']['user_id'] = $user->id;
                $this->profileCreatorService->make($attributes['profile']);

                return $user;
            });

            return $user;
        }

        throw new ValidationException('User validation failed', $this->validator->getErrors());
    }
}