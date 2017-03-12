<?php
namespace LaravelIssueTracker\Core\Acme\Validators;

/**
 * Class ValidationException
 * @package LaravelIssueTracker\Core\Acme\Validators
 */
class ValidationException extends \Exception
{

    /**
     * Errors object
     */
    protected $errors;


    /**
     * ValidationException constructor.
     *
     * @param string $message
     * @param string $errors
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($message, $errors = '', $code = 0, \Exception $previous = null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }


    /**
     * Return the errors object.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

}