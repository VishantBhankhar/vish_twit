<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles.css">
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
    //print "<pre>";
    //print_r($friend);
    //print "</pre>";
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
    <div id="twit" class="fa fa-twitter">
            <a id="link" href="<?php echo $auth->getAuthUrl();?>">Sign In</a>
        </div>
    </div>
<?php endif; ?>


