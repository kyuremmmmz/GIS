<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Game Information Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/application/resources/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background: linear-gradient(rgba(12, 7, 7, 0.5), rgba(0, 0, 0, 0.5)), url('https://scontent.fcrk4-2.fna.fbcdn.net/v/t1.15752-9/441879105_896435548917242_5713572804100598521_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEKwFwE4NmuowScOxp4YfiM7A7WFB9G8SPsDtYUH0bxI9oBpsqojEYdo4YNwwHmI5zzGCk6Dk2EGsxWpkqRpaKe&_nc_ohc=HJisuzyYBkAQ7kNvgGpSoFN&_nc_ht=scontent.fcrk4-2.fna&oh=03_Q7cD1QFmUwvtgnmDyT_BLe1Y70Se9IFyVkR4p4MQ29hhIBcwgA&oe=66866DC5' );
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body class="bgW d-flex flex-column justify-content-center align-items-center vh-100" onpageshow="if (event.persisted) noBack();" onUnload="">

        <img src="https://scontent.fcrk4-2.fna.fbcdn.net/v/t1.15752-9/361839816_594450056207554_5067445039035230165_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH7aVd9xyUPlxsDrw1HGupokKj6k4-Hb5-QqPqTj4dvn469EAukG5ZNsWA_cyMs37BNKmn5QYbzvKCBQ6xFxPf4&_nc_ohc=84g4L3woZVQQ7kNvgFXN0RZ&_nc_ht=scontent.fcrk4-2.fna&oh=03_Q7cD1QFSljQWGhWTfu5mpa4p0iI8TNz8y-Th9RLoJQYlV7_W8w&oe=667D3269" class="bg-transparent h-50 rounded-circle" alt="" srcset="">

    <div class="container text-center">
        <h1 class="mb-4 text-white">Welcome to Game Information Management System</h1>
        <h2 class="mb-4 text-white">Are you?</h2>
        <div class="gap-3 mx-auto d-grid col-6">

                <a href="{{route('admin.seeLogin')}}" class=" btn btn-primary btn-lg">Committee</a>


                <a href="{{route('login')}}" class="btn btn-success btn-lg">Admin</a>


                <a href="{{route('seeGuest')}}" class="btn btn-secondary btn-lg">Guest</a>
        </div>
    </div>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
