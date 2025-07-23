<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GEOLAB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #e5e5e5;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 370px;
            width: 100%;
            margin: 40px auto;
            border-radius: 16px;
            box-shadow: none;
            padding: 20px 16px 16px 16px;
            display: flex;
            flex-direction: column;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 12px 24px 0 0;
            margin-bottom: 10px;
        }
        .header-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .geolab-title {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 4px;
        }
        .company {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .address {
            color: #888;
            font-size: 0.98rem;
            margin-bottom: 0;
        }
        .header-icons {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0;
            margin-top: 0;
        }
        .header-icons .menu {
            font-size: 1.7em;
            color: #888;
            cursor: pointer;
            margin-left: 0;
        }
        .sampel-box {
            background: #d2cbcb;
            border-radius: 13px 13px 0 0;
            padding: 16px 22px 16px 22px;
            margin: 0 0 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sampel-box .label {
            font-weight: bold;
            font-size: 1.13rem;
            color: #222;
        }
        .sampel-box .badge {
            background: #a89c9c;
            color: #fff;
            border-radius: 12px;
            padding: 2px 16px;
            font-size: 1.13rem;
            font-weight: bold;
        }
        .sampel-list {
            background: #fff;
            border-radius: 0 0 13px 13px;
            margin: 0 0 0 0;
            padding: 0 0 8px 0;
            box-shadow: none;
        }
        .sampel-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px 0 22px;
            font-size: 1.13rem;
        }
        .sampel-item:last-child {
            padding-bottom: 18px;
        }
        .sampel-item .arrow {
            background: #ececec;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sampel-item .arrow i {
            color: #a89c9c;
            font-size: 1.25em;
        }
        .menu-section {
            margin: 32px 0 0 0;
        }
        .menu-title {
            font-weight: bold;
            font-size: 1.13rem;
            margin-bottom: 18px;
        }
        .footer {
            text-align: center;
            color: #bbb;
            font-size: 0.97rem;
            margin-top: 44px;
        }
        .menu-section .row.g-3 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        .menu-card {
            border-radius: 14px;
            aspect-ratio: 1/1;
            min-width: 0;
            min-height: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: none;
            padding: 10px 0 0 0;
        }
        .menu-card.green {
            background: #b4e3b0;
        }
        .menu-card.purple {
            background: #bcb3f2;
        }
        .menu-card.red {
            background: #e49c9c;
        }
        .menu-card .icon {
            font-size: 120px;
            color: #fff;
            margin-bottom: 18px;
        }
        .menu-card .label {
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            margin-top: 2px;
            text-align: center;
        }
        .menu-card .notif {
            position: absolute;
            top: 10px;
            right: 12px;
            background: #e53935;
            color: #fff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            font-weight: bold;
            z-index: 2;
        }
        @media (max-width: 600px) {
            .container {
                width: 98vw;
                min-width: unset;
                padding: 10px 2vw 10px 2vw;
                max-width: unset;
                border-radius: 0;
                margin: 0;
            }
            .menu-section .row.g-3 {
                gap: 12px;
            }
            .menu-card {
                border-radius: 18px;
                aspect-ratio: 1/1;
                min-height: 0;
                min-width: 0;
                padding: 0;
            }
            .menu-card .icon {
                font-size: 72px;
                margin-bottom: 12px;
            }
            .menu-card .label {
                font-size: 1rem;
                margin-top: 2px;
            }
            .menu-card .notif {
                top: 10px;
                right: 12px;
                width: 22px;
                height: 22px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <div class="geolab-title">GEOLAB</div>
                <div class="company">PT. HOBBY ANALYZE SAMPLES</div>
                <div class="address">Jalan Ambon No 01, Bandung, Jawa Barat</div>
            </div>
            <div class="header-icons">
                <span class="menu"><i class="fa-solid fa-bars"></i></span>
            </div>
        </div>
        <div class="sampel-box">
            <span class="label">Sampel Sedang Proses</span>
            <span class="badge">2</span>
        </div>
        <div class="sampel-list">
            <div class="sampel-item">
                Uji Sampel Batuan Vulkanik Tambora
                <span class="arrow"><i class="fa-solid fa-chevron-right"></i></span>
            </div>
            <div class="sampel-item">
                Uji Sampel Fosil Mollusca Pantai Seribu
                <span class="arrow"><i class="fa-solid fa-chevron-right"></i></span>
            </div>
        </div>
        <div class="menu-section">
            <div class="menu-title">Proses</div>
            <div class="row g-3">
                <div class="col-6">
                    <a href="{{ route('hasil.pengujian') }}" style="text-decoration:none;">
                        <div class="menu-card green">
                            <span class="notif">1</span>
                            <i class="fa-solid fa-microscope icon"></i>
                            <span class="label">Hasil Pengujian</span>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <div class="menu-card purple">
                        <i class="fa-solid fa-list-check icon"></i>
                        <span class="label">Tracking</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="menu-card red">
                        <span class="notif">2</span>
                        <i class="fa-solid fa-comments icon"></i>
                        <span class="label">Chat Pengelola</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="menu-card red">
                        <span class="notif">5</span>
                        <i class="fa-solid fa-ear-listen icon"></i>
                        <span class="label">Pengaduan</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            2024 (C) Copyright Pusat Survei Geologi
        </div>
    </div>
</body>
</html> 