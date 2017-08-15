<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles.css">
<?php
require_once 'vendor/autoload.php';
require_once 'app/init.php';

$auth = new auth($client);
?>

<?php if ($auth->signedIn()): ?>
    <?php
    $client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    $twit = (array)$client->statuses_homeTimeline();
    foreach ($twit as $value) {
        if ($value->user->id == $_SESSION['user_id']) {
            $user_name = $value->user->name;
            $user_screen_name = $value->user->screen_name;
            break;
        }
    };
    ?>

    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h4 class="text-white"><?php echo $user_name ?></h4>
                <span class="text-muted"><?php echo $user_screen_name ?>
                    <span class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="signout.php">Sign Out</a>
                    </div>
                </span>
                </span>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    </div>
    <br>
    <br>
    <?php
    // $client->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);

    //echo $_SESSION['user_id'];

    // print "<pre>";
    //print_r($twit);
    //print "</pre>";

    //echo "<br>";

    $count = 0;
?>
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class=img_fluid" src="./images/pic.jpg">
                <div class="carousel-caption">
                    <h1> <?php echo 'Let\'s Go'?></h1>
                </div>
            </div>
            <?php
            foreach ($twit as $value) {
                $count++;
                if ($count > 10) {
                    break;
                } else {
                    if ($value->user->id == $_SESSION['user_id']) {
                        ?>
                        <div class="carousel-item">
                            <img class=img_fluid" src="./images/pic.jpg">
                            <div class="carousel-caption">
                                <h1> <?php echo $value->text ?></h1>
                                <p>Tweeted at : <?php echo $value->created_at ?></p>
                            </div>
                        </div>
            <?php
            }
                }
            };
            ?>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</div>

    <?php
    echo '<br>'.'mytweets' . '<br>';


    /*echo 'othertweets'.'<br>';
    $count=0;
    foreach ($twit as $value) {
        $count++;
        if($count>10)
        {
            break;
        }
        else{
            if($value->user->id!=$_SESSION['user_id'])
            {
                echo $value->user->name;
                echo $value->user->screen_name;
                echo $value->text;
                echo $value->created_at;
                echo "<br>";
            }

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
                echo $value->name . "<br>";
            }

        };
    };
    //print_r($arr);
    ?>

    <p><a href="signout.php">Sign out</a> </p>*/ ?>
<?php else : ?>
    <div id="twit" class="fa fa-twitter">
        <br><br>
        <a id="link" href="<?php echo $auth->getAuthUrl(); ?>">Sign In</a>
    </div>
    </div>
<?php endif; ?>


