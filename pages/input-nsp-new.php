<?php
include"koneksi.php";
ini_set("error_reporting", 1);
$nodemand=$_GET['nodemand'];
// NOW
	$sql_ITXVIEWKK  = db2_exec($conn1, "SELECT
											TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
											TRIM(DEAMAND) AS DEMAND,
											ORIGDLVSALORDERLINEORDERLINE,
											PROJECTCODE,
											ORDPRNCUSTOMERSUPPLIERCODE,
											TRIM(SUBCODE01) AS SUBCODE01, TRIM(SUBCODE02) AS SUBCODE02, TRIM(SUBCODE03) AS SUBCODE03, TRIM(SUBCODE04) AS SUBCODE04,
											TRIM(SUBCODE05) AS SUBCODE05, TRIM(SUBCODE06) AS SUBCODE06, TRIM(SUBCODE07) AS SUBCODE07, TRIM(SUBCODE08) AS SUBCODE08,
											TRIM(SUBCODE09) AS SUBCODE09, TRIM(SUBCODE10) AS SUBCODE10, 
											TRIM(ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
											TRIM(DSUBCODE05) AS NO_WARNA,
											TRIM(DSUBCODE02) || '-' || TRIM(DSUBCODE03)  AS NO_HANGER,
											TRIM(ITEMDESCRIPTION) AS ITEMDESCRIPTION,
											DELIVERYDATE,
											CREATIONUSER_SALESORDER,
											LOT,
											QTY_PACKING_KG,
											QTY_PACKING_YARD
											-- ABSUNIQUEID_DEMAND
											FROM 
											ITXVIEWKK 
											WHERE 
											DEAMAND = '$nodemand'");
	$dt_ITXVIEWKK	= db2_fetch_assoc($sql_ITXVIEWKK);

	$sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
			WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
			AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
	$dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

	$sql_po			= db2_exec($conn1, "SELECT 
											TRIM(EXTERNALREFERENCE) AS NO_PO, 
											SUM(USERPRIMARYQUANTITY) AS QTY_BRUTO 
										FROM 
											ITXVIEW_KGBRUTO 
										WHERE 
											PROJECTCODE = '$dt_ITXVIEWKK[PROJECTCODE]' 	
											AND ORIGDLVSALORDERLINEORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
										GROUP BY
										EXTERNALREFERENCE");
	$dt_po    		= db2_fetch_assoc($sql_po);

	$sql_noitem     = db2_exec($conn1, "SELECT * FROM ORDERITEMORDERPARTNERLINK WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
										AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]' 
										AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]' 
										AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
										AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' AND SUBCODE08 ='$dt_ITXVIEWKK[SUBCODE08]'
										AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' AND SUBCODE10 ='$dt_ITXVIEWKK[SUBCODE10]'");
	$dt_item        = db2_fetch_assoc($sql_noitem);

	$sql_lebargramasi	= db2_exec($conn1, "SELECT i.LEBAR,
												CASE
													WHEN i2.GRAMASI_KFF IS NULL THEN i2.GRAMASI_FKF
													ELSE i2.GRAMASI_KFF
												END AS GRAMASI 
												FROM 
													ITXVIEWLEBAR i 
												LEFT JOIN ITXVIEWGRAMASI i2 ON i2.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i2.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
												WHERE 
													i.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'");
	$dt_lg				= db2_fetch_assoc($sql_lebargramasi);

	$sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
										WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
										AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
										AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
										AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
										AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
										AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
										AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
										AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
										AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
										AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
										AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
	$dt_warna		= db2_fetch_assoc($sql_warna);

	$sql_roll		= db2_exec($conn1, "SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE
										FROM STOCKTRANSACTION s2 
										WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '$dt_ITXVIEWKK[PRODUCTIONORDERCODE]'
										GROUP BY s2.PRODUCTIONORDERCODE");
	$dt_roll   		= db2_fetch_assoc($sql_roll);

	$sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
										USEDUSERPRIMARYQUANTITY AS QTY_ORDER,
										USEDUSERSECONDARYQUANTITY AS QTY_ORDER_YARD,
									CASE
										WHEN TRIM(USERSECONDARYUOMCODE) = 'kg' THEN 'Kg'
										WHEN TRIM(USERSECONDARYUOMCODE) = 'yd' THEN 'Yard'
										WHEN TRIM(USERSECONDARYUOMCODE) = 'm' THEN 'Meter'
										ELSE 'PCS'
									END AS SATUAN_QTY
									FROM 
									ITXVIEW_RESERVATION_KK 
									WHERE 
									ORDERCODE = '$nodemand'");
	$dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);

	$sql_netto		= db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$nodemand' AND SALESORDERLINESALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
	$d_netto		= db2_fetch_assoc($sql_netto);
// NOW

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_nsp_qcf WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
			<label for="nodemand" class="col-sm-3 control-label">No Demand</label>
				<div class="col-sm-4">
					<input name="nokk" type="hidden" class="form-control" id="nokk" 
					value="<?php if($cek>0){echo $rcek['nokk'];}else{echo $rowdb2['PRODUCTIONORDERCODE'];}?>">
					<input name="nodemand" type="text" class="form-control" id="nodemand" 
					onchange="window.location='NSPNew-'+this.value" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
			  	</div>
		</div>
		<div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" class="form-control" id="no_order" 
			value="<?php if($cek>0){echo $rcek['no_order'];}else{if($dt_ITXVIEWKK['PROJECTCODE']!=""){echo $dt_ITXVIEWKK['PROJECTCODE'];}} ?>" placeholder="No Order" required>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-8">
			<input name="pelanggan" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['langganan'];}else{echo $dt_pelanggan_buyer['PELANGGAN'];}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="buyer" class="col-sm-3 control-label">Buyer</label>
		  <div class="col-sm-8">
			<input name="buyer" type="text" class="form-control" id="buyer" 
			value="<?php if($cek>0){echo $rcek['buyer'];}else{echo $dt_pelanggan_buyer['BUYER'];}?>" placeholder="Buyer" >
		  </div>				   
		</div> 
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['po'];}else {echo $dt_po['NO_PO'];} ?>" placeholder="PO" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
		  <div class="col-sm-3">
			<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
			value="<?php if($cek>0){echo $rcek['no_hanger'];}else{if($dt_ITXVIEWKK['NO_HANGER']!=""){echo trim($dt_ITXVIEWKK['NO_HANGER']);}}?>" placeholder="No Hanger">  
		  </div>
		  <div class="col-sm-3">
		  <input name="no_item" type="text" class="form-control" id="no_item" 
			value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else if($dt_item['EXTERNALITEMCODE']!=""){echo $dt_item['EXTERNALITEMCODE'];}?>" placeholder="No Item">
		  </div>	
		</div>
		<div class="form-group">
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8">
			  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{if($dt_ITXVIEWKK['ITEMDESCRIPTION']!=""){echo $dt_ITXVIEWKK['ITEMDESCRIPTION'];} }?></textarea>
			  </div>
		  </div>	 		
		<div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php if($cek>0){echo $rcek['lebar'];}else{echo $dt_lg['LEBAR'];} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php if($cek>0){echo $rcek['gramasi'];}else{echo $dt_lg['GRAMASI'];} ?>" placeholder="0" required>
		  </div>		
		</div>				 
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
		<div class="form-group">
		  <label for="warna" class="col-sm-3 control-label">Warna</label>
		  <div class="col-sm-8">
			<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else{if($dt_warna['WARNA']!=""){echo $dt_warna['WARNA'];} }?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
		  <div class="col-sm-8">
			<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}else{if($dt_ITXVIEWKK['NO_WARNA']!=""){echo $dt_ITXVIEWKK['NO_WARNA'];}}?></textarea>
		  </div>				   
		</div>  
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Lot</label>
		  <div class="col-sm-3">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek['lot'];}else{echo $dt_ITXVIEWKK['LOT'];} ?>" placeholder="Lot" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="po_rajut" class="col-sm-3 control-label">PO Rajut</label>
		  <div class="col-sm-3">
			<input name="po_rajut" type="text" class="form-control" id="po_rajut" 
			value="<?php if($cek>0){echo $rcek['po_rajut'];}else{echo $rowdb2['PO_RAJUT'];} ?>" placeholder="PO Rajut" required>
		  </div>
		  <div class="col-sm-5">
			<input name="supp_rajut" type="text" class="form-control" id="supp_rajut" 
			value="<?php if($cek>0){echo $rcek['supp_rajut'];} ?>" placeholder="Supplier Rajut" >
		  </div>	
		</div>
		  
		<div class="form-group">
			<label for="rol" class="col-sm-3 control-label">Rol</label>
			<div class="col-sm-2">  
						<input name="rol" type="text" class="form-control" id="rol" value="<?php if($cek>0){echo $dt_roll['ROLL'];} ?>" placeholder="0.00" style="text-align: right;" required>			
			</div>
	    </div>   
		<div class="form-group">
                  <label for="berat" class="col-sm-3 control-label">Berat</label>
          <div class="col-sm-3">
                    <div class="input-group">  
					<input name="berat" type="text" class="form-control" id="berat" value="<?php if($cek>0){echo $rcek['berat'];} ?>" placeholder="0.00" style="text-align: right;" required>
					<span class="input-group-addon">KGs</span>	
					</div>
                  </div>				   
        </div>		   
		<div class="form-group">
		  <label for="dept" class="col-sm-3 control-label">Dept</label>
		  <div class="col-sm-3">
			<select class="form-control select2" name="dept" id="dept" required>
				<option value="">Pilih</option>
				<option value="MKT" <?php if($rcek['dept']=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($rcek['dept']=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($rcek['dept']=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($rcek['dept']=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($rcek['dept']=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($rcek['dept']=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($rcek['dept']=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($rcek['dept']=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($rcek['dept']=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($rcek['dept']=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($rcek['dept']=="GKJ"){echo "SELECTED";}?>>GKJ</option>
				<option value="BRS" <?php if($rcek['dept']=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($rcek['dept']=="PRT"){echo "SELECTED";}?>>PRT</option>
				<option value="TAS" <?php if($rcek['dept']=="TAS"){echo "SELECTED";}?>>TAS</option>
				<option value="YND" <?php if($rcek['dept']=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($rcek['dept']=="PRO"){echo "SELECTED";}?>>PRO</option>
				<option value="GAS" <?php if($rcek['dept']=="GAS"){echo "SELECTED";}?>>GAS</option>
			</select>	
		  </div>
	    </div> 
		<div class="form-group">
		  <label for="ket" class="col-sm-3 control-label">Keterangan</label>
		  <div class="col-sm-8">
			<textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php if($cek>0){echo $rcek['ket']; }?></textarea>
		  </div>				   
		</div>		  
	 </div>
	
</div>	 
   <div class="box-footer">
   <?php if($cek>0){ ?>
  <input type="submit" value="Ubah" name="save" id="save" class="btn btn-primary pull-right" >   
   <?php }else if($_GET['nodemand']!=""){ ?>
  <input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" >
   <?php } ?>	   
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
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $ket=str_replace("'","''",$_POST['ket']);
	  $lot=trim($_POST['lot']);
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_nsp_qcf SET 
		  nokk='$_POST[nokk]',
		  nodemand='$_POST[nodemand]',
		  langganan='$_POST[pelanggan]',
		  buyer='$_POST[buyer]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  po='$po',
		  po_rajut='$_POST[po_rajut]',
		  supp_rajut='$_POST[supp_rajut]',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lot='$lot',
		  rol='$_POST[rol]',
		  warna='$warna',
		  no_warna='$nowarna',
		  berat='$_POST[berat]',
		  dept='$_POST[dept]',
		  peninjau_awal='$_POST[peninjau_awal]',
		  ket='$ket',
		  tgl_buat=now(),
		  tgl_update=now()");	 	  
	  
		if($sqlData){			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
  	  window.open('pages/cetak/bon_nsp.php?nokk=$_POST[nodemand]','_blank');
      window.location.href='NSPNew-$_GET[nodemand]';
	 
  }
});</script>";
		}
				
	}
if($_POST['save']=="Ubah"){
      $ket=str_replace("'","''",$_POST['ket']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $lot=trim($_POST['lot']);
	  if(isset($_POST["rmp_benang"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['rmp_benang'] as $index => $subject1){
				   if($index>0){
					  $kt1=$kt1.",".$subject1; 
				   }else{
					   $kt1=$subject1;
				   }	
				    
			}
        } 
  	  $sqlData=mysqli_query($con,"UPDATE tbl_nsp_qcf SET 
		  rol='$_POST[rol]',
		  berat='$_POST[berat]',
		  po='$po',
		  lot='$lot',
		  peninjau_awal='$_POST[peninjau_awal]',
		  ket='$ket',
		  tgl_update=now()
		  WHERE nodemand='$nodemand'");	 	  
	  
		if($sqlData){	
	echo "<script>swal({
  title: 'Data Telah diUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.location.href='NSPNew-$nodemand';
	 
  }
});</script>";
		}
}
?>

<script language="javascript">
function rd(){
	if(document.forms['form1']['no_ncp'].value !=""){
		//document.forms['form1']['save'].setAttribute("disabled",true);
		document.forms['form1']['save'].value="Ubah";
		document.form1.rol.removeAttribute("required");
		document.form1.berat.removeAttribute("required");
		document.form1.dept.removeAttribute("required");
		document.form1.kerusakan.removeAttribute("required");
	}else{
		//document.forms['form1']['save'].removeAttribute("disabled");
		document.forms['form1']['save'].value="Simpan";
		document.form1.rol.setAttribute("required",true);
		document.form1.berat.setAttribute("required",true);
		document.form1.dept.setAttribute("required",true);
		document.form1.kerusakan.setAttribute("required",true);
		
	}						
					
}
</script>
