<?php namespace LaravelIssueTracker\Watcher\Acme\Services;

use LaravelIssueTracker\Watcher\Acme\Validators\WatcherValidator;
use LaravelIssueTracker\Watcher\Models\Watcher;

class WatcherCreatorService {

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
        if( $this->validator->isValid($attributes) )
        {
            $watcher = Watcher::create($attributes);
            event('WatcherWasCreated', $watcher);

            return true;
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
        if( $this->validator->isValid($attributes) )
        {
            $watcher = Watcher::findOrFail($id)->update($attributes);
            event('WatcherWasUpdated', $watcher);

            return true;
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
            $watcher = Watcher::destroy($id);
            event('WatcherWasDestroyed', $watcher);

            return true;
        }

        throw new ValidationException('Watcher does not exists', '');
    }

}