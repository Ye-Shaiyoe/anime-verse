<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            max-width: 500px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            animation: slideUp 0.5s ease;
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

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .alert { 
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 10px;
            font-size: 14px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .alert-success { 
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-error { 
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert a {
            color: inherit;
            font-weight: bold;
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
            background: #f8f9fa;
            border: 2px dashed #667eea;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            color: #667eea;
            font-weight: 600;
        }

        .file-input-label:hover {
            background: #e9ecef;
            border-color: #764ba2;
            color: #764ba2;
            transform: scale(1.02);
        }

        .file-input-label::before {
            content: "📁";
            font-size: 48px;
            display: block;
            margin-bottom: 10px;
        }

        .file-name {
            margin-top: 10px;
            font-size: 13px;
            color: #666;
            font-style: italic;
            text-align: center;
            min-height: 20px;
        }

        button[type=submit] {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        button[type=submit]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        button[type=submit]:active {
            transform: translateY(0);
        }

        .info-text {
            text-align: center;
            color: #999;
            font-size: 12px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📤 Upload Foto</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">✅ Foto berhasil diupload! <a href="gallery.php">Lihat galeri</a></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">❌ <?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Pilih foto (Max 5MB, JPG/PNG/GIF/WEBP):</label>
                <div class="file-input-wrapper">
                    <input type="file" id="foto" name="foto" accept="image/*" required>
                    <label for="foto" class="file-input-label">
                        <span>Klik atau drag file ke sini</span>
                    </label>
                </div>
                <div class="file-name" id="fileName"></div>
            </div>
            
            <button type="submit">Upload Foto</button>
            <p class="info-text">File akan diupload dengan aman</p>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('foto');
        const fileNameDisplay = document.getElementById('fileName');
        const fileLabel = document.querySelector('.file-input-label span');

        fileInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2);
                fileNameDisplay.textContent = `📎 ${fileName} (${fileSize} MB)`;
                fileLabel.textContent = '✓ File dipilih - Klik untuk ganti';
            }
        });
    </script>
</body>
</html>