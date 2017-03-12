<?php
namespace LaravelIssueTracker\Issue\Acme\Services;

use LaravelIssueTracker\Issue\Models\Issue;
use LaravelIssueTracker\Issue\Acme\Validators\IssueValidator;

/**
 * Class IssueCreatorService
 * @package LaravelIssueTracker\Issue\Acme\Services
 */
class IssueCreatorService
{

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
        if( $this->validator->isValidForInsert($attributes) )
        {
            return Issue::create($attributes);
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
        if( $this->validator->isValidForUpdate($attributes) )
        {
            return Issue::findOrFail($id)->update($attributes);
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
            return Issue::destroy($id);
        }

        throw new ValidationException('Issue does not exists', '');
    }

}