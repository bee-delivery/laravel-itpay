<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Boleto
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
     * Get a boleto.
     *
     * @param string $boletoId
     * @return array
     */
    public function getBoleto($boletoId)
    {
        try {
            $this->validateGetBoletoData([
                'boletoId' => $boletoId
            ]);

            return $this->http->get('/boletos/' . $boletoId);

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
    public function createBoleto($data)
    {
        try {
            $this->validateCreateBoletoData($data);

            return $this->http->post('/boletos');
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
