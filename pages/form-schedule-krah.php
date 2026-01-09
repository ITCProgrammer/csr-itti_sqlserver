<script>
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}	
function angka(e) {
   if (!/^[0-9 .]+$/.test(e.value)) {
      e.value = e.value.substring(0,e.value.length-1);
   }
}	
</script>
<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
function nourut(){
include"koneksi.php";
$format = date("ymd");
$sql=mysqli_query($con,"SELECT nokk FROM tbl_schedule_krah WHERE substr(nokk,1,6) like '%".$format."%' ORDER BY nokk DESC LIMIT 1 ") or die (mysqli_error());
$d=mysqli_num_rows($sql);
if($d>0){
$r=mysqli_fetch_array($sql);
$d=$r['nokk'];
$str=substr($d,6,2);
$Urut = (int)$str;
}else{
$Urut = 0;
}
$Urut = $Urut + 1;
$Nol="";
$nilai=2-strlen($Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}
$nipbr =$format.$Nol.$Urut;
return $nipbr;
}
$nou=nourut();
if($_GET['nokk']!=""){$nokk=$_GET['nokk'];}else{$nokk=" ";}
$operation=$_GET['operation'];
$sqlDB2="SELECT 
PRODUCTIONORDER.CODE,
A.ORIGDLVSALORDLINESALORDERCODE,
C.NO_PO,
C.BUYER,
D.LEGALNAME1,
E.LONGDESCRIPTION,
CASE
	WHEN LOCATE('-', E.SHORTDESCRIPTION) = 0 THEN ''
    WHEN LOCATE('-', E.SHORTDESCRIPTION) > 0 THEN SUBSTR(E.SHORTDESCRIPTION , 1, LOCATE('-', E.SHORTDESCRIPTION)-1)
    ELSE ''
