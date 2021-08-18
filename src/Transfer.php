<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Transfer
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
     * Create a transfer P2P.
     *
     * @param array $params
     * @return array
     */
    public function createTransfer($params)
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
    public function approveTransfer($id)
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
}
