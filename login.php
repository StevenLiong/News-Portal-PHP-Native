<?php
include('include/config.php');
include('include/header.php');
?>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<div class="col-md-2" style="float:left; display: inline-block;"></div>
<div class="account-content col-md-8" style="float:left; display: inline-block;">
    <form class="form-horizontal" method="post" action="cek_login.php">

        <div class="form-group">
            <div class="col-xs-8">
                <input class="form-control" type="text" required name="username" placeholder="Username or email" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-8">
                <input class="form-control" type="password" name="password" required placeholder="Password" autocomplete="off">
            </div>
        </div>
        <center>
        <div class="g-recaptcha" data-sitekey="6LccLF0cAAAAAMuywsnn8KevtMgTEyvONoHpKk6L"></div>
        </center>
        <div class="form-group account-btn text-center m-t-10" style="margin-top: 10px;">
            <div class="col-xs-8">
                <button class="btn w-md btn-bordered btn-success waves-effect waves-light" type="submit" name="login">Log In</button>
                <a href="register.php">
                <button class="btn w-md btn-bordered btn-warning waves-effect waves-light" type="button" name="register">Register</button>
                </a>
            </div>
        </div>

    </form>

    <div class="clearfix"></div>

</div>

</body>


