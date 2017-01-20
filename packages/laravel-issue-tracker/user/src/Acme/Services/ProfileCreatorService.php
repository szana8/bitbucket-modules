<?php namespace LaravelIssueTracker\User\Acme\Services;

use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\User\Models\Profile;
use LaravelIssueTracker\User\Acme\Validators\ProfileValidator;

class ProfileCreatorService  {

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
        if( $this->validator->isValid($attributes) )
        {
            $user = Profile::create($attributes);
            event('ProfileWasCreated', $user);

            return true;
        }

        throw new ValidationException('Profile validation failed', $this->validator->getErrors());
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