<?php

namespace SilaBgDistro;

class Response
{    
    /**
     * Prepare response
     *
     * @param  mixed $response
     * @return array|Exception
     */
    public static function prepare($response)
    {
        if ($response->isSuccessful()) {
            return $response->json();
        } else {
            try {
                return $response->json();
            } catch (\Exception $e) {
                throw new \Exception(
                    $response->getReasonPhrase(),
                    $response->getStatusCode()
                );
            }
        }
    }
}
