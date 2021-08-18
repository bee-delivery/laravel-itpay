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
     * @param array $params
     * @return array
     */
    public function transaction($data)
    {
        try {
            $this->validateCreditCardTransactionData($data);

            $response = $this->http->post('/creditcard', $data);

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
//    public function creditCardTransactionRefund($params)
//    {
//        try {
//            $this->validateCreditCardTransactionRefundData($params);
//
//            $response = $this->http->post('/creditcard/refund', $params);
//
//            return $response;
//        } catch (\Exception $e) {
//            return [
//                'code' => $e->getCode(),
//                'response' => $e->getMessage()
//            ];
//        }
//    }
}
