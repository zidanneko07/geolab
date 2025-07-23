@php
    // Pilih tipe website: 'umum', 'sekolah', 'aplikasi', 'geologi'
    // Contoh: $websiteType = 'umum';
    $websiteType = $websiteType ?? 'geologi';
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">GEOLAB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @if($websiteType === 'umum')
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tentang Kami / Tentang Saya</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Layanan / Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Galeri / Dokumentasi</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Artikel / Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Masuk / Daftar</a></li>
        @elseif($websiteType === 'sekolah')
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profil Sekolah</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Guru & Staff</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kegiatan</a></li>
          <li class="nav-item"><a class="nav-link" href="#">PPDB / Pendaftaran</a></li>
          <li class="nav-item"><a class="nav-link" href="#">E-learning / Materi</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kontak Kami</a></li>
        @elseif($websiteType === 'aplikasi')
          <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Data Pengguna</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Data Master</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Laporan</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Pengaturan Akun</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Keluar / Logout</a></li>
        @else  {{-- geologi (default) --}}
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Peta Survei / GeoMap</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Data Geologi</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Laporan Survei</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Laboratorium</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tim & Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Masuk / Daftar</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav> 