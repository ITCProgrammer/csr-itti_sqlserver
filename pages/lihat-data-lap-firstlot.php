<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan First Lot</title>
</head>
<body>
<?php
$Awal	          = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	        = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Approve_Awal	  = isset($_POST['approve_awal']) ? $_POST['approve_awal'] : '';
$Approve_Akhir	= isset($_POST['approve_akhir']) ? $_POST['approve_akhir'] : '';
$Nokk	          = isset($_POST['nokk']) ? $_POST['nokk'] : '';
$Langganan	    = isset($_POST['langganan']) ? $_POST['langganan'] : '';
$Order	        = isset($_POST['order']) ? $_POST['order'] : '';
$Item	          = isset($_POST['item']) ? $_POST['item'] : '';	
$Warna	        = isset($_POST['warna']) ? $_POST['warna'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan First Lot</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
        <div class="form-group">
            <label for="tgl_awal" class="col-sm-1 control-label">Tgl Awal</label>
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label for="tgl_akhir" class="col-sm-1 control-label">Tgl Akhir</label>
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label for="tgl_approve" class="col-sm-1 control-label">Tgl Approve Awal</label>
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="approve_awal" type="date" class="form-control pull-right" placeholder="Tanggal Approve Awal" value="<?php echo $Approve_Awal;  ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label for="tgl_approve" class="col-sm-1 control-label">Tgl Approve Akhir</label>
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="approve_akhir" type="date" class="form-control pull-right" placeholder="Tanggal Approve Akhir" value="<?php echo $Approve_Akhir;  ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <input name="nokk" type="text" class="form-control pull-right" id="nokk" placeholder="No KK" value="<?php echo $Nokk;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan" value="<?php echo $Langganan;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <input name="item" type="text" class="form-control pull-right" id="item" placeholder="No Item" value="<?php echo $Item;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna" value="<?php echo $Warna;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
      <div class="pull-right">
        <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" name="lihat" value="Kembali" onClick="window.location.href='FirstLot'">	   
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Laporan First Lot</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="DataFirstLotExpired" class="btn btn-primary">Data Expired</a> 
                <a href="pages/cetak/excel-lap-conform.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&nokk=<?php echo $_POST['nokk']; ?>&order=<?php echo $_POST['order']; ?>&langganan=<?php echo $_POST['langganan']; ?>&item=<?php echo $_POST['no_item']; ?>&warna=<?php echo $_POST['warna']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Excel Lap Conform</a> 
            </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Aksi</div></th>
              <th><div align="center">No KK</div></th>
              <th><div align="center">Buyer</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">PO</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Hanger</div></th>
              <th><div align="center">Item</div></th>
              <th><div align="center">No Warna</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Lebar</div></th>
              <th><div align="center">Gramasi</div></th>
              <th><div align="center">Season</div></th>
              <th><div align="center">Validity/Expired</div></th>
              <th><div align="center">First Stock</div></th>
              <th><div align="center">End Stock</div></th>
              <th><div align="center">Comment Internal</div></th>
              <th><div align="center">Tgl Approve Buyer</div></th>
              <th><div align="center">Tgl Kirim</div></th>
              <th><div align="center">Comment Buyer</div></th>
              <th><div align="center">Spectro</div></th>
              <th><div align="center">Delete File PDF</div></th>
              <th><div align="center">Note</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
            if($Approve_Awal!=""){ $appr=" AND DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Approve_Awal' AND '$Approve_Akhir' ";}else{$appr=" ";}
            if($Awal!="" or $Order!="" or $Item!="" or $Langganan!="" or $Nokk!="" or $Warna!="" or $Approve_Awal!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE nokk LIKE '%$Nokk%' AND no_order LIKE '%$Order%' AND po LIKE '%$PO%' AND no_item LIKE '%$Item%' AND langganan LIKE '%$Langganan%' AND warna LIKE '%$Warna%' $Where $appr ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE nokk LIKE '%$Nokk%' AND no_order LIKE '$Order' AND po LIKE '$PO' AND no_item LIKE '$Item' AND langganan LIKE '$Langganan' AND warna LIKE '$Warna' $Where $appr ORDER BY id ASC");
            }
                while($row1=mysqli_fetch_array($qry1)){
                  $qry2=mysqli_query($con,"SELECT SUM(qty) AS jml_qty FROM tbl_allocation_firstlot WHERE id_firstlot='$row1[id]'");
                  $row2=mysqli_fetch_array($qry2);
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><div class="btn-group">
            <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataFirstLot-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
            </td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td align="center"><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['po'];?></td>
            <td align="left"><b title="<?php echo htmlentities($row1['jenis_kain'], ENT_QUOTES); ?>"><?php echo htmlentities(substr($row1['jenis_kain'], 0, 20) . "...", ENT_QUOTES); ?></b></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="left"><?php echo $row1['no_warna'];?></td>
            <td align="left"><b title="<?php echo htmlentities($row1['warna'], ENT_QUOTES); ?>"><?php echo htmlentities(substr($row1['warna'], 0, 20) . "...", ENT_QUOTES); ?></b></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['lebar'];?></td>
            <td align="center"><?php echo $row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['season'];?></td>
            <td align="center"><?php echo $row1['validity'];?></td>
            <td align="center"><?php if($row1['first_stock']=="" or $row1['first_stock']==NULL){echo "0";}else{echo $row1['first_stock'];}?></td>
            <td align="center"><?php echo number_format((int)$row1['first_stock']-(int)$row2['jml_qty'],0);?></td>
            <td align="center"><?php echo $row1['cmt_internal'];?></td>
            <td align="center"><?php if($row1['tgl_approve']!="0000-00-00"){echo $row1['tgl_approve'];}else{echo "&nbsp;";}?></td>
            <td align="center"><?php if($row1['tgl_kirim']!="0000-00-00"){echo $row1['tgl_kirim'];}else{echo "&nbsp;";}?></td>
            <td align="center"><?php echo $row1['cmt_buyer'];?></td>
            <td align="center"><?php if($row1['spectro']==NULL OR $row1['spectro']==""){?><a href="#" id='<?php echo $row1['id']; ?>' class="update_spectro">Upload</a><?php }else{?><a href="dist/pdf/<?php echo $row1['spectro'];?>" target="_blank"><?php echo $row1['spectro'];}?></a></td>
            <td align="center"><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' or $row1['spectro']==NULL or $row1['spectro']==""){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataPDF-<?php echo $row1['id'] ?>-<?php echo $row1['spectro'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus File PDF"></i> Hapus PDF </a></td>
            <td align="center"><?php echo $row1['ket'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="UpdateSpectro" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>
