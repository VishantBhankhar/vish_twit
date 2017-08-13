<?php
require_once 'vendor/autoload.php';
require_once 'app/init.php';

$auth = new auth($client);
?>

<?php if($auth->signedIn()): ?>
    <p>You are signed in.</p>
    <?php
    $client->setToken($_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
   // $client->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
    $twit = (array) $client->statuses_homeTimeline();
   // print "<pre>";
   // print_r($reply);
   // print "</pre>";

    echo "<br>";
    //echo $_SESSION['user_id'];
    $count=0;
    foreach ($twit as $value) {
        $count++;
        if($count>10)
        {
            break;
        }
        else{
            echo $value->user->name;
            echo '@'.$value->user->screen_name;
            echo $value->text;
            echo "<br>";
        }

    };
    $friend =(array) $client->followers_list();
    print "<pre>";
    print_r($friend);
    print "</pre>";
    $count=0;
    foreach ($friend->users as $value) {
        $count++;
        if($count>10)
        {
            break;
        }
        else{
            echo $value->name;
            echo '@'.$value->user->screen_name;
            echo "<br>";
        }

    };

    ?>
    <p><a href="signout.php">Sign out</a> </p>
<?php else : ?>
    <p><a href="<?php echo $auth->getAuthUrl();?>">Sign in with Twitter</a> </p>
<?php endif; ?>


