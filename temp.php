<?php
require_once 'vendor/autoload.php';
require_once 'app/init.php';

$auth = new auth($client);
?>




<!--Find Any Person-->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="temp.php">
                <input type="text" name="searchname" class="form-control"
                       placeholder="Search Anyone Here(Screen Name)" required="required">
                <br>
                <button type="submit" class="btn btn-primary">Go</button>
                <?php
                $name = $_POST['searchname'];
                ?>
            </form>
            <br>
            <form method="post" action="pdfDownload.php" target="_blank">
                <input type="text" name="search_name" value="<?php echo $name; ?>" hidden>
                <?php
                if (!isset($name)) {
                    ?>
                    <button class="btn btn-primary" type="submit" disabled>Generate Tweets as PDF</button>
                    <?php
                } else {
                    ?>
                    <button class="btn btn-primary" type="submit">Generate Tweets as PDF</button>
                    <?php
                }
                ?>

            </form>

        </div>
        <!------------------------------------------>




        <!-- Searched Person's Tweets-->
        <?php
        if (isset($name)) {
            $followers = (array)$client->follower_list('screen_name=' . $name);
            ?>

            <div id="card2" class="col-md-4">
                <div class="card text-white bg-secondary mb-3" style="width: 22rem;">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $name ?>'s tweets</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        $count = 1;
                        foreach ($tweets as $value) {
                            if ($count == 1 && !isset($value->text)) {
                                echo 'User doesn\'t exists.';
                                break;
                            }
                            if (isset($value->text)) {
                                ?>
                                <li class="list-group-item  bg-secondary">
                                    <?php
                                    echo $value->text . '<br>';
                                    echo 'At: ' . $value->created_at . '<br>';
                                    ?>
                                </li>
                                <?php
                            } else {
                                break;
                            }
                            $count++;
                        };
                        ?>
                    </ul>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>
