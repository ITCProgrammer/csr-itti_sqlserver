<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian Produksi</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$Status	= isset($_POST['status']) ? $_POST['status'] : '';	
$TotalKirim	= isset($_POST['total']) ? $_POST['total'] : '';	
$Bon	= isset($_POST['bon']) ? $_POST['bon'] : '';
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Ganti Kain Disposisi</h3>
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
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan/Buyer" value="<?php echo $Langganan;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="bon" type="text" class="form-control pull-right" id="bon" placeholder="No Bon" value="<?php echo $Bon;  ?>" autocomplete="off"/>
          </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> Total Kirim</div>
              <input name="total" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $TotalKirim; ?>" />
          </div>
        </div>
      </div>
      <div class="form-group">
            <div class="col-sm-2">
                <select name="status" class="form-control select2">
                  <option value="">Pilih</option> 
                	<option value="BELUM OK" <?php if($Status=="BELUM OK"){ echo "SELECTED";}?>>BELUM OK</option>
                	<option value="OK" <?php if($Status=="OK"){ echo "SELECTED";}?>>OK</option>
                </select>
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
            <h3 class="box-title">Data Ganti Kain Disposisi</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?>
            <?php
            $tglawal = new DateTime($Awal);
            $tglakhir=new DateTime($Akhir);
            $d = $tglakhir->diff($tglawal)->days;
            ?>
            <?php if($d>25){?>
            <div class="pull-right">
               <a href="pages/cetak/excel_gantikainnew_disposisi.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Presale Replacement Report</a>
            </div>
            <?php } ?>
            <?php if($d<25 AND $d>0){?>
            <div class="pull-right">
               
				<a href="pages/cetak/excel_gantikainnew_disposisi.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Presale Replacement Report</a>
            </div>
            <?php } ?>
      </div>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="2"><div align="center">No</div></th>
              <th rowspan="2"><div align="center">Aksi</div></th>
              <th rowspan="2"><div align="center">Status</div></th>
              <th rowspan="2"><div align="center">Tgl</div></th>
              <th rowspan="2"><div align="center">No Bon</div></th>
              <th rowspan="2"><div align="center">Langganan</div></th>
              <th rowspan="2"><div align="center">PO</div></th>
              <th rowspan="2"><div align="center">Order</div></th>
              <th rowspan="2"><div align="center">Order Baru</div></th>
              <!--
			  <th rowspan="2"><div align="center">Status 1</div></th>
              <th rowspan="2"><div align="center">Status 2</div></th>
              <th rowspan="2"><div align="center">Status 3</div></th>
			  -->
              <th rowspan="2"><div align="center">Jenis Kain</div></th>
              <th rowspan="2"><div align="center">No Item</div></th>
              <th rowspan="2"><div align="center">No Hanger</div></th>
              <th rowspan="2"><div align="center">Lebar &amp; Gramasi</div></th>
              <th rowspan="2"><div align="center">Warna</div></th>
              <th rowspan="2"><div align="center">Qty Order</div></th>
              <th rowspan="2"><div align="center">Qty Kirim</div></th>
			  <!--
              <th rowspan="2"><div align="center">Qty Extra</div></th>-->
              <th colspan="2"><div align="center">Qty Permintaan.</div></th>
              <th rowspan="2"><div align="center">Masalah</div></th>
              <th rowspan="2"><div align="center">Sub Defect</div></th>
              <th rowspan="2"><div align="center">T Jawab</div></th>
            </tr>
            <tr>
              <th><div align="center">Kg</div></th>
              <th><div align="center">Satuan</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
            if($Status!=""){ $sts=" AND `status`='$Status' ";}else{$sts=" ";}
            if($Awal!="" or $Order!="" or $Langganan!="" or $PO!="" or $Bon!=""){
			  $sql_qry1 = "SELECT *,substr(no_hanger, 1,3) as prefix,
        substr(no_hanger, 4) as subprefix FROM tbl_ganti_kain_now WHERE id_disposisi is not null  and no_order LIKE '$Order%' AND no_po LIKE '$PO%' AND langganan LIKE '%$Langganan%' AND no_bon LIKE '%$Bon%' $Where $sts ORDER BY tgl_buat ASC";
              $qry1=mysqli_query($con,$sql_qry1);
            }else{
			   $sql_qry1 = "SELECT *,substr(no_hanger, 1,3) as prefix,
         substr(no_hanger, 4) as subprefix FROM tbl_ganti_kain_now WHERE id_disposisi is not null and no_order LIKE '$Order' AND no_po LIKE '$PO' AND langganan LIKE '%$Langganan%' AND no_bon LIKE '%$Bon%' $Where $sts ORDER BY tgl_buat ASC" ; 
              $qry1=mysqli_query($con,$sql_qry1);
            }
			/*
			echo '<pre>';
				print_r($sql_qry1);
			echo '</pre>';
			*/
			
                while($row1=mysqli_fetch_array($qry1)){
                    if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab']."+".$row1['t_jawab1']."+".$row1['t_jawab2'];
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab']."+".$row1['t_jawab1'];	
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab']."+".$row1['t_jawab2'];	
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab1']."+".$row1['t_jawab2'];	
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab'];
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab1'];
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab2'];	
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                    $tjawab="";	
                    }
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataGKDisposisi-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'];?>" data-value="<?php echo $row1['status'] ?>" class="statusgk" href="javascript:void(0)"><?php echo $row1['status'];?></a></td>
            <td align="center"><?php echo $row1['tgl_buat'];?></td>
            <td align="center"><?php echo $row1['no_bon'];?></td>
            <td><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            
            <!-- <td align="center">
              <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" <?php if(empty($row1['bonorder'])) { ?> href="javascript:void(0)" <?php } else { ?> href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['bonorder'] ?>" <?php } ?>><?php echo $row1['no_ordernew'] ?></a>
            </td> -->
            <?php 
              $q_order_new = db2_exec($conn1, "SELECT DISTINCT
              NO_ORDER
            FROM
              ITXVIEW_MEMOPENTINGPPC
            WHERE
              NO_PO LIKE '%$row1[no_po]%' 
              AND SUBCODE02 = '$row1[prefix]'
              AND SUBCODE03 = '$row1[subprefix]' 
              AND WARNA LIKE '%$row1[warna]%'
              AND (SUBSTR(NO_ORDER, 1, 3) = 'RFD'
                OR SUBSTR(NO_ORDER, 1, 3) = 'RFE'
                OR SUBSTR(NO_ORDER, 1, 3) = 'RPE'
                OR SUBSTR(NO_ORDER, 1, 3) = 'REP')
              ");
            $d_order_new = db2_fetch_assoc($q_order_new);

            ?>

            <td align="center">


           
            <a target="_blank" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $d_order_new['NO_ORDER'] ?>"><?php echo $d_order_new['NO_ORDER']; ?></a>
          </td>
            
          
          
          
          
           <!-- <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascipt:void(0)"><?php echo $row1['no_ordernew'] ?></a> -->
          <!-- <?php if ($row1['no_ordernew'] != '') { ?>
           
            <td align="center">
                     <a target="_blank" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['no_ordernew'] ?>"><?php echo $row1['no_ordernew']; ?></a>
                     <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascript:void(0)">Edit</a>
                 </td>
            <?php } else { ?>
                <td align="center">
                    <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascript:void(0)"><?php echo $row1['no_ordernew']; ?></a>
                </td>
            <?php } ?> -->


            
            <!-- <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascipt:void(0)"><?php echo $row1['no_ordernew'] ?></a></td> -->
            <!-- <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['bonorder'] ?>"><?php echo $row1['no_ordernew'] ?></a></td> -->
            <!-- <td align="center">
    <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" <?php if(empty($row1['bonorder'])) { ?> href="javascript:void(0)" <?php } else { ?> href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['bonorder'] ?>" <?php } ?> target="_blank"><?php echo $row1['no_ordernew'] ?></a>
