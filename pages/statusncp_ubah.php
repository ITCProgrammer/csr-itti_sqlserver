<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
$id=$_GET['id'];
function posisi($nokk){
include"koneksi.php";
//$host="10.0.0.4";
//$host="DIT\MSSQLSERVER08";
//$username="sa";
//$password="ditbin";
//$db_name="TM";
set_time_limit(600);
//$conn=mssql_connect($host,$username,$password) or die ("Sorry our web is under maintenance. Please visit us later");
//mssql_select_db($db_name) or die ("Under maintenance");
$sql=" select d.DepartmentName,CONVERT(VARCHAR(19),p.[Dated],121) AS Dated from PCCardPosition p left join
Departments d on d.ID=p.DepartmentID
left join ProcessControlBatches a on p.PCBID=a.ID
where a.DocumentNo='$nokk' and (d.DepartmentName='KK Oke' or p.CounterDepartmentID='60' or d.DepartmentName='KAIN JADI BS') order by p.Dated DESC";
$qry=sqlsrv_query($conn,$sql);
$jmrow=sqlsrv_fetch_array($qry);
	return $r=$jmrow['DepartmentName']." ".$jmrow['Dated'];
	
}

function selesai($nokk){
	include"koneksi.php";
	//$host="10.0.0.4";
	//$host="DIT\MSSQLSERVER08";
	//$username="sa";
	//$password="ditbin";
	//$db_name="TM";
	set_time_limit(600);
	//$conn=mssql_connect($host,$username,$password) or die ("Sorry our web is under maintenance. Please visit us later");
	//mssql_select_db($db_name) or die ("Under maintenance");
	$sql1=" select d.DepartmentName,CONVERT(VARCHAR(11),p.[Dated],121) AS Dated from PCCardPosition p left join
	Departments d on d.ID=p.DepartmentID
	left join ProcessControlBatches a on p.PCBID=a.ID
	where a.DocumentNo='$nokk' and (d.DepartmentName='KK Oke' or p.CounterDepartmentID='60' or d.DepartmentName='KAIN JADI BS') order by p.Dated DESC";
	$qry1=sqlsrv_query($conn,$sql1);
	$jmrow1=sqlsrv_fetch_array($qry1);
		return $r1=$jmrow1['Dated'];
		
	}

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE id='$id' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$r=mysqli_fetch_array($sqlCek);
$pos=posisi($r['nokk']);
$selesai=selesai($r['nokk']);
?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <div class="box box-info">
   <div class="box-header with-border">
    <h3 class="box-title">Edit Status NCP</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body"> 
	 <!-- col --> 
	  <div class="col-md-12">
	
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">		  
		    
		<div class="form-group">
        <label for="tgl_kembali" class="col-sm-2 control-label">Tgl. Kembali</label>
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_kembali" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($r['tgl_kembali']!=NULL){echo $r['tgl_kembali'];}else{echo $r['tgl_kembali_qcf'];} ?>" <?php if($r['sts_kembali']=="Y"){echo "disabled";}?>/>
			<input name="tgl_kembali1" type="hidden" class="form-control pull-right" placeholder="" value="<?php echo $r['tgl_kembali']; ?>"/>
			<input name="tgl_selesai" type="hidden" class="form-control pull-right" placeholder="" value="<?php echo $r['tgl_selesai']; ?>"/>
			<input name="tgl_selesai1" type="hidden" class="form-control pull-right" placeholder="" value="<?php echo $selesai; ?>"/>
          </div>
        </div>
		<div>
		</div>
		<div class="col-sm-2">
			<label>
                <input type="checkbox" name="ck1av" id="ck1av" value="Y" <?php if($r['sts_kembali']=="Y"){echo "Checked disabled";}?> onClick="aktif1();">
			    Sudah kembali ke QC
				</label>
				<input name="ck1av1" type="hidden" class="form-control pull-right" placeholder="" value="<?php echo $r['sts_kembali']; ?>"/>
		</div>	
		<div class="col-sm-2">
			<?php  if($r['tgl_kembali']!=""){ echo "<span class='label label-warning'>Tgl Kembali Ke QCF : $r[tgl_kembali_qcf]</span>"; }else{ echo "<span class='label label-warning blink_me'>Tgl Kembali Ke QCF : $r[tgl_kembali_qcf]</span>"; } ?>
			</div>	
	  </div>		  
		<div class="form-group">
        <label for="tgl_serah" class="col-sm-2 control-label">Tgl. Serah Terima</label>
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_serah" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php echo $r['tgl_serah']; ?>"/>
          </div>
        </div>
		<?php if($cek>0){ ?>	   
   <a href="#" data-toggle="modal" data-target="#myModal"><i class="btn btn-info">Send to Email</i> </a>
   <?php } ?>
   		<div class="col-sm-2">
			<?php  echo "<span class='label label-danger blink_me'>".trim($pos)."</span>"; ?>
		</div>
	  </div>

	<!--<div class="form-group">
        <label for="tgl_serah" class="col-sm-2 control-label">Tgl. Selesai/Aktual </label>
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_selesai" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $r['tgl_selesai']; ?>"/>
          </div>
		</div>
		<div class="col-sm-2">
			<?php  echo "<span class='label label-danger blink_me'>".trim($pos)."</span>"; ?>
			</div>
	  </div>-->
		<div class="form-group">
				<label for="disposisi" class="col-sm-2 control-label">Verifikasi Mutu</label>
				<div class="col-sm-2">
				<label>
                <input type="checkbox" name="ck1" value="President Director" <?php if($r['ck1']!=""){echo "Checked";}?>>
			    President Director
				</label>
                <label>
                  <input type="checkbox" name="ck2" value="Marketing" <?php if($r['ck2']!=""){echo "Checked";}?>>
				Marketing	
                </label>
                <label>
                  <input type="checkbox" name="ck3" value="Manufacturing Director" <?php if($r['ck3']!=""){echo "Checked";}?>>
				Manufacturing Director	
                </label>
				<label>
                  <input type="checkbox" name="ck4" value="Q.C." onClick="aktif();" <?php if($r['ck4']=="Q.C."){echo "Checked";}?>>
				Q.C.	
                </label>	
				</div>	
              </div>	
		<div class="form-group">
                  <label for="disposisi" class="col-sm-2 control-label">Disposisi/Peninjau</label>
			      <div class="col-sm-3">
                    <input type="text" class="form-control" name="disposisi" value="<?php echo $r['peninjau_akhir']; ?>" placeholder="Kecuali Pejabat QC">
			</div> 
			<div class="col-sm-2">
				  <select name="sts" class="form-control" onChange="aktif();">
					  <option value="Belum OK" <?php if($r['status']=="Belum OK"){echo "SELECTED";}?>>Belum OK</option>
					  <option value="OK" <?php if($r['status']=="OK"){echo "SELECTED";}?>>OK</option>
					  <option value="BS" <?php if($r['status']=="BS"){echo "SELECTED";}?>>BS</option>
					  <option value="Cancel" <?php if($r['status']=="Cancel"){echo "SELECTED";}?>>Cancel</option>
					  <option value="Disposisi" <?php if($r['status']=="Disposisi"){echo "SELECTED";}?>>Disposisi</option>
				  </select>
			</div>
			<label for="disposisiqc" class="col-sm-2 control-label">Disposisi/Peninjau QC</label>
			      <div class="col-sm-2">
					<select name="disposisiqc" class="form-control select2" <?php if($r['ck4']!="Q.C." AND ($r['status']!="Cancel" OR $r['status']!="Disposisi")){ echo "disabled";}else{ echo "enabled"; } ?>>
						<option value="">Pilih</option>
						<option value="Agung C" <?php if($r['disposisiqc']=="Agung C"){echo "SELECTED";}?>>Agung C</option>
						<option value="Agus S" <?php if($r['disposisiqc']=="Agus S"){echo "SELECTED";}?>>Agus S</option>
						<option value="Alimulhakim" <?php if($r['disposisiqc']=="Alimulhakim"){echo "SELECTED";}?>>Alimulhakim</option>
						<option value="Andi W" <?php if($r['disposisiqc']=="Andi W"){echo "SELECTED";}?>>Andi W</option>
						<option value="Arif" <?php if($r['disposisiqc']=="Arif"){echo "SELECTED";}?>>Arif</option>
						<option value="Dewi S" <?php if($r['disposisiqc']=="Dewi S"){echo "SELECTED";}?>>Dewi S</option>
						<option value="Edwin" <?php if($r['disposisiqc']=="Edwin"){echo "SELECTED";}?>>Edwin</option>
						<option value="Ely" <?php if($r['disposisiqc']=="Ely"){echo "SELECTED";}?>>Ely</option>
						<option value="Ferry W" <?php if($r['disposisiqc']=="Ferry W"){echo "SELECTED";}?>>Ferry W</option>
						<option value="Heryanto" <?php if($r['disposisiqc']=="Heryanto"){echo "SELECTED";}?>>Heryanto</option>
						<option value="Janu" <?php if($r['disposisiqc']=="Janu"){echo "SELECTED";}?>>Janu</option>
						<option value="Rudi P" <?php if($r['disposisiqc']=="Rudi P"){echo "SELECTED";}?>>Rudi P</option>
						<option value="Sopian" <?php if($r['disposisiqc']=="Sopian"){echo "SELECTED";}?>>Sopian</option>
						<option value="Taufik R" <?php if($r['disposisiqc']=="Taufik R"){echo "SELECTED";}?>>Taufik R</option>
						<option value="Tri S" <?php if($r['disposisiqc']=="Tri S"){echo "SELECTED";}?>>Tri S</option>
						<option value="Vivik" <?php if($r['disposisiqc']=="Vivik"){echo "SELECTED";}?>>Vivik</option>
					</select>
			</div> 
		</div>		  
		<div class="form-group">
                  <label for="catat" class="col-sm-2 control-label">Catatan Verifikator</label>
			      <div class="col-sm-6">
                    <textarea name="catat" class="form-control"><?php echo $r['catat_verify']; ?></textarea>
			</div>  
		</div>		  
              </div>
		  
	
	
