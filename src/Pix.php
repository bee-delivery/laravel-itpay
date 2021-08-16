<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Pix
{
    use Helpers;

    protected $http;

    /*
     * Create new Connection instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Connection();
    }

    /*
     * Create a new Pix transaction.
     *
     * @param array $params
     * @return array
     */
    public function transfer($params)
    {
        try {
            $this->validateTransferData($params);

            $response = $this->http->post('/pix', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a new Pix refund.
     *
     * @param string $transferId
     * @return array
     */
    public function refund($transferId)
    {
        try {
            $this->validateRefundData([
                'transferId' => $transferId
            ]);

            $response = $this->http->post('/pix/refund', ['id' => $transferId]);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Get a Pix receipt.
     *
     * @param string $transferId
     * @return array
     */
    public function getPixReceipt($transferId)
    {
        try {
            $this->validateGetPixReceiptData([
                'transferId' => $transferId
            ]);

            $response = $this->http->get('/pix/' . $transferId . '/receipt');

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create new Pix validation.
     *
     * @param array $params
     * @return array
     */
    public function validatePix($params)
    {
        try {
            $this->validateValidatePixData($params);

            $response = $this->http->post('/pix/validate', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
