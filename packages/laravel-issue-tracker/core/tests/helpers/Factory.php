<?php namespace LaravelIssueTracker\Core\Tests\Helpers;

/**
 * Git Link: $Id$
 * File: Factory.php
 * Namespace: ${NAMESPACE}
 *
 * Description of Factory
 *
 *
 *  Version     Date            Author               Changelog
 *   1.0.0      2016. 12. 16.     Pisti                Created
 *
 */
trait Factory
{

    /**
     * @var int
     */
    protected $times = 1;

    /**
     * @param $count
     * @return $this
     */
    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    /**
     * Make a new record in the db
     * @param $type
     * @param array $fields
     */
    protected function make($type, $fields = [])
    {
        while($this->times--)
        {
            $stub = array_merge($this->getStub(), $fields);

            $type::create($stub);
        }

    }

    /**
     *
     */
    protected function getStub()
    {
        throw new \BadMethodCallException('Create your own getStub method to declare your fields.');
    }

}