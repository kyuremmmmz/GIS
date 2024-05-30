<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Bootstrap Account System Pages</title>
</head>
<body>
    <main role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4" style="margin-top: 25vh">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Please Sign In</h3>
                            <div id="ErrorText" style="display: none;" class="alert alert-danger">
                            </div>
                            <form role="form" method="POST" action="{{route('email.forgotpassword')}}">
                                @csrf
                                @method('post')
                                @if (session('status'))
                                <div>
                                    <p class="alert alert-success">{{session('status')}}</p>
                                </div>
                                @endif
                                <fieldset>
	                                <div class="form-group">
	                                    <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
	                                </div>
	                                <p>We will send you a link by email to reset your password.</p>
	                                <button type="submit" class="btn btn-lg btn-danger btn-block" style="margin-bottom: 10px;" >Continue</button>
	                                <a href="{{route('admin.seeLogin')}}">Back to Login</a>
	                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <script type="text/javascript">
        function ContinuePressed() {
            DisplayError("Not Implemented");
        }
        function DisplayError(errorText) {
            document.getElementById("ErrorText").innerHTML = errorText;
            document.getElementById("ErrorText").style.display = "block";
        }
        function HideError() {
            document.getElementById("ErrorText").style.display = "none";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
