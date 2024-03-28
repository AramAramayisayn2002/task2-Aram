
<div class="containerLogin">
    <div class="Con flex">
        <div class="containerMe ">
            <div class="loginContainer">
                <div class="loginTitle">
                    <div class="info">
                        <h2 class="infoTitle">WELCOME</h2>
                    </div>
                    <div class="info">
                        <p class="p3">here you can access the management page</p>
                    </div>
                </div>
                <div class="login">
                    <form action="http://localhost/intership/cms/admin/admin/login" method="post">
                        <div class="loginInputs">
                            <input type="text" name = "login" class="inputs" placeholder="Username">
                        </div>
                        <div class="loginInputs relative">
                            <input type="password" name = "password" id="logpassword" class="inputs" placeholder="Password">
                            <div id="iconPass" class="absolute">
                                <i id="passwordIcon" class="fa fa-eye-slash icons"></i>
                            </div>
                        </div>
                        <div class="loginInputs flex between">
                            <div class="box relative">
                                <input type="checkbox" name = "remember_me" id="saveAs" class="checkbox">
                                <label class="label" for="saveAs">Remember me</label>
                            </div>
                            <div class="box">
                                <button type="submit" name = "log_button" id="log_btn" class="logButton">Login</button>
                            </div>
                        </div>
                    </form>
                    <div id="msgLog">
                        <div class="msg msg-false" role="alert">
                            <p class = "p5"><?= (isset($_SESSION['msg_admin_login'])) ? $_SESSION['msg_admin_login'] : null ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
