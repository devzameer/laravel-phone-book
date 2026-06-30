<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: 100vh;
            margin: 0;
            background: #ffffff !important;
            background-image: none !important;
            color: #111827;
            opacity: 1 !important;
            filter: none !important;
        }

        .signup-shell {
            min-height: 100vh;
            padding: 48px 16px;
            background: #ffffff;
        }

        .signup-card {
            width: 100%;
            max-width: 560px;
            border: 0;
            border-radius: 24px;
            box-shadow: 0 20px 55px rgba(15, 23, 42, 0.08);
            background: #ffffff;
        }
    </style>
</head>
<body>
    <div class="signup-shell d-flex justify-content-center align-items-center">
        <div class="card signup-card p-4 p-md-5">
            <h2 class="text-center mb-4 fw-bold">User Signup</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('signup.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" minlength="3" pattern="[A-Za-z ]+" placeholder="Enter your full name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required placeholder="Enter your email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3" minlength="5" placeholder="Enter your address">{{ old('address') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" required pattern="^(\+92|0)?3[0-9]{9}$" placeholder="03XXXXXXXXX" value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="3" minlength="5" placeholder="Enter notes">{{ old('notes') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required minlength="8" placeholder="Enter password">
                </div>

                <div class="mb-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required minlength="8" placeholder="Confirm password">
                </div>
                                <div class="mt-3 text-center">
                    <p class="mb-2 text-muted">Already have an account?</p>
                    <a href="/login" class="">Login</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Signup</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
