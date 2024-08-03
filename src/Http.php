<?php

namespace SKHR\PteroAPI;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use SKHR\PteroAPI\Exceptions\HTTPBadRequestExecption;
use SKHR\PteroAPI\Exceptions\HTTPAccessDeniedExecption;
use SKHR\PteroAPI\Exceptions\HTTPNotFoundExecption;

class Http {
    /**
     * GuzzleHttp client.
     *
     * @var Client
     */
    private $guzzle;

    /**
     * PteroAPI instance
     * 
     * @var PteroAPI
     */
    private $pteroAPI;

    /**
     * Create a new Http instance
     * 
     * @param string $baseURI
     * @param string $apiKey
     * @param PteroAPI $pteroAPI
     */
    public function __construct($baseURI, $apiKey, $pteroAPI) {
        $this->guzzle = new Client([
            "base_uri" => $baseURI,
            "http_errors" => false,
            "debug" => false,
            "headers" => [
                "Accept"       => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer ".$apiKey
            ]
        ]);

        $this->pteroAPI = $pteroAPI;
    }

    /**
     * Convert the key name to camel case.
     *
     * @param string $key
     */
    private function camelCase($key)
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Transform the API response
     * 
     * @param array $response
     */
    private function transform($response) {
        if(empty($response["object"])) {
            return $response;
        }

        if($response['object'] == "list") {
            $response['data'] = array_map(function ($object) {
                return $this->transform($object);
            }, $response['data']);

            //Rename because the name List is not acceptable for the Class
            $response['object'] = "RessourceList";
        }

        if (isset($response['attributes']['relationships'])) {
            $response['attributes']['relationships'] = array_map(function ($object) {
                return $this->transform($object);
            }, $response['attributes']['relationships']);
        }

        $class = "\\SKHR\PteroAPI\\Resources\\".ucwords($this->camelCase($response['object']));

        return class_exists($class) ? new $class($response, $this->pteroAPI) : $response;
    }

    /**
     * Handle request error
     * 
     * @param ResponseInterface $response
     */
    private function handleRequestError($response) {
        switch($response->getStatusCode()) {
            case 400:
                throw new HTTPBadRequestExecption($response->getBody());
            case 403:
                throw new HTTPAccessDeniedExecption();
            case 404:
                throw new HTTPNotFoundExecption();
            case 422:
                throw new HTTPUnprocessableContentExecption(json_decode($response->getBody(), true));
            default:
                throw new \Exception($response->getBody());
        }
    }

    /**
     * Make Web request
     * 
     * @param string $method
     * @param string $uri
     * @param array $query
     * @param array $payload
     */
    private function request($method, $uri, array $query = [], array $payload = []) {
        $response = $this->guzzle->request($method, "/api/application/".$uri, [
            "query" => $query,
            "body" => json_encode($payload)
        ]);

        if ($response->getStatusCode() != 200 && $response->getStatusCode() != 201 && $response->getStatusCode() != 204) {
            return $this->handleRequestError($response);
        }

        return $this->transform(json_decode($response->getBody(), true));
    }

    /**
     * Mahe a GET request
     * 
     * @param string $uri
     * @param array $query
     */
    public function get($uri, $query = []) {
        return $this->request("GET", $uri, $query);
    }

    /**
     * Mahe a POST request
     * 
     * @param string $uri
     * @param array $query
     * @param array $payload
     */
    public function post($uri, $query = [], $payload = []) {
        return $this->request("POST", $uri, $query, $payload);
    }

    /**
     * Mahe a PATCH request
     * 
     * @param string $uri
     * @param array $query
     * @param array $payload
     */
    public function patch($uri, $query = [], $payload = []) {
        return $this->request("PATCH", $uri, $query, $payload);
    }

    /**
     * Mahe a DELETE request
     * 
     * @param string $uri
     * @param array $query
     * @param array $payload
     */
    public function delete($uri, $query = [], $payload = []) {
        return $this->request("DELETE", $uri, $query, $payload);
    }
}

?>