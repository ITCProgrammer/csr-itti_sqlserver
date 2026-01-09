<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Tempel Beda Roll</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$jamA	= isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
$jamAr	= isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
$Langganan	= isset($_POST['pelanggan']) ? $_POST['pelanggan'] : '';
$Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';
$PO	= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$Order	= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$Item	= isset($_POST['no_item']) ? $_POST['no_item'] : '';	
$Hanger	= isset($_POST['no_hanger']) ? $_POST['no_hanger'] : '';
$Shift	= isset($_POST['shift']) ? $_POST['shift'] : '';
if(strlen($jamA)==5){
	$start_date = $Awal.' '.$jamA;
}else{ 
	$start_date = $Awal.' 0'.$jamA;
}	
if(strlen($jamAr)==5){
	$stop_date  = $Akhir.' '.$jamAr;
}else{ 
	$stop_date  = $Akhir.' 0'.$jamAr;
}
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Filter Laporan Tempel Beda Roll</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
          <div class="form-group">
            <label for="awal" class="col-sm-1 control-label">Tanggal Awal</label>
              <div class="col-sm-2">
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
                </div>
              </div>
              <!-- <div class="col-sm-1">
                <div class="input-group">
                  <input type="text" class="form-control timepicker" name="jam_awal" placeholder="00:00" value="<?php echo $jamA;?>" autocomplete="off">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
              </div> -->
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label for="akhir" class="col-sm-1 control-label">Tanggal Akhir</label>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
              </div>
            </div>
            <!-- <div class="col-sm-1">
                <div class="input-group">
                  <input type="text" class="form-control timepicker" name="jam_akhir" placeholder="00:00" value="<?php echo $jamAr;?>" autocomplete="off">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
              </div> -->
            <!-- /.input group -->
          </div>
          <!-- <div class="form-group">
            <label for="pelanggan" class="col-sm-1 control-label">Langganan</label>
              <div class="col-sm-3">
                <input name="pelanggan" type="text" class="form-control pull-right" placeholder="Langganan" value="<?php echo $Langganan;?>" />
              </div>			 
          </div> -->
          <div class="form-group">
            <label for="no_po" class="col-sm-1 control-label">No PO</label>
              <div class="col-sm-3">
                <input name="no_po" type="text" class="form-control pull-right" placeholder="No PO" value="<?php echo $PO;?>" />
              </div>			 
          </div>
          <div class="form-group">
            <label for="no_order" class="col-sm-1 control-label">No Order</label>
              <div class="col-sm-3">
                <input name="no_order" type="text" class="form-control pull-right" placeholder="No Order" value="<?php echo $Order;?>" />
              </div>			 
          </div>
          <div class="form-group">
            <label for="shift" class="col-sm-1 control-label">Shift</label>  
                <div class="col-sm-2">
                    <select name="shift" class="form-control select2"> 
                      <option value="ALL" <?php if($Shift=="ALL"){ echo "SELECTED";}?>>ALL</option>
                      <option value="A" <?php if($Shift=="A"){ echo "SELECTED";}?>>A</option>
                      <option value="B" <?php if($Shift=="B"){ echo "SELECTED";}?>>B</option>
                      <option value="C" <?php if($Shift=="C"){ echo "SELECTED";}?>>C</option>
                    </select>
                </div>			 
            </div>	
          <!-- <div class="form-group">
            <label for="warna" class="col-sm-1 control-label">Warna</label>
              <div class="col-sm-3">
                <input name="warna" type="text" class="form-control pull-right" placeholder="Warna" value="<?php echo $Warna;?>" />
              </div>			 
          </div>
          <div class="form-group">
            <label for="no_item" class="col-sm-1 control-label">No Item</label>
              <div class="col-sm-3">
                <input name="no_item" type="text" class="form-control pull-right" placeholder="No Item" value="<?php echo $Item;?>" />
              </div>			 
          </div>
          <div class="form-group">
            <label for="no_hanger" class="col-sm-1 control-label">No Hanger</label>
              <div class="col-sm-3">
                <input name="no_hanger" type="text" class="form-control pull-right" placeholder="No Hanger" value="<?php echo $Hanger;?>" />
              </div>			 
          </div> -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
          </div>
          <div class="pull-right">
            <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" <?php if($_SESSION['lvl_id']=="AFTERSALES"){echo "disabled";}?> name="lihat" value="Kembali" onClick="window.location.href='InputTempelBedaRoll'">	   
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Laporan Tempel Beda Roll</h3><br>
        <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
        <?php } ?>
        <div class="pull-right">
          <a href="pages/cetak/cetak-reports-tempel-beda-roll.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&jam_awal=<?php echo $_POST['jam_awal']; ?>&jam_akhir=<?php echo $_POST['jam_akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&no_po=<?php echo $_POST['no_po']; ?>&no_order=<?php echo $_POST['no_order']; ?>&warna=<?php echo $_POST['warna']; ?>&no_item=<?php echo $_POST['no_item']; ?>&no_hanger=<?php echo $_POST['no_hanger']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak</a> 
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Aksi</div></th>
              <th><div align="center">Tgl</div></th>
              <th><div align="center">Shift</div></th>
              <th><div align="center">Group Shift</div></th>
              <th><div align="center">No KK</div></th>
              <th><div align="center">Pelanggan</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">No Warna</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Lebar</div></th>
              <th><div align="center">Gramasi</div></th>
              <th><div align="center">No Item</div></th>
              <th><div align="center">No Hanger</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">Qty Bruto</div></th>
              <th><div align="center">Roll Dikerjakan</div></th>
              <th><div align="center">Ket Roll Dikerjakan</div></th>
              <th><div align="center">Operator</div></th>
              <th><div align="center">No Prod. Order</div></th>
              <th><div align="center">No Demand</div></th>
              <th><div align="center">Comment</div></th>
              <th><div align="center">Keterangan</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            //if($Langganan!=""){ $lgn=" AND `pelanggan` LIKE '%$Langganan%' ";}else{$lgn=" ";}
            //if($Item!=""){ $noitem=" AND `no_item` LIKE '%$Item%' ";}else{$noitem=" ";}
            //if($Hanger!=""){ $nohanger=" AND `no_hanger` LIKE '%$Hanger%' ";}else{$nohanger=" ";}
            //if($Warna!=""){ $wn=" AND `warna` LIKE '%$Warna%' ";}else{$wn=" ";}
            if($Shift!="ALL"){ $shft=" AND `groupshift` LIKE '%$Shift%' ";}else{$shft=" ";}
            if($PO!=""){ $nopo=" AND `no_po` LIKE '%$PO%' ";}else{$nopo=" ";}
            if($Order!=""){ $noorder=" AND `no_order` LIKE '%$Order%' ";}else{$noorder=" ";}
            if($Awal!="" or $PO!="" or $Order!="" or $Shift!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_tempel_beda_roll WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $nopo $noorder $shft ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_tempel_beda_roll WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $nopo $noorder $shft ORDER BY id ASC");
            }
            while($row1=mysqli_fetch_array($qry1)){
          ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><?php echo $no; ?></td>
              <td align="center"><div class="btn-group">
              <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' AND ($_SESSION['lvl_id']!='PACKING' OR $_SESSION['lvl_id']!='NCP')){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusTempelBedaRoll-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
              </div></td>
              <td align="center"><?php echo substr($row1['tgl_update'],0,10);?></td>
              <td align="center"><?php echo $row1['shift'];?></td>
              <td align="center"><?php echo $row1['groupshift'];?></td>
              <td align="center"><?php echo $row1['nokk'];?></td>
              <td><?php echo $row1['pelanggan'];?></td>
              <td align="center"><?php echo $row1['no_order'];?></td>
              <td><?php echo substr($row1['jenis_kain'],0,15)."...";?></td>
              <td align="left"><?php echo substr($row1['warna'],0,10)."...";?></td>
              <td align="center"><?php echo $row1['no_warna'];?></td>
              <td align="center"><?php echo $row1['lot'];?></td>
              <td align="center"><?php echo $row1['lebar'];?></td>
              <td align="center"><?php echo $row1['gramasi'];?></td>
              <td align="center"><?php echo $row1['no_item'];?></td>
              <td align="center"><?php echo $row1['no_hanger'];?></td>
              <td align="center"><?php echo $row1['roll_bruto'];?></td>
              <td align="center"><?php echo $row1['bruto'];?></td>
              <td align="center"><?php echo $row1['roll_dikerjakan'];?></td>
              <td align="center"><?php echo $row1['ket_roll_dikerjakan'] ?></td>
              <td align="center"><?php echo $row1['operator'] ?></td>
              <td align="center"><?php echo $row1['prod_order'] ?></td>
              <td align="center"><?php echo $row1['demand'] ?></td>
              <td align="center"><?php echo $row1['comment'] ?></td>
              <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['catatan'] ?>"
                      class="ket_tbrol" href="javascipt:void(0)">
                      <?php echo $row1['catatan'] ?>
                    </a></td>
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
<div id="CWarnaFinEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
