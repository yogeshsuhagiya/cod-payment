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
namespace Practical\Payment\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Config
 */
class Config
{
    /**
     * Config path for module enable field
     */
    const XML_PATH_EMAILS = 'payment/yscod/emails';
    
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    /**
     * Check weather have to display payment method for email address or not
     */
    public function isValidEmail($email)
    {
        $store = ScopeInterface::SCOPE_STORE;
        $emails = array_map(
            'trim',
            explode(',', $this->scopeConfig->getValue(
                self::XML_PATH_EMAILS, $store
            ))
        );

        $this->logger->info('Emails Config :: ' . json_encode($emails));

        if(in_array($email, $emails)) {
            return true;
        }        

        return false;
    }
}
