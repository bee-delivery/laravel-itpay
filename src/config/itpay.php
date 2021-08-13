<?php

return [

    /*
    |-------------------------------------------------------------
    | BASE URL
    |-------------------------------------------------------------
    | URL base, a partir da qual será montada a URL da requisição. 
    | Podendo ser os endpoints de homologação ou produção.
    */
    'base_url' => env('ITPAY_BASE_URL'),

    /*
    |-------------------------------------------------------------
    | Authentication
    |-------------------------------------------------------------
    | Token de acesso utilizado nas requisições.
    */
    'access_token' => env('ITPAY_ACCESS_TOKEN'),

];
