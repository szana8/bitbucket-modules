<?php
namespace LaravelIssueTracker\Project\Acme\Services;

use LaravelIssueTracker\User\Models\Profile;
use LaravelIssueTracker\Project\Models\Project;
use LaravelIssueTracker\Core\Acme\Services\ApiService;
use LaravelIssueTracker\Project\Acme\Validators\ProjectValidator;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;

/**
 * Class ProjectCreatorService
 * @package LaravelIssueTracker\Project\Acme\Services
 */
class ProjectCreatorService extends ApiService
{

    protected $validator;

    /**
     *
     * @param $validator
     */
    public function __construct(ProjectValidator $validator)
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
            return Project::create($attributes);
        }

        throw new ValidationException('Project validation failed', $this->validator->getErrors());
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
            return Project::findOrFail($id)->update($attributes);
        }

        throw new ValidationException('Project validation failed', $this->validator->getErrors());
    }


    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Project::find($id)->exists() )
        {
            return Profile::destroy($id);
        }

        throw new ValidationException('Project does not exists', '');
    }

}