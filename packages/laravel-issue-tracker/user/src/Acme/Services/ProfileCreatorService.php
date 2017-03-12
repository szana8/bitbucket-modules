<?php
namespace LaravelIssueTracker\User\Acme\Services;

use LaravelIssueTracker\User\Models\Profile;
use LaravelIssueTracker\User\Acme\Validators\ProfileValidator;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

/**
 * Class ProfileCreatorService
 * @package LaravelIssueTracker\User\Acme\Services
 */
class ProfileCreatorService
{

    /**
     * @var ProfileValidator
     */
    protected $validator;

    /**
     * UserCreatorService constructor.
     * @param $validator
     */
    public function __construct(ProfileValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws ValidationException
     */
    public function make(array $attributes)
    {
        if( $this->validator->isValidForInsert($attributes) )
        {
            $user = Profile::create($attributes);
            event('ProfileWasCreated', $user);

            return true;
        }

        throw new ValidationException('Profile validation failed', $this->validator->getErrors());
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
            $profile = Profile::find($id)->update($attributes);
            event('ProfileWasUpdated', $profile);

            return true;
        }

        throw new ValidationException('Profile validation failed', $this->validator->getErrors());
    }

    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Profile::find($id)->exists() )
        {
            $comment = Profile::destroy($id);
            event('ProfileWasDestroyed', $comment);

            return true;
        }

        throw new ValidationException('Profile does not exist!', '');
    }

}