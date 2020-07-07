<?php

class JsonPlaceHolder
{
    private $id;
    private $client;

    function __construct(string $action)
    {
        try {

            if (method_exists($this, $action)) {
                $this->client = new \GuzzleHttp\Client();

                $this->id = isset($_GET['id']) ? (int) $_GET['id'] : null;
                echo $this->{$action}();
            } else
                echo 'Action not found';
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    private function posts()
    {
        $response = $this->client->request('GET', "https://jsonplaceholder.typicode.com/posts" . ($this->id ? "/$this->id" : ""));

        // echo $response->getStatusCode(); // 200
        // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        // echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        // $response = json_decode($response);
        
        return $response->getBody();
    }

    private function users()
    {
        $response = $this->client->request('GET', "https://jsonplaceholder.typicode.com/users");

        return $response->getBody();
    }

    private function todos()
    {
        $response = $this->client->request('GET', "https://jsonplaceholder.typicode.com/todos" . ($this->id ? "/$this->id" : ""));

        return $response->getBody();
    }
}
