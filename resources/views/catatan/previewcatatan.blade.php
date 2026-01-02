<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Catatan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4ed7f1 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .preview-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card-header {
            background: linear-gradient(135deg, #ffca28 0%, #ffca28 100%);
            padding: 40px;
            color: white;
            text-align: center;
        }
        
        .card-header h1 {
            font-size: 32px;
            margin-bottom: 12px;
            font-weight: 700;
        }
        
        .badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }
        
        .card-body {
            padding: 40px;
        }
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .info-label {
            font-size: 12px;
            text-transform: uppercase;
            color: #4ed7f1;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        
        .info-content {
            font-size: 16px;
            color: #333;
            line-height: 1.8;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #4ed7f1;
        }
        
        .meta-info {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .meta-item {
            flex: 1;
            min-width: 200px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .btn {
            flex: 1;
            min-width: 150px;
            padding: 16px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4ed7f1 0%, #4ed7f1 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }
        
        .btn-secondary {
            background: #f8f9fa;
            color: #ffca28;
            border: 2px solid #ffca28;
        }
        
        .btn-secondary:hover {
            background: #ffca28;
            color: white;
        }
        
        .icon {
            width: 20px;
            height: 20px;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            
            .card-header {
                padding: 30px 20px;
            }
            
            .card-header h1 {
                font-size: 24px;
            }
            
            .card-body {
                padding: 24px;
            }
            
            .meta-info {
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="preview-card">
            <!-- Header Card -->
            <div class="card-header">
                <h1>Judul Catatan</h1> <!-- ini nanti ambil data dari judul catatan -->
                <span class="badge">Kategori</span> <!-- ini nanti ambil data dari kategori catatan -->
            </div>
            
            <!-- Body Card -->
            <div class="card-body">
                <!-- Meta Information -->
                <div class="meta-info">
                    <div class="meta-item">
                        <div class="info-label">Tanggal</div>
                        <div class="info-content">01 Januari 2026</div> <!-- ini nanti ambil data dari tanggal catatan -->
                    </div>
                    
                    <div class="meta-item">
                        <div class="info-label">Penulis</div>
                        <div class="info-content">Nama Penulis</div> <!-- ini nanti ambil data dari penulis/nama akun catatan -->
                    </div>
                </div>
                
                <!-- Deskripsi Catatan -->
                <div class="info-section">
                    <div class="info-label">Deskripsi Catatan</div>
                    <div class="info-content">
                        Ini adalah deskripsi catatan. Nanti bagian backend akan mengisi konten ini dengan data dari database. Deskripsi ini bisa panjang dan akan otomatis menyesuaikan dengan konten yang ada.
                    </div> <!-- ini nanti ambil data dari deskripsi catatan -->
                </div>
                
                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="#" class="btn btn-primary"> <!-- ini nanti ambil data dari file catatan -->
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download PDF
                    </a>
                    
                    <a href="#" class="btn btn-secondary">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>