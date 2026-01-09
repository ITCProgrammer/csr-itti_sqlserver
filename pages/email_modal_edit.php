<?php
ini_set('error_reporting', 1);
session_start();
include_once '../koneksi.php';

function redirect_back() {
    $url = '../inputemail';
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit();
    }
    echo '<script>window.location.href = ' . json_encode($url) . ';</script>';
    echo '<noscript><meta http-equiv="refresh" content="0;url=' . htmlspecialchars($url) . '"></noscript>';
    exit();
}

$message = '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    $_SESSION['message'] = ['type' => 'danger', 'text' => 'ID tidak valid.'];
    redirect_back();
}

// Ambil data awal
$data = ['id' => $id, 'nama' => '', 'email' => '', 'departemen' => '', 'jabatan' => ''];
$stmt = mysqli_prepare($con, 'SELECT id, nama, email, departemen, jabatan FROM master_email WHERE id=? LIMIT 1');
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $rid, $rnama, $remail, $rdept, $rjabatan);
    if (mysqli_stmt_fetch($stmt)) {
        $data = ['id' => $rid, 'nama' => $rnama, 'email' => $remail, 'departemen' => $rdept, 'jabatan' => $rjabatan];
    } else {
        mysqli_stmt_close($stmt);
        $_SESSION['message'] = ['type' => 'danger', 'text' => 'Data tidak ditemukan.'];
        redirect_back();
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Gagal memuat data.'];
    redirect_back();
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $departemen = trim($_POST['departemen'] ?? '');
    $jabatan = trim($_POST['jabatan'] ?? '');

    if ($nama === '' || $email === '' || $departemen === '' || $jabatan === '') {
        $message = '<div class="alert alert-warning">Semua field wajib diisi.</div>';
    } else {
        // Cek duplikasi selain dirinya sendiri
        $cek = mysqli_prepare($con, 'SELECT id FROM master_email WHERE nama=? AND email=? AND departemen=? AND id<>? LIMIT 1');
        mysqli_stmt_bind_param($cek, 'sssi', $nama, $email, $departemen, $id);
        mysqli_stmt_execute($cek);
        mysqli_stmt_store_result($cek);
        if (mysqli_stmt_num_rows($cek) > 0) {
            $message = '<div class="alert alert-warning">Kombinasi nama, email, dan departemen sudah digunakan.</div>';
        } else {
            mysqli_stmt_close($cek);
            $upd = mysqli_prepare($con, 'UPDATE master_email SET nama=?, email=?, departemen=?, jabatan=? WHERE id=?');
            mysqli_stmt_bind_param($upd, 'ssssi', $nama, $email, $departemen, $jabatan, $id);
            if (mysqli_stmt_execute($upd)) {
                $_SESSION['message'] = ['type' => 'success', 'text' => 'Data berhasil diperbarui!'];
                redirect_back();
            } else {
                $message = '<div class="alert alert-danger">Gagal memperbarui data: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
            }
            mysqli_stmt_close($upd);
            $cek = null;
        }
        if ($cek) mysqli_stmt_close($cek);
        // Refresh data di form jika ada error
        $data = ['id' => $id, 'nama' => $nama, 'email' => $email, 'departemen' => $departemen, 'jabatan' => $jabatan];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Email</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .container { max-width: 650px; }
    </style>
    <script>
    function goBack() { window.location.href='../inputemail'; }
    </script>
    </head>
<body>
<div class="container">
    <h3>Edit Email</h3>
    <?php echo $message; ?>
    <form method="post" action="?id=<?php echo (int)$data['id']; ?>">
        <input type="hidden" name="id" value="<?php echo (int)$data['id']; ?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($data['jabatan']); ?>" required>
        </div>
        <div class="form-group">
            <label for="departemen">Departemen</label>
            <select class="form-control" id="departemen" name="departemen" required>
                <option value="">-- Pilih Departemen --</option>
                <?php
                $qdept = mysqli_query($conadm, 'SELECT nama FROM tbl_dept ORDER BY nama ASC');
                while ($d = mysqli_fetch_assoc($qdept)) {
                    $selected = ($data['departemen'] === $d['nama']) ? ' selected' : '';
                    echo '<option value="'.htmlspecialchars($d['nama']).'"'.$selected.'>'.htmlspecialchars($d['nama']).'</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="../inputemail" class="btn btn-default">Batal</a>
    </form>
</div>
</body>
</html>
