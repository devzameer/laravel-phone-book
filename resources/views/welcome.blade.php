<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <body>

            <div class="mt-5">
                  
                   <h1> <p class="text-center">Welcome to Phone Book</p> </h1>
                    
            </div>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="d-grid gap-2 col-6 mx-auto">
          <a href="/signup">  <button class="btn btn-primary btn-lg">
                Signup
            </button>
            </a>
        </div>     
        <br>
        <br>
        
          <div class="d-grid gap-2 col-6 mx-auto">
            <a href="/login"> <button class="btn btn-primary btn-lg">
                Login
            </button>
            </a>
        </div>         
        
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
