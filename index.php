<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
    echo $_SESSION['oauth_token'].$_SESSION['oauth_token_secret'];
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
    //$arr=array();
    $count=0;
    foreach($friend as $row => $innerArray) {
        foreach ($innerArray as $innerRow => $value) {
            if($count>10)
            {
                break;
            }
            else
            {
                //check
               // array_push($arr,$value->name);
                $client->setToken($value->screen_name);
                // $client->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
                $freiendinfo = (array) $client->statuses_homeTimeline();
                print "<pre>";
                print_r($friend);
                print "</pre>";
                echo $value->name . "<br/>";
            }

        };
    };
    //print_r($arr);
    $check =(array) $client->search_tweets('t=Twitter', true);
    echo $check;
    ?>

    <p><a href="signout.php">Sign out</a> </p>
<?php else : ?>
    <p><a href="<?php echo $auth->getAuthUrl();?>">Sign in with Twitter</a> </p>
<?php endif; ?>


