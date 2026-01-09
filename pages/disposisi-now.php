<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Disposisi NOW</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';	
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';	
$Demand	= isset($_POST['demand']) ? $_POST['demand'] : '';
$Lot	= isset($_POST['lot']) ? $_POST['lot'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$ArticleGrup	= isset($_POST['ag']) ? $_POST['ag'] : '';	
$ArticleCode	= isset($_POST['ac']) ? $_POST['ac'] : '';	
$Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Disposisi NOW</h3>
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
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <input name="demand" type="text" class="form-control pull-right" id="demand" placeholder="No Demand" value="<?php echo $Demand;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="lot" type="text" class="form-control pull-right" id="lot" placeholder="No Lot" value="<?php echo $Lot;  ?>" />
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
            <input name="ag" type="text" class="form-control pull-right" id="ag" placeholder="Article Group" value="<?php echo $ArticleGrup;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="ac" type="text" class="form-control pull-right" id="ac" placeholder="Article Code" value="<?php echo $ArticleCode;  ?>" />
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
            <h3 class="box-title">Data Disposisi NOW</h3><br>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="3"><div align="center">
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </div></th>
              <th rowspan="3"><div align="center">No Demand</div></th>
              <th rowspan="3"><div align="center">No Production Order</div></th>
              <th rowspan="3"><div align="center">Langganan</div></th>
              <th rowspan="3"><div align="center">Buyer</div></th>
              <th rowspan="3"><div align="center">No PO</div></th>
              <th rowspan="3"><div align="center">No Order</div></th>
              <th rowspan="3"><div align="center">No Item</div></th>
              <th colspan="2"><div align="center">Hanger</div></th>
              <th rowspan="3"><div align="center">Jenis Kain</div></th>
              <th rowspan="3"><div align="center">Lebar</div></th>
              <th rowspan="3"><div align="center">Gramasi</div></th>
              <th rowspan="3"><div align="center">Warna</div></th>
              <th colspan="2"><div align="center">Qty Bruto</div></th>
              <th colspan="10"><div align="center">Disposisi</div></th>
              <!-- <th rowspan="3"><div align="center">External Reference</div></th>
              <th rowspan="3"><div align="center">Internal Reference</div></th> -->
              <th colspan="2"><div align="center">Keluhan Pelanggan External</div></th>
            </tr>
            <tr>
              <th rowspan="2"><div align="center">Article Group</div></th>
              <th rowspan="2"><div align="center">Article Code</div></th>
              <th rowspan="2"><div align="center">User Primary Qty (KG)</div></th>
              <th rowspan="2"><div align="center">User Secondary Qty (Yard)</div></th>
              <th rowspan="2"><div align="center">Tanggal Disposisi</div></th>
              <th rowspan="2"><div align="center">Masalah</div></th>
              <th rowspan="2"><div align="center">Keputusan</div></th>
              <th colspan="3"><div align="center">Pejabat QC</div></th>
              <th rowspan="2"><div align="center">Produksi</div></th>
              <th rowspan="2"><div align="center">Marketing</div></th>
              <th rowspan="2"><div align="center">File Foto 1</div></th>
              <!-- <th rowspan="2"><div align="center">Delete File Foto 1</div></th> -->
              <th rowspan="2"><div align="center">File Foto 2</div></th>
              <!-- <th rowspan="2"><div align="center">Delete File Foto 2</div></th> -->

              <th rowspan="2"><div align="center">Masalah</div></th>
              <th rowspan="2"><div align="center">Keterangan</div></th>
            </tr>
            <tr>
              <th><div align="center">1</div></th>
              <th><div align="center">2</div></th>
              <th><div align="center">3</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            if($Awal!=""){ $Where =" AND DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
            $no=1;
            if($Awal!= "" or $Demand!="" or $Lot!="" or $Order!="" or $Langganan!="" or $PO!="" or $ArticleGrup!="" or $ArticleCode!="" or $Warna!=""){
              $sql="SELECT a.*, b.masalah as masalah_aftersales, b.ket as ket_aftersales FROM db_qc.tbl_disposisi_now a 
                    left join db_qc.tbl_aftersales_now b on a.no_demand = b.nodemand  
                    WHERE a.no_demand LIKE '%$Demand%' AND a.prod_order LIKE '%$Lot%' AND a.no_order LIKE '%$Order%' AND a.langganan LIKE '%$Langganan%' AND a.no_po LIKE '%$PO%' AND a.article_group LIKE '%$ArticleGrup%' AND a.article_code LIKE '%$ArticleCode%' AND a.warna LIKE '%$Warna%' $Where
                    ORDER BY a.no_demand ASC";
            }else{
                $sql="SELECT a.*, b.masalah as masalah_aftersales, b.ket as ket_aftersales FROM db_qc.tbl_disposisi_now a 
                    left join db_qc.tbl_aftersales_now b on a.no_demand = b.nodemand  
                    WHERE a.no_demand LIKE '$Demand' AND a.prod_order LIKE '$Lot' AND a.no_order LIKE '$Order' AND a.langganan LIKE '$Langganan' AND a.no_po LIKE '$PO' AND a.article_group LIKE '$ArticleGrup' AND a.article_code LIKE '$ArticleCode' AND a.warna LIKE '$Warna' $Where
                    ORDER BY a.no_demand ASC";
            }
                $sqlData1=mysqli_query($con,$sql);
                while($row1=mysqli_fetch_array($sqlData1)){
					   $noorder=str_replace("/","&",$row1['no_order']);
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><div class="btn-group">

			<a href="TambahBonDisposisi-<?php echo $row1['id']; ?>-<?php echo $noorder; ?>" class="btn btn-warning btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Ganti Kain"></i> </a>
           <!-- <a href="TambahDetailReturDisposisi-<?php echo $row1['id']; ?>" class="btn btn-success btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Retur"></i> </a>
            <a href="TambahTPUKPEDisposisi-<?php echo $row1['id']; ?>" class="btn btn-primary btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="TPUKPE"></i> </a>-->
            
			
            <a href="EditDisposisi-<?php echo $row1['id']; ?>" class="btn btn-warning btn-xs <?php if($_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit Disposisi"></i> </a>
            <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataDisposisiNOW-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
            </div></td>
            <td align="center"><?php echo $row1['no_demand']; ?></td>
            <td align="center"><?php echo $row1['prod_order'];?></td>
            <td align="center"><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['buyer'];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="center"><?php echo $row1['article_group'];?></td>
            <td align="center"><?php echo $row1['article_code'];?></td>
            <td align="left"><b title="<?php echo htmlentities($row1['jenis_kain'],ENT_QUOTES);?>"><?php echo htmlentities(substr($row1['jenis_kain'],0,40),ENT_QUOTES);?></b></td>
            <td align="center"><?php echo $row1['lebar'];?></td>
            <td align="center"><?php echo $row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['qty_kg'];?></td>
            <td align="center"><?php echo $row1['qty_yard'];?></td>
            <td align="center"><?php echo $row1['tgl_buat'];?></td>
            <td align="center"><?php echo $row1['masalah'];?></td>
            <td align="center"><?php echo $row1['keputusan'];?></td>
            <td align="center"><?php echo $row1['pejabat1'];?></td>
            <td align="center"><?php echo $row1['pejabat2'];?></td>
            <td align="center"><?php echo $row1['pejabat3'];?></td>
            <td align="center"><?php echo $row1['produksi'];?></td>
            <td align="center"><?php echo $row1['marketing'];?></td>
            <td align="center"><a href="#" class="gambardisposisi" id="<?php echo $row1['file_foto']; ?>"><?php echo $row1['file_foto']; ?></a></td>
            <!-- <td align="center"><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' or $row1['file_foto']==NULL or $row1['file_foto']==""){ echo "disabled"; } ?>" onclick="confirm_delete1('./HapusDataFoto1-<?php echo $row1['id'] ?>-<?php echo $row1['file_foto'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus File Foto 1"></i></a></td> -->
            <td align="center"><a href="#" class="gambardisposisi2" id="<?php echo $row1['file_foto2']; ?>"><?php echo $row1['file_foto2']; ?></a></td>
            <!-- <td align="center"><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' or $row1['file_foto2']==NULL or $row1['file_foto2']==""){ echo "disabled"; } ?>" onclick="confirm_delete2('./HapusDataFoto2-<?php echo $row1['id'] ?>-<?php echo $row1['file_foto2'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus File Foto 2"></i></a></td> -->
            <!-- <td align="center"><?php echo $row1['ext_ref'];?></td>
            <td align="center"><?php echo $row1['int_ref'];?></td> -->
            <td align="center"><?php echo $row1['masalah_aftersales'];?></td>
            <td align="center"><?php echo $row1['ket_aftersales'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del1" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 1?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link1">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del2" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 2?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link2">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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
<div id="PicDisp" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="PicDisp2" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
    function confirm_delete1(delete_url1)
    {
      $('#modal_del1').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link1').setAttribute('href' , delete_url1);
    }
    function confirm_delete2(delete_url2)
    {
      $('#modal_del2').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link2').setAttribute('href' , delete_url2);
    }
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