</div>	 
   <div class="box-footer">
   <button type="button" class="btn btn-default pull-left" name="save" Onclick="window.location='StatusNCP'">Kembali <i class="fa fa-cycle"></i></button>	   
   <input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" > 
   </div>
    <!-- /.box-footer -->
</div>
</form>
    
						
                    </div>
                </div>
            </div>
        </div>
<?php
if($_POST['save']=="Simpan"){      
	if ($_POST) {
		extract($_POST);
		$idt = mysqli_real_escape_string($con,$_POST['id']);
		$sts =mysqli_real_escape_string($con,$_POST['sts']);
		$peninjau =mysqli_real_escape_string($con,$_POST['disposisi']);
		$catat =mysqli_real_escape_string($con,$_POST['catat']);
		$ck1 =mysqli_real_escape_string($con,$_POST['ck1']);
		$ck2 =mysqli_real_escape_string($con,$_POST['ck2']);
		$ck3 =mysqli_real_escape_string($con,$_POST['ck3']);
		$ck4 =mysqli_real_escape_string($con,$_POST['ck4']);
		if($_POST['tgl_kembali']!=""){$tkembali=" `tgl_kembali`='$_POST[tgl_kembali]', "; }else{ $tkembali=" `tgl_kembali`='$_POST[tgl_kembali1]',";}
		if($_POST['tgl_serah']!=""){$tserah=" `tgl_serah`='$_POST[tgl_serah]', ";}else{ $tserah=" `tgl_serah`=null, ";}
		//if($_POST[tgl_selesai]!=""){$tselesai=" `tgl_selesai`='$_POST[tgl_selesai]', ";}else{ $tselesai=" `tgl_selesai`=null,";}
		if($_POST['tgl_selesai1']!=NULL){$tselesai=" `tgl_selesai`='$_POST[tgl_selesai1]', ";}else if($_POST['tgl_selesai']==NULL AND ($_POST['sts']=="OK" OR $_POST['sts']=="BS" OR $_POST['sts']=="Cancel" OR $_POST['sts']=="Disposisi")){$tselesai=" `tgl_selesai`=now(), ";}
		if($_POST['ck1av']!=""){$sts_kembali=" `sts_kembali`='$_POST[ck1av]', ";}else{ $sts_kembali=" `sts_kembali`='$_POST[ck1av1]',";}
		$sqlupdate=mysqli_query($con,"UPDATE `tbl_ncp_qcf` SET
					`status`='$sts',
					`peninjau_akhir`='$peninjau',
					`catat_verify`='$catat',
					`ck1`='$ck1',
					`ck2`='$ck2',
					`ck3`='$ck3',
					`ck4`='$ck4',
					`disposisiqc`='$_POST[disposisiqc]',
					$tkembali
					$tserah
					$tselesai
					$sts_kembali
					`tgl_update`=now()
					WHERE `id`='$idt' LIMIT 1");
		//echo " <script>window.location='?p=Batas-Produksi';</script>";
		echo "<script>swal({
	  title: 'Data Telah diUbah',
	  text: 'Klik Ok untuk melanjutkan',
	  type: 'success',
	  }).then((result) => {
	  if (result.value) {
		window.location='StatusNCPUbah-$idt';
	  }
	});</script>";
	}
}
?>
<div class="modal fade modal-3d-slit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
	//$con=mysqli_connect("10.0.0.10","dit","4dm1n");
