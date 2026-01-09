<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan NCP</title>

</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Dept	= isset($_POST['dept']) ? $_POST['dept'] : '';
$Cancel	= isset($_POST['chkcancel']) ? $_POST['chkcancel'] : '';	
	
if($_POST['gshift']=="ALL"){$shft=" ";}else{$shft=" AND b.g_shift = '$GShift' ";}	
?>
<div class="row">
  <div class="col-xs-2">	
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"> Filter Laporan NCP</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
          <div class="form-group">
            <div class="col-sm-10">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"1/>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <select class="form-control select2" name="dept" id="dept" required>
                <option value="">Pilih</option>
                <option value="ALL" <?php if($Dept=="ALL"){echo "SELECTED";}?>>ALL</option>
                <option value="MKT" <?php if($Dept=="MKT"){echo "SELECTED";}?>>MKT</option>
                <option value="FIN" <?php if($Dept=="FIN"){echo "SELECTED";}?>>FIN</option>
                <option value="DYE" <?php if($Dept=="DYE"){echo "SELECTED";}?>>DYE</option>
                <option value="KNT" <?php if($Dept=="KNT"){echo "SELECTED";}?>>KNT</option>
                <option value="LAB" <?php if($Dept=="LAB"){echo "SELECTED";}?>>LAB</option>
                <option value="PPC" <?php if($Dept=="PPC"){echo "SELECTED";}?>>PPC</option>
                <option value="QCF" <?php if($Dept=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="CQA" <?php if($Dept=="CQA"){echo "SELECTED";}?>>CQA</option>
                <option value="RMP" <?php if($Dept=="RMP"){echo "SELECTED";}?>>RMP</option>
                <option value="KNK" <?php if($Dept=="KNK"){echo "SELECTED";}?>>KNK</option>
                <option value="GKG" <?php if($Dept=="GKG"){echo "SELECTED";}?>>GKG</option>
                <option value="GKJ" <?php if($Dept=="GKJ"){echo "SELECTED";}?>>GKJ</option>
                <option value="GAS" <?php if($Dept=="GAS"){echo "SELECTED";}?>>GAS</option>
                <option value="BRS" <?php if($Dept=="BRS"){echo "SELECTED";}?>>BRS</option>
                <option value="PRT" <?php if($Dept=="PRT"){echo "SELECTED";}?>>PRT</option>
                <option value="YND" <?php if($Dept=="YND"){echo "SELECTED";}?>>YND</option>
                <option value="PRO" <?php if($Dept=="PRO"){echo "SELECTED";}?>>PRO</option>
                <option value="TAS" <?php if($Dept=="TAS"){echo "SELECTED";}?>>TAS</option>
              </select>
            </div>
            <!-- /.input group -->
          </div> 	
          <div class="form-group">
            <div class="col-sm-10">
              <label>
                <input type="checkbox" value="1" name="chkcancel" class="minimal-red" <?php if($Cancel=="1"){ echo "checked";}?>>
                  Tampil Status Cancel
              </label>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-social btn-linkedin btn-sm" name="save">Search <i class="fa fa-search"></i></button>
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
  <div class="col-xs-5">	
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"> TOP 5 NCP Berdasarkan Masalah</h3>
        <?php if($Awal!="") { ?><br><b>Periode: <?php echo tanggal_indo($Awal)." - ".tanggal_indo($Akhir); }?></b>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="15%"><div align="center">Masalah</div></th>
              <th width="10%"><div align="center">KG</div></th>
              <th width="5%"><div align="center">%</div></th>
              <th width="10%"><div align="center">Disposisi</div></th>
              <th width="5%"><div align="center">% Disp.</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $totald=0;
            $totaldll=0;
            $totaldDis=0;
            $totaldllDis=0;
            $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND NOT status='Cancel'");
            $rAll=mysqli_fetch_array($qryAll);
            $qryAllDis=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND `status`='Disposisi' AND NOT status='Cancel'");
            $rAllDis=mysqli_fetch_array($qryAllDis);
            $qrydef=mysqli_query($con,"SELECT SUM(berat) AS berat, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND NOT status='Cancel'
            AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
            masalah_dominan
            FROM
            `tbl_ncp_qcf`
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND NOT status='Cancel'
            GROUP BY masalah_dominan
            ORDER BY berat DESC LIMIT 5");
            while($rd=mysqli_fetch_array($qrydef)){
              $qrydefDis=mysqli_query($con,"SELECT SUM(berat) AS berat, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `status`='Disposisi' AND masalah_dominan='$rd[masalah_dominan]' AND NOT status='Cancel'
              AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
              masalah_dominan
              FROM
              `tbl_ncp_qcf`
              WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `status`='Disposisi' AND masalah_dominan='$rd[masalah_dominan]' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND NOT status='Cancel'");
              $rdDis=mysqli_fetch_array($qrydefDis);
            ?>
            <tr valign="top">
                <td align="center"><?php echo $rd['masalah_dominan'];?></td>
                <td align="right"><?php echo $rd['berat'];?></td>
                <td align="right"><?php echo number_format(($rd['berat']/$rAll['berat_all'])*100,2)." %";?></td>
                <td align="right"><?php echo $rdDis['berat'];?></td>
                <td align="right"><?php echo number_format(($rdDis['berat']/$rAll['berat_all'])*100,2)." %";?></td>
            </tr>
            <?php  
            $totald=$totald+$rd['berat'];
            $totaldDis=$totaldDis+$rdDis['berat'];
            } 
            $totaldll=$rAll['berat_all']-$totald;
            $totaldllDis=$rAllDis['berat_all']-$totaldDis; ?>
          </tbody>
          <tfoot>
            <tr valign="top">
              <td align="center"><strong>DLL</strong></td>
              <td align="right"><strong><?php echo number_format($totaldll,2); ?></strong></td>
              <td align="right"><strong><?php if($rAll['berat_all']>0){echo number_format(($totaldll/$rAll['berat_all'])*100,2)." %";}else{echo "0";} ?></strong></td>
              <td align="right"><strong><?php echo number_format($totaldllDis,2); ?></strong></td>
              <td align="right"><strong><?php if($rAllDis['berat_all']>0){echo number_format(($totaldllDis/$rAll['berat_all'])*100,2)." %";}else{echo "0";} ?></strong></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xs-5">	
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title"> TOP 5 NCP Berdasarkan Dept Penyebab</h3>
        <?php if($Awal!="") { ?><br><b>Periode: <?php echo tanggal_indo($Awal)." - ".tanggal_indo($Akhir); }?></b>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="15%"><div align="center">Dept</div></th>
              <th width="10%"><div align="center">KG</div></th>
              <th width="5%"><div align="center">%</div></th>
              <th width="10%"><div align="center">Disposisi</div></th>
              <th width="5%"><div align="center">% Disp.</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $totaldpt=0;
            $totaldlldpt=0;
            $totaldptDis=0;
            $totaldlldptDis=0;
            $qryAllDpt=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (dept!='' OR dept!=NULL) AND NOT status='Cancel'");
            $rAllDpt=mysqli_fetch_array($qryAllDpt);
            $qryAllDptDis=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (dept!='' OR dept!=NULL) AND `status`='Disposisi' AND NOT status='Cancel'");
            $rAllDptDis=mysqli_fetch_array($qryAllDptDis);
            $qrydpt=mysqli_query($con,"SELECT SUM(berat) AS berat, ROUND(COUNT(dept)/(SELECT COUNT(*) FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND NOT status='Cancel'
            AND (dept!='' OR dept!=NULL))*100,1) AS persen,
            dept
            FROM
            `tbl_ncp_qcf`
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (dept!='' OR dept!=NULL) AND NOT status='Cancel'
            GROUP BY dept
            ORDER BY berat DESC LIMIT 5");
            while($rdpt=mysqli_fetch_array($qrydpt)){
              $qrydptDis=mysqli_query($con,"SELECT SUM(berat) AS berat, ROUND(COUNT(dept)/(SELECT COUNT(*) FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `status`='Disposisi' AND dept='$rdpt[dept]' AND NOT status='Cancel'
              AND (dept!='' OR dept!=NULL))*100,1) AS persen,
              dept
              FROM
              `tbl_ncp_qcf`
              WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `status`='Disposisi' AND dept='$rdpt[dept]' AND (dept!='' OR dept!=NULL) AND NOT status='Cancel'");
              $rdptDis=mysqli_fetch_array($qrydptDis);
            ?>
            <tr valign="top">
                <td align="center"><?php echo $rdpt['dept'];?></td>
                <td align="right"><?php echo $rdpt['berat'];?></td>
                <td align="right"><?php echo number_format(($rdpt['berat']/$rAllDpt['berat_all'])*100,2)." %";?></td>
                <td align="right"><?php echo $rdptDis['berat'];?></td>
                <td align="right"><?php echo number_format(($rdptDis['berat']/$rAllDpt['berat_all'])*100,2)." %";?></td>
            </tr>
            <?php  
            $totaldpt=$totaldpt+$rdpt['berat'];
            $totaldptDis=$totaldptDis+$rdptDis['berat'];
            } 
            $totaldlldpt=$rAllDpt['berat_all']-$totaldpt;
            $totaldlldptDis=$rAllDptDis['berat_all']-$totaldptDis; ?>
          </tbody>
          <tfoot>
            <tr valign="top">
              <td align="center"><strong>DLL</strong></td>
              <td align="right"><strong><?php echo number_format($totaldlldpt,2); ?></strong></td>
              <td align="right"><strong><?php if($rAllDpt['berat_all']>0){echo number_format(($totaldlldpt/$rAllDpt['berat_all'])*100,2)." %"; }else{echo "0";}?></strong></td>
              <td align="right"><strong><?php echo number_format($totaldlldptDis,2); ?></strong></td>
              <td align="right"><strong><?php if($rAllDptDis['berat_all']>0){echo number_format(($totaldlldptDis/$rAllDpt['berat_all'])*100,2)." %"; }else{echo "0";} ?></strong></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
	<?php
	if($Dept=="ALL"){		
	$Wdept=" ";	
	}else{	
	$Wdept=" dept='$Dept' AND ";	
	}
	if($Cancel !="1"){
		$sts=" AND NOT status='Cancel' ";
	}else{
		$sts="  ";
  }
	$qry1=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE $Wdept DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts ORDER BY id ASC");
	$qrySUM=mysqli_query($con,"SELECT COUNT(*) as Lot, SUM(rol) as Rol,SUM(berat) as Berat FROM tbl_ncp_qcf WHERE $Wdept DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts ");
	$rSUM=mysqli_fetch_array($qrySUM);
	?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data NCP <?php echo $Dept ?></h3>
		<?php if($Awal!="") { ?> 
		<div class="pull-right">
		  <a href="pages/cetak/cetak_harianncp.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&cancel=<?php echo $Cancel; ?>" class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP"><i class="fa fa-print"></i> Cetak</a>			
		</div>  
		<?php } ?>
		<?php if($Awal!="") { ?><br><b>Periode: <?php echo tanggal_indo($Awal)." - ".tanggal_indo($Akhir); ?></b>
		<h4>Total Lot: <span class="label label-info"><?php echo $rSUM['Lot']; ?></span></h4>
		<h4>Total Rol: <span class="label label-warning"><?php echo number_format($rSUM['Rol']); ?></span></h4>
		<h4>Total Qty : <span class="label label-danger"><?php echo number_format($rSUM['Berat'],"2")." Kg"; ?></span></h4> 
		<?php } ?>
		  
      
	  </div>
      <div class="box-body">
      <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
        <thead class="bg-green">
          <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Tgl</div></th>
            <th><div align="center">Status</div></th>
            <th><div align="center">Langganan</div></th>
			      <th><div align="center">Buyer</div></th>  
            <th><div align="center">PO</div></th>
            <th><div align="center">No NCP</div></th>
            <th><div align="center">Order</div></th>
            <th><div align="center">Hanger</div></th>
            <th><div align="center">Jenis Kain</div></th>
            <th><div align="center">Lebar &amp; Gramasi</div></th>
            <th><div align="center">Lot</div></th>
            <th><div align="center">Warna</div></th>
            <th><div align="center">No Warna</div></th>
            <th><div align="center">Rol</div></th>
            <th><div align="center">Berat</div></th>
            <th><div align="center">Dept</div></th>
            <th><div align="center">Masalah</div></th>
            <th><div align="center">Masalah Utama</div></th>
            <th><div align="center">Ket</div></th>
            <th align="center" class="table-list1"><div align="center">Rincian</div></th>
            <th align="center" class="table-list1"><div align="center">Penyelesaian</div></th>
            <th align="center" class="table-list1"><div align="center">Penyebab</div></th>
            <th align="center" class="table-list1"><div align="center">Colorist DYE</div></th>
            <th align="center" class="table-list1"><div align="center">Perbaikan</div></th>
            <th align="center" class="table-list1"><div align="center">Catatan Verifikator</div></th>
            <th align="center" class="table-list1"><div align="center">Peninjau Akhir</div></th>
            <th align="center" class="table-list1"><div align="center">NSP</div></th>
            <th align="center" class="table-list1"><div align="center">Rencana</div></th>
            <th align="center" class="table-list1"><div align="center">Aktual</div></th>
            <th align="center" class="table-list1"><div align="center">Nokk</div></th>
            <th align="center" class="table-list1"><div align="center">Tempat Kain</div></th>
            </tr>
        </thead>
        <tbody>
          <?php
	$no=1;	
	while($row1=mysqli_fetch_array($qry1)){
		 ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row1['tgl_buat'];?><br><div class="btn-group"><a href="pages/cetak/cetak_ncp.php?id=<?php echo $row1['id'];?>" class="btn btn-xs btn-danger" target="_blank"><i class="fa fa-print"></i></a><a href="pages/cetak/cetak_ncp_pdf.php?id=<?php echo $row1['id'];?>" class="btn btn-xs btn-info" target="_blank"><i class="fa fa-file-pdf-o"></i></a></div></td>
            <td><a href="#" class="btn sts_edit <?php if($_SESSION['dept']=="QC" or strtoupper($_SESSION['usrid'])=="TENNY" or strtoupper($_SESSION['usrid'])=="AISYAH" or strtoupper($_SESSION['usrid'])=="CRISTIN"){echo "enabled";}else{ echo "disabled";}?>" id="<?php echo $row1['id']; ?>"><span class="label <?php if($row1['status']=="OK"){echo "label-success";}else if($row1['status']=="Cancel"){echo "label-danger";}else{echo "label-warning";} ?> "><?php echo $row1['status'];?></span></a></td>
            <td><?php echo $row1['langganan'];?></td>
			<td><?php echo $row1['buyer'];?></td>  
            <td align="center"><?php echo $row1['po'];?></td>
            <td align="center"><a href="Penyelesaian-<?php echo $row1['id']; ?>" class="btn <?php if(strtoupper($_SESSION['usrid'])!="ARIF"){ echo "disabled";}?>"><span class="label label-danger"><?php echo $row1['no_ncp'];?></span></a></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td><?php echo $row1['jenis_kain'];?></td>
            <td align="center"><?php echo $row1['lebar']."x".$row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['no_warna'];?></td>
            <td align="right"><?php echo $row1['rol'];?></td>
            <td align="right"><?php echo $row1['berat'];?></td>
            <td align="center"><?php echo $row1['dept'];?></td>
            <td><?php echo $row1['masalah'];?></td>
            <td><?php echo $row1['masalah_dominan'];?></td>
            <td><?php echo $row1['ket'];?></td>
            <td><?php echo $row1['penyelesaian'];?></td>
            <td><?php echo $row1['rincian'];?></td>
            <td><?php echo $row1['penyebab'];?></td>
            <td><?php echo $row1['acc'];?></td>
            <td><?php echo $row1['perbaikan'];?></td>
            <td><?php echo $row1['catat_verify'];?></td>
            <td><?php echo $row1['peninjau_akhir'];?></td>
            <td><?php echo $row1['nsp'];?></td>
            <td align="center"><?php if($row1['tgl_rencana']!=""){echo date("d/m/y", strtotime($row1['tgl_rencana']));}?></td>
            <td align="center"><?php if($row1['tgl_selesai']!=""){echo date("d/m/y", strtotime($row1['tgl_selesai']));}?></td>
            <td align="center">'<?php echo $row1['nokk'];?></td>
            <td><?php echo $row1['tempat'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="StsEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>