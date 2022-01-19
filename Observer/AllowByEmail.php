<?php
/**
 * Yogesh Suhagiya
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future. If you wish to customize this module for your needs.
 * Please contact Yogesh Suhagiya (yksuhagiya@gmail.com)
 *
 * @category    Practical
 * @package     Practical_Payment
 * @author      Yogesh Suhagiya (yksuhagiya@gmail.com)
 * @copyright   Copyright (c) 2022
 * @license     https://github.com/yogeshsuhagiya/cod-payment/blob/main/LICENSE
 */
namespace Practical\Payment\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class AllowByEmail
 */
class AllowByEmail implements ObserverInterface
{

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var \Practical\Payment\Helper\Config
     */
    private $config;

    /**
     * AllowByEmail constructor
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Practical\Payment\Helper\Config $config
    ) {
        $this->logger = $logger;
        $this->config = $config;
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $result = $observer->getEvent()->getResult();
        $method = $observer->getEvent()->getMethodInstance();
        $quote = $observer->getEvent()->getQuote();

        if ($quote !== null && !$this->config->isValidEmail($quote->getCustomerEmail())) {
            $this->logger->info('Email :: ' . $quote->getCustomerEmail());
            /* Disable payment gateway and exclude payment gateway*/
            if ($method->getCode() == \Practical\Payment\Model\Payment\Cod::PAYMENT_METHOD_YSCOD_CODE) {
                $result->setData('is_available', false);
            }
        }
    }
}
