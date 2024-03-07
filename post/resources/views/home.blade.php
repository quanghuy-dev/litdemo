<html>

<head>
    <title>Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="card-body">
        <div class="mb-3 text-end">
          
            <button type="button" class="btn btn-primary" onclick="logout()">Logout</button>
            <p id='username'></p>
        </div>
        <table id='listpost'>

            <tr>
                <th style="padding-right: 150px;">ID</th>
                <th style="padding-right: 150px;">Title</th>
                <th style="padding-right: 150px;">Description</th>
                <th style="padding-right: 150px;">Image</th>
                <th style="padding-right: 150px;">Status</th>
            </tr>



        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            me();
            getpost();
        });

        user_token = window.localStorage.getItem('token');

        function me() {
            $.ajax({
                type: 'GET',
                url: '/api/me',
                headers: {
                    'Authorization': 'Bearer ' + user_token
                },
                success: function(response) {
                    $("#username").text("Welcome " + response.user.name);
                    if (response.user == null) {
                        window.location.replace('/login');
                    }
                }
            });

        }

        function getpost() {
            $.ajax({
                type: 'GET',
                url: '/api/posts',
                headers: {
                    'Authorization': 'Bearer ' + user_token
                },
                success: function(response) {
                    $("#listpost").html(data);
                }
            });
        }

        function logout() {
            $.ajax({
                type: 'POST',
                url: '/api/auth/logout',
                headers: {
                    'Authorization': 'Bearer ' + user_token
                },
                success: function(response) {
                    window.location.replace('/login');
                }
            });
        }
    </script>
</body>

</html>