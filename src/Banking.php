<?php

namespace BeeDelivery\ItPay;

use BeeDelivery\ItPay\Utils\Connection;
use BeeDelivery\ItPay\Utils\Helpers;

class Banking
{
    use Helpers;

    protected $http;

    /*
     * Cria uma nova instância de Connection.
     *
     * @return void
     */
    public function __construct()
    {
        $this->http = new Connection();
    }
}
