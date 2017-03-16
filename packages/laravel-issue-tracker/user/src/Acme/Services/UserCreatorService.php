<?php
namespace LaravelIssueTracker\User\Acme\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use LaravelIssueTracker\Core\Acme\Services\ApiService;
use LaravelIssueTracker\User\Acme\Validators\UserValidator;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

/**
 * Class UserCreatorService
 * @package LaravelIssueTracker\User\Acme\Services
 */
class UserCreatorService extends ApiService
{

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * @var ProfileCreatorService
     */
    protected $profileCreatorService;

    /**
     * @var null
     */
    protected $password = null;

    /**
     * @var null
     */
    protected $api_token = null;

    /**
     * UserCreatorService constructor.
     * @param UserValidator $validator
     * @param ProfileCreatorService $profileCreatorService
     */
    public function __construct(UserValidator $validator, ProfileCreatorService $profileCreatorService)
    {
        $this->validator = $validator;
        $this->profileCreatorService = $profileCreatorService;

        $this->api_token = str_random(60);
        $this->password = Hash::make(str_random(8));
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
        else
        {
           return $this->makeWithProfile($attributes);
        }
    }

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValidForUpdate($attributes) )
        {
            $user = \DB::transaction(function () use ($attributes, $id)
            {
                $user = User::find($id)->update($attributes);
                $this->profileCreatorService->update($attributes['profile'], $attributes['profile']['id']);

                return $user;
            });

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
            return User::destroy($id);
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
        if( $this->validator->isValidForInsert($attributes) )
        {
            $user = \DB::transaction(function () use ($attributes) {
                $attributes['password'] = $this->password ?: str_random(60);
                $attributes['api_token'] = $this->api_token ?: str_random(60);

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