<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class Customer
{
    use Validation;

    protected $http;

    /*
     * Create new Connection instance.
     *
     * @return void
     */
    public function __construct($accessToken)
    {
        $this->http = new Connection($accessToken);
    }

    /*
     * Create a new customer.
     *
     * @param array $params
     * @return array
     */
    public function create($data)
    {
        try {
            $this->validateCreateCustomerData($data);

            $response = $this->http->post('/customers', $data);

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
    public function get($id)
    {
        try {
            $this->validateIdFormatUuid($id);

            return $this->http->get('/customers/' . $id);
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
    public function token($data)
    {
        try {
            $this->validateTokenCustomerData($data);

            return $this->http->post('/users/token', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
