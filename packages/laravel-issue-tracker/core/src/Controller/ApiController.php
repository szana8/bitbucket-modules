<?php
namespace LaravelIssueTracker\Core\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends Controller {

    /**
     * The default limit for the pagination.
     *
     * @var int
     */
    protected $limit = 20;

    /**
     * The default status code is 200.
     *
     * @var int
     */
    protected $statusCode = IlluminateResponse::HTTP_OK;


    /**
     * Return the status code.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * Set the status code and return the object.
     *
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    /**
     * Return a json object a status code and some optional headers.
     *
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * Default function for respond not found. Set the status code to 404.
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }


    /**
     * Default function for respond internal error. Set the status code to 500.
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }


    /**
     * Default function for respond with error.
     *
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message['message'] ?: '',
                'errors' => $message['errors'] ?: '',
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }


    /**
     * Default function for the respond created.
     *
     * @param $message
     * @return mixed
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([

            'message' => $message

        ]);
    }


    /**
     * Default function for the respond unprocessable. Set the status code to 422.
     *
     * @param $message
     * @return mixed
     */
    public function respondUnprocessable($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }


    /**
     * Default function for the respond unauthorized. Set the status code to 401.
     *
     * @param $message
     * @return mixed
     */
    public function respondUnauthorized($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

}