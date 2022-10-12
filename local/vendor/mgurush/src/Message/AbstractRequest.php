<?php
namespace Omnipay\Mgurush\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 *
 * @method \Omnipay\Cybersource\Message\Response send()
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndpoint = 'https://app.mgurush.com/mGurush_eCom/txnPin/txnPin.html';
    protected $testEndpoint = 'https://uat.mgurush.com/mGurush_eCom/txnPin/txnPin.html';
    protected $endpoint = '';

    public function sendData($data)
    {
        return $this->response = new Response($this, $data, $this->getEndpoint());
    }

    public function getPartnerCode()
    {
        return $this->getParameter('partnerCode');
    }

    public function setPartnerCode($value)
    {
        return $this->setParameter('partnerCode', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('order_id');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('order_id', $value);
    }

    public function getTnxRefNumber()
    {
        return $this->getParameter('tnxRefNumber');
    }

    public function setTxnRefNumber($value)
    {
        return $this->setParameter('tnxRefNumber', $value);
    }

    public function getTestMode()
    {
        return $this->getParameter('testMode');
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function getHttpMethod()
    {
        return 'GET';
    }


}
