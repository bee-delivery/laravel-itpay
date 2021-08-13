<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Customer
{
    use Helpers;

    protected $http;

    /*
     * Cria uma nova instância de Connection.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Connection();
    }

    /*
     * Criar novo cliente.
     *
     * @param array $params
     * @return array
     */
    public function createCustomer($params)
    {
        try {
            $this->validateCreateCustomerData($params);

            $response = $this->http->post('/customers', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
