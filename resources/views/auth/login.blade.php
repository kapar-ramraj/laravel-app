<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{session()->has('register') && session('register') ? '' : 'active'}}" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login" type="button" role="tab">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{session()->has('register') && session('register') ? 'active' : ''}}" id="register-tab" data-bs-toggle="tab"
                                    data-bs-target="#register" type="button" role="tab">Register</button>
                            </li>
                        </ul>
                        {{-- Show Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="tab-content" id="authTabsContent">
                            {{-- Login Form --}}
                            <div class="tab-pane fade {{session()->has('register') && session('register')? '' : 'show active'}}" id="login" role="tabpanel">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="loginEmail" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="loginEmail"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="loginPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="loginPassword"
                                            required>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="remember" class="form-check-input"
                                            id="rememberCheck">
                                        <label class="form-check-label" for="rememberCheck">Remember me</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>

                            {{-- Register Form --}}
                            <div class="tab-pane fade {{session()->has('register') && session('register') ? 'show active' : ''}}" id="register" role="tabpanel">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">First Name</label>
                                        <input type="text" name="fname" class="form-control" id="registerName"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Last Name</label>
                                        <input type="text" name="lname" class="form-control" id="registerName"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="registerEmail" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="registerEmail"
                                            required>
                                        @error('email')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="registerName"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="registerPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="registerPassword" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="registerPasswordConfirm" class="form-label">Confirm
                                            Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="registerPasswordConfirm" required>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
