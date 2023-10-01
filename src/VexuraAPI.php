<?php


namespace Vexura;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Vexura\Accounting\Accounting;
use Vexura\Exception\ParameterException;
use Vexura\SubUser\SubUser;

class VexuraAPI
{
    private $httpClient;
    private $credentials;
    private $apiToken;

    /**
     * @var Accounting
     */
    private $accountingHandler;

    /**
     * @var SubUser
     */
    private $subuserHandler;

    /**
     * VexuraAPI constructor.
     *
     * @param string $token API Token for all requests
     * @param null $httpClient
     */
    public function __construct(string $token, string $type = "api", $httpClient = null) {
        $this->apiToken = $token;
        $this->setHttpClient($httpClient);
        $this->setCredentials($token, $type);
    }


    public function setHttpClient(Client $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new Client([
            'allow_redirects' => false,
            'follow_redirects' => false,
            'timeout' => 120,
            'http_errors' => false,
        ]);
    }

    public function setCredentials($api_token, $type)
    {
        $this->credentials  = new Credentials($api_token, $type);
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->apiToken;
    }

    /**
     * @return Credentials
     */
    private function getCredentials(): Credentials
    {
        return $this->credentials;
    }


    /**
     * @param string $actionPath The resource path you want to request, see more at the documentation.
     * @param array $params Array filled with request params
     * @param string $method HTTP method used in the request
     *
     * @return ResponseInterface
     *
     * @throws ParameterException If the given field in params is not an array
     */
    private function request(string $actionPath, array $params = [], string $method = 'GET'): ResponseInterface
    {
        $url = $this->getCredentials()->getUrl() . $actionPath;

        if (!is_array($params)) {
            throw new ParameterException();
        }

        $params['Authorization'] = 'Bearer ' . $this->apiToken;

        switch ($method) {
            case 'GET':
                return $this->getHttpClient()->get($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken]]);
            case 'POST':
                return $this->getHttpClient()->post($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'json' => $params,]);
            case 'PUT':
                return $this->getHttpClient()->put($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'json' => $params,]);
            case 'DELETE':
                return $this->getHttpClient()->delete($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'json' => $params,]);
            default:
                throw new ParameterException('Wrong HTTP method passed');
        }
    }

    private function processRequest(ResponseInterface $response)
    {
        $response = $response->getBody()->__toString();
        $result = json_decode($response);
        if (json_last_error() == JSON_ERROR_NONE) {
            return $result;
        } else {
            return $response;
        }
    }

    public function get($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params);

        return $this->processRequest($response);
    }

    public function post($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'POST');

        return $this->processRequest($response);
    }

    public function put($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'PUT');

        return $this->processRequest($response);
    }

    public function delete($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'DELETE');

        return $this->processRequest($response);
    }

    /**
     * @return Accounting
     */
    public function accounting(): Accounting
    {
        if (!$this->accountingHandler) $this->accountingHandler = new Accounting($this);
        return $this->accountingHandler;
    }

    /**
     * @return SubUser
     */
    public function subUser(): SubUser
    {
        if (!$this->subuserHandler) $this->subuserHandler = new SubUser($this);
        return $this->subuserHandler;
    }

}