//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
//include "../tgl_indo.php";
if($_GET['id']!=""){
$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE id='$_GET[id]'");
}else{
$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE no_ncp='$_GET[no_ncp]'");
}
$d=mysqli_fetch_array($qry);
	?>
            <div class="modal-dialog" style="width: 85%;">
				<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Email</h4>
						
                    </div>
                    <div class="modal-body">
			<div class="form-group">
                <input type="text" class="form-control" placeholder="Subject:" name="subjek" required>
			</div>
			<div class="form-group">				
                <input type="email"  class="form-control" name="untuk" placeholder="Email 1:">
			</div>
			<div class="form-group">				
                <input type="email"  class="form-control" name="untuk1" placeholder="Email 2:">
			</div>			
			<div class="form-group">
                    <textarea id="editor1" name="editor1" rows="10" cols="80" class="form-control"><p>Dear Follow Up,</p>
<p>&nbsp;</p>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td colspan="5" align="center"><font size="+1"><strong>FORMULIR PRODUK TIDAK SESUAI</strong></font></td>
      <td rowspan="2" align="center"><table width="100%" border="0">
        <tbody>
          <tr>
            <td>No. Form</td>
            <td>: 04-01</td>
            </tr>
          <tr>
            <td>No. Revisi</td>
            <td>: 06</td>
            </tr>
          <tr>
            <td>Tgl. Terbit</td>
            <td>: 23 Oktober 2019</td>
            </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="5" align="center"><font size="-1"><strong>No. NCP: <?php echo $d['no_ncp'];?></strong></font></td>
    </tr>
    <tr>
      <td colspan="2" align="left">TANGGAL: <?php echo tanggal_indo ($d['tgl_buat'],true);?></td>
		<td colspan="4" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PELANGGAN</td>
      <td width="46%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['langganan']."/".$d['buyer'];?></td>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">ROLL</td>
      <td width="13%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['rol'];?></td>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">WEIGHT</td>
      <td width="17%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['berat'];?> kg</td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['po'];?></td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">LOT NO.</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['lot'];?></td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">BATCH NO</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['nokk'];?></td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height:">ORDER</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_order'];?></td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO RAJUT</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['po_rajut']." - ".$d['supp_rajut'];?></td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">JENIS KAIN</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_hanger'];?>/<?php echo $d['jenis_kain'];?></td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">NO. WARNA / WARNA</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_warna']."/".$d['warna'];?></td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid; height: 0.4in;">ANALISA KERUSAKAN YANG TERJADI</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['masalah'];?></td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Awal</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">Tempat Kain Diletakan </td>
      <td width="13%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['tempat'];?></td>
      <td width="20%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Kembali NCP ke QCF:</td>
      <td width="21%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Serah terima ke Follow Up:</td>
      <td width="38%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Ket.</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tindakan Penyelesaian</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Dept.<br>
