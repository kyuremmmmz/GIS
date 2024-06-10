<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Account Settings</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-header-custom {
            background-color: red;
            color: white;
        }
        .btn-custom {
            background-color: red;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<a href="{{route('top3')}}" class="w-auto btn btn-primary">Back</a>

<div class="container mt-5">
    <!-- Account Settings -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="text-white card-header bg-primary">
                    <h5 class="mb-0 card-title">Account Settings</h5>
                </div>
                @if (session('status'))
                    <p class="alert alert-success">{{ session('status') }}</p>
                @endif
                <div class="card-body">
                    <!-- Settings Form -->
                    <form method="POST" action="{{ route('UpdateUser', ['user' => Auth::guard('committees')->id()]) }}">
                        @csrf
                        @method('put')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ Auth::guard('committees')->user()->name }}" id="name" name="name">
                        </div>
                        <!-- Committee ID -->
                        <div class="mb-3">
                            <label for="comitteeID" class="form-label">Committee ID</label>
                            <input type="text" readonly class="form-control" id="comitteeID" value="{{ Auth::guard('committees')->user()->comitteeID }}" name="comitteeID">
                        </div>
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::guard('committees')->user()->email }}">
                        </div>
                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Save Changes</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Password Change -->
    <div class="mt-5 row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="mb-0 card-title">Change Password</h5>
                </div>
                <div class="card-body">
                    <!-- Password Change Form -->
                        @csrf
                        @method('put')
                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <!-- Confirm New Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <!-- Change Password Button -->
                        <button type="submit" class="btn btn-warning">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Deletion -->
    <div class="mt-5 row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="mb-0 card-title">Delete Account</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Are you sure you want to delete your account? This action cannot be undone.</p>
                    <!-- Delete Account Button -->
                        <button type="button" data-bs-target="#create" data-bs-toggle="modal" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h3 class="modal-title" id="createModalLabel">Are you sure you want to delete this account?</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" readonly class="form-control" id="name" name="name" required value="{{Auth::guard('committees')->user()->name}}">
                    </div>
                    <form action="{{ route('deleteUser', ['user' => Auth::guard('committees')->id()]) }}" method="post">
                        @csrf
                        @method('delete')
                    <button type="submit" class="btn btn-custom">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
