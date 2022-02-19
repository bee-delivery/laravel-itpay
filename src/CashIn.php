<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class CashIn
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
     * Create a new cashin transaction.
     *
     * @param array $params
     * @return array
     */
    public function create($data)
    {
        try {
            $this->validateCreateCashinData($data);

            return $this->http->post('/cashin', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
