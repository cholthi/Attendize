<?php
namespace Omnipay\Mgurush\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 *
 * @method \Omnipay\Cybersource\Message\Response send()
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndpoint = 'https://app.mgurush.com/irh/ecomTxn/betting';
    protected $testEndpoint = 'https://uat.mgurush.com/irh/ecomTxn/betting';
    protected $endpoint = '';

    public function getHeaders()
    {
        $headers = array();
       // $headers['Accept'] = "application/json";
        $headers['Accept'] = "application/json";
        $headers['Content-Type'] = "application/json";
        $headers['Hmac'] = $this->get_hmac_hash();
        $headers['access_key'] = $this->getAccessKey();


        return $headers;
    }

    public function sendData($data)
    {
     $headers = $this->getHeaders();
     $body = json_encode($data) ;
   // dd($body,$this->getEndPoint(),$headers);
    $httpResponse = $this->httpClient->request($this->getHttpMethod(), $this->getEndpoint(), $headers, $body);
  // dd($httpResponse->getBody()->getContents());
        return $this->response = new Response($this, $httpResponse->getBody()->getContents(), $headers);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getPartnerCode()
    {
        return $this->getParameter('partnerCode');
    }

    public function setPartnerCode($value)
    {
        return $this->setParameter('partnerCode', $value);
    }


    public function getAccessKey()
    {
        return $this->getParameter('access_key');
    }

    public function setAccessKey($value)
    {
        return $this->setParameter('access_key', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secret_key');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secret_key', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

   public function getMobileNumber()
    {
        return $this->getParameter('mobile_number');
    }

    public function setMobileNumber($value)
    {
        return $this->setParameter('mobile_number', $value);
    }

    public function getTnxRefNumber()
    {
        return $this->getParameter('txnRefNumber');
    }

    public function setTxnRefNumber($value)
    {
        return $this->setParameter('txnRefNumber', $value);
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
        return 'POST';
    }

   public function get_hmac_hash()
     {
       $params = [
         'mobileNumber' => $this->getMobileNumber(),
         'amount'       => $this->getAmount(),
         'currency'     => $this->getCurrency(),
         'txnRefNumber' => $this->getTnxRefNumber()
       ];
     $encoded = json_encode($params);
     $raw = hash_hmac('sha256',$encoded, $this->getSecretKey(), true);

      $hash = base64_encode($raw);

      return $hash;

    }



}
