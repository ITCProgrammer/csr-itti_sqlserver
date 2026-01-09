<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Pengiriman</title>
</head>
<body>
<?php
$Awal	    = isset($_POST['awal']) ? $_POST['awal'] : '';
$Kategori	= isset($_POST['kategori']) ? $_POST['kategori'] : '';
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Pengiriman</h3>
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
                <select name="kategori" class="form-control select2">
                	<option value="KAIN BODY/KRAH" <?php if($Kategori=="KAIN BODY/KRAH"){ echo "SELECTED";}?>>KAIN BODY/KRAH</option>
                	<option value="LAIN LAIN" <?php if($Kategori=="LAIN LAIN"){ echo "SELECTED";}?>>LAIN LAIN</option>
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
            <h3 class="box-title">Data Laporan Pengiriman</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode Kirim: <?php echo $_POST['awal']; ?></b>
            <?php } ?>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Tgl Buat</div></th>
              <th><div align="center">Tgl Kirim</div></th>
              <th><div align="center">No SJ</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">Qty (Kg)</div></th>
              <th><div align="center">Buyer</div></th>
              <th><div align="center">No PO</div></th>
              <th><div align="center">No Order</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Tujuan</div></th>
              <th><div align="center">Ket</div></th>
              <th><div align="center">FOC</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            $ttgl=date("d", strtotime($_POST['awal']));
            $newdate = strtotime( '-1 day' , strtotime ($_POST['awal']) );
            $ttglm=date("d", $newdate);
            if($_POST['awal']!=""){
                $tgll= " AND a.tgl_update='$_POST[awal]' ";
                }else {$tgll="";}
            if($_POST['no_sj']!="" and $_POST['awal']!=""){
                $sj= " And a.no_sj='$_POST[no_sj]' ";
                }	 
            if($_POST['no_sj']!="" and $_POST['awal']=="") 
                { $sj= " a.no_sj='$_POST[no_sj]' "; }	

            $tt=date("Y-m-d", strtotime($_POST['awal']));
            $awal=date("Y-m-", strtotime($_POST['awal']));
            $nawal=$awal."01";
            $newdate1 = strtotime( '-1 day' , strtotime ($_POST['awal']) );
            $ttm=date("Y-m-d", $newdate1);
            $sql1=mysqli_query($con,"SELECT sum(qty) as qty from tbl_pengiriman 
            WHERE tmp_hapus='0' AND not no_sj='' AND tgl_kirim BETWEEN '$nawal' AND '$tt' AND ISNULL(kategori)");
            $row1=mysqli_fetch_array($sql1);
            $sql2=mysqli_query($con,"SELECT sum(qty) as qty from tbl_pengiriman 
            WHERE tmp_hapus='0' AND not no_sj='' AND tgl_kirim BETWEEN '$nawal' AND '$ttm' AND ISNULL(kategori)");
            $row2=mysqli_fetch_array($sql2);	
            if($_POST['awal']!=""){
                $tgl2l= " tmp_hapus='0' AND tgl_kirim='$_POST[awal]' ";
                }else{$tgl2l= " tmp_hapus='0' AND tgl_update='' ";}	  
            if($_POST['no_sj']!=""){
                $sj2= " And no_sj='$_POST[no_sj]' ";
                }
            if($Kategori=="LAIN LAIN"){$K=" AND kategori='lain-lain' "; }else{$K=" AND ISNULL(kategori) ";}
            if($Awal!=""){
                $sqlbr=mysqli_query($con,"SELECT
                id,tgl_kirim,tgl_buat,no_sj,warna,rol,qty,buyer,no_po,no_order,jenis_kain,lot,tujuan,ket,foc
                FROM
                    tbl_pengiriman
                WHERE
                    not no_sj='' $K AND $tgl2l $sj2
                ORDER BY no_sj asc");
            }else{
              $sqlbr=mysqli_query($con,"SELECT
                id,tgl_kirim,tgl_buat,no_sj,warna,rol,qty,buyer,no_po,no_order,jenis_kain,lot,tujuan,ket,foc
                FROM
                    tbl_pengiriman
                WHERE
                    not no_sj='' $K AND $tgl2l $sj2
                ORDER BY no_sj asc");
            }
                while($row3=mysqli_fetch_array($sqlbr)){
              ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
                <td><?php echo $no;?></td>
                <td><?php echo date("d-M-Y", strtotime($row3['tgl_buat'])) ?></td>
                <td><?php echo date("d-M-Y", strtotime($row3['tgl_kirim'])) ?></td>
                <td><?php echo $row3['no_sj']; ?></td>
                <td><?php echo $row3['warna']; ?></td>
                <td align="right"><?php echo $row3['rol']; ?></td>
                <td align="right"><?php echo $row3['qty']; ?></td>
                <td><?php echo $row3['buyer']; ?></td>
                <td><?php echo $row3['no_po']; ?></td>
                <td><?php echo $row3['no_order']; ?></td>
                <td><?php echo $row3['jenis_kain']; ?></td>
                <td><?php echo $row3['lot']; ?></td>
                <td><?php echo $row3['tujuan']; ?></td>
                <td><?php echo $row3['ket']; ?></td>
                <td align="center"><?php echo $row3['foc']; ?></td>
            </tr>
            <?php $no++;  
            $totrol=$totrol+$row3['rol'];
            $totqty=$totqty+ $row3['qty'];
            } ?>
        </tbody>
        <tfoot>
            <tr bgcolor="#33CC99" style="">
                <td colspan="5">Total Tanggal <?php echo $ttgl;?></td>
                <td align="right"><?php echo $totrol; ?></td>
                <td align="right"><?php echo number_format(round($totqty,2),'2',',','.'); $qt1=round($totqty,2); ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr bgcolor="#33CC99" style="">
                <td colspan="6">Total
                <?php if($ttgl=="01"){}else{ ?>
                Tanggal 01 S/D <?php echo $ttglm; }?></td>
                <td align="right"><?php echo number_format(round($row2['qty'],2),'2',',','.');$qt2=round($row2['qty'],2);?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr bgcolor="#33CC99" style="border-bottom: 1px solid;">
                <td colspan="6">Total Tanggal 01 S/D <?php echo $ttgl;?></td>
                <td align="right"><?php echo number_format($qt1+$qt2,'2',',','.');?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
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
