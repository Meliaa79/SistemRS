<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi RS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        .flash-message {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            /* Pastikan ini di atas elemen lain */
            min-width: 300px;
            max-width: 400px;
        }

        .flash-message .alert {
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.3s ease-out forwards, fadeOut 0.3s ease-in 5s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(10px);
            }
        }

        /* Mengatur box-sizing untuk semua elemen */
        * {
            box-sizing: border-box;
        }

        /* Pengaturan body untuk memastikan tidak ada margin */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            /* Menggunakan font Poppins */
        }

        /* Sidebar styling */
        .sidebar {
            width: 240px;
            background-color: #0A2558;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding-top: 20px;
        }

        .sidebar .logo-details {
            display: flex;
            align-items: center;
            padding: 15px;
        }

        .sidebar .logo-details i {
            font-size: 28px;
            color: #ffffff;
            margin-right: 10px;
        }

        .sidebar .logo-details .logo_name {
            color: #ffffff;
            font-size: 24px;
            font-weight: 500;
        }

        .sidebar .nav-links {
            margin-top: 20px;
            list-style: none;
            padding-left: 0;
        }

        .sidebar .nav-links li {
            width: 100%;
        }

        .sidebar .nav-links li a {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 15px 20px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 400;
            transition: background-color 0.3s;
        }

        .sidebar .nav-links li a i {
            font-size: 20px;
            margin-right: 15px;
        }

        .sidebar .nav-links li a:hover {
            background-color: #1a355e;
        }

        /* Header styling untuk menempel ke sidebar */
        .header {
            background-color: white;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px;
            position: fixed;
            top: 0;
            left: 240px;
            width: calc(100% - 240px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            margin: 0;
        }

        .header h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .profile-details {
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .profile-details img {
            width: 45px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-details .admin_name {
            color: #333;
            font-weight: 600;
            font-size: 16px;
        }

        .profile-details i {
            color: #333;
            font-size: 18px;
            margin-left: 40px;
        }

        .dropdown {
            position: absolute;
            top: 50px;
            right: 30px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: none;
            width: 150px;
            border-radius: 5px;
        }

        .dropdown .dropdown-content {
            padding: 10px;
        }

        .dropdown-content a {
            text-decoration: none;
            color: #0A2558;
            display: block;
            padding: 8px;
            font-size: 14px;
            border-radius: 5px;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }

        /* Main content styling */
        .content {
            margin-left: 240px;
            padding: 20px;
            padding-top: 110px;
        }

        /* Home Content Section */
        .home-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            margin-top: 50px;
        }

        /* Row containing 4 boxes */
        .overview-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        /* Box styling */
        .box {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            max-width: calc(25% - 20px);
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease;
        }

        /* Hover effect */
        .box:hover {
            transform: scale(1.05);
        }

        /* Styling untuk kanan box */
        .right-side {
            display: flex;
            flex-direction: column;
        }

        /* Nama box */
        .box-topic {
            font-size: 22px;
            font-weight: 600;
            color: #000000;
        }

        /* Angka dalam box */
        .number {
            font-size: 26px;
            font-weight: 600;
            color: #333;
        }

        /* Ikon di dalam box */
        .icon {
            font-size: 40px;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        /* Warna latar belakang ikon */
        .pink-bg {
            background-color: #a5c8f3;
        }

        .yellow-bg {
            background-color: #ffed99;
        }

        .green-bg {
            background-color: #c6f5d1;
        }

        .blue-bg {
            background-color: #f1b6c9;
        }

        /* Responsiveness untuk ukuran layar kecil */
        @media (max-width: 768px) {
            .box {
                max-width: calc(50% - 20px);
            }

            .overview-row {
                flex-wrap: wrap;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistem Informasi RS
                </a>
                @include('components.navbar')
            </div>
        </nav>

        <main>
            <div class="d-flex" style="margin-top:50px">
                @if (Auth::user() && Auth::user()->role == 'admin')
                    @include('components.sidebar-admin')
                @endif
                @if (Auth::user() && Auth::user()->role == 'dokter')
                    @include('components.sidebar-dokter')
                @endif
                @if (Auth::user() && Auth::user()->role == 'apoteker')
                    @include('components.sidebar-apoteker')
                @endif
                <div class="py-4 w-100" @if(Auth::user() && auth()->user()->role!='pasien') style="padding-left:300px !important;"@endif>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @include('components.footer')
    @include('components.flash')
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        // init datatable
        $(document).ready(function(){
            $('.datatable').DataTable();
        });
    </script>
    @stack('scripts')
</body>

</html>
