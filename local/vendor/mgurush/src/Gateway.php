<?php
namespace Omnipay\Mgurush;

use Omnipay\Common\AbstractGateway;
use Mgurush\Message\PurchaseRequest;
use Mgurush\Message\RefundRequest;

/**
 * CyberSource Secure Acceptance Silent Order POST Gateway
 *
 * @link http:
 * //apps.cybersource.com/library/documentation/dev_guides/Secure_Acceptance_SOP/html/wwhelp/wwhimpl/js/html/wwhelp.htm
 */
class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'Mgurush';
    }

    public function getDefaultParameters()
    {
        return array(
            'currency' => 'SSP',
            'amount'    => '',
            'partnerCode' => '1041',
            'tnxRefNumber' => '',
            'access_key'   => '',
            'secret_key'   => '',
            'testMode' => true,
        );
    }



    /**
     *
     * @param array $parameters
     * @return \Omnipay\Mgurush\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Mgurush\Message\PurchaseRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\Cybersource\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Mgurush\Message\CompletePurchaseRequest', $parameters);
    }

  /**
     *
     * @param array $parameters
     * @return \Omnipay\Cybersource\Message\RefundRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Mgurush\Message\RefundRequest', $parameters);
    }



    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
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

    public function getTnxRefNumber()
    {
        return $this->getParameter('txnRefNumber');
    }

    public function setTxnRefNumber($value)
    {
        return $this->setParameter('txnRefNumber', $value);
    }


}
