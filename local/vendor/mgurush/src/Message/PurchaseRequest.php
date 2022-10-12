<?php

namespace Omnipay\Mgurush\Message;

/**
 * Cybersource Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{

  public function getData()
      {
          $data = array(
              'callback' => '',
              'partnerCode' => '2122',
              'order_id' => $this->getOrderId(),
              'tnxRefNumber' => $this->getTnxRefNumber()
          );

          return $data;
      }

  public function getHttpMethod()
       {
           return 'GET';
       }
}
