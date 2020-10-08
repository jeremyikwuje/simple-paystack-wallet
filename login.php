<?php
/**
 * This file display the Login page and also process the Login request
 * 
 * We are just trying to keep things simple.
 * 
 */

require_once 'config.php'; // load the configuration variables

/**
 * If the Login request was sent from the Form
 * 
 * We get the email and check if it exist or not.
 * 
 * If an email doesn't exist we create a new user, else we simply login.
 * 
 * Yes! No password for this.
 */
if ( isset( $_POST['email'] ) ) {
    /**
     * Get the Email sent from the form
     */
    $email = $_POST['email'];

    // Retrieve the user info from the database
    $sql    = "SELECT id, email FROM `users` WHERE email = '$email' ";
    $stmt   = $db->query($sql);

    /**
     * if user exist, then login
     * 
     * else create a new user account
     */
    if ( 1 === $stmt->rowCount() ) {
        // since the user exist
        // so the first thing is to fetch the user row
        $row = $stmt->fetch();

        /**
         * Open a new user session, holding both ID and email
         */
        $_SESSION['user'] = [
            'id' => $row['id'],
            'email'=> $row['email']
        ];

        // since we have our session
        // we then redirect to wallet index
        header('Location:index.php');
    }
    else {
        // create a new user
        $sql = "INSERT INTO `users` (`email`) VALUES('$email')";
        $stmt = $db->query( $sql );

        /**
         * If a new user row was inserted then create a wallet and Authenticate
         * 
         * Else, there was a problem from the Database|Server
         */
        if ( $stmt ) {
            /**
             * Open a new user session, holding both ID and email
             */
            $_SESSION['user'] = [
                'id' => $db->lastInsertId(),
                'email' => $email
            ];
            
            // Create a wallet for this new user
            $user   = $_SESSION['user']['id'];
            $sql    = "INSERT INTO `wallets` (`user`, `amount`) VALUES($user, '0.00')";
            $stmt   = $db->query($sql);

            // Redirect to wallet
            header( 'Location:index.php' ); 
        }
        else {
            // Normally, we don't expect to be here
            // But, few times bad things happen.
            die ('Error: Contact the developer');
        }
    }
}
?>

<form action="login.php" method="post">
    <label>Email</label>
    <input type="text" name="email" id="email">
    <button type="submit">Login</button>
</form>

