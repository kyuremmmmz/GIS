<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                            <h3 class="card-title">Email Verification</h3>
                            <p>We have sent an email to your email address including a verification code.<br>Please enter the code into the field below:</p>
                            <div id="ErrorText" style="display: none;" class="alert alert-danger">
                            </div>
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Verification Code" name="code">
                                    </div>
                                    <button type="button" name="cont-button" class="btn btn-lg btn-warning btn-block" style="margin-bottom: 10px;" onclick="ContinuePressed()">Continue</button>
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
