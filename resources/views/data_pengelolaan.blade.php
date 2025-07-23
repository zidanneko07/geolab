<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengelolaan</title>
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
        .btn-add { float: right; margin-bottom: 15px; }
        .table thead { background: #204080; color: #fff; }
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
        }
        @media (max-width: 480px) {
            .modal-dialog { max-width: 98vw !important; margin: 0.5rem auto; }
            .modal-content { border-radius: 8px; }
            .modal-body { padding: 10px; }
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
        <a href="{{ route('data-pengelolaan.index') }}" class="active"><i class="fa-fw fas fa-database"></i> Data Pengelolaan</a>
        <a href="{{ route('laporan') }}"><i class="fa-fw fas fa-chart-bar"></i> Laporan</a>
        <a href="#"><i class="fa-fw fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="header">
        <span><button class="d-lg-none btn btn-link text-white p-0 me-3" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>Data Pengelolaan</span>
        <div></div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <h4 class="mb-0">Data Pengelolaan</h4>
            <button class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#modalTambahData"><i class="fas fa-plus"></i> Tambah Data</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Penelitian</th>
                        <th>Nama Peneliti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penelitians as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->judul_penelitian }}</td>
                        <td>{{ $p->nama_peneliti }}</td>
                        <td>{{ $p->tanggal_mulai }}</td>
                        <td>{{ $p->tanggal_selesai }}</td>
                        <td>{{ $p->status }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $p->id }}"><i class="fas fa-pen"></i> Edit</button>
                            <form action="{{ route('data-pengelolaan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('data-pengelolaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Pengelolaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Judul Penelitian / Proyek</label>
                                    <input type="text" class="form-control" name="judul_penelitian" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Peneliti / Instansi</label>
                                    <input type="text" class="form-control" name="nama_peneliti" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Penelitian</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_mulai">
                                        <span class="input-group-text">s/d</span>
                                        <input type="date" class="form-control" name="tanggal_selesai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Kode Sampel</label>
                                    <input type="text" class="form-control" name="kode_sampel">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Lokasi Pengambilan Sampel</label>
                                    <input type="text" class="form-control mb-2" name="lokasi" placeholder="Nama lokasi">
                                    <input type="text" class="form-control mb-2" name="kabupaten_kota" placeholder="Kabupaten/Kota">
                                    <input type="text" class="form-control" name="koordinat" placeholder="Koordinat (opsional)">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Parameter Uji</label>
                                    <input type="text" class="form-control" name="parameter_uji">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Metode Uji</label>
                                    <input type="text" class="form-control" name="metode_uji">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Satuan Hasil</label>
                                    <input type="text" class="form-control" name="satuan_hasil">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Pengujian</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal_uji_mulai">
                                        <span class="input-group-text">s/d</span>
                                        <input type="date" class="form-control" name="tanggal_uji_selesai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Dokumen Hasil</label>
                                    <input type="file" class="form-control" name="dokumen" accept=".pdf,.xls,.xlsx,.jpg,.jpeg,.png">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Petugas / Analis</label>
                                    <input type="text" class="form-control" name="petugas">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status Pengujian</label>
                                    <select class="form-select" name="status">
                                        <option>Menunggu</option>
                                        <option>Proses</option>
                                        <option>Selesai</option>
                                        <option>Ditolak</option>
                                        <option>Revisi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Rating Kualitas <span class="text-muted">(Opsional)</span></label>
                                    <input type="number" class="form-control" name="rating" min="1" max="5" placeholder="1-5">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control" name="catatan" rows="2" placeholder="Keterangan khusus jika ada kendala atau revisi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Data (dynamic, filled by JS) -->
        <div class="modal fade" id="modalEditData" tabindex="-1" aria-labelledby="modalEditDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="formEditData" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditDataLabel">Edit Data Pengelolaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3" id="editFormFields">
                                <!-- Fields will be filled by JS -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
        // Edit button handler
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                fetch(`/data-pengelolaan/${id}/edit`)
                    .then(res => res.json())
                    .then(data => {
                        let fields = '';
                        fields += `<div class='col-md-6'><label class='form-label'>Judul Penelitian / Proyek</label><input type='text' class='form-control' name='judul_penelitian' value='${data.judul_penelitian ?? ''}' required></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Nama Peneliti / Instansi</label><input type='text' class='form-control' name='nama_peneliti' value='${data.nama_peneliti ?? ''}' required></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Tanggal Penelitian</label><div class='input-group'><input type='date' class='form-control' name='tanggal_mulai' value='${data.tanggal_mulai ?? ''}'><span class='input-group-text'>s/d</span><input type='date' class='form-control' name='tanggal_selesai' value='${data.tanggal_selesai ?? ''}'></div></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Kode Sampel</label><input type='text' class='form-control' name='kode_sampel' value='${data.kode_sampel ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Jenis Sampel</label><input type='text' class='form-control' name='jenis_sampel' value='${data.jenis_sampel ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Lokasi Pengambilan Sampel</label><input type='text' class='form-control mb-2' name='lokasi' value='${data.lokasi ?? ''}' placeholder='Nama lokasi'><input type='text' class='form-control mb-2' name='kabupaten_kota' value='${data.kabupaten_kota ?? ''}' placeholder='Kabupaten/Kota'><input type='text' class='form-control' name='koordinat' value='${data.koordinat ?? ''}' placeholder='Koordinat (opsional)'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Parameter Uji</label><input type='text' class='form-control' name='parameter_uji' value='${data.parameter_uji ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Metode Uji</label><input type='text' class='form-control' name='metode_uji' value='${data.metode_uji ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Satuan Hasil</label><input type='text' class='form-control' name='satuan_hasil' value='${data.satuan_hasil ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Tanggal Pengujian</label><div class='input-group'><input type='date' class='form-control' name='tanggal_uji_mulai' value='${data.tanggal_uji_mulai ?? ''}'><span class='input-group-text'>s/d</span><input type='date' class='form-control' name='tanggal_uji_selesai' value='${data.tanggal_uji_selesai ?? ''}'></div></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Dokumen Hasil</label><input type='file' class='form-control' name='dokumen'><div class='small mt-1'>${data.dokumen ? `<a href='/storage/${data.dokumen}' target='_blank'>Lihat dokumen</a>` : ''}</div></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Petugas / Analis</label><input type='text' class='form-control' name='petugas' value='${data.petugas ?? ''}'></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Status Pengujian</label><select class='form-select' name='status'><option${data.status==='Menunggu'?' selected':''}>Menunggu</option><option${data.status==='Proses'?' selected':''}>Proses</option><option${data.status==='Selesai'?' selected':''}>Selesai</option><option${data.status==='Ditolak'?' selected':''}>Ditolak</option><option${data.status==='Revisi'?' selected':''}>Revisi</option></select></div>`;
                        fields += `<div class='col-md-6'><label class='form-label'>Rating Kualitas <span class='text-muted'>(Opsional)</span></label><input type='number' class='form-control' name='rating' min='1' max='5' value='${data.rating ?? ''}' placeholder='1-5'></div>`;
                        fields += `<div class='col-12'><label class='form-label'>Catatan Tambahan</label><textarea class='form-control' name='catatan' rows='2' placeholder='Keterangan khusus jika ada kendala atau revisi'>${data.catatan ?? ''}</textarea></div>`;
                        document.getElementById('editFormFields').innerHTML = fields;
                        document.getElementById('formEditData').action = `/data-pengelolaan/${id}`;
                        var modal = new bootstrap.Modal(document.getElementById('modalEditData'));
                        modal.show();
                    });
            });
        });
    </script>
</body>
</html> 