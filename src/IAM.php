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
     * @param string|null $accessToken
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function adminAuth(string|null $accessToken): ResponseInterface
    {
        return $this->client->post($this->url('admin-auth'), [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken
            ]
        ]);
    }

    /**
     * @param string|null $accessToken
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function appUserAuth(string|null $accessToken): ResponseInterface
    {
        return $this->client->post($this->url('app-user-auth'), [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken
            ]
        ]);
    }

    /**
     * Takes $url from config and $path from attributes
     * Normalizes both
     * Appends and returns a URL
     *
     * @param string $path
     * @return string
     */
    protected function url(string $path = ''): string
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
