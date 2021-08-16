<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Banking
{
    use Helpers;

    protected $http;

    /*
     * Create a new Connection instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Connection();
    }

    /*
     * Create a new cashin transaction.
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
     * Create a new cashout transaction.
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

    /*
     * Create a new P2P transfer.
     *
     * @param array $params
     * @return array
     */
    public function transferP2P($params)
    {
        try {
            $this->validateTransferP2PData($params);

            $response = $this->http->post('/transfers', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a new credit card transaction.
     *
     * @param array $params
     * @return array
     */
    public function creditCardTransaction($params)
    {
        try {
            $this->validateCreditCardTransactionData($params);

            $response = $this->http->post('/creditcard', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a new credit card transaction refund.
     *
     * @param array $params
     * @return array
     */
    public function creditCardTransactionRefund($params)
    {
        try {
            $this->validateCreditCardTransactionRefundData($params);

            $response = $this->http->post('/creditcard/refund', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
