<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hasil Lab</title>
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
        
        /* Rating Stars */
        .rating-input { margin-top: 10px; }
        .stars { display: flex; gap: 5px; margin-bottom: 5px; }
        .star { font-size: 24px; color: #ddd; cursor: pointer; transition: color 0.2s; }
        .star:hover, .star.active { color: #ffc107; }
        .rating-text { font-size: 14px; color: #666; }
        
        /* File Preview */
        #file_preview .alert { margin-bottom: 0; }
        
        /* Form Improvements */
        .form-label .text-danger { color: #dc3545; }
        .form-text { font-size: 12px; color: #6c757d; }
        
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
        <span><button class="d-lg-none btn btn-link text-white p-0 me-3" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>Tambah Hasil Lab</span>
        <div></div>
    </div>
    <div class="content d-flex justify-content-center align-items-center" style="min-height:80vh;">
        <div class="card shadow-lg w-100" style="max-width: 540px;">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="fas fa-flask fa-lg me-2"></i> Tambah Hasil Lab
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
                <form action="{{ route('kelola-hasil-lab.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-barcode"></i> Kode Lab</label>
                        <input type="text" name="kode_lab" id="kode_lab" class="form-control" value="{{ $autoKodeLab }}" readonly>
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Kode lab di-generate otomatis
                            <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="regenerateKode()">
                                <i class="fas fa-sync-alt"></i> Generate Baru
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-vial"></i> Judul Lab <span class="text-danger">*</span></label>
                        <input type="text" name="judul_lab" class="form-control" placeholder="Masukkan judul lab" maxlength="255" required>
                        <div class="form-text">Maksimal 255 karakter</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-list"></i> Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div id="kategori_lainnya" class="mt-2" style="display: none;">
                            <input type="text" name="kategori_lainnya" id="kategori_lainnya_input" class="form-control" placeholder="Ketik kategori lainnya..." maxlength="50">
                            <div class="form-text">Maksimal 50 karakter</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-cubes"></i> Jenis Sampel <span class="text-danger">*</span></label>
                        <select name="jenis_sampel" id="jenis_sampel" class="form-select" required>
                            <option value="">Pilih Jenis Sampel</option>
                            <option value="Batu">Batu</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Air">Air</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div id="jenis_sampel_lainnya" class="mt-2" style="display: none;">
                            <input type="text" name="jenis_sampel_lainnya" id="jenis_sampel_lainnya_input" class="form-control" placeholder="Ketik jenis sampel lainnya..." maxlength="50">
                            <div class="form-text">Maksimal 50 karakter</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-calendar-alt"></i> Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                        <div class="form-text">Tanggal hari ini akan diisi otomatis</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-file-upload"></i> Upload Dokumen <span class="text-danger">*</span></label>
                        <input type="file" name="link_dokumen" id="link_dokumen" class="form-control" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.csv,.txt,.jpg,.jpeg,.png" required>
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Format: PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, CSV, TXT, JPG, PNG<br>
                            <i class="fas fa-exclamation-triangle"></i> Maksimal ukuran: 50 MB
                        </div>
                        <div id="file_preview" class="mt-2" style="display: none;">
                            <div class="alert alert-info">
                                <i class="fas fa-file"></i> <span id="file_name"></span>
                                <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="previewFile()">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-fw fas fa-star"></i> Rating <span class="text-muted">(Opsional)</span></label>
                        <div class="form-text mb-1">Rating digunakan untuk menilai hasil lab. Kosongkan jika tidak ingin memberi rating.</div>
                        <div class="rating-input">
                            <input type="hidden" name="rating" id="rating_value" value="0">
                            <div class="stars">
                                <i class="fas fa-star star" data-rating="1"></i>
                                <i class="fas fa-star star" data-rating="2"></i>
                                <i class="fas fa-star star" data-rating="3"></i>
                                <i class="fas fa-star star" data-rating="4"></i>
                                <i class="fas fa-star star" data-rating="5"></i>
                            </div>
                            <span class="rating-text">Rating: 0/5</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <a href="{{ route('kelola-hasil-lab.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="reset" class="btn btn-outline-danger ms-2">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i> <span id="submitText">Simpan</span>
                        </button>
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

            const jenisSampelSelect = document.getElementById('jenis_sampel');
            const jenisSampelLainnyaDiv = document.getElementById('jenis_sampel_lainnya');
            const jenisSampelLainnyaInput = document.getElementById('jenis_sampel_lainnya_input');

            jenisSampelSelect.addEventListener('change', function() {
                if (this.value === 'Lainnya') {
                    jenisSampelLainnyaDiv.style.display = 'block';
                    jenisSampelLainnyaInput.setAttribute('required', 'required');
                } else {
                    jenisSampelLainnyaDiv.style.display = 'none';
                    jenisSampelLainnyaInput.removeAttribute('required');
                    jenisSampelLainnyaInput.value = ''; // Clear input if not Lainnya
                }
            });

            const fileInput = document.getElementById('link_dokumen');
            const filePreviewDiv = document.getElementById('file_preview');
            const fileNameSpan = document.getElementById('file_name');

            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    const file = this.files[0];
                    fileNameSpan.textContent = file.name;
                    filePreviewDiv.style.display = 'block';
                    
                    // VALIDASI 50MB (update 2024-07-14)
                    if (file.size > 50 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar! Maksimal 50 MB.');
                        this.value = '';
                        filePreviewDiv.style.display = 'none';
                        return;
                    }
                } else {
                    filePreviewDiv.style.display = 'none';
                    fileNameSpan.textContent = '';
                }
            });

            const ratingStars = document.querySelectorAll('.stars .star');
            const ratingValueInput = document.getElementById('rating_value');
            const ratingTextSpan = document.querySelector('.rating-text');

            ratingStars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.dataset.rating;
                    ratingValueInput.value = rating;
                    ratingStars.forEach(s => s.classList.remove('active'));
                    this.classList.add('active');
                    ratingTextSpan.textContent = `Rating: ${rating}/5`;
                });
            });

            // Form submission with loading state
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            form.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.disabled = true;
                submitText.textContent = 'Menyimpan...';
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span id="submitText">Menyimpan...</span>';
            });
        });

        function regenerateKode() {
            const kodeLabInput = document.getElementById('kode_lab');
            const currentKode = kodeLabInput.value;
            const timestamp = new Date().getTime();
            kodeLabInput.value = `LAB-${timestamp}`;
            alert('Kode lab berhasil di-generate ulang: ' + kodeLabInput.value);
        }

        function previewFile() {
            const fileInput = document.getElementById('link_dokumen');
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.getElementById('file_preview');
                    previewDiv.innerHTML = `
                        <div class="alert alert-info">
                            <i class="fas fa-file"></i> <span id="file_name"></span>
                            <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="previewFile()">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    `;
                    const fileNameSpan = document.getElementById('file_name');
                    fileNameSpan.textContent = file.name;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html> 