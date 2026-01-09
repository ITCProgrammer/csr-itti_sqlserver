<!--Yulianto Last Update 5 Oktober 2023-->
<?php 
include"koneksi.php";

	$getOrder = $_GET['order'];
	$explode = explode("-",$getOrder );
	
	$edit_status = $explode [1] ;
	if ($edit_status >=1) { 
	
	$modal=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$edit_status' ");
	$r=mysqli_fetch_assoc($modal);
	/*echo '<pre>';
		print_r($r);
	echo '</pre>';
	*/
?>



<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
	
	<input type="hidden" name="id_disposisi" value="<?=$_GET['id']?>">
	<input type="hidden" name="order" value="<?=$explode[0]?>">
	
	
	<input type="hidden" name="id_ganti_kain" value="<?= $edit_status ?>">
		<div class="box-header with-border">
			<h3 class="box-title">Update Ganti Kain</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
	  		<div class="form-group">
                <label for="alasan" class="col-sm-2 control-label">Penyebab</label>
				<div class="col-sm-4">
						<?php 
						$dtArr=$r['sebab'];
						$data = explode(",",$dtArr);
						?>
						 <div class="form-group">
						  <label><input type="checkbox" class="minimal" name="sebab[]" value="Man" <?php if(in_array("Man",$data)){echo "checked";} ?>> Man &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						  </label>
						  <label><input type="checkbox" class="minimal" name="sebab[]" value="Methode" <?php if(in_array("Methode",$data)){echo "checked";} ?>> Methode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						  </label>
						  <label><input type="checkbox" class="minimal" name="sebab[]" value="Machine" <?php if(in_array("Machine",$data)){echo "checked";} ?>> Machine 
						  </label>
						</div>
						<div class="form-group">
						  <label><input type="checkbox" class="minimal" name="sebab[]" value="Material" <?php if(in_array("Material",$data)){echo "checked";} ?>> Material &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						  </label>
						  <label><input type="checkbox" class="minimal" name="sebab[]" value="Environment" <?php if(in_array("Environment",$data)){echo "checked";} ?>> Environment
						  </label>
						  </label>
						</div>
				</div>
					
					
					
            </div>
	  		<div class="form-group">
                <label for="warna1" class="col-sm-2 control-label">Analisa</label>
                  	<div class="col-sm-4">
                    	 <textarea name="analisa" class="form-control"><?php echo $r['analisa']; ?></textarea>
                  	</div>
					
				  	
				
					
            </div>
			<div class="form-group">
		  		<label for="sub_defect" class="col-sm-2 control-label">Pencegahan</label>
		 			<div class="col-sm-4">
						<textarea name="pencegahan" class="form-control"><?php echo $r['pencegahan']; ?></textarea>
		 	 		</div>
					
<?php 
$penanggung_jawab_array = [
'MKT',
'FIN',
'DYE',
'KNT',
'LAB',
'PRT',
'KNK',
'QCF',
'GKG',
'PRO',
'RMP',
'PPC',
'TAS',
'GKJ',
'BRS',
'CST',
'GAS',
'YND'
]; 

?>



					
					
					
					
					
					
			
					
		  		
		  			
		  	</div> 

<div class="form-group">
	<label for="sub_defect" class="col-sm-2 control-label">Qty Permintaan</label>
	<div class="col-sm-2">
		<div class="input-group">
		<?php $qty_order2_split = explode("/",$r['qty_permintaan']);
					  $qty_order_2_satuan = $qty_order2_split[2];
				?>
		<input name="qty_permintaan" type="text" class="form-control"  value="<?php echo $qty_order2_split[0] ; ?>" placeholder="0.00" style="text-align: right;">
		<span class="input-group-addon">Kg</span>	
		</div>
	</div>
    	
	<div class="col-sm-2">
		<div class="input-group">  
				
				<input name="qty_permintaan_nilai" type="text" class="form-control"  value="<?php echo $qty_order2_split[1] ; ?>" placeholder="0.00" style="text-align: right;">
				<span class="input-group-addon">
				<select name="qty_permintaan_satuan" style="font-size: 12px;" >
				<option value="Yard" <?php if($qty_order_2_satuan=="Yard"){ echo "SELECTED"; }?>>Yard</option>
				<option value="Meter" <?php if($qty_order_2_satuan=="Meter"){ echo "SELECTED"; }?>>Meter</option>
				<option value="PCS" <?php if($qty_order_2_satuan=="PCS"){ echo "SELECTED"; }?>>PCS</option>
				<option value="<?php echo $qty_order_2_satuan;?>" <?php if($qty_order_2_satuan!=""){ echo "SELECTED"; }?>><?php echo $qty_order_2_satuan;?></option>
				</select>
			</span>	
		</div>
	</div>		
</div>

			
<div class="form-group">
	<label for="sub_defect" class="col-sm-2 control-label">Qty Order</label>
	<div class="col-sm-2">
		<div class="input-group">
		<input name="qty_order" type="text" class="form-control"  value="<?php echo $r['qty_order']; ?>" placeholder="0.00" style="text-align: right;">
		<span class="input-group-addon">Kg</span>	
		</div>
	</div>  
	 <!--
	<div class="col-sm-2">
		<div class="input-group">  
				<?php $qty_order2_split = explode("/",$r['qty_order2']);
					  $qty_order_2_satuan = $qty_order2_split[1];
				?>
				<input name="qty_order2_nilai" type="text" class="form-control"  value="<?php echo $qty_order2_split[0] ; ?>" placeholder="0.00" style="text-align: right;">
				<span class="input-group-addon">
				<select name="qty_order2_satuan" style="font-size: 12px;" >
				<option value="Yard" <?php if($qty_order_2_satuan=="Yard"){ echo "SELECTED"; }?>>Yard</option>
				<option value="Meter" <?php if($qty_order_2_satuan=="Meter"){ echo "SELECTED"; }?>>Meter</option>
				<option value="PCS" <?php if($qty_order_2_satuan=="PCS"){ echo "SELECTED"; }?>>PCS</option>
				<option value="<?php echo $qty_order_2_satuan;?>" <?php if($qty_order_2_satuan!=""){ echo "SELECTED"; }?>><?php echo $qty_order_2_satuan;?></option>
				</select>
			</span>	
		</div>
	</div>	-->	
</div> 
		
		
	
		
		<div class="form-group">
			<label  class="col-sm-2 control-label">Qty Kirim</label>
			<div class="col-sm-2">
				<div class="input-group">
				<input name="qty_kirim" type="text" class="form-control"  value="<?php echo $r['qty_kirim']; ?>" placeholder="0.00" style="text-align: right;">
				<span class="input-group-addon">Kg</span>	
				</div>
			</div> 
			<!--			
			<div class="col-sm-2">
				<div class="input-group">  
				<?php $qty_kirim2_split = explode("/",$r['qty_kirim2']);
					  $qty_kirim_2_satuan = $qty_kirim2_split[1];
				?>
				<input name="qty_kirim2_nilai" type="text" class="form-control"  value="<?php echo $qty_kirim2_split[0]; ?>" placeholder="0.00" style="text-align: right;">
				<span class="input-group-addon">
				<select name="qty_kirim2_satuan" style="font-size: 12px;" >
				<option value="Yard" <?php if($qty_kirim_2_satuan=="Yard"){ echo "SELECTED"; }?>>Yard</option>
				<option value="Meter" <?php if($qty_kirim_2_satuan=="Meter"){ echo "SELECTED"; }?>>Meter</option>
				<option value="PCS" <?php if($qty_kirim_2_satuan=="PCS"){ echo "SELECTED"; }?>>PCS</option>
				<option value="<?php echo $qty_kirim_2_satuan;?>" <?php if($qty_kirim_2_satuan!=""){ echo "SELECTED"; }?>><?php echo $qty_kirim_2_satuan;?></option>
				</select>
				</span>	
				</div>
			</div>
            -->			
		</div> 
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Masalah</label>
			<div class="col-sm-4">
			<input name="masalah" type="text" class="form-control" id="masalah" value="<?php echo $r['masalah']; ?>" placeholder="">
			</div>  
		</div> 
		<div class="form-group">
			<label for="sub_defect" class="col-sm-2 control-label">Sub Defect</label>
			<div class="col-sm-3">
			
			
						<select class="form-control select2" name="sub_defect" id="sub_defect">
							<option value="">Pilih</option>
							<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($r['sub_defect']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
						</select>
		 	 		
			
			</div>  
		</div> 
		
<div class="form-group">
	<label for="sub_defect" class="col-sm-2 control-label">Tanggung Jawab 1</label>
		<div class="col-sm-2">
		<select class="form-control select2" name="t_jawab">
		  <option value="">Pilih</option>
		  <?php 
		  $qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
		  while($dept = mysqli_fetch_array($qryDept)){
		  ?>
		  <option value="<?php echo $dept['nama'];?>" <?php if($r['t_jawab'] == $dept['nama']){echo "SELECTED";}?>><?php echo $dept['nama'];?></option>
		  <?php } ?>
		</select>
		</div>
		<div class="col-sm-2">
			<div class="input-group">  
			<input name="persen" type="text" class="form-control"  value="<?php echo $r['persen']; ?>" placeholder="0" style="text-align: right;">
			<span class="input-group-addon">%</span>	
			</div>
		</div>					
</div> 

<div class="form-group">
	<label for="sub_defect" class="col-sm-2 control-label">Tanggung Jawab 2</label>
		<div class="col-sm-2">
		<select class="form-control select2" name="t_jawab1">
		  <option value="">Pilih</option>
		  <?php 
		  $qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
		  while($dept1 = mysqli_fetch_array($qryDept)){
		  ?>
		  <option value="<?php echo $dept1['nama'];?>" <?php if($r['t_jawab1'] == $dept1['nama']){echo "SELECTED";}?>><?php echo $dept1['nama'];?></option>
		  <?php } ?>
		</select>
		</div>
		<div class="col-sm-2">
			<div class="input-group">  
			<input name="persen1" type="text" class="form-control"  value="<?php echo $r['persen1']; ?>" placeholder="0" style="text-align: right;">
			<span class="input-group-addon">%</span>	
			</div>
		</div>					
</div> 

<div class="form-group">
	<label for="sub_defect" class="col-sm-2 control-label">Tanggung Jawab 3</label>
		<div class="col-sm-2">
		<select class="form-control select2" name="t_jawab2">
		  <option value="">Pilih</option>
		  <?php 
		  $qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
		  while($dept2 = mysqli_fetch_array($qryDept)){
		  ?>
		  <option value="<?php echo $dept2['nama'];?>" <?php if($r['t_jawab2'] == $dept2['nama']){echo "SELECTED";}?>><?php echo $dept2['nama'];?></option>
		  <?php } ?>
		</select>
		</div>	
		<div class="col-sm-2">
			<div class="input-group">  
			<input name="persen2" type="text" class="form-control"  value="<?php echo $r['persen2']; ?>" placeholder="0" style="text-align: right;">
			<span class="input-group-addon">%</span>	
			</div>
		</div>					
</div> 
		
		<div class="box-footer">
	<input type="submit" value="Update" name="update_post"  class="btn btn-primary pull-left">
	
</div>
		</div>
<!-- /.box-footer -->

	
</form>	 

	<?php } 
	

?>

<?php 

if (isset($_POST['update_post'])) {
	$id =  $_POST['id_ganti_kain'];
	$id_disposisi = $_POST['id_disposisi'];
	$order = $_POST['order']; 
	
	$checkbox1 = $_POST['sebab'] ; 
	$sebab = '';
	foreach($checkbox1 as $chk1)  
   		  {  
      		$sebab .= $chk1.",";  
    }
	
	$qty_order_2 = $_POST['qty_order2_nilai'].'/'.$_POST['qty_order2_satuan'];
	$qty_kirim_2 = $_POST['qty_kirim2_nilai'].'/'.$_POST['qty_kirim2_satuan'];
	$qty_permintaan_satuan = $_POST['qty_permintaan'].'/'.$_POST['qty_permintaan_nilai'].'/'.$_POST['qty_permintaan_satuan'];
	
	$update=mysqli_query($con,"UPDATE tbl_ganti_kain_now SET
			sebab = '$sebab',
			analisa = '$_POST[analisa]',
			pencegahan = '$_POST[pencegahan]',
			qty_order = '$_POST[qty_order]',
			
			qty_kirim = '$_POST[qty_kirim]',
		
			masalah = '$_POST[masalah]',
			t_jawab = '$_POST[t_jawab]',
			t_jawab1 = '$_POST[t_jawab1]',
			t_jawab2 = '$_POST[t_jawab2]',
			persen = '$_POST[persen]',
			persen1 = '$_POST[persen1]',
			persen2 = '$_POST[persen2]',
			sub_defect = '$_POST[sub_defect]',
			qty_permintaan = '$qty_permintaan_satuan'
			WHERE id='$id' ");
			
			if ($update) {
				echo "<script>
							window.location.href='TambahBonDisposisi-$id_disposisi-$order'; 
					</script>";
			}
	
	/*echo '<pre>';
		print_r($_POST);
	echo '</pre>';
	*/
}
?>
<style>
	.icon-button {
	background-image: url('https://cdn-icons-png.flaticon.com/512/3687/3687412.png'); /* Replace with your image file path */
	background-size: 20px 20px; /* Adjust the size as needed */
	background-repeat: no-repeat;
	background-position: center;
	border: none; /* Remove button border */
	width: 20px; /* Adjust the width to fit your icon */
	height: 20px; /* Adjust the height to fit your icon */
	cursor: pointer; /* Add a pointer cursor to indicate it's clickable */
}
</style>
<?php
ini_set("error_reporting", 1);
session_start();

	$qryCek=mysqli_query($con,"SELECT * FROM tbl_disposisi_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
?>
<?php
function no_urut($x){
include"koneksi.php";
date_default_timezone_set("Asia/Jakarta");
if($x=="Reject Buyer"){$fk="RB";}else if($x=="Kurang Qty"){$fk="GK";}	
$format = $fk.date("y/m/");
$sql=mysqli_query($con,"SELECT no_bon FROM tbl_ganti_kain_now WHERE substr(no_bon,1,10) like '".$format."%' and id_disposisi is not null ORDER BY no_bon DESC LIMIT 1 ") or die (mysqli_error());
$d=mysqli_num_rows($sql);
if($d>0){
	$r=mysqli_fetch_array($sql);
	$d=$r['no_bon'];
	$str=substr($d,8,3);
	$Urut = (int)$str;
}else{
	$Urut = 0;
}
$Urut = $Urut + 1;
$Nol="";
$nilai=3-strlen($Urut);
for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
}
$nipbr =$format.$Nol.$Urut;
return $nipbr;
}

date_default_timezone_set("Asia/Jakarta");
//Baca Tanggal Hari ini
$today = date("Y-m-d");
$sql = "SELECT max(kd_ganti) AS kd_ganti FROM tbl_ganti_kain_now WHERE no_order='$rCek[no_order]'";
$query = mysqli_query($con,$sql) or die (mysqli_error());

$cno = mysqli_num_rows($query);
if($cno>0){
	$gno = mysqli_fetch_array($query);
  	$text=$gno['kd_ganti'];
  	if(strpos($text, 'GR') !== false){
		$nilai = substr($text,2,2);
  	}else{
		$nilai = substr($text,1,2);
  	}
  	$kode = (int)$nilai;
}else{
	$kode= 0;
}
  //tambahkan sebanyak + 1
  $kode = $kode+1;
  if($_POST['alasan']=="Reject Buyer"){
	$auto_kode = "GR".$kode;
	}else if($_POST['alasan']=="Kurang Qty"){
	$auto_kode = "G".$kode;
	}else {
  $auto_kode = "G1";
}
$alsn= isset($_POST['alasan']) ? $_POST['alasan'] : '';
$W1= isset($_POST['warna1']) ? $_POST['warna1'] : '';
$W2= isset($_POST['warna2']) ? $_POST['warna2'] : '';
$W3= isset($_POST['warna3']) ? $_POST['warna3'] : '';
$posW1=strpos($_POST['warna1'], ',');
$WRN1=substr($_POST['warna1'],0,$posW1);
$WN1=str_replace("'","''",$WRN1);
$posW2=strpos($_POST['warna2'], ',');
$WRN2=substr($_POST['warna2'],0,$posW2);
$WN2=str_replace("'","''",$WRN2);
$posW3=strpos($_POST['warna3'], ',');
$WRN3=substr($_POST['warna3'],0,$posW3);
$WN3=str_replace("'","''",$WRN3);
//$posKK1=substr($_POST[warna1],$posW1+1,15);
//$posKK2=substr($_POST[warna2],$posW2+1,15);
//$posKK3=substr($_POST[warna3],$posW3+1,15);
//$kker1=str_replace("'","''",$posKK1);
//$kker2=str_replace("'","''",$posKK2);
//$kker3=str_replace("'","''",$posKK3);
$yard1= isset($_POST['pjg1']) ? $_POST['pjg1'] : '';
$yard2= isset($_POST['pjg2']) ? $_POST['pjg2'] : '';
$yard3= isset($_POST['pjg3']) ? $_POST['pjg3'] : '';
$qty_order= isset($_POST['qty_order']) ? $_POST['qty_order'] : '';
$qty_kirim= isset($_POST['qty_kirim']) ? $_POST['qty_kirim'] : '';
$pjg_email= isset($_POST['pjg_email']) ? $_POST['pjg_email'] : '';
//$posL1=strpos($_POST[warna1], ',');
$posLot1=substr($_POST['warna1'],$posW1+1,20);
$L1=str_replace("'","''",$posLot1);
//$L1= isset($_POST[lot1]) ? $_POST[lot1] : '';
//$posL2=strpos($_POST[warna2], ',');
$posLot2=substr($_POST['warna2'],$posW2+1,20);
$L2=str_replace("'","''",$posLot2);
//$L2= isset($_POST[lot2]) ? $_POST[lot2] : '';
//$posL3=strpos($_POST[warna3], ',');
$posLot3=substr($_POST['warna3'],$posW3+1,20);
$L3=str_replace("'","''",$posLot3);
$sat1= isset($_POST['satuan1']) ? $_POST['satuan1'] : '';
$sat2= isset($_POST['satuan2']) ? $_POST['satuan2'] : '';
$sat3= isset($_POST['satuan3']) ? $_POST['satuan3'] : '';
$sat_email= isset($_POST['satuan_email']) ? $_POST['satuan_email'] : '';
//$L3= isset($_POST[lot3]) ? $_POST[lot3] : '';

$qryg=mysqli_query($con,"SELECT kd_ganti FROM tbl_ganti_kain_now WHERE no_order='$rCek[no_order]' AND alasan='$_POST[alasan]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekg=mysqli_num_rows($qryg);
$rg=mysqli_fetch_array($qryg);
$qryb=mysqli_query($con,"SELECT no_bon FROM tbl_ganti_kain_now WHERE id_disposisi='$_GET[id]' AND alasan='$_POST[alasan]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekb=mysqli_num_rows($qryb);
$rb=mysqli_fetch_array($qryb);

$qry_sql = "SELECT * FROM tbl_disposisi_now WHERE warna='$_POST[warna1]' 
--  and lot='$L1' 
 and no_order='$rCek[no_order]' 
-- and no_hanger='$rCek[no_hanger]' 
-- AND po='$rCek[po]' 
ORDER BY id DESC LIMIT 1";
$qryd1=mysqli_query($con,$qry_sql);
$rowd1=mysqli_fetch_array($qryd1);
$qryr1=mysqli_query($con,"SELECT * FROM tbl_disposisi_now WHERE id='$_GET[id]'");
$r1=mysqli_fetch_array($qryr1);
							  
	if(isset($_POST['save'])){
		
		
		
		
		$bon=no_urut($_POST['alasan']);
		//if($_POST[analisa]=="Reject Buyer"){$order=$rCek[no_order]." GR1";}else if($_POST[analisa]=="Kurang Qty"){$fk= $rCek[no_order]." G1";}
		$order=$r1['no_order'];
		$noorder1=str_replace("/","&",$r1['no_order']);
		if($cekg>0){
			$kdganti=$rg['kd_ganti'];
		}else{
		$kdganti=$auto_kode;}
		if($cekb>0){
			$kdbon=$rb['no_bon'];
		}else{
		$kdbon=$bon;}
		$pos=strpos($r1['langganan'], "/");
		$posbuyer=substr($r1['langganan'],$pos+1,50);
		$buyer=str_replace("'","''",$posbuyer);
		$analisa=str_replace("'","''",$_POST['analisa']);	
		$pencegahan=str_replace("'","''",$_POST['pencegahan']);	
		//$alasan=str_replace("'","''",$_POST['alasan']);
		$alasan=$_POST['alasan'];
		//$alasan=1
		//$alsn
		$pwar1= strpos($_POST['warna1'], ',');
		$pwar2= strpos($_POST['warna2'], ',');
		$pwar3= strpos($_POST['warna3'], ',');
		$potW1=substr($_POST['warna1'],0,$pwar1);
		$potW2=substr($_POST['warna2'],0,$pwar2);
		$potW3=substr($_POST['warna3'],0,$pwar3);
		//$potKK1=substr($_POST[warna1],$pwar1+1,15);
		//$potKK2=substr($_POST[warna2],$pwar2+1,15);
		//$potKK3=substr($_POST[warna3],$pwar3+1,15);
		$demand1=str_replace("'","''",$_POST['nodemand1']);
		$demand2=str_replace("'","''",$_POST['nodemand2']);
		$demand3=str_replace("'","''",$_POST['nodemand3']);
		// $warna1=str_replace("'","''",$potW1);
		$warna1 = $_POST['warna1'];
		
		$warna2=str_replace("'","''",$potW2);		
		$warna3=str_replace("'","''",$potW3);
		$kg1=str_replace("'","''",$_POST['kg1']);
		$kg2=str_replace("'","''",$_POST['kg2']);		
		$kg3=str_replace("'","''",$_POST['kg3']);
		$pjg1=str_replace("'","''",$_POST['pjg1']);
		$pjg2=str_replace("'","''",$_POST['pjg2']);		
		$pjg3=str_replace("'","''",$_POST['pjg3']);
		$satuan1=str_replace("'","''",$_POST['satuan1']);
		$satuan2=str_replace("'","''",$_POST['satuan2']);		
		$satuan3=str_replace("'","''",$_POST['satuan3']);
		//$plot1= strpos($_POST[warna1], ',');
		//$plot2= strpos($_POST[warna2], ',');
		//$plot3= strpos($_POST[warna3], ',');
		$potL1=substr($_POST['warna1'],$pwar1+1,20);
		$potL2=substr($_POST['warna2'],$pwar2+1,20);
		$potL3=substr($_POST['warna3'],$pwar3+1,20);
		$lot1=str_replace("'","''",$potL1);
		$lot2=str_replace("'","''",$potL2);
		$lot3=str_replace("'","''",$potL3);
		$langganan=str_replace("'","''",$r1['langganan']);
		//$masalah=str_replace("'","''",$r1['masalah']);
		$masalah= $_POST['masalah'];
		$no_po=str_replace("'","''",$rowd1['no_po']);
		$no_item=str_replace("'","''",$rowd1['no_item']);
		$no_hanger=str_replace("'","''",$rowd1['no_hanger']);
		$jenis_kain=str_replace("'","''",$rowd1['jenis_kain']);
		$lebar=str_replace("'","''",$rowd1['lebar']);
		$gramasi=str_replace("'","''",$rowd1['gramasi']);
		$warna=str_replace("'","''",$rowd1['warna']);
		$no_warna=str_replace("'","''",$rowd1['no_warna']);
		// $qty_order=str_replace("'","''",$rowd1['qty_order']);
		$qty_order= $_POST['qty_order'];
		//$qty_kirim=str_replace("'","''",$rowd1['qty_kirim']);
		$qty_kirim= $_POST['qty_kirim'];
		$qty_foc=str_replace("'","''",$rowd1['qty_foc']);
		$qty_claim=str_replace("'","''",$rowd1['qty_claim']);
		//$t_jawab=str_replace("'","''",$rowd1['t_jawab']);
		//$t_jawab1=str_replace("'","''",$rowd1['t_jawab1']);
		//$t_jawab2=str_replace("'","''",$rowd1['t_jawab2']);
		
		$t_jawab= $_POST['t_jawab'];
		$t_jawab1= $_POST['t_jawab1'];
		$t_jawab2= $_POST['t_jawab2'];
		
		
		$persen=  $_POST['persen'];
		$persen1= $_POST['persen1'];
		$persen2= $_POST['persen2'];
		$styl=str_replace("'","''",$r1['styl']);
		$satuan_o=str_replace("'","''",$r1['satuan_o']);
		$satuan_k=str_replace("'","''",$r1['satuan_k']);
		$satuan_f=str_replace("'","''",$r1['satuan_f']);
		$satuan_c=str_replace("'","''",$r1['satuan_c']);
		$qty_email=str_replace("'","''",$_POST['qty_email']);
		$pjg_email=str_replace("'","''",$_POST['pjg_email']);		
		$satuan_email=str_replace("'","''",$_POST['satuan_email']);
		$sub_defect=str_replace("'","''",$_POST['sub_defect']);
		$qty_order2 = $_POST['qty_order2_nilai'].'/'.$_POST['qty_order2_satuan'];
		$qty_kirim2 = $_POST['qty_kirim2_nilai'].'/'.$_POST['qty_kirim2_satuan'];
		$qty_permintaan_left = number_format($_POST['qty_permintaan'], 2, '.', '');
		$qty_permintaan_center = number_format($_POST['qty_permintaan_nilai'], 2, '.', '');
		$qty_permintaan = $qty_permintaan_left.'/'.$qty_permintaan_center.'/'.$_POST['qty_permintaan_satuan'];
		$qry1=mysqli_query($con,"INSERT INTO tbl_ganti_kain_now SET
		`id_disposisi`='$_GET[id]',
		`buyer`='$buyer',
		`kd_ganti`='$kdganti',
		`no_bon`='$kdbon',
		`no_order`='$order',
		`alasan`='$alasan',
		`analisa`='$analisa',
		`pencegahan`='$pencegahan',
		`nodemand1`='$demand1',
		`nodemand2`='$demand2',
		`nodemand3`='$demand3',
		`warna1`='$warna1',
		`warna2`='$warna2',
		`warna3`='$warna3',
		`kg1`='$kg1',
		`kg2`='$kg2',
		`kg3`='$kg3',
		`pjg1`='$pjg1',
		`pjg2`='$pjg2',
		`pjg3`='$pjg3',
		`satuan1`='$satuan1',
		`satuan2`='$satuan2',
		`satuan3`='$satuan3',
		`lot1`='$lot1',
		`lot2`='$lot2',
		`lot3`='$lot3',
		`langganan`='$langganan',
		`masalah`='$masalah',
		`no_po`='$no_po',
		`no_item`='$no_item',
		`no_hanger`='$no_hanger',
		`jenis_kain`='$jenis_kain',
		`lebar`='$lebar',
		`gramasi`='$gramasi',
		`warna`='$warna',
		`no_warna`='$no_warna',
		`qty_order`='$qty_order',
		`qty_foc`='$qty_foc',
		`qty_kirim`='$qty_kirim',
		`qty_claim`='$qty_claim',
		`t_jawab`='$t_jawab',
		`t_jawab1`='$t_jawab1',
		`t_jawab2`='$t_jawab2',
		`persen`='$persen',
		`persen1`='$persen1',
		`persen2`='$persen2',
		`styl`='$styl',
		`satuan_o`='$satuan_o',
		`satuan_k`='$satuan_k',
		`satuan_f`='$satuan_f',
		`satuan_c`='$satuan_c',
		`qty_email`='$qty_email',
		`pjg_email`='$pjg_email',
		`satuan_email`='$satuan_email',
		`sub_defect`='$sub_defect',
		`tgl_buat`=now(),
		`tgl_update`=now(),
		qty_order2 = '$qty_order2',
		qty_kirim2 = '$qty_kirim2',
		qty_permintaan = '$qty_permintaan'
		
		");	
		if($qry1){	
			echo "<script>swal({
			title: 'Data Telah diSimpan',   
			text: 'Klik Ok untuk input data kembali',
			type: 'success',
			}).then((result) => {
			if (result.value) {
				window.location.href='TambahBonDisposisi-$_GET[id]-$noorder1';
			}
			});</script>";
		}
	}
?>	

<?php if ($edit_status <=1) { ?>
<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir Ganti Kain</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
	  		<div class="form-group">
                <label for="alasan" class="col-sm-2 control-label">Alasan</label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="alasan" required>
							<option value="">Pilih</option>
							<option <?php if($_POST['alasan']=="Ditunggu Container"){?> selected=selected <?php };?>value="Ditunggu Container">Ditunggu Container</option>	
							<option <?php if($_POST['alasan']=="Tembak Dokumen"){?> selected=selected <?php };?>value="Tembak Dokumen">Tembak Dokumen</option>
						</select>
                  	</div>
					
					<label for="qty_email" class="col-sm-2 control-label">Qty Permintaan</label>
					<div class="col-sm-2">
                    	<div class="input-group">
							<input name="qty_permintaan" type="text" class="form-control" id="qty_permintaan"  placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">Kg</span>
							
						</div>
                  	</div>
					<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="qty_permintaan_nilai" type="text" class="form-control"  placeholder="0.00" style="text-align: right;" required>
								<span class="input-group-addon">
									<select name="qty_permintaan_satuan" style="font-size: 12px;" >
										<option value="Yard">Yard</option>
										<option value="Meter">Meter</option>
										<option value="PCS">PCS</option>
									</select>
								</span>	
						</div>
                  	</div>
					
            </div>
	  		<div class="form-group">
                <label for="warna1" class="col-sm-2 control-label">Warna / Lot </label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna1" required>
							<option value="">Pilih</option>
							<?php 
							$code_sql = "SELECT warna FROM tbl_disposisi_now WHERE 
							no_order='$rCek[no_order]' 
							-- and no_hanger='$rCek[no_hanger]' 
							-- and no_po='$rCek[po]' 
							ORDER BY warna";
							$sqlw1=mysqli_query($con,$code_sql);
							
							while ($rwarna=mysqli_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna['warna'];?>"><?php echo $rwarna['warna'];?></option>
							<?php } ?>
							
						</select>
                  	</div>
					
					<label for="qty_email" class="col-sm-2 control-label">Qty Order </label>
					<div class="col-sm-2">
                    	<div class="input-group">
							<input name="qty_order" type="text" class="form-control" id="qty_order" value="<?php if($qty_order!=""){echo $qty_order;}else{echo $rcek['qty_order'];} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">Kg</span>
							
						</div>
                  	</div>
					<!--
					<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="qty_order2_nilai" type="text" class="form-control"  placeholder="0.00" style="text-align: right;" required>
								<span class="input-group-addon">
									<select name="qty_order2_satuan" style="font-size: 12px;" >
										<option value="Yard">Yard</option>
										<option value="Meter">Meter</option>
										<option value="PCS">PCS</option>
									</select>
								</span>	
						</div>
                  	</div>-->
				
            </div>
			<div class="form-group">
		  		<label for="sub_defect" class="col-sm-2 control-label">Sub Defect</label>
		 			<div class="col-sm-3">
						<select class="form-control select2" name="sub_defect" id="sub_defect">
							<option value="">Pilih</option>
							<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['sub_defect']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
						</select>
		 	 		</div>
					
					
					
						<label for="warna1" class="col-sm-2 control-label">
					<?php 
					//echo '<pre>';
							//print_r($code_sql);
					//echo '</pre>';
					?>
					Qty Kirim </label>
				  	<div class="col-sm-2">
                    	<div class="input-group">
							<?php //$qryw1=mysqli_query($con,"SELECT qty_claim,nodemand FROM tbl_aftersales=_now WHERE warna='$WN1' and lot='$L1' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' and po='$rCek[po]'");
							//$rowW1=mysqli_fetch_array($qryw1);
							?>  
							<input name="qty_kirim" type="text" class="form-control" id="qty_kirim"  placeholder="0.00" style="text-align: right;" >
							<span class="input-group-addon">Kg</span>
							
						</div>
                  	</div>
					 <!--
					  <div class="col-sm-2">
							<div class="input-group">  
								<input name="qty_kirim2_nilai" type="text" class="form-control"   placeholder="0.00" style="text-align: right;" required>
									<span class="input-group-addon">
										<select name="qty_kirim2_satuan" style="font-size: 12px;" >
												<option value="Yard">Yard</option>
												<option value="Meter">Meter</option>
												<option value="PCS">PCS</option>
										</select>
									</span>	
							</div>
						</div>
						-->
					<div class="col-sm-2">
						<input name="nodemand1" type="hidden" class="form-control" id="nodemand1" value="<?php echo $rowW1['nodemand']; ?>" placeholder="" readonly>
					</div>
					
<?php 
$penanggung_jawab_array = [
'MKT',
'FIN',
'DYE',
'KNT',
'LAB',
'PRT',
'KNK',
'QCF',
'GKG',
'PRO',
'RMP',
'PPC',
'TAS',
'GKJ',
'BRS',
'CST',
'GAS',
'YND'
]; 

?>



					
					
					
					
					
			
					
		  		
		  			
		  	</div> 
			
		<div class="form-group">
		  		<label for="sub_defect" class="col-sm-2 control-label">Masalah</label>
				<div class="col-sm-3">
					<input type="text" name="masalah" class="form-control">
					
				</div>
				
				<label for="tangggung_jawab" class="col-sm-2 control-label">Tanggung Jawab 1</label>
		 			<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab">
							<option value="">Pilih</option>		
							<?php foreach ($penanggung_jawab_array as $jawab) {?>
								<option value= <?=$jawab?> > <?=$jawab?> </option>
							<?php } ?>
						</select>	
		  			</div>
					<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="persen" type="text" class="form-control"  placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">%</span>	
						</div> 
                  	</div>
				
		</div> 
		
		
		<div class="form-group">
		  		<label for="sub_defect" class="col-sm-2 control-label"></label>
				<div class="col-sm-3">
					
				</div>
				<label for="tangggung_jawab" class="col-sm-2 control-label">Tanggung Jawab 2</label>
				<div class="col-sm-2">
					<select class="form-control select2" name="t_jawab1">
						<option value="">Pilih</option>		
						<?php foreach ($penanggung_jawab_array as $jawab) {?>
							<option value= <?=$jawab?> > <?=$jawab?> </option>
						<?php } ?>
					</select>	
				</div>
				<div class="col-sm-2">
					<div class="input-group">  
						<input name="persen1" type="text" class="form-control" placeholder="0.00" style="text-align: right;">
						<span class="input-group-addon">%</span>	
					</div> 
				</div>
		</div> 
		
		
		
		<div class="form-group">
		  		<label for="sub_defect" class="col-sm-2 control-label"></label>
				<div class="col-sm-3">
					
				</div>
				<label for="tangggung_jawab" class="col-sm-2 control-label">Tanggung Jawab 3</label>
		 			<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab2">
							<option value="">Pilih</option>		
								<?php foreach ($penanggung_jawab_array as $jawab) {?>
								<option value= <?=$jawab?> > <?=$jawab?> </option>
							<?php } ?>
						</select>	
		  			</div>
					<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="persen2" type="text" class="form-control"   placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">%</span>	
						</div> 
                  	</div>
		</div> 
		
		</div>
<!-- /.box-footer -->

<div class="box-footer">
	<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right">
	<!--<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>-->
</div>	
</form>	 
</div>

<?php } ?>
<?php 

if ($_POST['delete_post']) {

	$id =  $_POST['id_delete']; 
	$no_order = $_POST['no_order'];
	$id_redirect = $_POST['id_redirect'];
	$modal=mysqli_query($con,"DELETE FROM tbl_ganti_kain_now WHERE id='$id' ");
    if ($modal) {
        echo "<script>window.location='TambahBonDisposisi-$id_redirect-$no_order';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='TambahBonDisposisi-$id_redirect-$no_order';</script>";
    }
}
?>

<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2">
			<div class="box-header with-border">
                    <div class="pull-right">
                        <input type="submit" value="Pilih Cetak" name="cari" id="cari" class="btn btn-primary pull-left"/>
                        <a href="pages/cetak/cetak_bon_ganti_disposisi.php?no_bon=<?php echo $r['no_bon'] ?>&id_nsp=<?php echo $_GET['id']; ?>&no_order=<?php echo $rCek['no_order'];?>&po=<?php echo $rCek['po'];?>&id_cek=<?php echo $_POST['cek'][0];?>&id_cek1=<?php echo $_POST['cek'][1];?>&id_cek2=<?php echo $_POST['cek'][2];?>" class="btn btn-info <?php if($_POST['cek'][0]=="") { echo "disabled"; }?>" target="_blank" style="font-family: 'Times New Roman';">Cetak Bon </a>
					</div>
			</div>    
			<div class="box-body">	
					
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="60"><div align="center">Tgl Buat</div></th>
						<th width="301"><div align="center">Alasan</div></th>
						<th width="343"><div align="center">Masalah</div></th>
						<th width="343"><div align="center">Analisa</div></th>
						<th width="331"><div align="center">Pencegahan</div></th>
						<th width="331"><div align="center">Sub Defect</div></th>
						<th width="331"><div align="center">Warna</div></th>
						<th width="331"><div align="center">Qty Order</div></th>
						<th width="331"><div align="center">Qty Kirim</div></th>
						<th width="331"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					
					$sql=mysqli_query($con," SELECT * FROM tbl_ganti_kain_now WHERE id_disposisi='$_GET[id]' ORDER BY tgl_buat ASC");
					while($r=mysqli_fetch_array($sql)){
			
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="TambahBonDisposisi-<?=$_GET['id']?>-<?=$_GET['order']?>-<?php echo $r['id'] ?>" class="edit_bonXXX" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a><br><input type="checkbox" name="cek[]" value="<?php echo $r['id']; ?>" 
                                <?php if (isset($_POST['cek']) && in_array($r['id'], $_POST['cek'])): ?>
                                checked="checked"
                                <?php endif; ?>/></td>
							<td align="center"><?php echo $r['tgl_buat']; ?></td>
							<td align="center"><?php echo $r['alasan']; ?></td>
							<td align="left"><?php echo $r['masalah']; ?></td>
							<td align="left"><?php echo $r['analisa']; ?></td>
							<td align="left"><?php echo $r['pencegahan']; ?></td>
							<td align="left"><?php echo $r['sub_defect']; ?></td>
							<td align="left" valign="top"><?php if($r['warna1']!=""){echo $r['warna1'];} ?></td>
							<td align="right"><?php if($r['qty_order']>0){
								$explode = explode("/",$r['qty_order2']);
								echo $r['qty_order']." Kg ".$explode[0]." ".$explode[1];
								} ?></td>
							<td align="right"><?php if($r['qty_kirim']>0){
								$explode = explode("/",$r['qty_order2']);
								echo $r['qty_kirim']." Kg ".$explode[0]." ".$explode[1];} ?></td>
							<td align="center"><div class="btn-group">
							<form action="" method="post" id="deleteForm">
							<input type="hidden" name="id_delete" value="<?php echo $r['id'] ?>">
							<input type="hidden" name="no_order" value="<?php echo $_GET['order'] ?>">
							<input type="hidden" name="id_redirect" value="<?php echo $_GET['id'] ?>">
							
							<!--
							<a  class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ //echo "disabled";
							} ?>" >
							<i class="fa fa-trash"></i> </a>-->
							
			
	
							<?php if($_SESSION['akses']!='biasa'){ ?>
							<input onclick="return confirm('Are you sure you want to delete.')" type="submit" name="delete_post" value="`" class="icon-button" ></input>
							<?php } ?>
							
							</div>
							</td>
							</form>
						</tr>   
					<?php 
						$tpersen+=$r['persen'];
						} 
					?>
				</tbody>   
				</table> 
					<div id="KodeEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					</div>
					<div id="PersenEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div> 
					<div id="EditBon" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
    		</div>
            </form>
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

