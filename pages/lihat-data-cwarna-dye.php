<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian QCF</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Cocok Warna Dyeing</h3>
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
            <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
            <div class="col-sm-2">
                <select name="gshift" class="form-control select2"> 
                	<option value="ALL" <?php if($GShift=="ALL"){ echo "SELECTED";}?>>ALL</option>
                	<option value="A" <?php if($GShift=="A"){ echo "SELECTED";}?>>A</option>
                	<option value="B" <?php if($GShift=="B"){ echo "SELECTED";}?>>B</option>
					<option value="C" <?php if($GShift=="C"){ echo "SELECTED";}?>>C</option>
                </select>
            </div>			 
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
      <div class="pull-right">
        <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" name="lihat" value="Kembali" onClick="window.location.href='CWarnaDye'">	   
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Cocok Warna Dyeing</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?><br>
            <?php if($_POST['gshift']!="") { ?><b>Shift: <?php echo $_POST['gshift']; ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak-reports-cocok-warna-dye.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak</a> 
                <a href="pages/cetak/lap-cocok-warna-dye-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Excel</a> 
            </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Shift</div></th>
              <th><div align="center">Aksi</div></th>
              <th><div align="center">Tgl Celup</div></th>
              <th><div align="center">No Barcode</div></th>
              <th><div align="center">Pelanggan</div></th>
              <th><div align="center">Buyer</div></th>
              <th><div align="center">PO</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">Item</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">No Warna</div></th>
              <th><div align="center">No Mesin</div></th>
              <th><div align="center">Colorist Dye</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">Bruto</div></th>
              <th><div align="center">Status Warna</div></th>
              <th><div align="center">Grouping</div></th>
              <th><div align="center">Hue</div></th>
              <th><div align="center">Disposisi</div></th>
              <th><div align="center">Colorist Qcf</div></th>
              <th><div align="center">Review</div></th>
              <th><div align="center">Remark</div></th>
              <th><div align="center">Demand ERP</div></th>
              <th><div align="center">Prod. Order ERP</div></th>
              <th><div align="center">Keterangan</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($GShift!="ALL"){ $shft=" AND `shift`='$GShift' ";}else{$shft=" ";}
			      if($Awal!="" and $Akhir!=""){ $where=" AND DATE_FORMAT( tgl_celup, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";}else{ $where=" ";}  
            if($Awal!="" and $Akhir!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_cocok_warna_dye WHERE `dept`='QCF' $where $shft ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_cocok_warna_dye WHERE `dept`='QCF' $where $shft ORDER BY id ASC");
            }
                while($row1=mysqli_fetch_array($qry1)){
					$pos=strpos($row1['pelanggan'],"/");
					if($pos>0) {
					$lgg1=substr($row1['pelanggan'],0,$pos);
					$byr1=substr($row1['pelanggan'],$pos+1,100);	
					}else{
						$lgg1=$row1['pelanggan'];
						$byr1=substr($row1['pelanggan'],$pos,100);
					}
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row1['shift'];?></td>
            <td align="center"><div class="btn-group">
            <!--<a href="#" class="btn btn-info btn-xs cwarnadye_edit <?php if($_SESSION['akses']=='biasa' AND ($_SESSION['lvl_id']!='PACKING' OR $_SESSION['lvl_id']!='NCP')){ echo "disabled"; } ?>" id="<?php echo $row1['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> </a>-->
            <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' AND ($_SESSION['lvl_id']!='PACKING' OR $_SESSION['lvl_id']!='NCP')){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataCWarnaDye-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
            </div></td>
            <td align="center"><?php echo $row1['tgl_celup'];?></td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td><?php echo $lgg1;?></td>
            <td align="center"><?php echo $byr1;?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td><?php echo substr($row1['jenis_kain'],0,15)."...";?></td>
            <td align="left"><?php echo substr($row1['warna'],0,10)."...";?></td>
            <td align="left"><?php echo $row1['no_warna'];?></td>
            <td align="center"><?php echo $row1['no_mesin'];?></td>
            <td align="left"><?php echo $row1['colorist_dye'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['jml_roll'];?></td>
            <td align="center"><?php echo $row1['bruto'];?></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status_warna'] ?>" class="sts_warna" href="javascipt:void(0)"><?php echo $row1['status_warna'] ?></a>
            </td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['grouping'] ?>" class="grouping_dye" href="javascipt:void(0)"><?php echo $row1['grouping'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['hue'] ?>" class="hue_dye" href="javascipt:void(0)"><?php echo $row1['hue'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['disposisi'] ?>" class="disposisi_cdye" href="javascipt:void(0)"><?php echo $row1['disposisi'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['colorist_qcf'] ?>" class="colorist_qcf" href="javascipt:void(0)"><?php echo $row1['colorist_qcf'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['review_qcf'] ?>" class="review_qcf_dye" href="javascipt:void(0)"><?php echo $row1['review_qcf'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['remark_qcf'] ?>" class="remark_qcf_dye" href="javascipt:void(0)"><?php echo $row1['remark_qcf'] ?></a></td>
            <td align="center"><?php echo $row1['demand_erp'];?></td>
            <td align="center"><?php echo $row1['lot_erp'];?></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['ket'] ?>" class="ket_cdye" href="javascipt:void(0)"><?php echo $row1['ket'] ?></a></td>
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
<div id="CWarnaDyeEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
