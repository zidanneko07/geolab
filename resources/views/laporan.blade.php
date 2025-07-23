<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #f4f6f9; font-family: 'Inter', Arial, sans-serif; }
        .sidebar { width: 220px; background: #222d32; min-height: 100vh; color: #fff; position: fixed; transition: left 0.3s; z-index: 1000; }
        .sidebar.collapsed { left: -220px; }
        .sidebar a { color: #b8c7ce; display: flex; align-items: center; gap: 12px; padding: 12px 20px; text-decoration: none; transition: background 0.2s; }
        .sidebar a.active, .sidebar a:hover { background: #1e282c; color: #fff; }
        .sidebar .sidebar-toggle { display: none; }
        .header { margin-left: 220px; background: #204080; color: #fff; padding: 18px 30px; font-size: 1.3rem; font-weight: bold; display: flex; align-items: center; justify-content: space-between; }
        .content { margin-left: 220px; padding: 30px; }
        @media (max-width: 900px) {
            .sidebar { left: -220px; }
            .sidebar.show { left: 0; }
            .header, .content { margin-left: 0; }
            .sidebar .sidebar-toggle { display: block; position: absolute; top: 10px; right: -40px; background: #204080; color: #fff; border: none; border-radius: 50%; width: 36px; height: 36px; }
        }
        @media (max-width: 600px) {
            .header { font-size: 1.05rem; padding: 12px 10px; }
            .content { padding: 10px 2px; }
            .sidebar { width: 180px; }
            .sidebar .sidebar-toggle { right: -32px; width: 32px; height: 32px; }
            .content.d-flex { min-height: 60vh !important; }
            .text-center h4 { font-size: 1.1rem; }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <div class="p-4 mb-2" style="border-bottom:1px solid #444;">
            <b>GEOLAB</b><br><span style="font-size:12px;">Lab PSG</span>
        </div>
        @if(auth()->user()->role === 'operator')
        <a href="{{ route('kelola-hasil-lab.index') }}"><i class="fa-fw fas fa-file-alt"></i> Kelola Hasil Lab</a>
        @endif
        <a href="#"><i class="fa-fw fas fa-database"></i> Data Pengelolaan</a>
        <a href="#" class="active"><i class="fa-fw fas fa-chart-bar"></i> Laporan</a>
        <a href="#"><i class="fa-fw fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="header">
        <span><button class="d-lg-none btn btn-link text-white p-0 me-3" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>Laporan</span>
        <div></div>
    </div>
    <div class="content d-flex justify-content-center align-items-center" style="min-height:80vh;">
        <div class="text-center">
            <i class="fas fa-chart-bar fa-3x mb-3 text-secondary"></i>
            <h4 class="mb-2">Belum ada fitur Laporan</h4>
            <p class="text-secondary">Halaman ini akan menampilkan laporan di masa mendatang.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html> 