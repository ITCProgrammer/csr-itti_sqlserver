<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$message = '';

// Ambil data bon
$bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id=$id"));
// Link halaman cetak untuk bon ini
$linkCetak = 'cetak/cetak_bon_ganti.php?id_cek=' . urlencode($id);
if (!empty($bon['id_nsp'])) {
    $linkCetak .= '&id_nsp=' . urlencode($bon['id_nsp']);
}

// Simpan pilihan stok
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah sudah pernah diisi
    $cek = mysqli_fetch_assoc(mysqli_query($con, "SELECT approved_rmp FROM tbl_ganti_kain_now WHERE id=$id"));
    if (!empty($cek['approved_rmp'])) {
        $message = '<div class="alert alert-warning">Status stok sudah pernah diinput dan tidak bisa diubah lagi.</div>';
    } else {
        $pilihan = mysqli_real_escape_string($con, $_POST['stok']);
        $personilrmp = mysqli_real_escape_string($con, $_POST['approve_rmp']);
        $sql = "UPDATE tbl_ganti_kain_now SET approved_rmp='$pilihan', personil_rmp='$personilrmp', tgl_approve_rmp=NOW() WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            $message = '<div class="alert alert-success">Pilihan berhasil disimpan!</div>';
        } else {
            $message = '<div class="alert alert-danger">Gagal menyimpan: ' . mysqli_error($con) . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Approve RMP - Bon Ganti Kain</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Approve RMP: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_bon']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Pilih Status</label>
                        <select class="form-control" id="stok" name="stok" required>
                            <option value="">-- Pilih --</option>
                            <option value="Approved">Approved</option>
                            <option value="Tidak Approve">Tidak Approve</option>
                        </select>
                        <span style='color:#888;font-size:12px;'>Link approve hanya dikirim ke Kepala Departemen.</span><br>
                    </div>
                    <div class="form-group">
                        <label for="approve_rmp"><strong>Pilih PIC Approve</strong></label>
                        <select class="form-control" id="approve_rmp" name="approve_rmp" required>
                            <option value="">Pilih ...</option>

                            <?php
                            $queryEmail = mysqli_query($con, "SELECT nama FROM master_email WHERE departemen = 'RMP' ORDER BY nama ASC");
                            while ($rowEmail = mysqli_fetch_assoc($queryEmail)) {
                                $selected = '';
                                if (isset($_POST['approve_rmp']) && $_POST['approve_rmp'] === $rowEmail['nama']) {
                                    $selected = ' selected';
                                }
                                echo '<option value="' . htmlspecialchars($rowEmail['nama']) . '"' . $selected . '>' .
                                    htmlspecialchars($rowEmail['nama']). '</option>';
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted">
                           Pilih Salah Satu Nama Untuk Untuk Approve RMP .
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="clearfix" style="margin-bottom:10px;">
                    <h4 class="pull-left" style="margin-top:0;">Halaman Cetak Bon</h4>
                    <a class="btn btn-default btn-sm pull-right" href="<?php echo htmlspecialchars($linkCetak); ?>" target="_blank">Buka Halaman Cetak</a>
                </div>
                <iframe style="width:100%; height:1100px; border:1px solid #ddd;" src="<?php echo htmlspecialchars($linkCetak); ?>"></iframe>
            </div>
        </div>
    </div>
</body>

</html>
