<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Traits\Validation;
use BeeDelivery\ItPay\Utils\Connection;


class QrCode
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
     * Get a boleto.
     *
     * @param string $boletoId
     * @return array
     */
    public function get($id)
    {
        try {
            $this->validateIdFormatUuid($id);

            return $this->http->get('/qrcodes/' . $id);

        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * Create a boleto.
     *
     * @param string $boletoId
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
}
