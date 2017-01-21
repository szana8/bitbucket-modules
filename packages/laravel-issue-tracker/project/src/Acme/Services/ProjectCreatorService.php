<?php namespace LaravelIssueTracker\Project\Acme\Services;

use LaravelIssueTracker\Project\Acme\Validators\ProjectValidator;
use LaravelIssueTracker\Project\Models\Project;
use LaravelIssueTracker\User\Models\Profile;

class ProjectCreatorService {

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
        if( $this->validator->isValid($attributes) )
        {
            $project = Project::create($attributes);
            event('ProjectWasCreated', $project);

            return true;
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
        if( $this->validator->isValid($attributes) )
        {
            $project = Project::findOrFail($id)->update($attributes);
            event('ProjectWasUpdated', $project);

            return true;
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
            $profile = Profile::destroy($id);
            event('ProjectWasDestroyed', $profile);

            return true;
        }

        throw new ValidationException('Project does not exists', '');
    }

}