<?php require_once 'header_start_view.php'; ?>
    <div class="box">
    <div class="boxCheck">
        <hr />
        <p><strong>md5 Code</strong></p>
        <form class="" method="POST" action="">
            <p>PASSWORD: <input type="text" name="passCode" class="" placeholder="" required> <input type="submit" class="" value="Жмакнуть"/></p>
        </form>
        <span class="passw_out">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['passCode'])) {
                $passMD5 = md5(strip_tags($_POST['passCode']));
                echo "For DB:  " . $passMD5;
                echo "<br />";
                echo "For ch:  " . $passMD5."5z9#Ax";
            }
            ?>
        </span>
        <hr />
    </div>
<?php require_once 'footer.php'; ?>