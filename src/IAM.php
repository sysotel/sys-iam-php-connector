<?php

namespace SYSOTEL\APP\IAMConnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;
use SYSOTEL\APP\IAMConnector\Exceptions\InvalidTokenException;
use SYSOTEL\APP\IAMConnector\Exceptions\PermissionDeniedException;
use SYSOTEL\APP\IAMConnector\Exceptions\PropertyAccessDeniedException;
use SYSOTEL\APP\IAMConnector\Support\AdminDetails;
use SYSOTEL\APP\IAMConnector\Support\AppUserDetails;
use SYSOTEL\APP\IAMConnector\Support\ConfigValidator;

class IAM
{
    protected array $config;
    protected Client $client;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        ConfigValidator::validate($config);
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
     * @param string $accessToken
     * @param string|null $permission
     * @return AdminDetails
     * @throws GuzzleException
     */
    public function adminAuth(string $accessToken, null|string $permission = null): AdminDetails
    {
        $response = $this->client->post($this->url('admin-auth'), [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken,
                'permission' => $permission
            ]
        ]);

        $response = $this->responseToArray($response);

        if(!$response['authDetails']['isTokenValid']) {
            throw new InvalidTokenException;
        }

        if($response['authDetails']['hasPermission'] === false)
        {
            throw new PermissionDeniedException;
        }

        if(!$response['admin']) {
            abort(500, 'Admin details not found in response');
        }

        return AdminDetails::createFromArray($response['admin']);
    }

    /**
     * @param string $accessToken
     * @param int|null $propertyId
     * @param string|null $permission
     * @return AppUserDetails
     * @throws GuzzleException
     */
    public function appUserAuth(string $accessToken, int $propertyId = null, string $permission = null): AppUserDetails
    {
        $response = $this->client->post($this->url('app-user-auth'), [
            'headers' => $this->defaultHeaders(),
            'form_params' => [
                'accessToken' => $accessToken,
                'propertyId' => $propertyId,
                'permission' => $permission,
            ]
        ]);

        $response = $this->responseToArray($response);

        if(!$response['authDetails']['isTokenValid']) {
            throw new InvalidTokenException;
        }

        if($response['authDetails']['hasPropertyAccess'] === false)
        {
            throw new PropertyAccessDeniedException;
        }

        if($response['authDetails']['hasPermission'] === false)
        {
            throw new PermissionDeniedException();
        }

        if(!$response['user']) {
            abort(500, 'User details not found in response');
        }

        return AppUserDetails::createFromArray($response['user']);
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

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function responseToArray(ResponseInterface $response): mixed
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
