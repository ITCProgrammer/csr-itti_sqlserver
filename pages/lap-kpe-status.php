<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian Produksi</title>

</head>
<body>
<?php
$default_akhir  = date("Y-m-d 23:59");
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '2025-01-01';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : $default_akhir;
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Hanger	= isset($_POST['hanger']) ? $_POST['hanger'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';	
$Fs		= isset($_POST['fasilitas']) ? $_POST['fasilitas'] : '';
$sts_red = isset($_POST['sts_red']) ? $_POST['sts_red'] : '';
$lt_up = isset($_POST['lt_up']) ? $_POST['lt_up'] : '';
$sts_claim = isset($_POST['sts_claim']) ? $_POST['sts_claim'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$Demand	= isset($_POST['demand']) ? $_POST['demand'] : '';
$Prodorder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$Pejabat	= isset($_POST['pejabat']) ? $_POST['pejabat'] : '';
$kategori	= isset($_POST['kategori']) ? $_POST['kategori'] : '';
	
if($_POST['gshift']=="ALL"){$shft=" ";}else{$shft=" AND b.g_shift = '$GShift' ";}	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Status KPE</h3>
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
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="No Hanger" value="<?php echo $Hanger;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan/Buyer" value="<?php echo $Langganan;  ?>" />
          </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <input name="demand" type="text" class="form-control pull-right" id="demand" placeholder="No Demand" value="<?php echo $Demand;  ?>" />
        </div>
        <div class="col-sm-2">
          <input name="prodorder" type="text" class="form-control pull-right" id="prodorder" placeholder="Prod. Order" value="<?php echo $Prodorder;  ?>" />
        </div>
        <div class="col-sm-2">
            <select class="form-control select2" name="pejabat" id="pejabat">
              <option value="">Pilih Pejabat</option>
                <?php 
                  $qryp=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='pejabat' ORDER BY nama ASC");
                  while($rp=mysqli_fetch_array($qryp)){
                ?>
              <option value="<?php echo $rp['nama'];?>" <?php if($Pejabat==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
                <?php }?>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control select2" name="kategori" id="kategori">
              <option value="">Pilih Kategori 4 KPE</option>
                <?php 
                  $qryp=mysqli_query($con,"SELECT kategori FROM tbl_kategori_kpe ORDER BY id ASC");
                  while($rp=mysqli_fetch_array($qryp)){
                ?>
              <option value="<?php echo $rp['kategori'];?>" <?php if($kategori==$rp['kategori']){echo "SELECTED";}?>><?php echo $rp['kategori'];?></option>	
                <?php }?>
            </select>
        </div>
      </div>

  <!-- Checkbox untuk Red Category Email -->
    <!-- <div class="form-group">
		  <label for="status_red" class="col-sm-0 control-label"></label>		  
        <div class="col-sm-3">
          <input type="checkbox" name="sts_red" id="sts_red" value="1" <?php  if($sts_red=="1"){ echo "checked";} ?>>  
          <label> Red Category Email</label>
        </div>		  	
		</div> -->
  <!-- End Checkbox Red Category Email -->

  <!-- Chcekbox Untuk Leadtime Email -->
    <div class="form-group">
		  <label for="status_red" class="col-sm-0 control-label"></label>		  
        <div class="col-sm-3">
          <input type="checkbox" name="lt_up" id="lt_up" value="1" <?php  if($lt_up=="1"){ echo "checked";} ?>>  
          <label> Leadtime Update Email</label>
        </div>		  	
		</div>
  <!-- End Checkbox Email -->

  <!-- Checkbox untuk Claim -->
    <!-- <div class="form-group">
		  <label for="status_claim" class="col-sm-0 control-label"></label>		  
        <div class="col-sm-3">
        <input type="checkbox" name="sts_claim" id="sts_claim" value="1" <?php  //if($sts_claim=="1"){ echo "checked";} ?>>  
        <label> Claim</label>      
        </div>		  	
		</div> -->
  <!-- End Checkbox Claim -->
    <!-- /.input group -->	
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
        <h3 class="box-title">Data KPE</h3><br>
        <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
          <?php } ?>
		  
		  
		<div class="pull-right">
      <?php if($lt_up=="1"){ ?>
        <a href="pages/cetak/cetak_kpe_memo_leadtime.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>" class="btn btn-primary <?php if($Awal=="") { echo "disabled"; }?>" target="_blank">Cetak Leadtime Update</a>
      <?php }?>
			<a href="pages/cetak/cetak_kpe_memo_all.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>" class="btn btn-warning <?php if($Awal=="") { echo "disabled"; }?>" target="_blank">Cetak KPE All</a>
			<a href="pages/cetak/cetak_kpe_memo_all.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>&excel=1" class="btn btn-warning <?php if($Awal=="") { echo "disabled"; }?>" target="_blank">Cetak KPE All Excel</a>
			<a href="pages/cetak/cetak_kpe_memo.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>" class="btn btn-danger <?php if($Awal=="") { echo "disabled"; }?>" target="blank">Cetak KPE All (on progress)</a>
			<a href="pages/cetak/cetak_kpe_memo.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>&excel=1" class="btn btn-danger <?php if($Awal=="") { echo "disabled"; }?>" target="blank">Cetak KPE All (on progress) excel</a>
      <a href="pages/cetak/cetak_4kategori_kpe.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>&kategori=<?php echo $_POST['kategori']; ?>&excel=1" class="btn btn-success <?php if($Awal=="") { echo "disabled"; }?>" target="_blank">Cetak Detail 4 Kategori KPE Excel</a>
		</div>


      
	    </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aksi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
			  <th>PIC</th>
			  <th>Tgl Email</th>
			  <th>Tgl Jawab</th>
			  <th>Tgl Update</th>
			  <th>HOD</th>
			  <th>Langganan</th>
			  <th>No Demand</th>
			  <th>Lot</th>
			  <th>PO</th>
			  <th>Order</th>
			  <th>Hanger</th>
			  <th>Jenis Kain</th>
			  <th>Lebar & Gramasi</th>
			  <th>Warna</th>
			  <th>Qty Order</th>
			  <th>Qty Kirim</th>
			  <th>Qty Claim</th>
			  <th>% Claim</th>
			  <th>T Jawab</th>
			  <th>Masalah</th>
			  <th>Keterangan</th>
			</tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($sts_red=="1"){ $stsred =" AND a.sts_red='1' "; }else{$stsred = " ";}
            if($sts_claim=="1"){ $stsclaim =" AND a.sts_claim='1' "; }else{$stsclaim =" ";}
            if($Awal!=""){ $Where =" AND a.tgl_email BETWEEN '$Awal' AND '$Akhir' "; }
            if($Awal!="" or $sts_red=="1" or $sts_claim=="1" or $Order!="" or $Hanger!="" or $PO!="" or $Langganan!="" or $Demand!="" or $Prodorder!="" or $Pejabat!=""){
              $sql = "SELECT a.*, 
              GROUP_CONCAT(DISTINCT b.no_ncp SEPARATOR ', ') AS no_ncp, 
              GROUP_CONCAT(DISTINCT b.masalah SEPARATOR ', ') AS masalah_ncp 
              FROM tbl_aftersales_now a 
              LEFT JOIN tbl_ncp_qcf_new b ON a.nodemand = b.nodemand 
              WHERE 
                (a.solusi = '' 
                 OR a.tgl_solusi_akhir ='' 
                 OR a.tgl_solusi_akhir ='0000-00-00')
              AND a.no_order LIKE '%$Order%' 
              AND a.po LIKE '%$PO%' 
              AND a.no_hanger LIKE '%$Hanger%' 
              AND a.langganan LIKE '%$Langganan%' 
              AND a.nodemand LIKE '%$Demand%' 
              AND a.nokk LIKE '%$Prodorder%' 
              AND a.pejabat LIKE '%$Pejabat%' 
              $Where $stsred $stsclaim AND (a.bprc IS NULL OR a.bprc = '')
              GROUP BY a.nodemand, a.masalah_dominan 
              ORDER BY a.tgl_email ASC";
              $qry1=mysqli_query($con,$sql);
                  }else{
              $sql = "SELECT a.*,
                    GROUP_CONCAT( DISTINCT b.no_ncp SEPARATOR ', ' ) AS no_ncp,
                    GROUP_CONCAT( DISTINCT b.masalah SEPARATOR ', ' ) AS masalah_ncp 
                    FROM tbl_aftersales_now a LEFT JOIN tbl_ncp_qcf_new b ON a.nodemand=b.nodemand 
                    WHERE a.solusi = '' and a.no_order LIKE '$Order' AND a.po LIKE '$PO' AND a.no_hanger LIKE '$Hanger' AND a.langganan LIKE '$Langganan' AND a.nodemand LIKE '$Demand' AND a.nokk LIKE '$Prodorder' AND a.pejabat LIKE '$Pejabat' $Where $stsred $stsclaim AND (a.bprc IS NULL OR a.bprc = '')
                    GROUP BY a.nodemand
                    ORDER BY a.tgl_email ASC";
                    $qry1=mysqli_query($con,$sql);
            }

			 
			
		
                while($row1=mysqli_fetch_array($qry1)){
                  $noorder=str_replace("/","&",$row1['no_order']);
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
            <td align="center"><?php echo $no; ?>
            </td>
            <td align="center"><div class="btn-group">
           <a  href="EditKPENew-<?php echo $row1['id']; ?>-1" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa' OR $_SESSION['lvl_id']!='AFTERSALES'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> </a>
            </div></td>
			<td><?=$row1['nama_nego']?></td>
			<td align=center><?php if($row1['tgl_email']=='0000-00-00') {echo '-';} else { echo $row1['tgl_email']; }?></td>
			<td>
				<?php if($row1['tgl_jawab']=='0000-00-00') {echo '-';} else { echo $row1['tgl_jawab']; }?>
			</td>
			<td align=center><?php if($row1['tgl_solusi_akhir']=='0000-00-00' or $row1['tgl_solusi_akhir'] == null ) {echo '-';} else { echo $row1['tgl_solusi_akhir']; }?></td>	
			<td align=center><?php if($row1['hod']=='0000-00-00' or $row1['hod'] == null ) {echo '-';} else { echo $row1['hod']; }?></td>	
			<td><?=$row1['langganan']?></td>
			<td><?=$row1['nodemand']?></td>
			<td><?=$row1['lot']?></td>
			<td><?=$row1['po']?></td>
			<td><?=$row1['no_order']?></td>
			<td><?=$row1['no_hanger']?></td>
			<td><?=$row1['jenis_kain']?></td>
			<td><?=$row1['lebar']."x".$row1['gramasi'];?></td>
			<td><?=$row1['warna'];?></td>
			<td><?=$row1['qty_order'];?></td>
			<td><?=$row1['qty_kirim'];?></td>
			<td><?=$row1['qty_claim'];?></td>
			<td>
				<?php 
					$persentase = ($row1['qty_claim']/$row1['qty_kirim'])*100; 
					if (is_float($persentase)) {
						$rounded_angka = round($persentase,2);
						echo $rounded_angka;
					} else {
					echo $persentase;
					}
				?>%</td>
			<td><?=$tjawab;?></td>
			<td><?=$row1['masalah'];?></td>
			<td><?=$row1['ket'];?></td>
            
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