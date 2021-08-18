<?php

namespace BeeDelivery\ItPay;

class ItPay
{
    /*
     * @return \BeeDelivery\ItPay\Customer
     */
    public function customer()
    {
        return new Customer();
    }

    /*
     * @return \BeeDelivery\ItPay\Pix
     */
    public function pix()
    {
        return new Pix();
    }

    /*
     * @return \BeeDelivery\ItPay\Boleto
     */
    public function boleto()
    {
        return new Boleto();
    }

    /*
     * @return \BeeDelivery\ItPay\CashIn
     */
    public function cashin()
    {
        return new CashIn();
    }

    /*
     * @return \BeeDelivery\ItPay\CashOut
     */
    public function cashout()
    {
        return new CashOut();
    }

    /*
     * @return \BeeDelivery\ItPay\CreditCard
     */
    public function creditcard()
    {
        return new CreditCard();
    }

    /*
     * @return \BeeDelivery\ItPay\Transfer
     */
    public function transfer()
    {
        return new Transfer();
    }
}
