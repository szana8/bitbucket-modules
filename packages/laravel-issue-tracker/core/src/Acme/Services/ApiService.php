<?php
namespace LaravelIssueTracker\Core\Acme\Services;

/**
 * Class ApiService
 * @package LaravelIssueTracker\Core\Acme\Services
 */
abstract class ApiService
{

    /**
     * @param array $attributes
     * @return bool
     */
    abstract public function make(array $attributes);

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     */
    abstract public function update(array $attributes, $id);

    /**
     * @param int $id
     * @return bool
     */
    abstract public function destroy($id);
}