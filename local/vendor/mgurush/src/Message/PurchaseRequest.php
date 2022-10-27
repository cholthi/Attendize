<?php

namespace Omnipay\Mgurush\Message;

/**
 * Cybersource Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{

  public function getData()
      {
          $data = [
            'mobileNumber' => $this->getMobileNumber(),
            'amount'       => $this->getAmount(),
            'currency'     => $this->getCurrency(),
            'txnRefNumber' => $this->getTnxRefNumber()
          ];

          return $data;
      }

  public function getHttpMethod()
       {
           return 'POST';
       }
}
