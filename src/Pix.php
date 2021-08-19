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
    public function create($data)
    {
        try {
            $this->validateTransferData($data);

            $response = $this->http->post('/pix', $data);

            return $response;
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a new Pix transaction.
     *
     * @param array $params
     * @return array
     */
    public function confirm($id)
    {
        try {
            $this->validateConfirmData([
                'id' => $id
            ]);
            return $this->http->post("/pix/$id/confirm");
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
    public function refund($id)
    {
        try {
            $this->validateRefundData([
                'id' => $id
            ]);

            $response = $this->http->post('/pix/refund', ['id' => $id]);

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
    public function receipt($id)
    {
        try {
            $this->validateGetPixReceiptData([
                'id' => $id
            ]);

            return $this->http->get('/pix/' . $id . '/receipt');
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
    public function validatePix($data)
    {
        try {
            $this->validateValidatePixData($data);

            return $this->http->post('/pix/validate', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

}
