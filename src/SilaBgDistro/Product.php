<?php

namespace SilaBgDistro;

use SilaBgDistro\Client;
use SilaBgDistro\Response;

class Product
{
    protected $client;
    
    /**
     * __construct
     *
     * @param  string $apiToken
     */
    public function __construct($apiToken)
    {
        $this->client = Client::getClient($apiToken);
    }

    /**
     * Get Product List
     *
     * @param  mixed $brandId
     * @param  mixed $modelId
     * @param  mixed $tasteId
     * @param  mixed $sizeId
     * @return array|Exception
     */
    public function getList($brandId = 0, $modelId = 0, $tasteId = 0, $sizeId = 0)
    {
        $reponse = $this->client
            ->post(
                'product',
                array(
                    'Content-Type' => 'application/json'
                ),
                json_encode(array(
                    'brand_id' => $brandId,
                    'model_id' => $modelId,
                    'taste_id' => $tasteId,
                    'size_id' => $sizeId
                ))
            )
            ->send();

        return Response::prepare($reponse);
    }
    
    /**
     * Get Product Detail
     *
     * @param  string $ean
     * @return array|Exception
     */
    public function getDetail($ean)
    {
        $reponse = $this->client
            ->get("product/{$ean}")
            ->send();

        return Response::prepare($reponse);
    }
}
