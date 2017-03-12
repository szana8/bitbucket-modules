<?php
namespace LaravelIssueTracker\User\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\User\Acme\Services\UserCreatorService;
use LaravelIssueTracker\User\Acme\Transformers\UserTransformer;
use LaravelIssueTracker\User\Acme\Services\ProfileCreatorService;

/**
 * Class UserController
 * @package LaravelIssueTracker\User\Controllers
 */
class UserController extends ApiController
{

    /**
     * @var UserTransformer
     */
    protected $userTransformer;

    /**
     * @var UserCreatorService
     */
    protected $userCreator;

    /**
     * @var ProfileCreatorService
     */
    protected $profileCreator;

    /**
     * UserController constructor.
     * @param $userTransformer
     * @param $userCreator
     * @param $profileCreator
     */
    public function __construct(UserTransformer $userTransformer, UserCreatorService $userCreator, ProfileCreatorService $profileCreator)
    {
        $this->userTransformer = $userTransformer;
        $this->userCreator = $userCreator;
        $this->profileCreator = $profileCreator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $user = User::with('profiles')->paginate($this->limit);

        return $this->respond([
            'data' => $this->userTransformer->transformCollection($user->all())
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::with('profiles')->find($id);

        if ( ! $user )
        {
            return $this->respondNotFound('User does not exist');
        }

        return $this->respond([
            'data' => $this->userTransformer->transform($user)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store()
    {
        try
        {
            $this->userCreator->make(Input::all());
            return $this->respondCreated('User successfully created!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Request $request
     * @param $id
     * @return mixed
     */
    public function update(\Request $request, $id)
    {
        try {
            // Store the original input of the request and then replace the input with your request instances input.
            $this->userCreator->update(Input::all()['user'], $id);
            return $this->respondCreated('User successfully updated!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->userCreator->destroy($id);
            return $this->respondCreated('User successfully destroyed!');
        }
        catch(ValidationException $e) {
            return $this->respondUnprocessable($e->getMessage());
        }
    }
}