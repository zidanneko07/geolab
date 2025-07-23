<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Detail Hasil Pengujian Lab - GEOLAB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #d6f5d6;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #fff;
            width: 370px;
            margin: 40px auto;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 20px 16px 16px 16px;
            text-align: left;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .back-btn {
            background: #ededf5;
            border-radius: 8px;
            padding: 8px 10px;
            font-size: 1.3em;
            color: #5a5ad6;
            margin-right: 8px;
            cursor: pointer;
            border: none;
            outline: none;
            display: flex;
            align-items: center;
        }
        .logo-text {
            font-size: 1.25rem;
            font-weight: bold;
            color: #222;
            letter-spacing: 1px;
        }
        .header-icons {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .menu, .search {
            font-size: 1.5em !important;
            color: #888;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .section-title {
            font-weight: bold;
            margin: 18px 0 10px 0;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-title i {
            font-size: 1.5em;
        }
        .kode {
            font-weight: bold;
            font-size: 1.12rem;
            margin-bottom: 2px;
        }
        .judul {
            font-size: 1.05rem;
            margin-bottom: 2px;
        }
        .tanggal {
            color: #888;
            font-size: 1.01rem;
            margin-bottom: 10px;
        }
        .hasil-title {
            font-weight: bold;
            margin: 18px 0 8px 0;
            font-size: 1.08rem;
        }
        .hasil-img {
            width: 100%;
            max-width: 320px;
            display: block;
            margin: 0 auto 18px auto;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .survey-info {
            margin: 18px 0 10px 0;
            color: #444;
            font-size: 1.04rem;
        }
        .survey-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #3737b4;
            color: #fff;
            font-weight: 500;
            font-size: 1.13rem;
            border: none;
            border-radius: 8px;
            padding: 13px 0;
            width: 100%;
            margin: 0 auto 0 auto;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }
        .survey-btn i {
            font-size: 1.2em;
        }
        .footer {
            text-align: center;
            color: #bbb;
            font-size: 1.01rem;
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
        <div class="header">
            <div class="header-left">
                <button class="back-btn" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
                <span class="logo-text">GEOLAB</span>
            </div>
            <div class="header-icons">
                <span class="menu"><i class="fas fa-bars"></i></span>
                <span class="search"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="section-title">
            <i class="fa-solid fa-microscope"></i>
            Hasil Pengujian Lab
        </div>
        <div class="kode">UOIX-12982</div>
        <div class="judul">Uji sampel mollusca dari pantai seribu</div>
        <div class="tanggal">16 November 2024 10:30 WIB</div>
        <div class="hasil-title">Hasil Uji</div>
        <img src="https://i.ibb.co/6b6n6k2/lab-table-example.png" alt="Lab Report Table" class="hasil-img">
        <div class="survey-info">
            Silahkan isi survei berikut untuk mengunduh dokumen hasil uji lab anda.
        </div>
        <a href="#" class="survey-btn">
            <i class="fa-solid fa-newspaper"></i>
            Mulai Isi Survei
        </a>
        <div class="footer">
            2024 (C) Copyright Pusat Survei Geologi
        </div>
    </div>
</body>
</html>
