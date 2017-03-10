<?php
namespace LaravelIssueTracker\Core\Acme\Validators;

class ValidationException extends \Exception {

    /**
     * @var int
     */
    protected $errors;


    /**
     * ValidationException constructor.
     * @param string $message
     * @param int $errors
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($message, $errors = '', $code = 0, \Exception $previous = null)
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }


    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

}