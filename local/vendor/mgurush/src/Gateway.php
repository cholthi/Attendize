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
            'partnerCode' => '2122',
            'order_id'    => '',
            'tnxRefNumber' => '',
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
        return $this->getParameter('txnRefNumber');
    }

    public function setTxnRefNumber($value)
    {
        return $this->setParameter('txnRefNumber', $value);
    }


}
