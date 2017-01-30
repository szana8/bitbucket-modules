<?php namespace LaravelIssueTracker\Fileattachment\Acme\Services;

use LaravelIssueTracker\Fileattachment\Acme\Validators\FileattachmentValidator;
use LaravelIssueTracker\Fileattachment\Models\Fileattachment;

class FileattachmentCreatorService {

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
        if( $this->validator->isValid($attributes) )
        {
            $fileattachment = Fileattachment::create($attributes);
            event('FileattachmentWasCreated', $fileattachment);

            return true;
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
        if( $this->validator->isValid($attributes) )
        {
            $fileattachment = Fileattachment::findOrFail($id)->update($attributes);
            event('FileattachmentWasUpdated', $fileattachment);

            return true;
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
            $fileattachment = Fileattachment::destroy($id);
            event('FileattachmentWasDestroyed', $fileattachment);

            return true;
        }

        throw new ValidationException('Fileattachment does not exists', '');
    }

}