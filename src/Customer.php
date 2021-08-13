<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Customer
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
     * Create a new customer.
     *
     * @param array $params
     * @return array
     */
    public function create($params)
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

    /*
     * Get a customer.
     *
     * @param string $customerId
     * @return array
     */
    public function get($customerId)
    {
        try {
            $this->validateGetCustomerData([
                'customerId' => $customerId
            ]);

            $response = $this->http->get('/customers/' . $customerId);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
