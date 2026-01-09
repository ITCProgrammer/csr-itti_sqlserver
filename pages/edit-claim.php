<?php
ini_set('error_reporting', 1);
session_start();
include "koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] === '') {
    echo "<script>alert('Parameter tidak valid');window.location='./LapGarment';</script>";
    exit;
}

// Cek hak akses server-side
if (!isset($_SESSION['lvl_id']) || $_SESSION['lvl_id'] != 'AFTERSALES') {
    echo "<script>alert('Tidak punya akses edit');window.location='./LapGarment';</script>";
    exit;
}

$id = mysqli_real_escape_string($con, $_GET['id']);

// Ambil data awal
$q = mysqli_query($con, "SELECT * FROM reports_claim WHERE id='".$id."'");
if (!$q || mysqli_num_rows($q) == 0) {
    echo "<script>alert('Data tidak ditemukan');window.location='./LapGarment';</script>";
    exit;
}
$data = mysqli_fetch_assoc($q);

// Ambil daftar Nama CV (jika tabel tersedia)
$cv_list = [];
$tblNamaCv = mysqli_query($con, "SHOW TABLES LIKE 'nama_cv'");
if ($tblNamaCv && mysqli_num_rows($tblNamaCv) > 0) {
    $qrym = mysqli_query($con, "SELECT nama_cv FROM nama_cv ORDER BY nama_cv ASC");
    if ($qrym) {
        while ($rm = mysqli_fetch_assoc($qrym)) {
            $cv_list[] = $rm['nama_cv'];
        }
    }
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan']) && $_POST['simpan'] == 'Simpan') {
    $nama_cv      = isset($_POST['nama_cv']) ? mysqli_real_escape_string($con, $_POST['nama_cv']) : '';
    $ket          = isset($_POST['ket']) ? mysqli_real_escape_string($con, $_POST['ket']) : '';
    $invoice_date = isset($_POST['invoice_date']) ? mysqli_real_escape_string($con, $_POST['invoice_date']) : '';
    $total        = isset($_POST['total']) && $_POST['total'] !== '' ? floatval($_POST['total']) : 0;
    $harga        = isset($_POST['harga']) && $_POST['harga'] !== '' ? floatval($_POST['harga']) : 0;
    $total_harga  = isset($_POST['total_harga']) && $_POST['total_harga'] !== '' ? floatval($_POST['total_harga']) : 0;

    // File upload
    $dirUpload = "dist/img-disposisinow/";
    if (!is_dir($dirUpload)) {
        @mkdir($dirUpload, 0777, true);
    }

    $foto1_name = $data['foto1'];
    $foto2_name = $data['foto2'];

    if (isset($_FILES['foto1']) && !empty($_FILES['foto1']['name'])) {
        $tmp1 = $_FILES['foto1']['tmp_name'];
        $base1 = basename($_FILES['foto1']['name']);
        if ($tmp1 && @move_uploaded_file($tmp1, $dirUpload.$base1)) {
            $foto1_name = $base1;
        }
    }
    if (isset($_FILES['foto2']) && !empty($_FILES['foto2']['name'])) {
        $tmp2 = $_FILES['foto2']['tmp_name'];
        $base2 = basename($_FILES['foto2']['name']);
        if ($tmp2 && @move_uploaded_file($tmp2, $dirUpload.$base2)) {
            $foto2_name = $base2;
        }
    }

    $invoice_date_sql = ($invoice_date !== '') ? "'".$invoice_date."'" : "NULL";

    $sql = "UPDATE reports_claim SET
                nama_cv='".$nama_cv."',
                ket='".$ket."',
                invoice_date=".$invoice_date_sql.",
                total=".$total.",
                harga=".$harga.",
                total_harga=".$total_harga.",
                foto1='".$foto1_name."',
                foto2='".$foto2_name."',
                tgl_update=NOW()
            WHERE id='".$id."'";

    $ok = mysqli_query($con, $sql);
    if ($ok) {
        echo "<script>alert('Data berhasil diupdate');window.location='./LapGarment';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal update data');</script>";
    }
}
?>

