<?php

namespace BeeDelivery\ItPay\Utils;

use Illuminate\Support\Facades\Validator;

trait Helpers
{
    /*
     * Valida dados para criação de um novo cliente.
     *
     * @param array $data
     * @return void
     */
    public function validateCreateCustomerData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'customer_type' => 'required|string',
            'document' => 'required|string',
            'phone_number' => 'required|numeric',
            'address' => 'required|string',
            'address_complement' => 'nullable|numeric',
            'address_number' => 'required|numeric',
            'state' => 'required|string',
            'city' => 'required|string',
            'zipcode' => 'nullable|numeric',
            'webhook_url' => 'nullable|url',
            'webhook_email_notification' => 'nullable|email',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Valida dados para criação de um cashin.
     *
     * @param array $data
     * @return void
     */
    public function validateCreateCashinData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|string',
            'account' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Valida dados para criação de um cashout.
     *
     * @param array $data
     * @return void
     */
    public function validateCreateCashoutData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|string',
            'account' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
}
