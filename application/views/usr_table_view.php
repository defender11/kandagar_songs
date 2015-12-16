<?php require_once 'header_start_view.php'; ?>
    <div class="bg">
    <div class="box">
    <div class="boxCheck">
        <style>
            .box, .boxCheck, .boxFooter {
                display: block;
                position: relative;
                width: 970px;
                margin: 0 auto;
            }
            table {
                border: 1px solid;
                position: relative;
                margin: 0 auto;
            }
            table caption {
            }
            table tr th {
                background: rgb(0, 0, 0) none repeat scroll 0% 0%;
                color: rgb(255, 255, 255);
            }
            table tr:nth-child(even) {
                background: #808080;
            }
            table tr:nth-child(odd) {
                background: #CFCFCF;
            }
            table tr:hover {
                background: #333;
                color: #fff;
            }

        </style>
        <form action="" method="post">
            <p><span class="usr_input"></span><input type="text" name="usr" class="boxCheckName" placeholder="You name" required></p>
            <p><span class="usr_input"></span><input type="text" name="usr" class="boxCheckPass" placeholder="You password" required readonly></p>
            <p><span class="usr_input_encryption_key"></span><input type="text" name="usr_encryption_key" class="boxCheckName" placeholder="Key md5" required readonly></p>
            <input type="submit" class="usr_creat">
        </form>
        <hr />
        <p><strong>md5 Code</strong></p>
        <form class="usr_table_md5_create" method="POST" action="">
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
        <table border="1" cellspacing="1" cellpadding="1" align="center" width="50%">
            <caption>DB USER </caption>
            <tr>
                <th>User</th>
                <th>Key</th>
            </tr>
            <?php foreach ($usrTable as $value) { ?>
                <tr style="text-align: center;"><td><?php echo $value['u_name']; ?></td><td><?php echo $value['u_key']; ?></td></tr>
            <?php } ?>
        </table>
    </div>
<?php require_once 'footer.php'; ?>