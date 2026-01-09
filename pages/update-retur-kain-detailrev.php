<?php
include "koneksi.php";
ini_set("error_reporting", 1);

// Ambil data berdasarkan ID
$id = isset($_GET['id']) ? $_GET['id'] : '';
$qryCek = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id='$id'");
$rCek = mysqli_fetch_array($qryCek);

if ($_POST['update'] == "update") {
    $masalah = str_replace("'", "''", $_POST['masalah']);
    $jenis_kain = str_replace("'", "''", $_POST['jenis_kain']);
    $warna = str_replace("'", "''", $_POST['warna']);
    $lot = str_replace("'", "''", $_POST['lot']);
    $kg = str_replace("'", "''", $_POST['kg']);
    $pjg = str_replace("'", "''", $_POST['pjg']);
    $satuan = str_replace("'", "''", $_POST['satuan']);
    $roll = str_replace("'", "''", $_POST['roll']);
    $ket = str_replace("'", "''", $_POST['ket']);
    $sjreturplg = str_replace("'", "''", $_POST['sjreturplg']);
    $tgl_sjretur = $_POST['tgl_sjretur'];
    $tgltrm_sjretur = $_POST['tgltrm_sjretur'];
    $sj_itti = str_replace("'", "''", $_POST['sj_itti']);
    $tgl_sjitti = $_POST['tgl_sjitti'];
    $masalah_dominan = $_POST['masalah_dominan'];
    $t_jawab = $_POST['t_jawab'];
    $t_jawab1 = $_POST['t_jawab1'];
    $t_jawab2 = $_POST['t_jawab2'];

    $qry1 = mysqli_query($con, "UPDATE tbl_detail_retur_now SET 
        masalah='$masalah',
        jenis_kain='$jenis_kain',
        warna='$warna',
        lot='$lot',
        kg='$kg',
        pjg='$pjg',
        satuan='$satuan',
        roll='$roll',
        ket='$ket',
        sjreturplg='$sjreturplg',
        tgl_sjretur='$tgl_sjretur',
        tgltrm_sjretur='$tgltrm_sjretur',
        sj_itti='$sj_itti',
        tgl_sjitti='$tgl_sjitti',
        masalah_dominan='$masalah_dominan',
        t_jawab='$t_jawab',
        t_jawab1='$t_jawab1',
        t_jawab2='$t_jawab2',
        tgl_update=now()
        WHERE id='$id'");
    if ($qry1) {
        echo "<script>swal({
          title: 'Data Telah diUpdate',   
          text: 'Klik Ok untuk kembali',
          type: 'success',
          }).then((result) => {
          if (result.value) {
              window.location.href='LapRetur';
          }
        });</script>";
    }
}
?>

<div class="box box-info">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
        <div class="box-header with-border">
            <h3 class="box-title">Update Data Retur</h3> <br>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="masalah" class="col-sm-2 control-label">Masalah</label>
                <div class="col-sm-4">
                    <textarea name="masalah" rows="3" class="form-control" id="masalah" placeholder="Masalah"><?php echo $rCek['masalah']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kain" class="col-sm-2 control-label">Jenis Kain</label>
                <div class="col-sm-3">
                    <input name="jenis_kain" type="text" class="form-control" id="jenis_kain" value="<?php echo $rCek['jenis_kain']; ?>" placeholder="Jenis Kain" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="warna" class="col-sm-2 control-label">Warna</label>
                <div class="col-sm-3">
                    <input name="warna" type="text" class="form-control" id="warna" value="<?php echo $rCek['warna']; ?>" placeholder="Warna" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="lot" class="col-sm-2 control-label">Lot</label>
                <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" value="<?php echo $rCek['lot']; ?>" placeholder="Lot" >
                </div>
            </div>
            <div class="form-group">
                <label for="roll" class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-2">
                    <input name="roll" type="text" class="form-control" id="roll" value="<?php echo $rCek['roll']; ?>" placeholder="Roll">
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <input name="kg" type="text" class="form-control" id="kg" value="<?php echo $rCek['kg']; ?>" placeholder="0.00" style="text-align: right;">
                        <span class="input-group-addon">Kg</span>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <input name="pjg" type="text" class="form-control" id="pjg" value="<?php echo $rCek['pjg']; ?>" placeholder="0.00" style="text-align: right;">
                        <span class="input-group-addon">
                            <select name="satuan" style="font-size: 12px;" id="satuan">
                                <option value="Yard" <?php if($rCek['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
                                <option value="Meter" <?php if($rCek['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
                                <option value="PCS" <?php if($rCek['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-4">
                    <textarea name="ket" rows="2" class="form-control" id="ket" placeholder="Keterangan" readonly><?php echo $rCek['ket']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="sjreturplg" class="col-sm-2 control-label">SJ Retur Pelanggan</label>
                <div class="col-sm-2">
                    <input name="sjreturplg" type="text" class="form-control" id="sjreturplg" value="<?php echo $rCek['sjreturplg']; ?>" placeholder="SJ Retur Pelanggan" readonly>
                </div>
                <div class="col-sm-2">
                    <input name="tgl_sjretur" type="date" class="form-control" id="tgl_sjretur" value="<?php echo $rCek['tgl_sjretur']; ?>" readonly>
                </div>
                <div class="col-sm-2">
                    <input name="tgltrm_sjretur" type="date" class="form-control" id="tgltrm_sjretur" value="<?php echo $rCek['tgltrm_sjretur']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="sj_itti" class="col-sm-2 control-label">SJ ITTI</label>
                <div class="col-sm-2">
                    <input name="sj_itti" type="text" class="form-control" id="sj_itti" value="<?php echo $rCek['sj_itti']; ?>" placeholder="SJ ITTI" readonly>
                </div>
                <div class="col-sm-2">
                    <input name="tgl_sjitti" type="date" class="form-control" id="tgl_sjitti" value="<?php echo $rCek['tgl_sjitti']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="masalah_dominan" class="col-sm-2 control-label">Sub Defect</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
                            <option value="">Pilih</option>
                            <?php 
                            $qrym = mysqli_query($con, "SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
                            while ($rm = mysqli_fetch_array($qrym)) {
                            ?>
                            <option value="<?php echo $rm['masalah']; ?>" <?php if ($rCek['masalah_dominan'] == $rm['masalah']) { echo "SELECTED"; } ?>><?php echo $rm['masalah']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="t_jawab" class="col-sm-2 control-label">Dept. Tanggung Jawab 1</label>
                <div class="col-sm-2">
                    <input name="t_jawab" type="text" class="form-control" id="t_jawab" value="<?php echo $rCek['t_jawab']; ?>" placeholder="Dept. 1" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="t_jawab1" class="col-sm-2 control-label">Dept. Tanggung Jawab 2</label>
                <div class="col-sm-2">
                    <input name="t_jawab1" type="text" class="form-control" id="t_jawab1" value="<?php echo $rCek['t_jawab1']; ?>" placeholder="Dept. 2" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="t_jawab2" class="col-sm-2 control-label">Dept. Tanggung Jawab 3</label>
                <div class="col-sm-2">
                    <input name="t_jawab2" type="text" class="form-control" id="t_jawab2" value="<?php echo $rCek['t_jawab2']; ?>" placeholder="Dept. 3" readonly>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right" name="update" value="update">Update <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sub Defect</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_masalah']=="Simpan"){
	$masalah=strtoupper($_POST['masalah_dominan']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalah_aftersales SET 
		  masalah='$masalah'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='KPENew-$nodemand';
	 
  }
});</script>";
		}
}
?>