<?php
require_once 'php/init.php';

$auth = new auth($client);
?>

<?php if($auth->signedIn()): ?>
        <p>You are signed in.<a href="signout.php">Sign out</a> </p>
<?php else : ?>
    <p><a href="<?php echo $auth->getAuthUrl();?>">Sign in with Twitter</a> </p>
<?php endif; ?>


