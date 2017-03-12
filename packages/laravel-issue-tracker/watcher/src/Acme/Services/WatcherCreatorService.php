<?php
namespace LaravelIssueTracker\Watcher\Acme\Services;

use LaravelIssueTracker\Watcher\Models\Watcher;
use LaravelIssueTracker\Watcher\Acme\Validators\WatcherValidator;

/**
 * Class WatcherCreatorService
 * @package LaravelIssueTracker\Watcher\Acme\Services
 */
class WatcherCreatorService
{

    protected $validator;

    /**
     * WatcherCreatorService constructor.
     * @param $validator
     */
    public function __construct(WatcherValidator $validator)
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
            return Watcher::create($attributes);
        }

        throw new ValidationException('Watcher validation failed', $this->validator->getErrors());
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
            return Watcher::findOrFail($id)->update($attributes);
        }

        throw new ValidationException('Watcher validation failed', $this->validator->getErrors());
    }


    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Watcher::find($id)->exists() )
        {
            return Watcher::destroy($id);
        }

        throw new ValidationException('Watcher does not exists', '');
    }

}