<html>

<head>
    <title>Laravel 9 Custom Login Form with Jquery Ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 90px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #frm_login {
            padding: 20px;
        }

        .has-error {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Laravel 9 Custom Login Form with Jquery Ajax</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form name="frm_login" class="form" id="frm_login">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="mb-3">
                                <label for="email" class="text-info">Email:</label>
                                <input type="text" class="form-control" size="10px" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="text-info">Password:</label>
                                <input type="password" class="form-control" size="10px" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" onclick="login()">Sign In</button>
                            </div>
                            <div id="err" style="color: red"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        function login() {

            var data = $("#frm_login").serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/api/login',
                data: data,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        window.location.replace('/home');
                    } else {
                        $("#err").hide().html("email or Password  Incorrect. Please Check").fadeIn('slow');
                    }
                }
            });

        }
    </script>
</body>

</html>