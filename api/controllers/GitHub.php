<?php

class GitHub
{
    private $baseUrl = "https://api.github.com";
    private $client;

    function __construct(string $action)
    {
        try {

            if (method_exists($this, $action)) {
                $this->client = new \GuzzleHttp\Client();

                echo $this->{$action}();
            } else
                echo 'Action not found';
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    private function users()
    {
        $response = $this->client->request('GET', "$this->baseUrl/users");

        return $response->getBody();
    }
    
    private function repositories()
    {
        $response = $this->client->request('GET', "$this->baseUrl/repositories");

        return $response->getBody();
    }

}
