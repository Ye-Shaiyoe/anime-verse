<?php
require_once 'config.php';

// Hanya terima POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['foto'])) {
    header('Location: index.php?error=Metode+tidak+diizinkan');
    exit;
}

$foto = $_FILES['foto'];
$error = '';

// Validasi error upload
if ($foto['error'] !== UPLOAD_ERR_OK) {
    $errors = [
        UPLOAD_ERR_INI_SIZE => 'File terlalu besar (melebihi upload_max_filesize)',
        UPLOAD_ERR_FORM_SIZE => 'File terlalu besar (melebihi MAX_FILE_SIZE)',
        UPLOAD_ERR_NO_FILE => 'Tidak ada file dipilih',
        UPLOAD_ERR_NO_TMP_DIR => 'Folder temp tidak tersedia',
        UPLOAD_ERR_CANT_WRITE => 'Gagal menulis file',
        UPLOAD_ERR_EXTENSION => 'Upload dibatalkan ekstensi'
    ];
    $error = $errors[$foto['error']] ?? 'Error tidak dikenal';
}

// Validasi ukuran
elseif ($foto['size'] > MAX_SIZE) {
    $error = 'Ukuran file maksimal 5MB';
}

// Validasi tipe MIME (lebih aman daripada ekstensi)
else {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $foto['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mime, ALLOWED_TYPES)) {
        $error = 'Hanya diperbolehkan JPG, PNG, GIF, atau WEBP';
    }
}

// Jika ada error
if ($error) {
    header("Location: index.php?error=" . urlencode($error));
    exit;
}

// Generate nama file unik
$ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
$nama_baru = 'foto_' . time() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
$nama_baru = securePath($nama_baru); // Sanitasi nama file
$path_tujuan = UPLOAD_DIR . $nama_baru;

// Pastikan direktori uploads ada
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// Pindahkan file
if (!move_uploaded_file($foto['tmp_name'], $path_tujuan)) {
    header('Location: index.php?error=Gagal+memindahkan+file');
    exit;
}

// Simpan metadata ke database
$mysqli = getDB();
$stmt = $mysqli->prepare(
    "INSERT INTO galeri_foto (nama_file, ukuran_file, tipe_file, path_file) 
     VALUES (?, ?, ?, ?)"
);
$relative_path = 'uploads/' . $nama_baru; // Path relatif untuk akses web
$stmt->bind_param(
    "siss", 
    $foto['name'], 
    $foto['size'], 
    $mime, 
    $relative_path
);

if ($stmt->execute()) {
    header('Location: index.php?success=1');
} else {

    unlink($path_tujuan);
    header('Location: index.php?error=Gagal+simpan+ke+database');
}

$stmt->close();
$mysqli->close();
?>