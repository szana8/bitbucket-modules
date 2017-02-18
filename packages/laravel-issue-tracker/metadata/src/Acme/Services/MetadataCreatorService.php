<?php
namespace LaravelIssueTracker\Metadata\Acme\Services;

use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Metadata\Acme\Validators\MetadataValidator;
use LaravelIssueTracker\Metadata\Models\Metadata;

class MetadataCreatorService {

    protected $validator;

    /**
     * MetadataCreatorService constructor.
     * @param $validator
     */
    public function __construct(MetadataValidator $validator)
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
        if( $this->validator->isValid($attributes, 'make') )
        {
            $metadata = Metadata::create($attributes);
            event('MetadataWasCreated', $metadata);

            return true;
        }

        throw new ValidationException('Metadata validation failed', $this->validator->getErrors());
    }


    /**
     * @param array $attributes
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update(array $attributes, $id)
    {
        if( $this->validator->isValid($attributes, 'update') )
        {
            $metadata = Metadata::findOrFail($id)->update($attributes);
            event('MetadataWasUpdated', $metadata);

            return true;
        }

        throw new ValidationException('Metadata validation failed', $this->validator->getErrors());
    }


    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Metadata::find($id)->exists() )
        {
            $metadata = Metadata::destroy($id);
            event('MetadataWasDestroyed', $metadata);

            return true;
        }

        throw new ValidationException('Metadata does not exists', '');
    }

}