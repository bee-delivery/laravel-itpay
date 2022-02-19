<?php

namespace BeeDelivery\ItPay\Traits;

use BeeDelivery\ItPay\Utils\Helpers;
use Illuminate\Support\Facades\Validator;


trait Validation
{
    /**
     * Validate data for creating a new customer.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateCustomerData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'customer_type' => 'required|string',
            'document' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'address_complement' => 'nullable|string',
            'address_number' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zipcode' => 'nullable|string',
            'webhook_url' => 'nullable|url',
            'webhook_email_notification' => 'nullable|email',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data to get a customer.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateTokenCustomerData($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for creating a cashin transaction.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateCashinData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|uuid',
            'account' => 'required|uuid',
            'amount' => 'required|integer',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for creating a cashout transaction.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateCashoutData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|uuid',
            'account' => 'required|uuid',
            'amount' => 'required|integer',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a new P2P transfer.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateTransferP2PData($data)
    {
        $validator = validator::make($data, [
            'account_from' => 'required|uuid',
            'account_to' => 'required|uuid',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a new credit card transaction.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreditCardTransactionData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|uuid',
            'account' => 'required|uuid',
            'amount' => 'required|integer',
            'holder_name' => 'required|string',
            'number' => 'required|string',
            'expiry' => 'required|date_format:mY',
            'ccv' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a new credit card transaction.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreditCardWithTokenTransactionData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|max:80|uuid',
            'account' => 'required|max:80|uuid',
            'card_token' => 'required',
            'amount' => 'required|integer|numeric|gt:0',
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a new credit card transaction refund.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreditCardTransactionRefundData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for create a boleto.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateBoletoData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|uuid',
            'account' => 'required|uuid',
            'amount' => 'required|integer',
            'due_date' => 'required|date_format:Y-m-d',
            'description' => 'required|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for transfer.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateTransferData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|string',
            'account' => 'required|string',
            'amount' => 'required|integer',
            'description' => 'nullable|string',
            'key_type' => 'required|string',
            'key' => 'required|string',
            'external_reference' => 'required|string',
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a pix validation.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateValidatePixData($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'institution' => 'required|string',
            'institutionName' => 'required|string',
            'branch' => 'nullable|string',
            'accountNumber' => 'required|string',
            'accountType' => 'required|string',
            'document' => 'required|string',
            'type' => 'required|string',
            'key' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateQrCodeData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|string',
            'account' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|integer',
            'key_type' => 'nullable|string',
            'key' => 'nullable|string',
            'qrcode_type' => 'nullable|string',
            'emv' => 'nullable|string',
            'endtoendid' => 'nullable|string',
            'document' => 'nullable|string',
            'name' => 'nullable|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateAccountData($data)
    {
        $validator = Validator::make($data, [
            'customer_id' => 'required|string',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateGetAccountBalanceData($data)
    {
        $result = Helpers::transformDataArrayIndexId($data);
        $validator = Validator::make($result, [
            'id' => 'required|string',
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for update a account.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateUpdateAccountData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
            'customer' => 'nullable|string',
            'credit_limit' => 'nullable|integer',
            'status' => 'nullable|string',
            'description' => 'nullable|string',
            'external_reference' => 'nullable|string'
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate data for a new P2P transfer.
     *
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function validateCreateSplitTransferData($data)
    {
        $validator = validator::make($data, [
            'account' => 'required|uuid',
            'customer' => 'required|uuid',
            'description' => 'required|string',
            'type' => 'required|string',
            'external_reference' => 'required|string',
            'data' => 'required|array',
        ]);

        $this->validatorFails($validator);
    }

    /**
     * Validate if the id is in uuid format
     *
     * @param array $data
     * @throws \Exception
     */
    public function validateIdFormatUuid($data)
    {
        $result = Helpers::transformDataArrayIndexId($data);
        $validator = Validator::make($result, [
            'id' => 'required|uuid'
        ]);
        
        $this->validatorFails($validator);
    }

    /**
     * @throws \Exception
     */
    private function validatorFails($validator)
    {
        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
}