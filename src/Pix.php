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
    public function __construct($accessToken)
    {
        $this->http = new Connection($accessToken);
    }

    /*
     * Create a new Pix transaction.
     *
     * @param array $params
     * @return array
     */
    public function create($params)
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
     * Create a new Pix validation.
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

    /*
     * Create a new qr code.
     *
     * @param array $params
     * @return array
     */
    public function createQrCode($params)
    {
        try {
            $this->validateCreateQrCodeData($params);

            $response = $this->http->post('/qrcodes', $params);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
