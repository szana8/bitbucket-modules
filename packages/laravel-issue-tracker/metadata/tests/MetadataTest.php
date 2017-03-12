<?php
namespace LaravelIssueTracker\Metadata\Tests;

use LaravelIssueTracker\Core\Tests\Helpers\Factory;
use LaravelIssueTracker\Core\Tests\Helpers\ApiTester;

/**
 * Class MetadataTest
 * @package LaravelIssueTracker\Metadata\Tests
 */
class MetadataTest extends ApiTester
{

    use Factory;

    /** @test */
    public function it_fetches_metadata()
    {
        $this->times(3)->make('LaravelIssueTracker\Metadata\Models\Metadata');

        $this->getJson('api/v1/metadata');

        $this->assertResponseOk();
    }


    /** @test */
    public function it_fetches_a_signle_metadata()
    {
        \Auth::loginUserId(1);
        $this->make('LaravelIssueTracker\Metadata\Models\Metadata');

        $metadata = $this->getJson('api/v1/metadata/1')->data;

        $this->assertResponseOk();

        $this->assertObjectHasAttributes($metadata, 'value', 'key');
    }


    /** @test */
    public function it_404s_if_a_metadata_is_not_found()
    {
        $this->getJson('api/v1/metadata/x');

        $this->assertResponseStatus(404);
    }


    /** @test */
    public function it_create_a_new_metadata_give_valid_parameters()
    {
        $this->getJson('api/v1/metadata', 'POST', $this->getStub());

        $this->assertResponseStatus(201);
    }


    /** @test */
    public function it_throws_a_422_if_a_new_metadata_request_fails_validation()
    {
        $this->getJson('api/v1/metadata', 'POST');

        $this->assertResponseStatus(422);
    }

    /**
     * @return array
     */
    protected function getStub()
    {
        return [
            'type'        => 'setting',
            'key'         => 'fake',
            'value'       => 'fake',
            'description' => 'fake',
        ];
    }


    /**
     * Creates the application.
     *
     * Needs to be implemented by subclasses.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}