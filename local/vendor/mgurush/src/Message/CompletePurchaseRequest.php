<?php

namespace Omnipay\Mgurush\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Cybersource Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{


    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    public function getData()
    {
        $data = $this->httpRequest->request->all();
        return $data;
    }
}
