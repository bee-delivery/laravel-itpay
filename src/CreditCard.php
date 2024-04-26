<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class CreditCard
{
    use Helpers;

    protected $http;

    /*
     * Create a new Connection instance.
     *
     * @return void
     */
    public function __construct($accessToken)
    {
        $this->http = new Connection($accessToken);
    }

    /*
     * Create a new credit card transaction.
     *
     * @param uuid $id
     * @return array
     */
    public function get($id)
    {
        try {
            $this->validateGetCreditCardTransactionData([
                'id' => $id
            ]);

            return $this->http->get('/creditcard/' . $id);
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
    public function transaction($data)
    {
        try {
            if (empty($data['token'])) {
                $this->validateCreditCardTransactionData($data);
            } else {
                $this->validateCreditCardWithTokenTransactionData($data);
            }

            $response = $this->http->post('/creditcard/store', $data);

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
    public function creditCardTransactionRefund($id)
    {
        try {
            $this->validateCreditCardTransactionRefundData([
                'id' => $id
            ]);

            $response = $this->http->post('/creditcard/refund/' . $id);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    public function creditCardTokenize($params)
    {
        try {
            $this->validateCreditCardTokenizeData($params);

            $response = $this->http->post('/creditcard/tokenize', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    public function deleteCreditCardToken($id)
    {
        try {
            $this->validateDeleteCreditCardTokenData([
                'id' => $id
            ]);

            return $this->http->delete('/creditcard/tokenize/' . $id);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