END AS WARNA,
SUM(B.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
B.USERPRIMARYUOMCODE,
SUM(B.USERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY,
B.USERSECONDARYUOMCODE
FROM PRODUCTIONORDER PRODUCTIONORDER
LEFT JOIN (
 SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE, 
 PRODUCTIONDEMAND.ITEMTYPEAFICODE, PRODUCTIONDEMAND.SUBCODE01, PRODUCTIONDEMAND.SUBCODE02, PRODUCTIONDEMAND.SUBCODE03, PRODUCTIONDEMAND.SUBCODE04, PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE 
 FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP 
 LEFT JOIN PRODUCTIONDEMAND PRODUCTIONDEMAND ON PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE = PRODUCTIONDEMAND.CODE 
 GROUP BY 
 PRODUCTIONDEMAND.ITEMTYPEAFICODE, PRODUCTIONDEMAND.SUBCODE01, PRODUCTIONDEMAND.SUBCODE02, PRODUCTIONDEMAND.SUBCODE03, PRODUCTIONDEMAND.SUBCODE04, PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE, PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE
) A ON PRODUCTIONORDER.CODE = A.PRODUCTIONORDERCODE 
LEFT JOIN (
	SELECT PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, SUM(PRODUCTIONRESERVATION.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY, PRODUCTIONRESERVATION.USERPRIMARYUOMCODE,
	SUM(PRODUCTIONRESERVATION.USERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY, PRODUCTIONRESERVATION.USERSECONDARYUOMCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
	PRODUCTIONRESERVATION.SUBCODE01, PRODUCTIONRESERVATION.SUBCODE02, PRODUCTIONRESERVATION.SUBCODE03, PRODUCTIONRESERVATION.SUBCODE04 
	FROM PRODUCTIONRESERVATION PRODUCTIONRESERVATION 
	WHERE (PRODUCTIONRESERVATION.ITEMTYPEAFICODE ='FKG' OR PRODUCTIONRESERVATION.ITEMTYPEAFICODE ='FKF')
	GROUP BY 
	PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, PRODUCTIONRESERVATION.USERPRIMARYUOMCODE,
	PRODUCTIONRESERVATION.USERSECONDARYUOMCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
	PRODUCTIONRESERVATION.SUBCODE01, PRODUCTIONRESERVATION.SUBCODE02, PRODUCTIONRESERVATION.SUBCODE03, PRODUCTIONRESERVATION.SUBCODE04
) B ON PRODUCTIONORDER.CODE = B.PRODUCTIONORDERCODE 
LEFT JOIN 
	(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE, SALESORDER.CODE, SALESORDERLINE.ITEMDESCRIPTION,
	SALESORDER.EXTERNALREFERENCE AS NO_PO, ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE  
	LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE 
	GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE, SALESORDER.CODE, SALESORDERLINE.ITEMDESCRIPTION, 
	SALESORDER.EXTERNALREFERENCE, ORDERPARTNERBRAND.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.CODE
LEFT JOIN SALESORDER SALESORDER 
ON A.ORIGDLVSALORDLINESALORDERCODE = SALESORDER.CODE
LEFT JOIN
	(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) D
ON C.ORDPRNCUSTOMERSUPPLIERCODE=D.CUSTOMERSUPPLIERCODE 
LEFT JOIN 
	(SELECT PRODUCT.ITEMTYPECODE, PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.LONGDESCRIPTION, PRODUCT.SHORTDESCRIPTION
	FROM PRODUCT PRODUCT
	GROUP BY PRODUCT.ITEMTYPECODE, PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.LONGDESCRIPTION, PRODUCT.SHORTDESCRIPTION) E
ON A.ITEMTYPEAFICODE = E.ITEMTYPECODE AND 
A.SUBCODE01 = E.SUBCODE01 AND 
A.SUBCODE02 = E.SUBCODE02 AND
A.SUBCODE03 = E.SUBCODE03 AND 
A.SUBCODE04 = E.SUBCODE04 
WHERE PRODUCTIONORDER.CODE='$nokk'
GROUP BY 
PRODUCTIONORDER.CODE,
A.ORIGDLVSALORDLINESALORDERCODE,
C.NO_PO,
C.BUYER,
D.LEGALNAME1,
E.LONGDESCRIPTION,
E.SHORTDESCRIPTION,
B.USERPRIMARYUOMCODE,
B.USERSECONDARYUOMCODE";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_schedule_krah WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
$sqlCek1=mysqli_query($con,"SELECT * FROM tbl_schedule_krah WHERE nokk='$nokk' AND not status='selesai' ORDER BY id DESC LIMIT 1");
$cek1=mysqli_num_rows($sqlCek1);

?>	
<?php
$Kapasitas	= isset($_POST['kapasitas']) ? $_POST['kapasitas'] : '';
$TglMasuk	= isset($_POST['tglmsk']) ? $_POST['tglmsk'] : '';
$Item		= isset($_POST['item']) ? $_POST['item'] : '';
$Warna		= isset($_POST['warna']) ? $_POST['warna'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
 <div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Input Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
	  <div class="col-md-6">
	  	<div class="form-group">
				<label for="nokk" class="col-sm-3 control-label">No Prod. Order</label>
                <div class="col-sm-4">
					<input name="nokk" type="text" class="form-control" id="nokk" 
					onchange="window.location='FormScheduleKrah-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No Prod. Order" required >
			    </div>
			</div>
		<div class="form-group">
                  <label for="langganan" class="col-sm-3 control-label">Langganan</label>
                  <div class="col-sm-8">
                    <input name="langganan" type="text" class="form-control" id="langganan" 
                    value="<?php if($cek>0){echo $rcek['langganan'];}else{echo $rowdb2['LEGALNAME1'];}?>" placeholder="Langganan">
                  </div>				   
                </div>
		<div class="form-group">
                  <label for="buyer" class="col-sm-3 control-label">Buyer</label>
                  <div class="col-sm-8">
                    <input name="buyer" type="text" class="form-control" id="buyer" 
                    value="<?php if($cek>0){echo $rcek['buyer'];}else{echo $rowdb2['BUYER'];}?>" placeholder="Buyer">
                  </div>				   
                </div>
	    <div class="form-group">
                  <label for="no_order" class="col-sm-3 control-label">No Order</label>
                  <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" 
                    value="<?php if($cek>0){echo $rcek['no_order'];}else{if($rowdb2['ORIGDLVSALORDLINESALORDERCODE']!=""){echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE'];}} ?>" placeholder="No Order">
                  </div>				   
                </div>
	    <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">PO</label>
                  <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" 
                    value="<?php if($cek>0){echo $rcek['po'];}else{echo $rowdb2['NO_PO'];} ?>" placeholder="PO" >
                  </div>				   
                </div>
	    <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{if($rowdb2['LONGDESCRIPTION']!=""){echo $rowdb2['LONGDESCRIPTION'];} }?></textarea>
					  </div>
                  </div>
		<div class="form-group">
			  <label for="warna" class="col-sm-3 control-label">Warna</label>
			  <div class="col-sm-8">
				<input name="warna" type="text" class="form-control" id="warna" 
				value="<?php if($cek>0){echo $rcek['warna'];}else{if($rowdb2['WARNA']!=""){echo $rowdb2['WARNA'];} }?>" placeholder="Warna">  
			  </div>				   
			</div>
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
	  	<div class="form-group">
                <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol" type="text" class="form-control" id="rol" value="" placeholder="0" required>
                        <span class="input-group-addon">Bales</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo number_format($rowdb2['USERPRIMARYQUANTITY'],2);} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="pcs_bruto" type="text" class="form-control" id="pcs_bruto" value="<?php if($crow>0){echo $row['panjang'];}else{echo number_format($rowdb2['USERSECONDARYQUANTITY'],2);} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">PCS</span>
					</div>
                </div>
            </div>
		<!-- <div class="form-group">
                  <label for="no_urut" class="col-sm-3 control-label">No Urut</label>
                  <div class="col-sm-2">					  
						  <select name="no_urut" class="form-control" id="no_urut" required>
							  	<option value="">Pilih</option>
							  <?php 
							  $sqlKap=mysqli_query($con,"SELECT no_urut FROM tbl_urut ORDER BY no_urut ASC");
							  while($rK=mysqli_fetch_array($sqlKap)){
							  ?>
								  <option value="<?php echo $rK['no_urut']; ?>"><?php echo $rK['no_urut']; ?></option>
							 <?php } ?>	  
					  </select>
				  </div>
					  
		</div>    -->
		<div class="form-group">
				<label for="proses" class="col-sm-3 control-label">Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="proses" required>
							<option value="">Pilih</option>
                            <option value="Lipat">Lipat</option>
                            <option value="Cabut">Cabut</option>
                            <option value="Sulam">Sulam</option>
                        </select>
                    </div>
            </div>      
		<div class="form-group">
                  <label for="order_legacy" class="col-sm-3 control-label">Order Legacy</label>
                  <div class="col-sm-4">
                    <input name="order_legacy" type="text" class="form-control" id="order_legacy" 
                    value="<?php if($cek>0){echo $rcek['order_legacy'];} ?>" placeholder="Order Legacy">
                  </div>				   
                </div>
	  <div class="form-group">
                  <label for="catatan" class="col-sm-3 control-label">Catatan</label>
                  <div class="col-sm-8">		  
				  <textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."></textarea>		  
				  </div>			  
					  
		</div>	  
      </div>
 	</div>
   	<div class="box-footer">
   <button type="button" class="btn btn-default pull-left" name="back" value="kembali" onClick="window.location='ScheduleKrah'">Kembali <i class="fa fa-arrow-circle-o-left"></i></button>		
  	   
   <button type="submit" class="btn btn-primary pull-right" name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
   </div>
    <!-- /.box-footer -->
 </div>
</form>
    
						
                    

<?php 
	if($_POST['save']=="save"){
	  $qryCek=mysqli_query($con,"SELECT * from tbl_schedule_krah WHERE `status`='sedang jalan'");
	  $row=mysqli_num_rows($qryCek);
	  $qryCekN=mysqli_query($con,"SELECT * from tbl_schedule_krah WHERE nokk='$_POST[nokk]' and not `status`='selesai'");
	  $rowN=mysqli_num_rows($qryCekN);
	  if($rowN>0 ){	  
		 echo "<script> swal({
            title: 'Tidak bisa input, No KK sudah ada',
            text: ' Klik OK untuk Input No Urut kembali',
            type: 'warning'
        }, function(){
            window.location='';
        });</script>"; }else {
	  if($_POST['nokk']!=""){$kartu=$_POST['nokk'];}else{$kartu=$nou;}	
	  $warna=str_replace("'","''",$_POST['warna']);
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $order_legacy=str_replace("'","''",$_POST['order_legacy']);
	  $catatan=str_replace("'","''",$_POST['catatan']);	  
	  $lot=trim($_POST['lot']);
	  $target_lipat = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')));
	  $target_cabut = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));
	  $target_sulam = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 6, date('Y')));
	  if($_POST['proses']=='Lipat'){$target=$target_lipat;}else if($_POST['proses']=='Cabut'){$target=$target_cabut;}else if($_POST['proses']=='Sulam'){$target=$target_sulam;}
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_schedule_krah SET
		  nokk='$kartu',
		  langganan='$_POST[langganan]',
		  buyer='$_POST[buyer]',
		  no_order='$_POST[no_order]',
		  po='$po',
		  jenis_kain='$jns',
		  warna='$warna',
		  lot='$lot',
		  rol='$_POST[rol]',
		  bruto='$_POST[bruto]',
		  pcs_bruto='$_POST[pcs_bruto]',
		  proses='$_POST[proses]',
		  tgl_masuk=now(),
		  target='$target',
		  order_legacy='$order_legacy',
		  catatan='$catatan',
		  tgl_update=now()");	 	  
	  
		if($sqlData){
			// echo "<script>alert('Data Tersimpan');</script>";
			// echo "<script>window.location.href='?p=Input-Data-KJ;</script>";
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='ScheduleKrah'; 
  }
});</script>";
		}
	  }
			
	}
    if($_POST['update']=="update"){
	  $warna=str_replace("'","''",$_POST['warna']);
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $catatan=str_replace("'","''",$_POST['catatan']);	
	  $lot=trim($_POST['lot']);		
	  $target_lipat = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')));
	  $target_cabut = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));
	  $target_sulam = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 6, date('Y')));
	  if($_POST['target']=='Lipat'){$target=$target_lipat;}else if($_POST['target']=='Cabut'){$target=$target_cabut;}else if($_POST['target']=='Sulam'){$target=$target_sulam;}else{$target='';}
  	  $sqlData=mysqli_query($con,"UPDATE tbl_schedule_krah SET 
		  proses='$_POST[proses]',
		  target='$target',
		  catatan='$catatan',
		  tgl_stop=now(),
		  tgl_update=now()
		  WHERE nokk='$_POST[nokk]'");	 	  
	  
		if($sqlData){
			// echo "<script>alert('Data Telah Diubah');</script>";
			// echo "<script>window.location.href='?p=Input-Data-KJ;</script>";
			echo "<script>swal({
  title: 'Data Telah DiUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='ScheduleKrah'; 
  }
});</script>";
		}
		
			
	}
?>
