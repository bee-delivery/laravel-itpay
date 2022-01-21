<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Account
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
     * Get a account.
     *
     * @param string $id
     * @return array
     */
    public function get($id)
    {
        try {
            $this->validateGetAccountData(
              ['id' => $id]
            );

            return $this->http->get('/accounts/'.$id);
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
            $this->validateCreateAccountData($data);

            return $this->http->post('/accounts', $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    /*
     * get the balance for account.
     *
     * @param uuid $id
     * @return array
     */
    public function balance($id)
    {
        try {
            $this->validateGetAccountBalanceData([
                'id' => $id
            ]);

            return $this->http->get("/accounts/$id/balance");
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }


    /*
     * get the balance for account.
     *
     * @param uuid $id
     * @return array
     */
    public function update($id, $data)
    {
        try {
            $this->validateUpdateAccountData($data);

            return $this->http->post("/accounts/$id/update", $data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }
}
