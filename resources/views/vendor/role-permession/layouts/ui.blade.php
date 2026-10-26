<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Roles') — Role Permissions</title>
    <style>
        :root {
            --rp-bg: #f3f5f7;
            --rp-surface: #ffffff;
            --rp-ink: #1a2332;
            --rp-muted: #5b6b7c;
            --rp-line: #d8dee6;
            --rp-accent: #0f6b5c;
            --rp-accent-soft: #e6f4f1;
            --rp-danger: #b42318;
            --rp-danger-soft: #fef3f2;
            --rp-warn: #b54708;
            --rp-radius: 12px;
            --rp-shadow: 0 1px 2px rgba(26, 35, 50, 0.06), 0 8px 24px rgba(26, 35, 50, 0.04);
            --rp-font: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: var(--rp-font);
            color: var(--rp-ink);
            background:
                radial-gradient(1200px 500px at 10% -10%, #d9efe9 0%, transparent 55%),
                radial-gradient(900px 400px at 100% 0%, #e8eef5 0%, transparent 50%),
                var(--rp-bg);
            min-height: 100vh;
        }
        a { color: var(--rp-accent); text-decoration: none; }
        a:hover { text-decoration: underline; }

        .rp-shell { max-width: 980px; margin: 0 auto; padding: 28px 20px 48px; }
        .rp-top {
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; margin-bottom: 22px; flex-wrap: wrap;
        }
        .rp-brand { display: flex; flex-direction: column; gap: 2px; }
        .rp-brand strong { font-size: 1.25rem; letter-spacing: -0.02em; }
        .rp-brand span { color: var(--rp-muted); font-size: 0.9rem; }
        .rp-nav { display: flex; gap: 8px; flex-wrap: wrap; }
        .rp-nav a {
            display: inline-flex; align-items: center;
            padding: 8px 12px; border-radius: 999px;
            color: var(--rp-muted); background: transparent; text-decoration: none;
            border: 1px solid transparent;
        }
        .rp-nav a:hover, .rp-nav a.is-active {
            color: var(--rp-accent); background: var(--rp-accent-soft);
            border-color: #c5e4dd; text-decoration: none;
        }

        .rp-card {
            background: var(--rp-surface);
            border: 1px solid var(--rp-line);
            border-radius: var(--rp-radius);
            box-shadow: var(--rp-shadow);
            overflow: hidden;
        }
        .rp-card-head {
            display: flex; align-items: center; justify-content: space-between;
            gap: 12px; padding: 18px 20px; border-bottom: 1px solid var(--rp-line);
            flex-wrap: wrap;
        }
        .rp-card-head h1 { margin: 0; font-size: 1.1rem; }
        .rp-card-body { padding: 20px; }

        .rp-btn {
            display: inline-flex; align-items: center; justify-content: center;
            gap: 6px; border: 1px solid transparent; border-radius: 10px;
            padding: 9px 14px; font: inherit; font-weight: 600; cursor: pointer;
            text-decoration: none; line-height: 1.2;
        }
        .rp-btn:hover { text-decoration: none; filter: brightness(0.97); }
        .rp-btn-primary { background: var(--rp-accent); color: #fff; }
        .rp-btn-secondary { background: #fff; color: var(--rp-ink); border-color: var(--rp-line); }
        .rp-btn-danger { background: var(--rp-danger-soft); color: var(--rp-danger); border-color: #f5c2c0; }
        .rp-btn-sm { padding: 6px 10px; font-size: 0.85rem; border-radius: 8px; }

        .rp-alert {
            margin-bottom: 16px; padding: 12px 14px; border-radius: 10px;
            background: var(--rp-accent-soft); color: #0b4f44; border: 1px solid #c5e4dd;
        }
        .rp-errors {
            margin-bottom: 16px; padding: 12px 14px; border-radius: 10px;
            background: var(--rp-danger-soft); color: var(--rp-danger); border: 1px solid #f5c2c0;
        }
        .rp-errors ul { margin: 0; padding-left: 18px; }

        table.rp-table { width: 100%; border-collapse: collapse; }
        .rp-table th, .rp-table td {
            text-align: left; padding: 12px 14px; border-bottom: 1px solid var(--rp-line);
            vertical-align: middle;
        }
        .rp-table th { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--rp-muted); }
        .rp-table tr:last-child td { border-bottom: 0; }
        .rp-actions { display: flex; gap: 8px; flex-wrap: wrap; }

        .rp-field { margin-bottom: 18px; }
        .rp-field label { display: block; font-weight: 600; margin-bottom: 6px; }
        .rp-field input[type="text"], .rp-field input[type="search"] {
            width: 100%; max-width: 420px; padding: 10px 12px;
            border: 1px solid var(--rp-line); border-radius: 10px; font: inherit;
            background: #fff;
        }
        .rp-field input:focus { outline: 2px solid #9fd2c7; border-color: var(--rp-accent); }

        .rp-group { margin-bottom: 18px; border: 1px solid var(--rp-line); border-radius: 12px; overflow: hidden; }
        .rp-group-title {
            padding: 10px 14px; background: #f7f9fb; font-weight: 700; font-size: 0.92rem;
            border-bottom: 1px solid var(--rp-line);
        }
        .rp-ability {
            display: grid; grid-template-columns: minmax(160px, 1.2fr) repeat(3, minmax(90px, 1fr));
            gap: 8px; align-items: center; padding: 12px 14px; border-bottom: 1px solid var(--rp-line);
        }
        .rp-ability:last-child { border-bottom: 0; }
        .rp-ability-code { color: var(--rp-muted); font-size: 0.82rem; display: block; margin-top: 2px; }
        .rp-choice {
            display: flex; align-items: center; justify-content: center; gap: 6px;
            padding: 8px; border-radius: 8px; border: 1px solid var(--rp-line); cursor: pointer;
            background: #fff; font-size: 0.85rem;
        }
        .rp-choice:has(input:checked) {
            border-color: var(--rp-accent); background: var(--rp-accent-soft); color: var(--rp-accent); font-weight: 600;
        }
        .rp-choice input { accent-color: var(--rp-accent); }

        .rp-chip {
            display: inline-flex; padding: 3px 8px; border-radius: 999px;
            background: #eef2f6; color: var(--rp-muted); font-size: 0.8rem; margin: 2px;
        }
        .rp-empty { padding: 28px; text-align: center; color: var(--rp-muted); }
        .rp-footer-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 8px; }
        .rp-search { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }

        @media (max-width: 720px) {
            .rp-ability {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .rp-choice { justify-content: flex-start; }
        }
    </style>
</head>
<body>
    <div class="rp-shell">
        <header class="rp-top">
            <div class="rp-brand">
                <strong>Role Permissions</strong>
                <span>Manage roles & abilities</span>
            </div>
            <nav class="rp-nav">
                <a href="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.').'roles.index') }}"
                   class="{{ request()->routeIs(config('role-permession.ui.route_name_prefix', 'role-permession.').'roles.*') ? 'is-active' : '' }}">
                    Roles
                </a>
                <a href="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.').'users.index') }}"
                   class="{{ request()->routeIs(config('role-permession.ui.route_name_prefix', 'role-permession.').'users.*') ? 'is-active' : '' }}">
                    Assign users
                </a>
            </nav>
        </header>

        @if (session('role_permession_success'))
            <div class="rp-alert">{{ session('role_permession_success') }}</div>
        @endif

        @if ($errors->any())
            <div class="rp-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
