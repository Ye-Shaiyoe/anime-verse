<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');          
define('DB_PASS', '123456');              
define('DB_NAME', 'foto_upload');


define('UPLOAD_DIR', __DIR__ . '/uploads/'); 
define('MAX_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

function getDB() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8mb4");
    return $mysqli;
}


function securePath($path) {
    return preg_replace('/[^a-zA-Z0-9._-]/', '', basename($path));
}
?>