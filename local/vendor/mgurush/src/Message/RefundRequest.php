<?php

namespace Omnipay\Mgurush\Message;

/**
 * Cybersource Purchase Request
 */
class RefundRequest extends AbstractRequest
{

protected $liveEndpoint = 'https://app.mgurush.com/irh/ecomTxn/refund';
protected $testEndpoint = 'https://uat.mgurush.com/irh/ecomTxn/refund';


public function setPartnerCode($value)
  {
   return $this->setparameter('partnerCode', $value);
  }

public function getPartnerCode()
  {

  return $this->getParameter('partnerCode');
  }

public function setOrderId($value)
  {
   return $this->setParameter('order_id', $value);
  }

public function getOrderId()
  {
   return $this->getParameter('order_id');
  }

public function setRefundTxnRefNumber($value)
  {
   return $this->setParameter('refundTxnRefNumber', $value);
  }

public function getRefundTxnRefNumber()
  {
   return $this->getParameter('refundTxnRefNumber');
  }
public function getData()
  {
          $data = [
            'partnerCode' => $this->getPartnerCode(),
            'amount'       => $this->getAmount(),
            'currency'     => $this->getCurrency(),
            'txnRefNumber' => $this->getTnxRefNumber(),
            'orderId'    =>  $this->getOrderId(),
            'refundTxnRefNumber' => $this->getRefundTxnRefNumber()
          ];

          return $data;
   }

  public function getHttpMethod()
       {
           return 'POST';
       }

public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

}
