<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <body>
<div class="d-flex justify-content-center align-items-center mb-5  mt-5">

    <div class="card p-4 shadow" style="width: 500px;">

        <h2 class="text-center mb-4">
            User Signup
        </h2>

      <form action="{{ route('signup.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <!-- Profile Image -->
    <div class="mb-3">
        <label class="form-label">
            Profile Image
        </label>

        <input type="file" name="profile_image" class="form-control">
    </div>

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">
            Full Name
        </label>

        <input type="text" name="name" class="form-control" placeholder="Enter your name">
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">
            Email Address
        </label>

        <input type="email" name="email" class="form-control" placeholder="Enter your email">
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label class="form-label">
            Address
        </label>

        <textarea name="address" class="form-control" rows="3"></textarea>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label class="form-label">
            Phone Number
        </label>

        <input type="text" name="phone" class="form-control" placeholder="03XXXXXXXXX">
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
        <label class="form-label">
            Date of Birth
        </label>

        <input type="date" name="date_of_birth" class="form-control">
    </div>

    <!-- Notes -->
    <div class="mb-3">
        <label class="form-label">
            Notes
        </label>

        <textarea name="notes" class="form-control" rows="3"></textarea>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">
            Password
        </label>

        <input type="password" name="password" class="form-control" placeholder="Enter password">
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label class="form-label">
            Confirm Password
        </label>

        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100">
        Signup
    </button>

</form>
    </div>

</div>
               
               
                    
            </div>
            
           
        
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
