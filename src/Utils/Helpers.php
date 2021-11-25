<?php

namespace BeeDelivery\ItPay\Utils;

use Illuminate\Support\Facades\Validator;

trait Helpers
{
    /*
     * Validate data for creating a new customer.
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data to get a customer.
     *
     * @param array $data
     * @return void
     */
    public function validateGetCustomerData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
 * Validate data to get a customer.
 *
 * @param array $data
 * @return void
 */
    public function validateTokenCustomerData($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data to get account by id.
     *
     * @param array $data
     * @return void
     */
    public function validateGetAccountByIdData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for creating a cashin transaction.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for creating a cashout transaction.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for a new P2P transfer.
     *
     * @param array $data
     * @return void
     */
    public function validateCreateTransferP2PData($data)
    {
        $validator = Validator::make($data, [
            'account_from' => 'required|uuid',
            'account_to' => 'required|uuid',
            'description' => 'required|string',
            'amount' => 'required|integer',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for a new credit card transaction.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for a new credit card transaction refund.
     *
     * @param array $data
     * @return void
     */
    public function validateCreditCardTransactionRefundData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for get a boleto.
     *
     * @param array $data
     * @return void
     */
    public function validateGetBoletoData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a boleto.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for transfer.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
         * Validate data for refund a pix transfer.
         *
         * @param array $data
         * @return void
         */
    public function validateConfirmData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for refund a pix transfer.
     *
     * @param array $data
     * @return void
     */
    public function validateRefundData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for get a pix receipt.
     *
     * @param array $data
     * @return void
     */
    public function validateGetPixReceiptData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for a pix validation.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

     /*
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     */
    public function validateGetQrCodeData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|uuid'    
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    /*
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
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

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

        
    /*
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     */
    public function validateCreateAccountData($data)
    {
        $validator = Validator::make($data, [
            'customer' => 'required|string',
            'description' => 'required|string',
            'external_reference' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

        /*
     * Validate data for create a new qr code.
     *
     * @param array $data
     * @return void
     */
    public function validateGetAccountBalanceData($data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|string',        
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }
}
