<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Isi Survei - GEOLAB</title>
    <!-- Font Awesome 6 for fa-microscope -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #d6f5d6;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            width: 370px;
            margin: 40px auto 24px auto;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 20px 18px 18px 18px;
            display: flex;
            flex-direction: column;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .header .back {
            color: #3737b4;
            font-size: 1.3rem;
            font-weight: bold;
            margin-right: 6px;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .header .title {
            font-size: 1.08rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .header .menu, .header .search {
            font-size: 1.2rem;
            color: #888;
            cursor: pointer;
            margin-left: 8px;
        }
        .header-icons {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-right: 2px;
        }
        .page-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 1.08rem;
            font-weight: bold;
            margin: 12px 0 18px 0;
            color: #222;
            letter-spacing: 0.5px;
        }
        .search-inline {
            font-size: 1.3rem;
            color: #888;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .detail {
            margin-bottom: 14px;
        }
        .kode {
            font-weight: bold;
            font-size: 1.01rem;
            margin-bottom: 2px;
            text-align: left;
        }
        .judul {
            font-size: 0.97rem;
            margin-bottom: 3px;
            text-align: left;
        }
        .tanggal {
            color: #888;
            font-size: 0.92rem;
            margin-bottom: 8px;
            text-align: left;
        }
        .section-title {
            font-weight: bold;
            margin: 14px 0 10px 0;
            font-size: 1.01rem;
            text-align: left;
        }
        .hasil-img {
            width: 96%;
            max-width: 320px;
            display: block;
            margin: 0 auto 18px auto;
            border-radius: 8px;
            border: 1px solid #eee;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06);
        }
        .instruksi {
            color: #444;
            font-size: 0.97rem;
            margin: 22px 0 18px 0;
            text-align: center;
        }
        .btn-survei {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #3737b4;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 1.07rem;
            font-weight: 500;
            padding: 13px 0;
            width: 100%;
            margin: 0 auto 0 auto;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
            box-shadow: 0 1px 4px rgba(55,55,180,0.08);
        }
        .btn-survei:hover {
            background: #23238a;
        }
        .footer {
            text-align: center;
            color: #bbb;
            font-size: 0.95rem;
            margin-top: 24px;
        }
        @media (max-width: 480px) {
            .container {
                width: 98vw;
                min-width: unset;
                padding: 10px 2vw 10px 2vw;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
            <div class="header-left" style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ url()->previous() }}" class="back" style="background: #ededf5; border-radius: 8px; padding: 7px 10px; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-arrow-left" style="color: #5a5ad6; font-size: 1.3em !important;"></i></a>
                <span class="title" style="font-size: 1.35rem; font-weight: bold; letter-spacing: 1px; color: #111;">GEOLAB</span>
            </div>
            <div class="header-icons">
                <span class="menu"><i class="fa-solid fa-bars" style="font-size:1.3em !important;"></i></span>
            </div>
        </div>
        <div class="page-title" style="display: flex; align-items: center; justify-content: center; gap: 6px;">
            <i class="fa-solid fa-microscope" style="font-size:1.3em !important; vertical-align: middle;"></i>
            <span style="font-weight: bold; font-size: 1.08rem;">Hasil Pengujian Lab</span>
            <span class="search-inline" style="margin-left:auto;"><i class="fa-solid fa-magnifying-glass" style="font-size:1.3em !important;"></i></span>
        </div>
        <div class="detail">
            <div class="kode">{{ $kode }}</div>
            <div class="judul">{{ $judul }}</div>
            <div class="tanggal">{{ $tanggal }}</div>
        </div>
        <div class="section-title">Hasil Uji</div>
        <img src="{{ $gambar }}" alt="Hasil Uji" class="hasil-img">
        <div class="instruksi">
            Silahkan isi survei berikut untuk mengunduh dokumen hasil uji lab anda.
        </div>
        <a href="#" class="btn-survei"><span style="font-size:1.2em;">&#128196;</span> Mulai Isi Survei</a>
        <div class="footer">
            2024 (C) Copyright Pusat Survei Geologi
        </div>
    </div>
</body>
</html> 