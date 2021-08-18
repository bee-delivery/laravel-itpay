<?php

namespace BeeDelivery\ItPay;

class ItPay
{
    /*
     * @return \BeeDelivery\ItPay\Customer
     */
    public function customer($accessToken)
    {
        return new Customer($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\Pix
     */
    public function pix($accessToken)
    {
        return new Pix($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\Boleto
     */
    public function boleto($accessToken)
    {
        return new Boleto($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\CashIn
     */
    public function cashin($accessToken)
    {
        return new CashIn($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\CashOut
     */
    public function cashout($accessToken)
    {
        return new CashOut($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\CreditCard
     */
    public function creditcard($accessToken)
    {
        return new CreditCard($accessToken);
    }

    /*
     * @return \BeeDelivery\ItPay\Transfer
     */
    public function transfer($accessToken)
    {
        return new Transfer($accessToken);
    }
}
