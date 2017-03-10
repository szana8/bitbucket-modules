<?php

namespace LaravelIssueTracker\Core\Tests\Helpers;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;

class ApiTester {

    /**
     * @var \Faker\Generator
     */
    protected $fake;

    /**
     * ApiTester constructor.
     */
    function __construct()
    {
        $this->fake = Faker::create();
    }


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }


    /**
     * @param string $uri
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function getJson($uri, $method = 'GET', $parameters = [])
    {
        return json_decode($this->call($method, $uri, $parameters)->getContent());
    }


    /**
     *
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute) {

            $this->assertObjectHasAttribute($attribute, $object);

        }
    }

}