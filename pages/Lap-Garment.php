<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Filter Claim</title>
</head>

<body>
  <?php
  // Ambil filter dari POST atau GET agar tetap terbawa setelah redirect
  $Awal  = isset($_REQUEST['awal']) ? $_REQUEST['awal'] : '';
  $Akhir  = isset($_REQUEST['akhir']) ? $_REQUEST['akhir'] : '';
  $Demand  = isset($_REQUEST['demand']) ? $_REQUEST['demand'] : '';
  $Lot  = isset($_REQUEST['prod_order']) ? $_REQUEST['prod_order'] : '';
  $Order  = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
  $Langganan  = isset($_REQUEST['langganan']) ? $_REQUEST['langganan'] : '';
  $PO  = isset($_REQUEST['po']) ? $_REQUEST['po'] : '';
  $nama_cv  = isset($_REQUEST['nama_cv']) ? $_REQUEST['nama_cv'] : '';
  $hanger  = isset($_REQUEST['hanger']) ? $_REQUEST['hanger'] : '';
  $Warna  = isset($_REQUEST['warna']) ? $_REQUEST['warna'] : '';
  ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Filter Claim</h3>
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
              <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
            </div>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off" />
            </div>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <input name="demand" type="text" class="form-control pull-right" id="demand" placeholder="No Demand" value="<?php echo $Demand;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="prod_order" type="text" class="form-control pull-right" id="prod_order" placeholder="No Production Order" value="<?php echo $Lot;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan" value="<?php echo $Langganan;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" />
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <input name="nama_cv" type="text" class="form-control pull-right" id="nama_cv" placeholder="nama cv" value="<?php echo $nama_cv;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="hanger" value="<?php echo $hanger;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna" value="<?php echo $Warna;  ?>" />
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Claim</h3><br>
        </div>
        <div class="box-header with-border" style="display: flex; justify-content: flex-end;">
          <a href="pages/cetak/lap-garment-excel.php?awal=<?php echo urlencode($Awal); ?>&akhir=<?php echo urlencode($Akhir); ?>&demand=<?php echo urlencode($Demand); ?>&prod_order=<?php echo urlencode($Lot); ?>&order=<?php echo urlencode($Order); ?>&langganan=<?php echo urlencode($Langganan); ?>&po=<?php echo urlencode($PO); ?>&nama_cv=<?php echo urlencode($nama_cv); ?>&hanger=<?php echo urlencode($hanger); ?>&warna=<?php echo urlencode($Warna); ?>" class="btn btn-primary <?php echo ($Awal=='' && $Akhir=='' && $Demand=='' && $Lot=='' && $Order=='' && $Langganan=='' && $PO=='' && $nama_cv=='' && $hanger=='' && $Warna=='') ? 'disabled' : ''; ?>" target="_blank">Export Excel</a>
        </div>
        <div class="box-body">
          <div class="tabel-responsive">
            <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
              <thead class="bg-blue">
                <tr>
                  <th><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                  <th><div align="center">No Demand</div></th>
                  <th><div align="center">No Production Order</div></th>
                  <th><div align="center">Langganan</div></th>
                  <th><div align="center">Buyer</div></th>
                  <th><div align="center">No PO</div></th>
                  <th><div align="center">No Order</div></th>
                  <th><div align="center">No Item</div></th>
                  <th><div align="center">Jenis Kain</div></th>
                  <th><div align="center">Warna</div></th>
                  <th><div align="center">Nama CV</div></th>
                  <th><div align="center">Total (Pcs)</div></th>
                  <th><div align="center">Harga (Pcs)</div></th>
                  <th><div align="center">Total Harga</div></th>
                  <th><div align="center">File Foto 1</div></th>
                  <th><div align="center">File Foto 2</div></th>
                  <th><div align="center">Keterangan</div></th>
                </tr>

              </thead>
              <tbody>
                <?php
                if ($Awal != "") {
                  $Where = " AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";
                }
                $no = 1;
                if ($Awal != "" or $Demand != "" or $Lot != "" or $Order != "" or $Langganan != "" or $PO != "" or $nama_cv != "" or $hanger != "" or $Warna != "") {
                  $sql = "SELECT * FROM reports_claim 
                    WHERE no_demand LIKE '%$Demand%' AND prod_order LIKE '%$Lot%' AND nama_cv LIKE '%$nama_cv%' AND no_order LIKE '%$Order%' AND langganan LIKE '%$Langganan%' AND no_po LIKE '%$PO%' AND no_hanger LIKE '%$hanger%' AND warna LIKE '%$Warna%' $Where
                    ORDER BY no_demand ASC";
                } else {
                  $sql = "SELECT * FROM reports_claim 
                    WHERE no_demand LIKE '$Demand' AND prod_order LIKE '$Lot' AND nama_cv LIKE '%$nama_cv%' AND no_order LIKE '$Order' AND langganan LIKE '$Langganan' AND no_hanger LIKE '$hanger' AND no_po LIKE '$PO' AND warna LIKE '$Warna' $Where
                    ORDER BY no_demand ASC";
                }
                $sqlData1 = mysqli_query($con, $sql);
                while ($row1 = mysqli_fetch_array($sqlData1)) {
                  $noorder = str_replace("/", "&", $row1['no_order']);
                ?>
                  <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center">
                      <div class="btn-group">
                        <a href="EditClaim-<?php echo $row1['id']; ?>" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Claim"></i> </a>
                        <a href="#" class="btn btn-danger btn-xs "onclick="confirm_delete('./HapusDataClaim-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
                      </div>
                    </td>
                    <td align="center"><?php echo $row1['no_demand']; ?></td>
                    <td align="center"><?php echo $row1['prod_order']; ?></td>
                    <td align="center"><?php echo $row1['langganan']; ?></td>
                    <td align="center"><?php echo $row1['buyer']; ?></td>
                    <td align="center"><?php echo $row1['no_po']; ?></td>
                    <td align="center"><?php echo $row1['no_order']; ?></td>
                    <td align="center"><?php echo $row1['no_item']; ?></td>
                    <td align="left"><?php echo $row1['jenis_kain']; ?></td>
                    <td align="center"><?php echo $row1['warna']; ?></td>
                    <td align="center"><?php echo $row1['nama_cv']; ?></td>
                    <td align="center"><?php echo $row1['total']; ?></td>
                    <td align="center"><?php echo $row1['harga']; ?></td>
                    <td align="center"><?php echo $row1['total_harga']; ?></td>
                    <td align="center"><a href="#" class="gambarclaim" id="<?php echo $row1['foto1']; ?>"><?php echo $row1['foto1']; ?></a></td>
                    <td align="center"><a href="#" class="gambarclaim2" id="<?php echo $row1['foto2']; ?>"><?php echo $row1['foto2']; ?></a></td>
                    <td align="center"><?php echo $row1['ket']; ?></td>
                  </tr>
                <?php $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_del1" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 1?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link1">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_del2" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 2?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link2">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_del" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <div id="PicDisp" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <div id="PicDisp2" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <script type="text/javascript">
    function confirm_delete1(delete_url1) {
      $('#modal_del1').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link1').setAttribute('href', delete_url1);
    }

    function confirm_delete2(delete_url2) {
      $('#modal_del2').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link2').setAttribute('href', delete_url2);
    }

    function confirm_delete(delete_url) {
      // Sertakan nilai filter saat ini ke URL hapus agar bisa dikembalikan setelah hapus
      var params = new URLSearchParams();
      var getVal = function(id){ var el = document.getElementById(id); return el ? el.value : '' };
      params.set('awal', getVal('datepicker'));
      params.set('akhir', getVal('datepicker1'));
      params.set('demand', getVal('demand'));
      params.set('prod_order', getVal('prod_order'));
      params.set('langganan', getVal('langganan'));
      params.set('po', getVal('po'));
      params.set('order', getVal('order'));
      params.set('nama_cv', getVal('nama_cv'));
      params.set('hanger', getVal('hanger'));
      params.set('warna', getVal('warna'));

      $('#modal_del').modal('show', {
        backdrop: 'static'
      });
      var finalUrl = delete_url + (delete_url.indexOf('?') === -1 ? '?' : '&') + params.toString();
      document.getElementById('delete_link').setAttribute('href', finalUrl);
    }
  </script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>
