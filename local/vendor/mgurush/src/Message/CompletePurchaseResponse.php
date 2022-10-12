<?php

namespace Omnipay\Mgurush\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * New Complete Purchase response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['transaction_id']) && !empty($this->data['transaction_id']);
    }

    public function getTransactionId()
    {
        return isset($this->data['transaction_id']) ? $this->data['transaction_id'] : null;
    }

    public function getTransactionReference()
    {
        return isset($this->data['transaction_id']) ? $this->data['transaction_id'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['status']) ? $this->data['status'] : null;
    }
}
