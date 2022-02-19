<?php

namespace BeeDelivery\ItPay\Utils;


class Helpers
{
    public static function transformDataArrayIndexId($data)
    {
        if (!is_array($data)) {
            $data = ['id' => $data];
        }

        return $data;
    }
}
