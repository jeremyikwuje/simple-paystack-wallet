# Simple Wallet with Paystack

You have read the Paystack documentation, even this [awesome tutorial](https://dev.to/ijsucceed/how-to-integrate-paystack-payment-system-with-php-5a8m), but still don't know how to bring them together.

We made this sample wallet for you. Pure PHP code, no framework or any advanced scaffolding.

A basic wallet using Paystack payment gateway to accept funds.

## Installation
Please, check the config file and enter your database settings.

```
/** MySQL database name */
define( 'DB_NAME', 'wallets' );

/** MySQL database username */
define( 'DB_USER', 'wallet_db' );

/** MySQL database password */
define( 'DB_PASSWORD', '*****' );
```

Then paste your SECRET KEY which is available on your Paystack dashboard.

```
/** Paystack Secret */
define( 'PAYSTACK_SECRET', 'Paste Your Paystack Secret Key' );
```

When a transaction is successful, Paystack redirect the user back to the wallet. You will need to set the base URL, so Paystack don't take the user to a wrong callback address.

```
/** The Wallet BASE URL */
define( 'BASE', 'demo.abegpay.com/wallet' );
```

### Setting BASE URL for different servers

XAMPP server, your Base URL should look like this: 
```
http://localhost/wallet
```

PHP in built server:
```
http://localhost:3001
```

Live Server:
```
https://example.com
```

## Credit
If you find this Repo helpful, kindly give it a star.

## Update
We have recieve few complaints on how Paystack is not working on some servers. Please make sure your server has open SSL enabled. Also upgrading to PHP 7.3 upward. 

You can open an issue or contact us on Twitter.

Be happy!

