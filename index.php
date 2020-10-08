<?php
/**
 * Index page 
 * 
 * This page display the wallet and allow the active user to add funds
 * 
 */
require 'config.php'; // load the configuration variables

/**
 * If there is no active session with key 'user'
 * 
 * Then redirect to login page.
 * 
 * Active session is the user that Logged in
 */
if ( ! isset( $_SESSION['user'] ) ) {
    header('Location:login.php'); // redirect to login.php
}

/**
 * But if there is an active session
 * 
 * Retrieve the amount from the wallet Table based on the active user session
 */
$user   = $_SESSION['user']['id']; // user id
$sql    = "SELECT amount FROM `wallets` WHERE user = $user "; // stmt
$stmt   = $db->query( $sql ); // query amount
$wallet = $stmt->fetch();

?>

<!-- the wallet amount -->
<h1><?php echo $wallet['amount']; ?></h1>

<!-- Form that allow user to fund their wallet -->
<form action="fund.php" method="post">
    <input type="text" name='amount' placeholder='Amount'>
    <button type="submit"> Fund Wallet</button>
</form>