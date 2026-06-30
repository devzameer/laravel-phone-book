<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <body>
          <div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4" style="width: 400px;">

        <h2 class="text-center mb-4">Login Page</h2>

        <form action="{{ route('login.user') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">
            Email address
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            id="exampleInputEmail1"
        >

        <div class="form-text">
            We'll never share your email with anyone else.
        </div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control"
            id="exampleInputPassword1"
        >
    </div>

    <div class="mb-3 form-check">

        <input
            type="checkbox"
            class="form-check-input"
            id="exampleCheck1"
        >

        <p>If you don't have account please signup</p>

        <a href="/signup">Signup</a>

    </div>

    <button type="submit" class="btn btn-primary w-100">
        Login
    </button>

</form>

    </div>

</div>
           
        
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
