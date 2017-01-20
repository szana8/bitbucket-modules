<?php
namespace LaravelIssueTracker\Core\Controller;

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

    /**
     * @var int
     */
    protected $statusCode = IlluminateResponse::HTTP_OK;


    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }


    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found!')
    {
        return$this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }


    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return$this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }


    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }


    /**
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
     * @param $message
     * @return mixed
     */
    public function respondUnprocessable($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }


    /**
     * @param $message
     * @return mixed
     */
    public function respondUnathorized($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

}