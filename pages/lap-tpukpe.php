<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan TPUKPE</title>

</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
//$Status	= isset($_POST['status']) ? $_POST['status'] : '';	
	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan TPUKPE</h3>
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
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
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
        <!-- /.input group -->
      </div>
      <!--<div class="form-group">
            <div class="col-sm-2">
                <select name="status" class="form-control select2">
                  <option value="">Pilih</option> 
                	<option value="BELUM OK" <?php if($Status=="BELUM OK"){ echo "SELECTED";}?>>BELUM OK</option>
                	<option value="OK" <?php if($Status=="OK"){ echo "SELECTED";}?>>OK</option>
                </select>
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
            <h3 class="box-title">Data TPUKPE</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak_laptpukpe.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Lap TPUKPE</a>
                <a href="pages/cetak/cetak_lapanalisakpe.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Analisa TPUKPE</a> 
            </div>
	    </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">No TPUKPE</div></th>
              <th><div align="center">Langganan</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Hanger</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Demand</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Qty KG</div></th>
              <th><div align="center">Qty Yard</div></th>
              <th><div align="center">Masalah</div></th>
              <th><div align="center">Sub Defect</div></th>
              <th><div align="center">Dept. Penanggung Jawab</div></th>
              <th><div align="center">Analisa</div></th>
              <th><div align="center">Pencegahan</div></th>
              <th><div align="center">Tgl Terima KPE</div></th>
              <th><div align="center">Tgl Packing</div></th>
              <th><div align="center">Penyerahan ke QAI</div></th>
              <th><div align="center">Keterangan</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Awal!=""){ $Where =" AND DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
            //if($Status!=""){ $sts=" AND `status`='$Status' ";}else{$sts=" ";}
            if($Awal!="" or $Order!="" or $Langganan!="" or $PO!=""){
              $qry1=mysqli_query($con,"SELECT
                                        a.*,
                                        b.nodemand,
                                        b.qty_claim,
                                        b.satuan_c,
                                        b.qty_claim2,
                                        b.satuan_c2,
                                        b.no_hanger
                                      FROM
                                        tbl_tpukpe_now a
                                      LEFT JOIN tbl_aftersales_now b ON
                                        a.id_nsp = b.id 
                                      WHERE 
                                        a.no_order LIKE '$Order%' AND 
                                        a.no_po LIKE '$PO%' AND 
                                        a.langganan LIKE '%$Langganan%' $Where 
                                      ORDER BY 
                                        a.tgl_buat 
                                      ASC
              ");
            }else{
              $qry1=mysqli_query($con,"SELECT
                                          a.*,
                                          b.nodemand,
                                          b.qty_claim,
                                          b.satuan_c,
                                          b.qty_claim2,
                                          b.satuan_c2,
                                          b.no_hanger
                                        FROM
                                          tbl_tpukpe_now a
                                        LEFT JOIN tbl_aftersales_now b ON
                                          a.id_nsp = b.id
                                        WHERE 
                                          a.no_order LIKE '$Order' AND 
                                          a.no_po LIKE '$PO' AND 
                                          a.langganan LIKE '%$Langganan%' $Where 
                                        ORDER BY 
                                          a.tgl_buat 
                                        ASC
              ");
            }
                while($row1=mysqli_fetch_array($qry1)){
                  if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'].",".$row1['t_jawab2'];
                  }else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                  $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'];	
                  }else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                  $tjawab=$row1['t_jawab'].",".$row1['t_jawab2'];	
                  }else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
                  $tjawab=$row1['t_jawab1'].",".$row1['t_jawab2'];	
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
            <!--<td align="center">
            <a href="#" class="btn stsrt_edit <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" id="<?php echo $row1['id']; ?>"><span class="label <?php if($row1['status']=="OK"){echo "label-success";}else{echo "label-warning";} ?> "><?php echo $row1['status'];?></span></a>
            <?php if($row1['status1']!=""){ echo"<br><span class='label label-primary'>".$row1['status1']."</span>";}?>
            <?php if($row1['status2']!=""){ echo"<br><span class='label label-warning'>".$row1['status2']."</span>";}?>
            <?php if($row1['status3']!=""){ echo"<br><span class='label label-danger'>".$row1['status3']."</span>";}?>
            </td>-->
            <td align="center">
              <!-- <a href="EditKPENew-<?php //echo $row1['id_nsp']; ?>" target="_blank"> -->
                <?php //echo $row1['no_tpukpe'];?>
              <!-- </a> -->
              <a href="EditTPUKPE-<?php echo $row1['id'] ?>" target="_blank"><?php echo $row1['no_tpukpe']; ?></a>
            </td>
            <td align="left"><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td><?php echo $row1['jenis_kain'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="left"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['nodemand'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center">
            <?php
              if($row1['qty'] != "") {
                echo $row1['qty'];
              } 
              // else {
              //   echo strtoupper($row1['satuan_c']) == 'KG' ? $row1['qty_claim'] : '';
              // }
            ?>
            </td>
            <td align="center">
              <?php
              if($row1['qty2'] != "") {
                echo $row1['qty2'];
              }
              //  else {
              //   echo strtoupper($row1['satuan_c2']) == 'YD' ? $row1['qty_claim2'] : '';
              // }
              ?>
            </td>
            <td><?php echo $row1['masalah'];?></td>
            <td><?php echo $row1['masalah_dominan'];?></td>
            <td align="center"><?php echo $tjawab;?></td>
            <td><?php echo $row1['penyelidik_qcf'];?></td>
            <td><?php echo $row1['cegah_qcf'];?></td>
            <td align="center"><?php echo $row1['tgl_kpe'];?></td>
            <td align="center"><?php echo $row1['tgl_packing'];?></td>
            <td align="center"><?php echo $row1['serah_qai'];?></td>
            <td><?php echo $row1['ket'];?></td>
            </tr>
          <?php	$no++;} ?>
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
<div id="StsRTEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>		
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