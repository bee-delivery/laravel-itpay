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

    public function deleteCreditCardToken($id, $params)
    {
        try {
            $this->validateDeleteCreditCardTokenData([
                'id' => $id,
                'account' => $params['account'] ?? ''
            ]);

            return $this->http->delete('/creditcard/tokenize/' . $id, $params);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
