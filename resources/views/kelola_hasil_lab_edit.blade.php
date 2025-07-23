<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hasil Lab</title>
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
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <div class="p-4 mb-2" style="border-bottom:1px solid #444;">
            <b>GEOLAB</b><br><span style="font-size:12px;">Lab PSG</span>
        </div>
        <a href="{{ route('kelola-hasil-lab.index') }}" class="active"><i class="fa-fw fas fa-file-alt"></i> Kelola Hasil Lab</a>
        <a href="#"><i class="fa-fw fas fa-database"></i> Data Pengelolaan</a>
        <a href="#"><i class="fa-fw fas fa-chart-bar"></i> Laporan</a>
        <a href="#"><i class="fa-fw fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="header">
        <span><button class="d-lg-none btn btn-link text-white p-0 me-3" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>Edit Hasil Lab</span>
        <div></div>
    </div>
    <div class="content d-flex justify-content-center align-items-center" style="min-height:80vh;">
        <div class="card shadow-lg w-100" style="max-width: 540px;">
            <div class="card-header bg-warning text-white d-flex align-items-center">
                <i class="fas fa-edit fa-lg me-2"></i> Edit Hasil Lab
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('kelola-hasil-lab.update', $hasilLab->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-barcode"></i> Kode Lab</label>
                        <input type="text" name="kode_lab" class="form-control" placeholder="Masukkan kode lab" value="{{ $hasilLab->kode_lab }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-vial"></i> Judul Lab</label>
                        <input type="text" name="judul_lab" class="form-control" placeholder="Masukkan judul lab" value="{{ $hasilLab->judul_lab }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-list"></i> Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ $hasilLab->kategori == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                            <option value="Lainnya" {{ $isCustomKategori ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <div id="kategori_lainnya" class="mt-2" style="display: {{ $isCustomKategori ? 'block' : 'none' }};">
                            <input type="text" name="kategori_lainnya" id="kategori_lainnya_input" class="form-control" placeholder="Ketik kategori lainnya..." value="{{ $isCustomKategori ? $hasilLab->kategori : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-cubes"></i> Jenis Sampel</label>
                        <select name="jenis_sampel" class="form-select" required>
                            <option value="">Pilih Jenis Sampel</option>
                            <option value="Batu" {{ $hasilLab->jenis_sampel == 'Batu' ? 'selected' : '' }}>Batu</option>
                            <option value="Tanah" {{ $hasilLab->jenis_sampel == 'Tanah' ? 'selected' : '' }}>Tanah</option>
                            <option value="Air" {{ $hasilLab->jenis_sampel == 'Air' ? 'selected' : '' }}>Air</option>
                            <option value="Lainnya" {{ $hasilLab->jenis_sampel == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-calendar-alt"></i> Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $hasilLab->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-file-upload"></i> Upload Dokumen</label>
                        <input type="file" name="link_dokumen" class="form-control">
                        <div class="form-text">Format: PDF, JPG, PNG, DOCX, dll. (Kosongkan jika tidak ganti)</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-star"></i> Rating</label>
                        <input type="number" name="rating" class="form-control" min="0" max="5" placeholder="0-5" value="{{ $hasilLab->rating }}">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('kelola-hasil-lab.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategori');
            const kategoriLainnyaDiv = document.getElementById('kategori_lainnya');
            const kategoriLainnyaInput = document.getElementById('kategori_lainnya_input');

            kategoriSelect.addEventListener('change', function() {
                if (this.value === 'Lainnya') {
                    kategoriLainnyaDiv.style.display = 'block';
                    kategoriLainnyaInput.setAttribute('required', 'required');
                } else {
                    kategoriLainnyaDiv.style.display = 'none';
                    kategoriLainnyaInput.removeAttribute('required');
                    kategoriLainnyaInput.value = ''; // Clear input if not Lainnya
                }
            });
        });
    </script>
</body>
</html> 