Penanggung Jawab</td>
      <td width="11%" rowspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Non Standar Proses</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tanggal Penyelesaian</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Verifikasi Mutu / Quality :</td>
      <td width="16%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Catatan Verifikator (Jika Ada) </td>
      <td width="9%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Akhir</td>
    </tr>
    <tr>
      <td width="2%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td width="17%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Celup Ulang</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Penyebab</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Perbaikan</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Rencana</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Actual</td>
      <td width="2%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td width="15%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">President Director</td>
      <td rowspan="6" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="6" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Cutting Loss</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="4" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Marketing</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Masuk Gudang BB/BS</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Manufacturing Director</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Finishing Ulang / Tarik Lebar</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Q.C.</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Test Laboratorium</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Dept.: <?php echo $d['nsp'];?></td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="10%" rowspan="4" valign="top">Lembar Warna :</td>
      <td width="10%" height="12">1. Putih/ Asli</td>
      <td width="32%">: Untuk QC</td>
      <td width="10%" rowspan="3" valign="top">Perhatian:</td>
      <td width="38%">1. Bon ini hanya berlaku / dipakai dalam pabrik saja.</td>
    </tr>
    <tr>
      <td>2. Merah</td>
      <td>: Untuk Follow Up</td>
      <td>2. Setiap kerusakan kain harus gunting contoh.</td>
    </tr>
    <tr>
      <td>3. Kuning</td>
      <td>: Untuk Dept. Penyebab NCP</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>4. Hijau </td>
      <td colspan="2"> : Terlampir Pada Kartu Kerja, Untuk Arsip QC Setelah Tinjauan Akhir</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p><strong>Thanks &amp; b&rsquo;regards</strong><br>
  <strong>QCF</strong></p></textarea>
              </div>
					
					
					
					</div>
			
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <button type="submit" class="btn btn-success pull-right" name="send" value="send">Send <i class="fa fa-envelope-o"></i></button>
              </div>
             </div>
            <!-- /.box-footer -->
          </div>
					</form>
          <!-- /. box -->
	</div>	
        </div>

