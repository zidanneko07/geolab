<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Hasil Lab</title>
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
        .user-info { position: relative; }
        .user-dropdown { cursor: pointer; }
        .dropdown-menu-user { display: none; position: absolute; right: 0; top: 40px; background: #fff; color: #222; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); min-width: 180px; z-index: 10; }
        .dropdown-menu-user.show { display: block; }
        .dropdown-menu-user a { color: #222; padding: 10px 18px; display: block; text-decoration: none; }
        .dropdown-menu-user a:hover { background: #f4f6f9; }
        .content { margin-left: 220px; padding: 30px; }
        .table thead { background: #204080; color: #fff; }
        .btn-add { float: right; margin-bottom: 15px; }
        .table tbody tr:hover { background: #e6f0ff; transition: background 0.2s; }
        .fa-fw { width: 18px; text-align: center; }
        @media (max-width: 900px) {
            .sidebar { left: -220px; }
            .sidebar.show { left: 0; }
            .header, .content { margin-left: 0; }
            .sidebar .sidebar-toggle { display: block; position: absolute; top: 10px; right: -40px; background: #204080; color: #fff; border: none; border-radius: 50%; width: 36px; height: 36px; }
        }
        @media (max-width: 600px) {
            .header { font-size: 1.05rem; padding: 12px 10px; }
            .content { padding: 10px 2px; }
            .btn-add { width: 100%; float: none; margin-bottom: 10px; }
            .table-responsive { overflow-x: auto; }
            .table { font-size: 0.95rem; }
            .sidebar { width: 180px; }
            .sidebar .sidebar-toggle { right: -32px; width: 32px; height: 32px; }
            .user-info span { font-size: 0.98rem; }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <div class="p-4 mb-2" style="border-bottom:1px solid #444;">
            <b>GEOLAB</b><br><span style="font-size:12px;">Lab PSG</span>
        </div>
        <a href="{{ route('kelola-hasil-lab.index') }}" class="active"><i class="fa-fw fas fa-file-alt"></i> Kelola Hasil Lab</a>
        <a href="{{ route('data-pengelolaan.index') }}"><i class="fa-fw fas fa-database"></i> Data Pengelolaan</a>
        <a href="{{ route('laporan') }}"><i class="fa-fw fas fa-chart-bar"></i> Laporan</a>
        <a href="{{ route('dashboard') }}"><i class="fa-fw fas fa-home"></i> Dashboard</a>
    </div>
    <div class="header">
        <span><button class="d-lg-none btn btn-link text-white p-0 me-3" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>Kelola Hasil Lab</span>
        <div class="user-info">
            <span class="user-dropdown" onclick="toggleUserDropdown()">
                <i class="fas fa-user-circle fa-lg"></i>
                <span class="ms-2">{{ Auth::user()->name ?? 'User' }} - {{ Auth::user()->role ?? 'Operator' }}</span>
                <i class="fas fa-caret-down ms-1"></i>
            </span>
            <div class="dropdown-menu-user" id="userDropdown">
                <a href="#"><i class="fa-fw fas fa-user"></i> Profil</a>
                <a href="#"><i class="fa-fw fas fa-key"></i> Ganti Password</a>
                <a href="#"><i class="fa-fw fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <form class="d-flex mb-2 mb-md-0" method="GET" action="">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari hasil lab..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a href="{{ route('kelola-hasil-lab.create') }}" class="btn btn-primary btn-add"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Lab</th>
                    <th>Nama Sampel</th>
                    <th>Jenis Sampel</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Rating</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hasilLabs as $hl)
                <tr>
                    <td>{{ ($hasilLabs->currentPage() - 1) * $hasilLabs->perPage() + $loop->iteration }}</td>
                    <td>{{ $hl->kode_lab }}</td>
                    <td>{{ $hl->judul_lab }}</td>
                    <td>{{ $hl->jenis_sampel ?? '-' }}</td>
                    <td>{{ $hl->kategori ?? '-' }}</td>
                    <td>{{ $hl->tanggal }}</td>
                    <td>{{ $hl->rating }}</td>
                    <td>
                        @if($hl->link_dokumen)
                            <a href="{{ asset('storage/'.$hl->link_dokumen) }}" target="_blank" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Download Dokumen"><i class="fas fa-download"></i></a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('kelola-hasil-lab.edit', $hl->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('kelola-hasil-lab.destroy', $hl->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div>
                            <i class="fas fa-box-open fa-2x mb-2 text-secondary"></i><br>
                            <span class="text-secondary">Belum ada data hasil lab</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $hasilLabs->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
        function toggleUserDropdown() {
            var dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }
        document.addEventListener('click', function(e) {
            var dropdown = document.getElementById('userDropdown');
            if (!e.target.closest('.user-info')) {
                dropdown.classList.remove('show');
            }
        });
        // Aktifkan tooltip Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html> 