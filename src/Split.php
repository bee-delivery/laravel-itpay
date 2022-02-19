<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class Split
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
     * Create a split
     *
     * @param array $params
     * @return array
     */
    public function create($params)
    {
        try {
            $this->validateCreateSplitTransferData($params);

            return $this->http->post('/split', $params);
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
    public function refund($id)
    {
        try {
            $this->validateIdFormatUuid([
                'id' => $id
            ]);

            return $this->http->post("/split/$id/refund");
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    } 
}
