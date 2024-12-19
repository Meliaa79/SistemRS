<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Rumah Sakit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Mengatur box-sizing untuk semua elemen */
        * {
            box-sizing: border-box;
        }

        /* Pengaturan body untuk memastikan tidak ada margin */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
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
    <div class="sidebar">
        <div class="logo-details">
            <i class="fas fa-hospital"></i>
            <span class="logo_name">Sistem Informasi RS</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('dokter.tampil') }}"><i class="fas fa-user-md"></i> Data Dokter</a></li>
            <li><a href="{{ route('pasien.tampil') }}"><i class="fas fa-procedures"></i> Data Pasien</a></li>
            <li><a href="{{ route('jadwal_dokter.index') }}"><i class="fas fa-calendar-alt"></i> Jadwal Dokter</a></li>
            <li><a href="{{ route('ruangan.tampil') }}"><i class="fas fa-building"></i> Data Ruangan</a></li>
            <li><a href="{{ route('kunjungan_pasien.index') }}"><i class="fas fa-calendar-check"></i> Data Kunjungan</a></li>
            <li><a href="{{ route('obat.tampil') }}"><i class="fas fa-capsules"></i> Data Obat</a></li>
            <li><a href="{{ route('resep_obat.tampil') }}"><i class="fas fa-prescription-bottle-alt"></i> Resep Obat</a></li>
            <li><a href="{{ route('detail_resep.index') }}"><i class="fas fa-file-prescription"></i> Detail Resep</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="header">
            <h4></h4>
            <div class="profile-details" onclick="openDropDown()">
                <img src="account.png" alt="profile">
                <span class="admin_name">Admin</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="dropdown" id="dropdown-logout">
                <div class="dropdown-content">
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>

        <!-- Home Content Section -->
        <div class="home-content">
            <div class="overview-row">
                <div class="box cart two">
                    <div class="right-side">
                        <div class="box-topic">Data Dokter</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-user-md icon pink-bg"></i>
                </div>
                <div class="box cart three">
                    <div class="right-side">
                        <div class="box-topic">Data Pasien</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-procedures icon yellow-bg"></i>
                </div>
                <div class="box cart four">
                    <div class="right-side">
                        <div class="box-topic">Jadwal Dokter</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-calendar-alt icon green-bg"></i>
                </div>
                <div class="box cart two">
                    <div class="right-side">
                        <div class="box-topic">Data Ruangan</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-building icon blue-bg"></i>
                </div>
            </div>
            <div class="overview-row">
                <div class="box cart two">
                    <div class="right-side">
                        <div class="box-topic">Data Kunjungan</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-calendar-check icon pink-bg"></i>
                </div>
                <div class="box cart three">
                    <div class="right-side">
                        <div class="box-topic">Data Obat</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-capsules icon yellow-bg"></i>
                </div>
                <div class="box cart four">
                    <div class="right-side">
                        <div class="box-topic">Resep Obat</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-prescription-bottle-alt icon green-bg"></i>
                </div>
                <div class="box cart two">
                    <div class="right-side">
                        <div class="box-topic">Detail Resep</div>
                        <div class="number">0</div>
                    </div>
                    <i class="fas fa-file-prescription icon blue-bg"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDropDown() {
            const dropdown = document.getElementById("dropdown-logout");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }
    </script>
</body>

</html>