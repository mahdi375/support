<?php

namespace Blytd\Support;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\StreamHandler;

class HttpClient
{
    private $vendor;
    
    public function __construct(string $domain)
    {
        $this->vendor = new Client([
            'base_uri' => $domain,
            'handler'  => new StreamHandler()
        ]);
    }

    public function postJson(string $url, array $data, array $headers = [])
    {
        $response = $this->vendor->post($url, [
            'headers' => $headers,
            'json'    => $data
        ]);

        return $this->result($response);
    }

    public function getJson(string $url, array $params = [],array $headers = [])
    {
        $query = http_build_query($params);
        $url = $query ? "{$url}?{$query}" : $url;

        $response = $this->vendor->get($url, ['headers' => $headers]);

        return $this->result($response);
    }

    private function result($response): object
    {
        return (object) [
            'code' => $response->getStatusCode(),
            'body' => $response->getBody()
        ];
    }
}