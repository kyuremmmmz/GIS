<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Account Settings</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<a href="{{route('top3')}}" class="btn btn-primary w-auto">Back</a>

<div class="container mt-5">
    <!-- Account Settings -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Account Settings</h5>
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
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title mb-0">Change Password</h5>
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
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title mb-0">Delete Account</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Are you sure you want to delete your account? This action cannot be undone.</p>
                    <!-- Delete Account Button -->
                    <button type="button" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
