<?php
namespace LaravelIssueTracker\Fileattachment\Acme\Services;

use LaravelIssueTracker\Core\Acme\Services\ApiService;
use LaravelIssueTracker\Fileattachment\Models\Fileattachment;
use LaravelIssueTracker\Core\Acme\Validators\ValidationException;
use LaravelIssueTracker\Fileattachment\Acme\Validators\FileattachmentValidator;

/**
 * Class FileattachmentCreatorService
 * @package LaravelIssueTracker\Fileattachment\Acme\Services
 */
class FileattachmentCreatorService extends ApiService
{

    /**
     * @var FileattachmentValidator
     */
    protected $validator;

    /**
     * MetadataCreatorService constructor.
     * @param $validator
     */
    public function __construct(FileattachmentValidator $validator)
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
            return Fileattachment::create($attributes);
        }

        throw new ValidationException('Fileattachment validation failed', $this->validator->getErrors());
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
            return Fileattachment::findOrFail($id)->update($attributes);
        }

        throw new ValidationException('Fileattachment validation failed', $this->validator->getErrors());
    }


    /**
     * @param $id
     * @return bool
     * @throws ValidationException
     */
    public function destroy($id)
    {
        if( Fileattachment::find($id)->exists() )
        {
            return Fileattachment::destroy($id);
        }

        throw new ValidationException('Fileattachment does not exists', '');
    }

}