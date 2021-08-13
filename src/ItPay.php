<?php

namespace BeeDelivery\ItPay;

class ItPay
{
    /*
     * Retorna uma nova instância de Banking.
     *
     * @return \BeeDelivery\ItPay\Banking
     */
    public function banking()
    {
        return new Banking();
    }

    /*
     * Retorna uma nova instância de Customer.
     *
     * @return \BeeDelivery\ItPay\Customer
     */
    public function customer()
    {
        return new Customer();
    }

    /*
     * Retorna uma nova instância de Pix.
     *
     * @return \BeeDelivery\ItPay\Pix
     */
    public function pix()
    {
        return new Pix();
    }
}
