<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hasil Pengujian Lab - GEOLAB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #d6f5d6;
            font-family: Arial, sans-serif;
        }
        .main-container {
            max-width: 420px;
            margin: 32px auto;
            padding: 24px 0;
        }
        .card {
            border-radius: 16px;
            padding: 20px 18px 16px 18px;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            position: relative;
        }
        .card-survey {
            background: #fffcd6;
        }
        .card-result {
            background: #d6f8e3;
        }
        .card-header {
            font-weight: bold;
            font-size: 1.08em;
            margin-bottom: 2px;
        }
        .card-desc {
            color: #555;
            font-size: 1.01em;
            margin-bottom: 8px;
        }
        .card-date {
            color: #888;
            font-size: 0.97em;
            margin-bottom: 14px;
        }
        .card-action {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }
        .icon-survey {
            color: #3b4ed8;
            font-size: 1.5em;
        }
        .icon-download {
            color: #3b4ed8;
            font-size: 1.5em;
        }
        .stars {
            margin-left: auto;
            color: #ffe066;
            font-size: 1.2em;
            letter-spacing: 2px;
        }
        .notif {
            position: absolute;
            top: 14px;
            right: 18px;
            background: #f44;
            color: #fff;
            border-radius: 50%;
            padding: 2px 10px;
            font-size: 1em;
            font-weight: bold;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        @media (max-width: 480px) {
            .main-container {
                width: 98vw;
                min-width: unset;
                padding: 10px 2vw 10px 2vw;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Card 1: Survei -->
        <div class="card card-survey">
            <div class="card-header">UOIX-12982</div>
            <div class="card-desc">Uji sampel mollusca dari pantai seribu</div>
            <div class="card-date">16 November 2024 10:30 WIB</div>
            <div class="card-action">
                <span class="icon-survey"><i class="fa-solid fa-newspaper"></i></span>
                <span>Survei</span>
            </div>
        </div>
        <!-- Card 2: Hasil 1 -->
        <div class="card card-result">
            <span class="notif">1</span>
            <div class="card-header">UOIX-12982</div>
            <div class="card-desc">Uji sampel mollusca dari pantai seribu</div>
            <div class="card-date">16 November 2024 10:30 WIB</div>
            <div class="card-action">
                <span class="icon-download"><i class="fa-solid fa-download"></i></span>
                <span>Download</span>
                <span class="stars">
                    <span style="color:#ffe066">&#9733;&#9733;</span><span style="color:#bbb">&#9733;&#9733;&#9733;</span>
                </span>
            </div>
        </div>
        <!-- Card 3: Hasil 2 -->
        <div class="card card-result">
            <span class="notif">1</span>
            <div class="card-header">UOIX-12982</div>
            <div class="card-desc">Uji sampel mollusca dari pantai seribu</div>
            <div class="card-date">16 November 2024 10:30 WIB</div>
            <div class="card-action">
                <span class="icon-download"><i class="fa-solid fa-download"></i></span>
                <span>Download</span>
                <span class="stars">
                    <span style="color:#ffe066">&#9733;&#9733;</span><span style="color:#bbb">&#9733;&#9733;&#9733;</span>
                </span>
            </div>
        </div>
        <!-- Card 4: Hasil 3 -->
        <div class="card card-result">
            <span class="notif">1</span>
            <div class="card-header">UOIX-12982</div>
            <div class="card-desc">Uji sampel mollusca dari pantai seribu</div>
            <div class="card-date">16 November 2024 10:30 WIB</div>
            <div class="card-action">
                <span class="icon-download"><i class="fa-solid fa-download"></i></span>
                <span>Download</span>
                <span class="stars">
                    <span style="color:#ffe066">&#9733;&#9733;</span><span style="color:#bbb">&#9733;&#9733;&#9733;</span>
                </span>
            </div>
        </div>
    </div>
</body>
</html>
