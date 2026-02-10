<?php
require_once 'config.php';
$mysqli = getDB();
$result = $mysqli->query("SELECT * FROM galeri_foto ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Foto</title>
    <style>
        body { font-family: Arial; max-width: 1000px; margin: 2rem auto; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
        .item { border: 1px solid #ddd; border-radius: 4px; padding: 8px; text-align: center; }
        .item img { max-width: 100%; height: 150px; object-fit: cover; }
        .back { display: inline-block; margin: 10px 0; text-decoration: none; color: #0066cc; }
    </style>
</head>
<body>
    <h1>🖼️ Galeri Foto</h1>
    <a href="index.php" class="back">&larr; Upload Foto Baru</a>
    
    <?php if ($result && $result->num_rows > 0): ?>
        <div class="grid">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="item">
                <img src="<?= htmlspecialchars($row['path_file']) ?>" 
                     alt="<?= htmlspecialchars($row['nama_file']) ?>">
                <p><small><?= htmlspecialchars($row['nama_file']) ?></small></p>
                <p><small><?= round($row['ukuran_file'] / 1024, 1) ?> KB</small></p>
            </div>
        <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Belum ada foto. <a href="index.php">Upload sekarang</a></p>
    <?php endif; ?>
    
    <?php $mysqli->close(); ?>
</body>
</html>