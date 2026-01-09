<?php
ini_set('error_reporting', 1);
session_start();
// gunakan path yang benar untuk koneksi dari folder pages/
include_once __DIR__ . '/../koneksi.php';

// Helper redirect: gunakan JS agar alert sebelumnya tetap muncul
function js_redirect($url) {
    echo '<script>window.location.href = ' . json_encode($url) . ';</script>';
    echo '<noscript><meta http-equiv="refresh" content="0;url=' . htmlspecialchars($url) . '"></noscript>';
    exit;
}

// Ambil ID dari beberapa kemungkinan key (id|delete_id|modal_id) baik GET maupun POST
$id = 0;
foreach (['id', 'delete_id', 'modal_id'] as $key) {
    if (isset($_REQUEST[$key]) && is_numeric($_REQUEST[$key])) {
        $id = (int)$_REQUEST[$key];
        break;
    }
}

if ($id <= 0) {
    echo "<script>alert('ID tidak valid!');</script>";
    js_redirect('../inputemail');
}

// Hapus data dengan prepared statement
$stmt = mysqli_prepare($con, 'DELETE FROM master_email WHERE id=?');
if (!$stmt) {
    echo "<script>alert('Gagal mempersiapkan query.');</script>";
    js_redirect('../inputemail');
}
mysqli_stmt_bind_param($stmt, 'i', $id);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    js_redirect('../inputemail');
} else {
    $err = htmlspecialchars(mysqli_error($con));
    echo "<script>alert('Gagal hapus: {$err}');</script>";
    js_redirect('../inputemail');
}
?>
<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $modal_id = intval($_GET['id']);
    $modal = mysqli_query($con, "DELETE FROM master_email WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='inputemail';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='inputemail';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid!');window.location='inputemail';</script>";
}
?>