<?php
if($_POST['send']=="send"){
$ket=str_replace("'","''",$_POST['ket']);
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.indotaichen.com'; //mail.usmanas.web.id / mail.indotaichen.com
$mail->SMTPAuth = true;
$mail->Username = 'qcf.adm@indotaichen.com'; //usman@usmanas.web.id / dept.it@indotaichen.com
$mail->Password = 'Final.123456'; //fariz001 / D1t2017
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('qcf.adm@indotaichen.com', 'admqc');
$mail->addReplyTo('qcf.adm@indotaichen.com', 'admqc');

// Menambahkan penerima
//$mail->addAddress($_POST['untuk']);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');
// Menambahkan cc atau bcc 
//$cc=str_replace("'","''",$_POST[cc]);		

//$mail->addAddress('qcf@indotaichen.com');
$mail->addAddress($_POST['untuk']);	
$mail->addCC('qcf.adm@indotaichen.com.com');
$mail->addCC($_POST['untuk1']);
//$mail->addCC($_POST['untuk2']);	
//$mail->addBCC('usmanas.as@gmail.com');

// Subjek email
$mail->Subject = ''.$_POST['subjek'].'';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent =''.$_POST['editor1'].'';
$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;	
}else{
    // echo 'Pesan telah terkirim';
	$isi=str_replace("'","''",$_POST['editor1']);
	$kirim=$_POST['untuk'];
	$sqlmail=mysqli_query($con,"INSERT INTO tbl_email_ncp SET
	no_ncp='$d[no_ncp]',
	isi='$isi',
	kirim_ke='$kirim',
	tgl_kirim=now(),
	jam_kirim=now()");
}
	}
?>
<script>
function aktif(){		
		if(document.forms['form1']['ck4'].checked == true && (document.forms['form1']['sts'].value=="Cancel" || document.forms['form1']['sts'].value=="Disposisi")){
			document.form1.disposisiqc.removeAttribute("disabled");
			document.form1.disposisiqc.setAttribute("required",true);
			document.form1.catat.setAttribute("required",true);
		}else{
			document.form1.disposisiqc.setAttribute("disabled",true);
			document.form1.disposisiqc.removeAttribute("required");
			document.form1.catat.removeAttribute("required");
			
		}
}
function aktif1(){
	if(document.forms['form1']['ck1av'].checked == true){
	document.form1.datepicker.setAttribute("readonly",true);
}else{
	document.form1.datepicker.removeAttribute("readonly");
}
}
</script>