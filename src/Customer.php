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
            $this->validateGetCustomerData([
                'id' => $id
            ]);

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

      /*
     * get the balance for account.
     *
     * @param uuid $id
     * @return array
     */
    public function update($id, $data)
    {
        try {
            $this->validateUpdateCustomerData([$id, $data]);

            return $this->http->post("/customers/$id/update", $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
