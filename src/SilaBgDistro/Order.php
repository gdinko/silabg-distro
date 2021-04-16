<?php

namespace SilaBgDistro;

use SilaBgDistro\Client;
use SilaBgDistro\Response;

class Order
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
     * Get Delivery Types
     *
     * @return array|Exception
     */
    public function getDeliveryTypes()
    {
        $reponse = $this->client
            ->get('order/delivery/types')
            ->send();

        return Response::prepare($reponse);
    }

    /**
     * Get Order List
     *
     * @return array|Exception
     */
    public function getList()
    {
        $reponse = $this->client
            ->get('order/list')
            ->send();

        return Response::prepare($reponse);
    }

    /**
     * Get Order Detail
     *
     * @param  integer $orderId
     * @return array|Exception
     */
    public function getDetail($orderId)
    {
        $reponse = $this->client
            ->get("order/{$orderId}")
            ->send();

        return Response::prepare($reponse);
    }

    /**
     * Create Order
     *
     * @param  array $data
     * @return array|Exception
     */
    public function createOrder($data)
    {
        $reponse = $this->client
            ->post(
                'order',
                array(
                    'Content-Type' => 'application/json'
                ),
                json_encode($data)
            )
            ->send();

        return Response::prepare($reponse);
    }
}
