<?php namespace LaravelIssueTracker\User\Controllers;

use LaravelIssueTracker\Core\Controller\ApiController;
use LaravelIssueTracker\User\Acme\Services\ProfileCreatorService;
use LaravelIssueTracker\User\Acme\Transformers\ProfileTransformer;


class ProfileController extends ApiController {

    /**
     * @var ProfileTransformer
     */
    protected $profileTransformer;

    /**
     * @var ProfileCreatorService
     */
    protected $profileCreator;

    /**
     * ProfileController constructor.
     * @param $profileTransformer
     * @param $profileCreator
     */
    public function __construct(ProfileTransformer $profileTransformer, ProfileCreatorService $profileCreator)
    {
        $this->profileTransformer = $profileTransformer;
        $this->profileCreator = $profileCreator;
    }




}