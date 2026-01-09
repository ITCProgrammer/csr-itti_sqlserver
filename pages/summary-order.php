<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bon Penghubung</title>

</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Hanger	= isset($_POST['hanger']) ? $_POST['hanger'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';
$Item	= isset($_POST['item']) ? $_POST['item'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$Proses	= isset($_POST['prosesmkt']) ? $_POST['prosesmkt'] : '';
$sts_tembakdok = isset($_POST['sts_tembakdok']) ? $_POST['sts_tembakdok'] : '';
//$sts_pbon = isset($_POST['sts_pbon']) ? $_POST['sts_pbon'] : '';		
	
if($_POST['gshift']=="ALL"){$shft=" ";}else{$shft=" AND b.g_shift = '$GShift' ";}	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Bon Penghubung</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
        <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="No Hanger" value="<?php echo $Hanger;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna" value="<?php echo $Warna;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="item" type="text" class="form-control pull-right" id="item" placeholder="No Item" value="<?php echo $Item;  ?>" autocomplete="off"/>
          </div>
        <!--<div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan/Buyer" value="<?php echo $Langganan;  ?>" autocomplete="off"/>
          </div>-->
        <div class="col-sm-2">
            <select name="langganan" class="form-control select2">
            <option value="">Pilih</option> 
            <?php 
            $sql=sqlsrv_query($conn,"select distinct partnername from partners where Status<>'2'");
            while($r=sqlsrv_fetch_array($sql)){
            ?>
              <option value="<?php echo $r['partnername'];?>" <?php if($Langganan==$r['partnername']){ echo "SELECTED";}?>><?php echo $r['partnername'];?></option>
            <?php } ?> 
            </select>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
            <div class="col-sm-2">
                <select name="prosesmkt" class="form-control select2">
                  <option value="">Pilih</option> 
                	<option value="Proses" <?php if($Proses=="Proses"){ echo "SELECTED";}?>>Proses</option>
                	<option value="Hold" <?php if($Proses=="Hold"){ echo "SELECTED";}?>>Hold</option>
                	<option value="Tidak Proses" <?php if($Proses=="Tidak Proses"){ echo "SELECTED";}?>>Tidak Proses</option>
                  <option value="Siapkan Greig" <?php if($Proses=="Siapkan Greig"){ echo "SELECTED";}?>>Siapkan Greig</option>
                </select>
            </div>			 
        </div>
        <div class="form-group">
          <label for="sts_tembakdok" class="col-sm-0 control-label"></label>		  
            <div class="col-sm-3">
              <input type="checkbox" name="sts_tembakdok" id="sts_tembakdok" value="1" <?php  if($sts_tembakdok=="1"){ echo "checked";} ?>>  
              <label> Tembak Dokumen</label>
            </div>		  	
		  </div>
    <!--<div class="form-group">
		  <label for="sts_pbon" class="col-sm-0 control-label"></label>		  
        <div class="col-sm-3">
        <input type="checkbox" name="sts_pbon" id="sts_pbon" value="1" <?php  if($sts_pbon=="1"){ echo "checked";} ?>>  
        <label> Bon Penghubung</label>
          
        </div>		  	
		</div>-->	
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
        <h3 class="box-title">Summary Order</h3><br>
            <div class="pull-right">
                <a href="pages/cetak/excel_summaryorder.php?order=<?php echo $_POST['order']; ?>&hanger=<?php echo $_POST['hanger']; ?>&po=<?php echo $_POST['po']; ?>&warna=<?php echo $_POST['warna']; ?>&item=<?php echo $_POST['item']; ?>&awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&proses=<?php echo $_POST['prosesmkt']; ?>" class="btn btn-primary" target="_blank">Excel</a> 
            </div>
	    </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="3" ><div align="center" valign="middle">No</div></th>
              <th colspan="<?php if($_SESSION['lvl_id']!='KAIN'){echo "3";}else{echo "4";}?>"><div align="center" valign="middle">Verifikator</div></th>
              <th rowspan="3"><div align="center" valign="middle">Tgl</div></th>
              <th rowspan="3"><div align="center" valign="middle">No BPP</div></th>
              <th rowspan="3"><div align="center" valign="middle">Nama Sales</div></th>
              <th rowspan="3"><div align="center" valign="middle">Tembak Dokumen</div></th>
              <th rowspan="3"><div align="center" valign="middle">No KK</div></th>
              <th rowspan="3"><div align="center" valign="middle">No Demand</div></th>
              <th rowspan="3"><div align="center" valign="middle">Langganan</div></th>
              <th rowspan="3"><div align="center" valign="middle">PO</div></th>
              <th rowspan="3"><div align="center" valign="middle">Order</div></th>
              <th rowspan="3"><div align="center" valign="middle">No Item</div></th>
              <th rowspan="3"><div align="center" valign="middle">Hanger</div></th>
              <th rowspan="3"><div align="center" valign="middle">Warna</div></th>
              <th rowspan="3"><div align="center" valign="middle">Lot</div></th>
              <th rowspan="3"><div align="center" valign="middle">Qty Order</div></th>
              <th rowspan="3"><div align="center" valign="middle">Qty Packing</div></th>
              <th rowspan="3"><div align="center" valign="middle">Qty Sisa</div></th>
              <th rowspan="3"><div align="center" valign="middle">FOC</div></th>
              <th rowspan="3"><div align="center" valign="middle">Est. FOC</div></th>
              <th rowspan="3"><div align="center" valign="middle">Tanggung Jawab</div></th>
              <th rowspan="3"><div align="center" valign="middle">Masalah</div></th>
            </tr>
            <tr>
              <th rowspan="2"><div align="center">PPC</div></th>
              <th colspan="<?php if($_SESSION['lvl_id']!='KAIN'){echo "2";}else{echo "3";}?>"><div align="center">MKT</div></th>
            </tr>
            <tr>
              <th ><div align="center">Aksi</div></th>
              <?php if($_SESSION['lvl_id']=='KAIN'){ ?>
              <th ><div align="center">Proses</div></th>
              <?php } ?>
              <th ><div align="center">Editor</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
            if($sts_tembakdok=="1"){ $Sts =" AND sts_tembakdok='1' "; }
            if($Proses!=""){ $prs=" AND sts_aksi='$Proses' ";}else{$prs=" ";}
            if($Awal!="" or $Order!="" or $Warna!="" or $Hanger!="" or $Item!="" or $PO!="" or $Langganan!=""){
              $sql=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE sts_pbon='1' AND no_order LIKE '%$Order%' AND no_po LIKE '%$PO%' AND no_hanger LIKE '%$Hanger%' AND no_item LIKE '%$Item%' AND warna LIKE '%$Warna%' AND pelanggan LIKE '%$Langganan%' $Where $prs $Sts ");
            }else{
              $sql=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE sts_pbon='1' AND no_order LIKE '$Order' AND no_po LIKE '$PO' AND no_hanger LIKE '$Hanger%' AND no_item LIKE '$Item' AND warna LIKE '$Warna' AND pelanggan LIKE '$Langganan' $Where $prs $Sts ");
            }
                while($row1=mysqli_fetch_array($sql)){
                  $dtArr=$row1['t_jawab'];
                  $data = explode(",",$dtArr);
                  $dtArr1=$row1['persen'];
                  $data1 = explode(",",$dtArr1);
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center">
            <?php if($_SESSION['lvl_id']!='PPC'){ ?>
              <?php if ($row1['verif_ppc']!='' OR $row1['verif_ppc']!=NULL){?>
                <span class="label label-success">Sudah Diverifikasi</span>
                <br>
                <?php } ?>
            <input type="checkbox" class="flat-red" value="" 
              <?php if ($row1['verif_ppc']!='' OR $row1['verif_ppc']!=NULL): ?>
              checked="checked"
              <?php endif; ?>/>
            <?php }else{ ?>
              <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['verif_ppc'] ?>" class="sts_ppc" href="javascipt:void(0)"><?php echo $row1['verif_ppc'] ?></a>
            <?php } ?>
            </td>
            <td align="center">
            <?php if($_SESSION['lvl_id']!='KAIN'){ ?>
              <span class="label <?php if($row1['sts_aksi']=="Proses"){echo "label-success";}else if($row1['sts_aksi']=="Hold"){echo "label-warning";}else{echo "label-danger";} ?> "><?php echo $row1['sts_aksi'] ?></span>
            <?php }else{ ?>
              <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['sts_aksi'] ?>" class="sts_aksi" href="javascipt:void(0)"><?php echo $row1['sts_aksi'] ?></a>
            <?php } ?>
            </td>
            <?php if($_SESSION['lvl_id']=='KAIN'){ ?>
            <td align="center"><a href="ProsesBon-<?php echo $row1['id']; ?>" class="btn"><span class="label <?php if($row1['sts_aksi']=="Proses"){echo "label-success";}else{echo "label-warning";}?>"><?php if($row1['sts_aksi']=="Proses"){echo "Proses";}else{echo "Verifikasi Proses";}?></span></a></td>
            <?php } ?>
            <td align="center">
            <?php if($_SESSION['lvl_id']!='KAIN'){ ?>
              <span class="label label-info"><?php echo $row1['editor'] ?></span>
            <?php }else{ ?>
              <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['editor'] ?>" class="editor" href="javascipt:void(0)"><?php echo $row1['editor'] ?></a>
            <?php } ?>
            </td>
            <td align="center"><?php echo $row1['tgl_masuk'];?></td>
            <td align="center"><?php echo $row1['bpp'];?></td>
            <td align="center"><?php echo $row1['sales'];?></td>
            <td align="center"><?php if($row1['sts_tembakdok']=='1'){?><span class="label label-danger blink_me"><?php echo "Tembak Dokumen";?></span><?php }else{echo " "; }?></td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td align="center"><?php echo $row1['nodemand'];?></td>
            <td><?php echo $row1['pelanggan'];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center" valign="top"><?php echo $row1['no_item'];?></td>
            <td align="center" valign="top"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['berat_order']." KGs, ".$row1['panjang_order']." ".$row1['satuan_order'];?></td>
            <td align="center"><?php echo $row1['rol']." Rol, ".$row1['netto']." KG, ".$row1['panjang']." ".$row1['satuan'];?></td>
            <td align="center"><?php echo $row1['sisa']." KG";?></td>
            <td align="center"><?php echo $row1['berat_extra']." KG, ".$row1['panjang_extra']." ".$row1['satuan'];?></td>
            <td align="center"><?php echo $row1['estimasi']." KG, ".$row1['panjang_estimasi']." ".$row1['satuan'];?></td>
            <td align="left">
            <?php if($row1['t_jawab']!="" or $row1['t_jawab']!=NULL){?>
            <?php if($data[0]!="" or $data[0]!=NULL){echo $data[0]." ".$data1[0]."%";}?>&nbsp; 
            <?php if($data[1]!="" or $data[1]!=NULL){echo $data[1]." ".$data1[1]."%";}?>&nbsp;
            <?php if($data[2]!="" or $data[2]!=NULL){echo $data[2]." ".$data1[2]."%";}?>
            <?php } ?>
            </td>
            <td align="left"><?php echo $row1['masalah'];?></td>
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
<div id="StsAksiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>			
<div id="StsAksiPPCEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>			
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