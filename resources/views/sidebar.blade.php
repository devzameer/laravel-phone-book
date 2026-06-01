<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white" id="sidebar-wrapper" style="width: 250px; height: 100vh;">
            <div class="sidebar-heading p-3">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Profile</a>
            </div>
        </div>

        <!-- Page Content -->
        {{-- <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                </div>
            </nav>

            <!-- Main Content Area Jahan har page ka data aye ga -->
            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div> --}}
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://jsdelivr.net"></script>
</body>
</html>
