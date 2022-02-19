<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class CreditCard
{
    use Validation;

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
            if (empty($data['card_token'])) {
                $this->validateCreditCardTransactionData($data);
            } else {
                $this->validateCreditCardWithTokenTransactionData($data);
            }          

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
