<?php
require_once 'vendor/autoload.php';
require_once 'app/init.php';

$auth = new auth($client);
?>

<?php if($auth->signedIn()): ?>
    <p>You are signed in.</p>
    <?php
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

    $reply = (array) $cb->statuses_homeTimeline();
    print_r($reply);
    ?>
    <p><a href="signout.php">Sign out</a> </p>
<?php else : ?>
    <p><a href="<?php echo $auth->getAuthUrl();?>">Sign in with Twitter</a> </p>
<?php endif; ?>


