<?php
session_start();

/** MySQL database name */
define( 'DB_NAME', 'wallets' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'easyflow' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

/** The Wallet BASE URL */
define( 'BASE', 'PUT YOUR BASE URL' ); // see the readme.md file

/** Paystack Secret */
define( 'PAYSTACK_SECRET', 'Paste Your Paystack Secret Key' );

