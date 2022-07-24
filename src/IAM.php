<?php

namespace SYSOTEL\APP\IAMConnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

class IAM
{
    protected array $config;
    protected Client $client;

    protected $routes = [
        'admin-auth' => 'admin-auth'
    ];

    /**
     * @param $config
     */
    public function __construct($config)
    {
        // todo validate config

        $this->config = $config;
        $this->client = new Client();
    }

    /**
     * @return array
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            $this->config['auth']['headerName'] => $this->config['auth']['key']
        ];
    }

    /**
     * @param $accessToken
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function adminAuth($accessToken): ResponseInterface
    {
        $path = $this->routes['admin-auth'];

        return $this->client->post($this->url($path), [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken
            ]
        ]);
    }

    protected function url(string $path = '')
    {
        $baseUrl = $this->config['baseUrl'];
        if(!Str::endsWith($baseUrl, '/')) {
            $baseUrl .= '/';
        }

        if(Str::startsWith($path, '/')) {
            $path = Str::substr($path, 1);
        }

        return $baseUrl . $path;
    }
}
