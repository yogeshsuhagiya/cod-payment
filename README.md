# Magento 2 - COD Payment [Yogesh Suhagiya](https://github.com/yogeshsuhagiya)
- Provide custom COD payment method for specific email addresses
- Goto: STORES > Configuration > SALES > Payment Methods > YS COD Payment
- Add value for allow email addresses with comma separated value.
- This payment method appear only for specified email addresses.
- It works for both Guest and Logged In customers.

## **Prerequisite**
- Composer: 2.x
- PHP: 7.4
- Magento: 2.4

## **Installation** 
1. Composer Installation
      - Navigate to your Magento root folder<br />
            `cd path_to_the_magento_root_directory`
      - Then run the following command<br />
            `composer require yogeshsuhagiya/cod-payment`<br />
      - Make sure that composer finished the installation without errors

 2. Command Line Installation
      - Backup your web directory and database.
      - Download the latest installation package `Source code (zip)` from [here](https://github.com/yogeshsuhagiya/cod-payment/releases)
      - Navigate to your Magento root folder<br />
            `cd path_to_the_magento_root_directory`<br />
      - Upload contents of the installation package to your Magento root directory
      - Then run the following command<br />
            `php bin/magento module:enable Practical_Payment`<br />
   
- After install the extension, run the following command
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```
- Log out from the backend and login again.
