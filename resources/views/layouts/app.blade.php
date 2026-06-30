<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        :root {
            --bg: #f4f7fb;
            --surface: #ffffff;
            --surface-soft: #f8fbff;
            --border: #dde5ef;
            --text: #142033;
            --muted: #66758f;
            --brand: #174a7e;
            --brand-2: #0f6b6e;
            --accent: #e6f2ff;
            --shadow: 0 24px 60px rgba(20, 32, 51, 0.08);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Manrope', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(23, 74, 126, 0.14), transparent 30%),
                radial-gradient(circle at top right, rgba(15, 107, 110, 0.12), transparent 26%),
                var(--bg);
            color: var(--text);
        }

        .app-shell { min-height: 100vh; }

        .app-navbar {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(221, 229, 239, 0.9);
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            letter-spacing: 0.05em;
            box-shadow: var(--shadow);
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #10243f 0%, #0f1e33 100%);
            color: #fff;
            min-height: calc(100vh - 73px);
            position: sticky;
            top: 73px;
            box-shadow: var(--shadow);
        }

        .sidebar-link {
            border: 0;
            color: rgba(255, 255, 255, 0.82);
            background: transparent;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .content-wrap { padding: 1.5rem; }

        .surface-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(221, 229, 239, 0.85);
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        .soft-card {
            background: linear-gradient(180deg, #ffffff, #f8fbff);
            border: 1px solid rgba(221, 229, 239, 0.9);
            border-radius: 22px;
            box-shadow: 0 14px 35px rgba(20, 32, 51, 0.05);
        }

        .avatar-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            letter-spacing: 0.02em;
            overflow: hidden;
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-menu {
            position: relative;
        }

        .profile-toggle {
            border: 1px solid rgba(221, 229, 239, 0.95);
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 40px rgba(20, 32, 51, 0.08);
            border-radius: 22px;
            padding: 0.6rem;
            transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
        }

        .profile-toggle:hover,
        .profile-toggle:focus-visible,
        .profile-toggle.show {
            transform: translateY(-1px);
            border-color: rgba(23, 74, 126, 0.28);
            box-shadow: 0 22px 50px rgba(20, 32, 51, 0.12);
        }

        .profile-toggle .chevron {
            width: 1rem;
            height: 1rem;
            color: var(--muted);
            transition: transform 180ms ease;
        }

        .profile-toggle.show .chevron {
            transform: rotate(180deg);
        }

        .profile-menu .dropdown-menu {
            min-width: 100%;
            margin-top: 0.75rem;
            opacity: 0;
            transform: translateY(-8px) scale(0.98);
            transform-origin: top right;
            transition: opacity 160ms ease, transform 160ms ease;
        }

        .profile-menu .dropdown-menu.show {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .profile-menu .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            border-radius: 12px;
        }

        .profile-menu .dropdown-item:hover,
        .profile-menu .dropdown-item:focus {
            background: rgba(23, 74, 126, 0.08);
        }

        .profile-menu .dropdown-item.text-danger:hover,
        .profile-menu .dropdown-item.text-danger:focus {
            background: rgba(220, 53, 69, 0.08);
        }

        @media (max-width: 575.98px) {
            .profile-toggle {
                padding: 0.5rem;
            }
        }

        .table thead th {
            color: var(--muted);
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom-color: var(--border);
        }

        .table tbody td {
            vertical-align: middle;
            border-color: rgba(221, 229, 239, 0.65);
        }

        .page-title {
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .subtle-text { color: var(--muted); }

        .btn-brand {
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            border: 0;
            color: #fff;
        }

        .btn-brand:hover { color: #fff; opacity: 0.95; }

        .dropdown-menu {
            border: 1px solid rgba(221, 229, 239, 0.9);
            box-shadow: var(--shadow);
            border-radius: 18px;
        }

        .dropdown-item { border-radius: 12px; }
    </style>
</head>
<body>
<div class="app-shell d-flex flex-column">
    <nav class="navbar app-navbar navbar-expand-lg sticky-top py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-3 fw-bold text-dark" href="{{ route('dashboard') }}">
                <span class="brand-mark">PB</span>
                <span>Phone Book Dashboard</span>
            </a>

            <div class="dropdown profile-menu ms-auto">
                <button class="profile-toggle d-flex align-items-center justify-content-center text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open profile menu">
                    <span class="avatar-circle" style="width:58px;height:58px;">
                        @if (auth()->user()->profile_image)
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="{{ auth()->user()->name ?? 'Account' }}" class="avatar-image">
                        @else
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        @endif
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2 mt-2 border-0">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <span class="avatar-circle" style="width:34px;height:34px;font-size:0.8rem;">
                                @if (auth()->user()->profile_image)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="{{ auth()->user()->name ?? 'Account' }}" class="avatar-image">
                                @else
                                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                                @endif
                            </span>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <span class="avatar-circle" style="width:34px;height:34px;font-size:0.8rem;background:linear-gradient(135deg,#dc3545,#b02a37);">L</span>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex flex-grow-1">
        <aside class="sidebar p-3 d-none d-lg-flex flex-column gap-2">
            <div class="p-3 mb-2">
                <div class="small text-uppercase text-white-50 fw-semibold">Workspace</div>
                <div class="h4 mb-0">Contacts</div>
            </div>
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('contacts.create') }}" class="sidebar-link {{ request()->routeIs('contacts.create') ? 'active' : '' }}">Add Contact</a>
            <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
        </aside>

        <main class="flex-grow-1 content-wrap">
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                    <div class="fw-semibold mb-1">Please fix the following:</div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>