<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Banking
{
    use Helpers;

    protected $http;

    /*
     * Create new Connection instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Connection();
    }

    /*
     * Create new cashin transaction.
     *
     * @param array $params
     * @return array
     */
    public function createCashin($params)
    {
        try {
            $this->validateCreateCashinData($params);

            $response = $this->http->post('/cashin', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create new cashout transaction.
     *
     * @param array $params
     * @return array
     */
    public function createCashout($params)
    {
        try {
            $this->validateCreateCashoutData($params);

            $response = $this->http->post('/cashout', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
