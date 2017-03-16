<?php
namespace LaravelIssueTracker\Metadata\Acme\Services;

use LaravelIssueTracker\Metadata\Models\Metadata;
use LaravelIssueTracker\Core\Acme\Services\ApiService;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Metadata\Acme\Validators\MetadataValidator;

class MetadataCreatorService extends ApiService
{
    /**
     * @var MetadataValidator
     */
    protected $validator;

    /**
     * @var string
     */
    protected static $validationFailedMessage = 'Metadata Validation Failed';


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
        if( $this->validator->isValidForInsert($attributes) )
        {
            return Metadata::create($attributes);
        }

        throw new ValidationException(self::$validationFailedMessage, $this->validator->getErrors());
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
            return Metadata::findOrFail($id)->update($attributes);
        }

        throw new ValidationException(self::$validationFailedMessage, $this->validator->getErrors());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Metadata::find($id)->exists() )
        {
            return Metadata::destroy($id);
        }

        throw new ValidationException('Metadata does not exists');
    }

}