</td> -->
		  <!--
			<td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status1'] ?>" class="status1" href="javascipt:void(0)"><?php echo $row1['status1'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status2'] ?>" class="status2" href="javascipt:void(0)"><?php echo $row1['status2'] ?></a></td>
            <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status3'] ?>" class="status3" href="javascipt:void(0)"><?php echo $row1['status3'] ?></a></td>
            -->
			
			<td><?php echo substr($row1['jenis_kain'],0,50);?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['lebar']."x".$row1['gramasi'];?></td>
            <td align="left"><?php echo substr($row1['warna1'],0,20);?></td>
            <td align="right"><?php echo $row1['qty_order'];?></td>
            <td align="right"><?php echo $row1['qty_kirim'];?></td>
            <!--<td align="right"> <?php echo $row1['qty_foc'];?></td>-->
            <td align="right">
			<?php 
				$explode_qty_permintaan = explode("/",$row1['qty_permintaan']);
			?>
			<?php echo $explode_qty_permintaan[0];?></td>
            <td align="center"> <?php echo $explode_qty_permintaan[1]." ".$explode_qty_permintaan[2];?></td>
            <td><?php echo $row1['masalah'];?></td>
            <td><?php echo $row1['sub_defect'];?></td>
            <td align="center"><?php echo $tjawab;?></td>
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
<div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
