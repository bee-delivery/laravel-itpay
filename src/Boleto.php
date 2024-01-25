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
    public function get($id)
    {
        try {
            $this->validateGetBoletoData([
                'id' => $id
            ]);

            return $this->http->get('/boletos/' . $id);

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
            $this->validateCreateBoletoData($data);

            return $this->http->post('/boletos', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
