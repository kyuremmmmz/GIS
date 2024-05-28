<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Optional: Add your custom styles here */
        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 300px;

        }
    </style>
</head>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="container form-floating">
        <div class="login-card">
            @if (session('status'))
            <div class="alert alert-danger">{{session('status')}}</div>@endif


            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4  font-bold text-[30px]">Login</h2>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="text" class="form-label">AdminID</label>
                            <input type="text" class="form-control fl" id="adminID" name="adminID" placeholder="ex: 03-2324-...." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="d-grid">
                            <p class="mt-1">Already a member? <a href="{{route('admin.see')}}" class=" alert-link hover:text-slate-500">Sign up</a></p>
                        </div>
                        <p class="mt-1 ">------------------ <a href="{{route('forgotpassword')}}" class="underline ">Forgot password?</a>  ------------------</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
    </script>
</body>
</html>
