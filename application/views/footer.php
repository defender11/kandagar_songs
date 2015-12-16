            <div class="boxFooter">
                <?php
                $createDate = 2015;
                $currentDate = date("Y");
                $hostName = $_SERVER['HTTP_HOST'];

                if(!($createDate == $currentDate)) {
                    echo "<a href='http://$hostName/kandagar_songs/' alt='$hostName'>$hostName"."<i class='fa fa-copyright'></i>".$createDate." - ".$currentDate."</a>";
                } else {
                    echo "<a href='http://$hostName/kandagar_songs/' alt='$hostName'>$hostName"."<i class='fa fa-copyright'></i>".$createDate."</a>";
                }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>