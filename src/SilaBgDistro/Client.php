<?php

namespace SilaBgDistro;

use Guzzle\Http\Client as GuzzleClient;

class Client
{
    const API_ENDPOINT = 'https://distro.silabg.com/api/v1';

    const API_TIMEOUT = 30;

    const API_CONNECT_TIMEOUT = 1.5;

    public static function getClient($apiToken)
    {
        return new GuzzleClient(Client::API_ENDPOINT, array(
            'request.options' => array(
                'query' => array(
                    'api_token' => $apiToken
                ),
                'timeout' => Client::API_TIMEOUT,
                'connect_timeout' => Client::API_CONNECT_TIMEOUT,
                'exceptions' => false
            ),
        ));
    }
}
