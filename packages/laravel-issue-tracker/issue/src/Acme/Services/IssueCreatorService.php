<?php namespace LaravelIssueTracker\Issue\Acme\Services;

use LaravelIssueTracker\Issue\Acme\Validators\IssueValidator;
use LaravelIssueTracker\Issue\Models\Issue;

class IssueCreatorService {

    /**
     * @var IssueValidator
     */
    protected $validator;

    /**
     * MetadataCreatorService constructor.
     * @param $validator
     */
    public function __construct(IssueValidator $validator)
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
            $issue = Issue::create($attributes);
            event('IssueWasCreated', $issue);

            return true;
        }

        throw new ValidationException('Issue validation failed', $this->validator->getErrors());
    }


    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValid($attributes) )
        {
            $issue = Issue::findOrFail($id)->update($attributes);
            event('IssueWasUpdated', $issue);

            return true;
        }

        throw new ValidationException('Issue validation failed', $this->validator->getErrors());
    }


    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Issue::find($id)->exists() )
        {
            $issue = Issue::destroy($id);
            event('IssueWasDestroyed', $issue);

            return true;
        }

        throw new ValidationException('Issue does not exists', '');
    }

}