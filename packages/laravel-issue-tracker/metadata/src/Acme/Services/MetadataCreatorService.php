<?php
namespace LaravelIssueTracker\Metadata\Acme\Services;

use LaravelIssueTracker\Metadata\Models\Metadata;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Metadata\Acme\Validators\MetadataValidator;

class MetadataCreatorService {

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
     * @param $requestArray
     * @return bool
     * @throws ValidationException
     */
    public function make($requestArray)
    {
        if( $this->validator->isValidForInsert($requestArray) )
        {
            return Metadata::create($requestArray);
        }

        throw new ValidationException(self::$validationFailedMessage, $this->validator->getErrors());
    }


    /**
     * @param array $requestArray
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function update($requestArray, $id)
    {
        if( $this->validator->isValidForUpdate($requestArray) )
        {
            return Metadata::findOrFail($id)->update($requestArray);
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