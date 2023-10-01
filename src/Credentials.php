<?php


namespace Vexura;

class Credentials
{
    private $token;
    private $url;

    private $type;

    /**
     * Credentials constructor.
     * @param string $token api token
     * @param string $type api type (sandbox / api)
     */
    public function __construct(string $token, string $type)
    {
        $this->token = $token;
        $this->type = $type;
        $this->url = 'https://api.vexura.eu/'. $this->type .'/v1/';
    }

    public function __toString()
    {
        return sprintf(
            '[Host: %s], [Token: %s], [Type: %s].',
            $this->url,
            $this->token,
            $this->type
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }


}
