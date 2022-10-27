<?php

namespace Services\PaymentGateway;

class Mgurush
{

    CONST GATEWAY_NAME = 'Mgurush';

    private $transaction_data;

    private $gateway;

    private $extra_params = ['phone'];

    public function __construct($gateway, $config)
    {
        $this->gateway = $gateway;
        $this->options['access_key'] = $config['access_key'];
        $this->options['secret_key'] = $config['secret_key'];
    }

    private function createTransactionData($order_total, $order_email, $event)
    {
        $this->transaction_data = [
            'txnRefNumber' => $order_email,
            'currency' => 'SSP',
            'mobileNumber' => $this->options['phone'],
            'amount'   => $order_total,
            'access_key' => $this->options['access_key'],
            'secret_key' => $this->options['secret_key']
        ];

        return $this->transaction_data;
    }

    public function startTransaction($order_total, $order_email, $event)
    {

        $this->createTransactionData($order_total, $order_email, $event);
        $transaction = $this->gateway->purchase($this->getTransactionData());
        $response = $transaction->send();

        return $response;
    }

    public function getTransactionData()
    {
        return $this->transaction_data;
    }

    public function extractRequestParameters($request)
    {
        foreach ($this->extra_params as $param) {
            if (!empty($request->get($param))) {
                $this->options[$param] = $request->get($param);
            }
        }
    }

    public function completeTransaction($data) {}

    public function getAdditionalData(){}

    public function storeAdditionalData()
    {
        return false;
    }

    public function refundTransaction($order, $refund_amount, $refund_application_fee)
    {

        $request = $this->gateway->refund([
            'transactionReference' => $order->transaction_id,
            'amount' => $refund_amount,
            'refundApplicationFee' => $refund_application_fee
        ]);

        $response = $request->send();

        if ($response->isSuccessful()) {
            $refundResponse['successful'] = true;
        } else {
            $refundResponse['successful'] = false;
            $refundResponse['error_message'] = $response->getMessage();
        }

        return $refundResponse;
    }
}