<div class="box box-info">
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form_edit_claim">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Claim</h3>
      <div class="box-tools pull-right">
        <a href="LapGarment" class="btn btn-default btn-xs">Kembali</a>
      </div>
    </div>
    <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label class="col-sm-3 control-label">No Demand</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no_demand']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Prod. Order</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['prod_order']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Langganan</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['langganan']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Buyer</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars(isset($data['buyer']) ? $data['buyer'] : ''); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No PO</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no_po']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No Order</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no_order']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No Item</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no_item']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No Hanger</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['no_hanger']); ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Jenis Kain</label>
          <div class="col-sm-6">
            <textarea class="form-control" rows="2" readonly><?php echo htmlspecialchars($data['jenis_kain']); ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Warna</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['warna']); ?>" readonly>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="nama_cv" class="col-sm-3 control-label">Nama CV</label>
          <div class="col-sm-6">
            <div class="input-group">
              <?php if (!empty($cv_list)) { ?>
                <select class="form-control select2" name="nama_cv" id="nama_cv">
                  <option value="">Pilih</option>
                  <?php
                    $current_cv = isset($data['nama_cv']) ? trim($data['nama_cv']) : '';
                    $found_current = false;
                    foreach ($cv_list as $cv) {
                      $sel = ($current_cv !== '' && strcasecmp($current_cv, $cv) === 0) ? 'selected' : '';
                      if ($sel) { $found_current = true; }
                      echo '<option value="'.htmlspecialchars($cv).'" '.$sel.'>'.htmlspecialchars($cv)."</option>";
                    }
                    if ($current_cv !== '' && !$found_current) {
                      echo '<option value="'.htmlspecialchars($current_cv).'" selected>'.htmlspecialchars($current_cv).' (current)</option>';
                    }
                  ?>
                </select>
              <?php } else { ?>
                <input type="text" class="form-control" id="nama_cv" name="nama_cv" value="<?php echo htmlspecialchars($data['nama_cv']); ?>">
              <?php } ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataCV"> ...</button></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="ket" class="col-sm-3 control-label">Keterangan</label>
          <div class="col-sm-6">
            <textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php echo htmlspecialchars($data['ket']); ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="invoice_date" class="col-sm-3 control-label">Invoice Date</label>
          <div class="col-sm-6">
            <input type="date" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo ($data['invoice_date'] ? htmlspecialchars(substr($data['invoice_date'],0,10)) : ''); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="total" class="col-sm-3 control-label">Total</label>
          <div class="col-sm-6">
            <input type="number" class="form-control" id="total" name="total" value="<?php echo htmlspecialchars($data['total']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="harga" class="col-sm-3 control-label">Harga</label>
          <div class="col-sm-6">
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($data['harga']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="total_harga" class="col-sm-3 control-label">Total Harga</label>
          <div class="col-sm-6">
            <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?php echo htmlspecialchars($data['total_harga']); ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Foto 1</label>
          <div class="col-sm-6">
            <input type="file" id="foto1" name="foto1">
            <?php if (!empty($data['foto1'])) { ?>
                <p class="help-block">Saat ini: <?php echo htmlspecialchars($data['foto1']); ?></p>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Foto 2</label>
          <div class="col-sm-6">
            <input type="file" id="foto2" name="foto2">
            <?php if (!empty($data['foto2'])) { ?>
                <p class="help-block">Saat ini: <?php echo htmlspecialchars($data['foto2']); ?></p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
        <a href="LapGarment" class="btn btn-default">Batal</a>
      </div>
    </div>
  </form>
</div>

<!-- Modal Tambah Nama CV -->
<div class="modal fade" id="DataCV">
  <div class="modal-dialog ">
    <div class="modal-content">
      <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nama CV</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="nama_cv_input" class="col-md-3 control-label">Nama CV</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama_cv_input" name="nama_cv_input" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input type="submit" value="Simpan" name="simpan_cv" id="simpan_cv" class="btn btn-primary pull-right">
        </div>
      </form>
    </div>
  </div>
  
</div>
<?php
// Handler simpan CV baru
if (isset($_POST['simpan_cv']) && $_POST['simpan_cv'] == "Simpan") {
  $nama_cv_baru = strtoupper(trim($_POST['nama_cv_input']));
  if ($nama_cv_baru !== '') {
    $tblCv = mysqli_query($con, "SHOW TABLES LIKE 'nama_cv'");
    if ($tblCv && mysqli_num_rows($tblCv) > 0) {
      // Cegah duplikasi sederhana
      $cek = mysqli_query($con, "SELECT 1 FROM nama_cv WHERE nama_cv='".mysqli_real_escape_string($con,$nama_cv_baru)."' LIMIT 1");
      if ($cek && mysqli_num_rows($cek) == 0) {
        mysqli_query($con, "INSERT INTO nama_cv SET nama_cv='".mysqli_real_escape_string($con,$nama_cv_baru)."'");
      }
    }
  }
  echo "<script>swal({title:'Data Telah Tersimpan', text:'Klik Ok untuk melanjutkan', type:'success'}).then((result)=>{ if(result.value){ window.location.href='EditClaim-".htmlspecialchars($id)."'; } });</script>";
}
?>
