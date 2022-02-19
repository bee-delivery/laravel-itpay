<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class Transfer
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
     * Create a transfer P2P.
     *
     * @param array $params
     * @return array
     */
    public function create($params)
    {
        try {
            $this->validateCreateTransferP2PData($params);

            return $this->http->post('/transfers', $params);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
   * Approve a transfer P2P.
   *
   * @param uuid $id
   * @return array
   */
    public function approve($id)
    {
        try {
            return $this->http->post("/transfers/$id/approve");
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create bulk transfers P2P.
     *
     * @param array $params
     * @return array
     */
    public function bulkCreate($params)
    {
        try {
            foreach ($params as $key => $value) {
                $this->validateCreateTransferP2PData($value);
            }

            return $this->http->post('/transfers/bulkStore', $params);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
