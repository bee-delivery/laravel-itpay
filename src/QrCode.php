<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class QrCode
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
     * Get a qrCode.
     *
     * @param string $qrCodeId
     * @return array
     */
    public function get($id)
    {
        try {
            $this->validateGetQrCodeData([
                'id' => $id
            ]);

            return $this->http->get('/qrcodes/getById/' . $id);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a qrCode.
     *
     * @param string $qrCodeId
     * @return array
     */
    public function create($data)
    {
        try {
            $this->validateCreateQrCodeData($data);

            return $this->http->post('/qrcodes', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Get a qrCode.
     *
     * @param string $qrCodeId
     * @return array
     */
    public function receipt($id)
    {
        try {
            $this->validateReceiptQrCodeData([
                'id' => $id
            ]);

            return $this->http->get('/qrcodes/' . $id . '/receipt');
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

       /*
     * Get a qrCode.
     *
     * @param string $qrCodeId
     * @return array
     */
    public function verifyQrCodeStatus($id)
    {
        try {
            $this->validateVerifyQrCodeStatusData([
                'id' => $id
            ]);

            return $this->http->get('/qrcodes/verifyQrCodeStatus/'. $id);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
