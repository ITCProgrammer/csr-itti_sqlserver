<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

  </head>

  <body>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Filter Rekap Email Bon Pengubung</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
          <div class="form-group">
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" />
              </div>
            </div>
            <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>
            <!-- /.input group -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->

        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Email Bon Penghubung</h3><br>
            <?php if ($_POST['awal']!="" and $_POST['akhir']!="") {
    ?><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal']))." s/d ".date('d F Y', strtotime($_POST['akhir'])); ?></b>
            <?php
} ?>
            
          </div>
          <div class="box-body">
            <table id="example3" class="table table-bordered table-hover table-striped display nowrap" width="100%">
              <thead class="bg-red">
                <tr>
                  <th width="41">
                    <div align="center">No</div>
                  </th>
                  <th width="97">
                    <div align="center">Tanggal</div>
                  </th>
                  <th width="91">
                    <div align="center">Jam</div>
                  </th>
                  <th width="107">
                    <div align="center">No BON</div>
                  </th>
                  <th width="749">
                    <div align="center">Kirim Ke</div>
                  </th>
                  <th width="87"><div align="center">Isi</div></th>
                </tr>
              </thead>
              <tbody>
                <?php
  $sql=mysqli_query($con,"SELECT * FROM tbl_email_bon
WHERE tgl_kirim BETWEEN '$_POST[awal]' AND '$_POST[akhir]'");
  while ($r=mysqli_fetch_array($sql)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
      $awalSH  = strtotime($r['tgl_delivery_akhir']);
      $akhirSH = strtotime($r['tgl_kirim']);
      $diffSH  = ($akhirSH - $awalSH);
      $tjamSH  =round($diffSH/(60 * 60), 2);
      $hariSH  =round($tjamSH/24, 2);
      if ($hariSH>0) {
          $ket="Tidak Tercapai";
      } else {
          $ket="Tercapai";
      } ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="center">
                    <?php echo date('d M Y', strtotime($r['tgl_kirim'])); ?>
                  </td>
                  <td align="center">
                    <?php echo date('H:i:s', strtotime($r['jam_kirim'])); ?>
                  </td>
                  <td align="center">
                    <?php echo $r['no_bon']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['kirim_ke']; ?>
                  </td>
                  <td align="center"><a href="#" class="btn btn-xs dtmail btn-warning" id=<?php echo $r['id']; ?>><i class="fa fa-paper-plane-o"></i> </span></a></td>
                </tr>
                <?php
  $total=$total+$r['qty_order'];
  } ?>
              </tbody>
              <tfoot>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                </tr>
              </tfoot>
            </table>
            </form>
			<div id="GDBBtlSelesai" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="DtMail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
  </body>

</html>
