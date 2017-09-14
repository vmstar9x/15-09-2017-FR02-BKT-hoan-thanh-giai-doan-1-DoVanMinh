<?php
startHeader();
setTitle($title);
includeStyle('bootstrap.css');
includeStyle('icons.css');
includeStyle('login.css');
includeStyle('stylesheet.css');
includeStyle('stylesheets.css');
endHeader();
?>

<div class="loginBox">
    <div class="loginHead">
        <img src="<?php echo includeImage('', 'logo.png') ?>" alt="NTQ Solution Admin Control Panel" title="NTQ Solution Admin Control Panel"/>
    </div>
    <form class="form-horizontal" action="<?php echo BASE_URL . LOGIN?>" method="POST">
        <div class="control-group">
            <label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" name="username" value="<?php echo $account['username'];?>" />
            <p id = 'notifyMessage'><?php echo $message['name']?></p>
        </div>
        <div class="control-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" name="pass"/> 
            <p id = 'notifyMessage'><?php echo $message['pass']?></p>
        </div>
        <div class="control-group" style="margin-bottom: 5px;">
            <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <div class="control-group" style="margin-bottom: 5px;">
            <center><p id = 'notifyMessage'><?php echo $message['account']?></p></center>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-block" name="btn-login">Login</button>
        </div>
    </form>

</div>

<?php
getFooter();
?>