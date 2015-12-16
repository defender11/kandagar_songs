<?php require_once 'header_start_view.php'; ?>
    <div class="boxCheckRestoreBg"></div>
    <div class="bg">
        <div class="box">
            <div class="boxCheck">
                <div class="header">
                    <h1 class="boxHeaderTxt"><i class="fa fa-users"></i>  <span class="headerTxt1">SINGING ON </span> <span class="headerTxt2">WEDNESDAYS</span></h1>
                </div>
                <div class="showMsgMail"></div>
                <form class="boxCheckSend" method="POST" action="<?php echo base_url(); ?>start/login">
                    <h2>Authorization</h2>
                    <p><span>Name: </span><input type="text" name="boxCheckName" class="boxCheckName" placeholder="" required></p>
                    <div class="clear"></div>
                    <p><span>Password: </span><input type="password" name="boxCheckPass" class="boxCheckPass" placeholder="" required></p>
                    <div class="clear"></div>
                    <span class="btnCheckRestoreStart">Restore password</span>
                    <input type="submit" class="btnSendAuth" value="Enter"/>
                </form>

                <div class="boxCheckRestore">
                    <span class="boxCheckRestoreBtnClose"><i class="fa fa-times"></i></span>
                    <span>Restore Password</span>
                    <input type="text" class="boxCheckRestoreEmail" style="margin: 10px auto;" placeholder="Enter you email">
                    <span class="boxCheckRestoreBtn"><i class="fa fa-check"></i></span>
                    <div class="showMsgRestore"></div>
                </div>
            </div>

<?php require_once 'footer.php'; ?>