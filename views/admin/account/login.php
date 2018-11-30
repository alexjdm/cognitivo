
<div class="login-box">
    <div class="login-logo">
        <b>Cognitivo</b>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" id="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" id="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <!--<div class="checkbox icheck">
                        <label>
                            <input id="remember" type="checkbox"> Recordarme
                        </label>
                    </div>-->
                </div><!-- /.col -->
                <div class="col-xs-5">
                    <a id="loginBtn" class="btn btn-primary btn-block btn-flat" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando">Entrar</a>
                </div><!-- /.col -->
            </div>
        </form>

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>-->

        <a href="index.php?controller=Account&action=remember">Olvidé mi contraseña</a><br>
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
    <br>
    <div id="login-box-message"></div>

</div><!-- /.login-box -->

<script>
    $(function() {

        $('#loginBtn').click(function (){
            var pathname = window.location.pathname; //console.debug(pathname);
            var url      = window.location.href;     //console.debug(url);
            var index = url.lastIndexOf("/");
            var url2 = url.substr(0, index+1); //console.debug(url2);
            //var e = 'ajax.php?controller=Account&action=validation';
            var e = 'account/dologin/';
            //console.debug(url2 + e);

            var email = $("#email").val(); //console.debug(email);
            var password = $("#password").val(); //console.debug(password);
            //var remember = $("remember").checked;

            $.ajax({
                type: 'POST',
                url: e,
                data: { email: email, password: password },
                dataType : "json",
                beforeSend: function() {
                    $('#loginBtn').button('loading');
                },
                success: function(data) {
                    console.debug(data);
                    //console.debug('Redireccionar a views/home/index.php');
                    $('#loginBtn').button('reset');
                    if(data.status == 'success')
                    {
                        //console.debug("Login ok");
                        window.location.href = "admin/home/";
                    }
                    else
                    {
                        //console.debug("Login fail");
                        $('#login-box-message').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                    }

                },
                error: function(data) {
                    console.debug(data);
                    //console.debug('Redireccionar a views/account/login.php');
                    $('#loginBtn').button('reset');
                    $('#login-box-message').html('<div class="alert alert-danger" role="alert">' + data.message + '</div>');
                }
            });
        });

    });
</script>