<?php
ini_set('error_reporting', 1);
session_start();
include_once '../koneksi.php';

function redirect_to_listing() {
    $url = '?p=input_email';
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit();
    }
    echo '<script>window.location.href = ' . json_encode($url) . ';</script>';
    echo '<noscript><meta http-equiv="refresh" content="0;url=' . htmlspecialchars($url) . '"></noscript>';
    exit();
}

$message = '';
$editMode = false;
$editData = ['id' => '', 'nama' => '', 'email' => '', 'departemen' => '', 'jabatan' => ''];

// CREATE or UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $departemen = trim($_POST['departemen'] ?? '');
    $jabatan = trim($_POST['jabatan'] ?? '');

    if ($nama === '' || $email === '' || $departemen === '' || $jabatan === '') {
        $message = '<div class="alert alert-warning">Semua field wajib diisi.</div>';
    } else {
        if ($id > 0) {
            // Update, prevent duplicates except self
            $stmt = mysqli_prepare($con, 'SELECT id FROM master_email WHERE nama=? AND email=? AND departemen=? AND id<>? LIMIT 1');
            mysqli_stmt_bind_param($stmt, 'sssi', $nama, $email, $departemen, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $message = '<div class="alert alert-warning">Kombinasi nama, email, dan departemen sudah digunakan.</div>';
            } else {
                mysqli_stmt_close($stmt);
                $stmt2 = mysqli_prepare($con, 'UPDATE master_email SET nama=?, email=?, departemen=?, jabatan=? WHERE id=?');
                mysqli_stmt_bind_param($stmt2, 'ssssi', $nama, $email, $departemen, $jabatan, $id);
                if (mysqli_stmt_execute($stmt2)) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Data berhasil diperbarui!'];
                    redirect_to_listing();
                } else {
                    $message = '<div class="alert alert-danger">Gagal memperbarui data: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
                }
                mysqli_stmt_close($stmt2);
                // Ensure stmt variable exists for later close
                $stmt = null;
            }
            if ($stmt) mysqli_stmt_close($stmt);
        } else {
            // Create, prevent duplicates
            $stmt = mysqli_prepare($con, 'SELECT id FROM master_email WHERE nama=? AND email=? AND departemen=? LIMIT 1');
            mysqli_stmt_bind_param($stmt, 'sss', $nama, $email, $departemen);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $message = '<div class="alert alert-warning">Data dengan nama, email, dan departemen yang sama sudah ada. Data tidak bisa disimpan dua kali.</div>';
            } else {
                mysqli_stmt_close($stmt);
                $stmt2 = mysqli_prepare($con, 'INSERT INTO master_email (nama, email, departemen, jabatan) VALUES (?,?,?,?)');
                mysqli_stmt_bind_param($stmt2, 'ssss', $nama, $email, $departemen, $jabatan);
                if (mysqli_stmt_execute($stmt2)) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Data berhasil disimpan!'];
                    redirect_to_listing();
                } else {
                    $message = '<div class="alert alert-danger">Gagal menyimpan data: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
                }
                mysqli_stmt_close($stmt2);
                $stmt = null;
            }
            if ($stmt) mysqli_stmt_close($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Input Email</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = '?p=input_email&delete_id=' + id;
        }
        return false;
    }
    </script>
    <style>
        .table td, .table th { vertical-align: middle; }
    </style>
    </head>
<body>
<div class="container" style="margin-top:40px; max-width:650px;">
    <h3>Form Input Email</h3>
    <?php 
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-'.$_SESSION['message']['type'].'">'.$_SESSION['message']['text'].'</div>';
        unset($_SESSION['message']);
    }
    echo $message; 
    ?>
    <form method="post" action="?p=input_email">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($editData['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($editData['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($editData['jabatan']); ?>" required>
        </div>
        <div class="form-group">
            <label for="departemen">Departemen</label>
            <select class="form-control" id="departemen" name="departemen" required>
                <option value="">-- Pilih Departemen --</option>
                <?php
                $qdept = mysqli_query($con, 'SELECT nama FROM tbl_dept ORDER BY nama ASC');
                while ($d = mysqli_fetch_assoc($qdept)) {
                    $selected = ($editData['departemen'] === $d['nama']) ? ' selected' : '';
                    echo '<option value="'.htmlspecialchars($d['nama']).'"'.$selected.'>'.htmlspecialchars($d['nama']).'</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<div class="box-body" style="margin-top:40px; border: 1px solid #ccc; padding: 10px;">
    <h4>Daftar Email</h4>
    <table id="example3" class="table table-bordered table-hover" style="width:100%; background-color: #f9f9f9; border-radius: 10px; overflow: hidden;">
        <thead style="background-color: #229494ff; color: #fff;">
            <tr>
                <th style="padding: 10px;">No</th>
                <th style="padding: 10px;">Nama</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Departemen</th>
                <th style="padding: 10px;">Jabatan</th>
                <th style="padding: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con, 'SELECT id, nama, email, departemen, jabatan FROM master_email ORDER BY id DESC');
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr style="background-color: <?php echo $no % 2 == 0 ? '#e9ecef' : '#fff'; ?>;">
                <td style="padding: 10px;"><?php echo $no++; ?>.</td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($row['nama']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($row['email']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($row['departemen']); ?></td>
                <td style="padding: 10px;"><?php echo htmlspecialchars($row['jabatan']); ?></td>
                <td style="padding: 10px; white-space: nowrap;">
                    <a class="btn btn-warning btn-sm" href="pages/email_modal_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="pages/email_modal_hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if (isset($result) && $result && mysqli_num_rows($result) === 0): ?>
        <div class="alert alert-info" style="margin-top:10px;">Belum ada data.</div>
    <?php endif; ?>
    </div>
</body>
</html>
