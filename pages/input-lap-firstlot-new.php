<script>
function aktif(){		
		if(document.forms['form1']['acc_buyer'].value=="Approved" || document.forms['form1']['acc_buyer'].value=="Limited Approved" || document.forms['form1']['acc_buyer'].value=="Conditional Approved" || document.forms['form1']['acc_buyer'].value=="Reject"){
			document.form1.tgl_approve.setAttribute("required",true);
		}else{
			document.form1.tgl_approve.removeAttribute("required");
		}
}
</script>

<?php
include"koneksi.php";
ini_set("error_reporting", 1);
$nodemand=$_GET['nodemand'];
$sqlDB2="SELECT A.CODE AS DEMANDNO, TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, 
TRIM(A.SUBCODE02) AS SUBCODE02, TRIM(A.SUBCODE03) AS SUBCODE03,
CASE
    WHEN C.PO_HEADER IS NULL THEN C.PO_LINE
    ELSE C.PO_HEADER
END AS PO_NUMBER,
TRIM(E.LEGALNAME1) AS LEGALNAME1, TRIM(C.ORDERPARTNERBRANDCODE) AS ORDERPARTNERBRANDCODE, 
TRIM(C.SALESORDERCODE) AS SALESORDERCODE, TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION, TRIM(C.NO_ITEM) AS NO_ITEM, TRIM(A.SUBCODE05) AS NO_WARNA, TRIM(F.LONGDESCRIPTION) AS WARNA,
C.DELIVERYDATE,D.NAMENAME,D.VALUEDECIMAL,G.USERPRIMARYQUANTITY AS QTY_BRUTO
FROM PRODUCTIONDEMAND A 
LEFT JOIN 
	(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
	PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
	GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
ON A.CODE=B.PRODUCTIONDEMANDCODE
LEFT JOIN 
	(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE AS PO_HEADER, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
	SALESORDERDELIVERY.DELIVERYDATE, ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
	LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
	LEFT JOIN ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE AND 
	SALESORDERLINE.SUBCODE01 = ORDERITEMORDERPARTNERLINK.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ORDERITEMORDERPARTNERLINK.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ORDERITEMORDERPARTNERLINK.SUBCODE03 AND
	SALESORDERLINE.SUBCODE04 = ORDERITEMORDERPARTNERLINK.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ORDERITEMORDERPARTNERLINK.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ORDERITEMORDERPARTNERLINK.SUBCODE06 AND 
	SALESORDERLINE.SUBCODE07 = ORDERITEMORDERPARTNERLINK.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ORDERITEMORDERPARTNERLINK.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ORDERITEMORDERPARTNERLINK.SUBCODE09 AND 
	SALESORDERLINE.SUBCODE10 = ORDERITEMORDERPARTNERLINK.SUBCODE10
	GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
	SALESORDERDELIVERY.DELIVERYDATE, ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.SUBCODE03 = C.SUBCODE03 AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
LEFT JOIN
	(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
	LISTAGG(TRIM(ADSTORAGE.NAMENAME),',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS NAMENAME, 
	LISTAGG(ADSTORAGE.VALUEDECIMAL,',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS VALUEDECIMAL
	FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
	GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10) D
ON A.SUBCODE01=D.SUBCODE01 AND
A.SUBCODE02=D.SUBCODE02 AND
A.SUBCODE03=D.SUBCODE03 AND 
A.SUBCODE04=D.SUBCODE04 AND
A.SUBCODE05=D.SUBCODE05 AND 
A.SUBCODE06=D.SUBCODE06 AND 
A.SUBCODE07=D.SUBCODE07 AND 
A.SUBCODE08=D.SUBCODE08 AND 
A.SUBCODE09=D.SUBCODE09 AND 
A.SUBCODE10=D.SUBCODE10
LEFT JOIN
	(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) E
ON A.CUSTOMERCODE=E.CUSTOMERSUPPLIERCODE
LEFT JOIN 
	(SELECT USERGENERICGROUP.CODE,USERGENERICGROUP.LONGDESCRIPTION FROM USERGENERICGROUP USERGENERICGROUP) F
ON A.SUBCODE05=F.CODE
LEFT JOIN
	(SELECT PRODUCTIONRESERVATION.ORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE, SUM(PRODUCTIONRESERVATION.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY FROM PRODUCTIONRESERVATION 
	PRODUCTIONRESERVATION WHERE PRODUCTIONRESERVATION.ITEMTYPEAFICODE='KGF' GROUP BY PRODUCTIONRESERVATION.ORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE) G
ON A.CODE = G.ORDERCODE
WHERE A.CODE='$nodemand'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);
$ww=explode(",",$rowdb2['NAMENAME']);
$valueww=explode(",",$rowdb2['VALUEDECIMAL']);
//GRAMASI
if($ww[0]=="GSM"){ $gramasi=$valueww[0];}
else if($ww[1]=="GSM"){ $gramasi=$valueww[1];}
else if($ww[2]=="GSM"){ $gramasi=$valueww[2];}
else if($ww[3]=="GSM"){ $gramasi=$valueww[3];}
$posg=strpos($gramasi,".");
$valgramasi=substr($gramasi,0,$posg);
//WIDTH
if($ww[0]=="Width"){ $lebar=$valueww[0];}
else if($ww[1]=="Width"){ $lebar=$valueww[1];}
else if($ww[2]=="Width"){ $lebar=$valueww[2];}
else if($ww[3]=="Width"){ $lebar=$valueww[3];}
$posl=strpos($lebar,".");
$vallebar=substr($lebar,0,$posl);

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);

$sqlCekP=mysqli_query($con,"SELECT * FROM tbl_potong WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cekP=mysqli_num_rows($sqlCekP);
$rcekP=mysqli_fetch_array($sqlCekP);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Input Data</h3>
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
					 	value="<?php echo $rowdb2['PRODUCTIONORDERCODE'];?>" >
					  	<input name="nodemand" type="text" class="form-control" id="nodemand" 
						onchange="window.location='FirstLotNew-'+this.value" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
			  		</div>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" 
						value="<?php if($cek>0){echo $rcek['no_order'];}else{echo $rowdb2['SALESORDERCODE'];} ?>" placeholder="No Order" required>
					</div>				   
				</div>
				<div class="form-group">
					<label for="langganan" class="col-sm-3 control-label">Langganan</label>
					<div class="col-sm-8">
						<input name="langganan" type="text" class="form-control" id="langganan" 
						value="<?php if($cek>0){echo $rcek['langganan'];}else{if($rowdb2['LEGALNAME1']!=""){echo $rowdb2['LEGALNAME1']."/".$rowdb2['ORDERPARTNERBRANDCODE'];}}?>" placeholder="Langganan" >
					</div>				   
				</div>
				<div class="form-group">
					<label for="po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="po" type="text" class="form-control" id="po" 
						value="<?php if($cek>0){echo $rcek['po'];}else{echo $rowdb2['PO_NUMBER'];} ?>" placeholder="PO" >
					</div>				   
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
						value="<?php if($cek>0){echo $rcek['no_hanger'];}else{echo $rowdb2['SUBCODE02'].$rowdb2['SUBCODE03'];}?>" placeholder="No Hanger">  
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" 
						value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else{echo $rowdb2['NO_ITEM'];}?>" placeholder="No Item">
					</div>	
				</div>
				<div class="form-group">
					<label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<input name="jenis_kain" type="text" class="form-control" id="jenis_kain" 
						value="<?php if($cek>0){echo $rcek['jenis_kain'];}else{echo stripslashes($rowdb2['ITEMDESCRIPTION']);}?>" placeholder="Jenis Kain">
					</div>
				</div>
				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" 
						value="<?php if($cek>0){echo $rcek['lebar'];}else{echo $vallebar;} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="gramasi" type="text" class="form-control" id="gramasi" 
						value="<?php if($cek>0){echo $rcek['gramasi'];}else{echo $valgramasi;} ?>" placeholder="0" required>
					</div>		
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna / No Warna</label>
					<div class="col-sm-4">
						<input name="warna" type="text" class="form-control" id="warna" 
						value="<?php if($cek>0){echo $rcek['warna'];}else{echo stripslashes($rowdb2['WARNA']);}?>" placeholder="Warna">
					</div>				   
					<div class="col-sm-4">
						<input name="no_warna" type="text" class="form-control" id="no_warna" 
						value="<?php if($cek>0){echo $rcek['no_warna'];}else{echo stripslashes($rowdb2['NO_WARNA']);}?>" placeholder="No Warna">
					</div>				   
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Lot</label>
					<div class="col-sm-3">
						<input name="lot" type="text" class="form-control" id="lot" 
						value="<?php if($cek>0){echo $rcek['lot'];}else{ echo $rowdb2['PRODUCTIONORDERCODE'];} ?>" placeholder="Lot" >
					</div>				   
				</div>
			</div> 
	  		<!-- col --> 
	  		<div class="col-md-6">
                <div class="form-group">
		  			<label for="season" class="col-sm-3 control-label">Season &amp; Validity/Expired</label>
		 			<div class="col-sm-4">
						<div class="input-group">
						<select class="form-control select2" name="season" id="season">
							<option value="">Pilih</option>
							<?php 
							$qrys=mysqli_query($con,"SELECT nama FROM tbl_season_validity ORDER BY nama ASC");
							while($rs=mysqli_fetch_array($qrys)){
							?>
							<option value="<?php echo $rs['nama'];?>" <?php if($rcek['season']==$rs['nama']){echo "SELECTED";}?>><?php echo $rs['nama'];?></option>	
							<?php }?>
						</select>
						<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataSeason"> ...</button></span>
						</div>
		 	 		</div>
					  <div class="col-sm-4">
						<div class="input-group">
						<select class="form-control select2" name="validity" id="validity">
							<option value="">Pilih</option>
							<?php 
							$qrys=mysqli_query($con,"SELECT nama FROM tbl_season_validity ORDER BY nama ASC");
							while($rs=mysqli_fetch_array($qrys)){
							?>
							<option value="<?php echo $rs['nama'];?>" <?php if($rcek['validity']==$rs['nama']){echo "SELECTED";}?>><?php echo $rs['nama'];?></option>	
							<?php }?>
						</select>
						<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataSeason"> ...</button></span>
						</div>
		 	 		</div>
		  		</div>
                <div class="form-group">		  	
                    <label for="tgl_approve" class="col-sm-3 control-label">Tgl Approve Buyer</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_approve" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($cek>0 AND $rcek['tgl_approve']=='0000-00-00'){}else{echo $rcek['tgl_approve'];} ?>"/>
                        </div>
                    </div>
                </div>
				<div class="form-group">		  	
                    <label for="tgl_kirim" class="col-sm-3 control-label">Tgl Kirim</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_kirim" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($cek>0 AND $rcek['tgl_kirim']=='0000-00-00'){}else{echo $rcek['tgl_kirim'];} ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
					<label for="cmt_internal" class="col-sm-3 control-label">Comment Internal</label>
					<div class="col-sm-8">
						<input name="cmt_internal" type="text" class="form-control" id="cmt_internal" 
						value="<?php if($cek>0){echo $rcek['cmt_internal'];} ?>" placeholder="Comment Internal">
					</div>				   
				</div>
                <div class="form-group">
					<label for="cmt_buyer" class="col-sm-3 control-label">Comment Buyer</label>
					<div class="col-sm-8">
						<input name="cmt_buyer" type="text" class="form-control" id="cmt_buyer" 
						value="<?php if($cek>0){echo $rcek['cmt_buyer'];} ?>" placeholder="Comment Buyer">
					</div>				   
				</div>
                <div class="form-group">
					<label for="ket" class="col-sm-3 control-label">Note</label>
					<div class="col-sm-8">
						<input name="ket" type="text" class="form-control" id="ket" 
						value="<?php if($cek>0){echo $rcek['ket'];} ?>" placeholder="Note">
					</div>				   
				</div>
				<div class="form-group">
					<label for="sts_potong" class="col-sm-3 control-label"></label>		  
					<div class="col-sm-2">
						<input type="checkbox" name="sts_potong" id="sts_potong" value="Y" <?php  if($rcek['sts_potong']=="Y"){ echo "checked";} ?>>  
						<label> Potong</label>
					</div>
					<label for="sample" class="col-sm-2 control-label">Sampel</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="sample">
							<option value="">Pilih</option>
							<option value="3" <?php if($rcek['sample']=="3"){echo "SELECTED";}?>>3 Yard</option>
							<option value="6" <?php if($rcek['sample']=="6"){echo "SELECTED";}?>>6 Yard</option>
						</select>	
					</div>	
				</div>
				<div class="form-group">
					<label for="acc_buyer" class="col-sm-3 control-label">Buyer</label>		  
					<div class="col-sm-4">
						<select class="form-control select2" name="acc_buyer" onChange="aktif();">
							<option value="">Pilih</option>
							<option value="Approved" <?php if($rcek['acc_buyer']=="Approved"){echo "SELECTED";}?>>Approved</option>
							<option value="Limited Approved" <?php if($rcek['acc_buyer']=="Limited Approved"){echo "SELECTED";}?>>Limited Approved</option>
							<option value="Conditional Approved" <?php if($rcek['acc_buyer']=="Conditional Approved"){echo "SELECTED";}?>>Conditional Approved</option>
							<option value="Marginaly Approved" <?php if($rcek['acc_buyer']=="Marginaly Approved"){echo "SELECTED";}?>>Marginaly Approved</option>
							<option value="Reject" <?php if($rcek['acc_buyer']=="Reject"){echo "SELECTED";}?>>Reject</option>
						</select>	
					</div>
				</div>
                <div class="form-group">
                    <label for="spectro" class="col-md-3 control-label">Spectro</label>
                    <div class="col-sm-8">	  
                        <input type="file" id="spectro" name="spectro" value="<?php if($cek>0){echo $rcek['spectro'];} ?>">
                        <span class="help-block with-errors"></span>
                    </div>	  
                </div>
	 		</div>
	
		</div>	 
		<div class="box-footer">
			<?php if($_GET['nodemand']!="" and $cek==0){ ?> 	
			<button type="submit" class="btn btn-primary pull-right" name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
			<?php }else if($_GET['nodemand']!="" and $cek>0){ ?>
			<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
			<a href="pages/cetak/cetak_ptg_firstlot.php?id=<?php echo $rcek['id']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a> 
			<?php } ?>	 
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatFirstLotNew'"><i class="fa fa-search"></i> Lihat Data</button>   
		</div>
    	<!-- /.box-footer -->
	</div>
</form>
    
						
                    </div>
                </div>
            </div>
        </div>
<?php
date_default_timezone_set('Asia/Jakarta');
if($_POST['save']=="save"){
        $warna=str_replace("'","''",$_POST['warna']);
        $nowarna=str_replace("'","''",$_POST['no_warna']);	
		$jns=mysqli_real_escape_string($con,$_POST['jenis_kain']);
		//str_replace("'","''",$_POST['jenis_kain']);
        $po=str_replace("'","''",$_POST['po']);
        $cmt_internal=str_replace("'","''",$_POST['cmt_internal']);
        $cmt_buyer=str_replace("'","''",$_POST['cmt_buyer']);
        $ket=str_replace("'","''",$_POST['ket']);
        $lot=trim($_POST['lot']);
		$tgl_approve=$_POST['tgl_approve'];
		$tgl_kirim=$_POST['tgl_kirim'];
        $pos=strpos($_POST['langganan'], "/");
        $posbuyer=substr($_POST['langganan'],$pos+1,50);
        $buyer=str_replace("'","''",$posbuyer);
	    $file = $_FILES['spectro']['name'];
		// ambil data file
		$namaFile = $_FILES['spectro']['name'];
	    $namaSementara = $_FILES['spectro']['tmp_name'];
		// tentukan lokasi file akan dipindahkan
		$dirUpload = "dist/pdf/";
		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		if($buyer=="ADIDAS" AND $_POST['acc_buyer']=="Approved"){$tgl_expired=date('Y-m-d', strtotime('+2 years'));}
		else if($buyer=="ADIDAS" AND $_POST['acc_buyer']=="Limited Approved"){$tgl_expired=date('Y-m-d', strtotime('+2 years'));}
		else if($buyer=="LULULEMON ATHLETICA" AND $_POST['acc_buyer']=="Approved"){$tgl_expired=date('Y-m-d', strtotime('+1 year'));}
		else if($buyer=="LULULEMON ATHLETICA" AND $_POST['acc_buyer']=="Limited Approved"){$tgl_expired=date('Y-m-d', strtotime('+1 year'));} 
		else if($buyer=="LULULEMON ATHLETICA" AND $_POST['acc_buyer']=="Conditional Approved"){$tgl_expired=date('Y-m-d', strtotime('+3 Months'));}
		else {$tgl_expired=NULL;}
		if($_POST['sts_potong']=="Y"){$sts_potong="Y";}else{ $sts_potong="T";}
  	    $sqlData=mysqli_query($con,"INSERT INTO tbl_firstlot SET 
		  nokk='$_POST[nokk]',
		  nodemand='$_POST[nodemand]',
		  langganan='$_POST[langganan]',
		  buyer='$buyer',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[gramasi]',
		  lot='$lot',
		  warna='$warna',
		  no_warna='$nowarna',
		  season='$_POST[season]',
		  validity='$_POST[validity]',
		  cmt_internal='$cmt_internal',
          cmt_buyer='$cmt_buyer',
		  ket='$ket',
		  tgl_approve='$tgl_approve',
		  tgl_kirim='$tgl_kirim',
		  spectro='$file',
		  acc_buyer='$_POST[acc_buyer]',
		  tgl_expired='$tgl_expired',
		  sts_potong='$sts_potong',
		  `sample`='$_POST[sample]',
		  tgl_buat=now(),
		  tgl_update=now()");
		if($_POST['sts_potong']=="Y"){
			$warnaPTG=str_replace("'","''",$_POST['warna']);
			$jnsPTG=str_replace("'","''",$_POST['jenis_kain']);
			$poPTG=str_replace("'","''",$_POST['po']);
			$posPTG=strpos($_POST['langganan'], "/");
        	$posbuyerPTG=substr($_POST['langganan'],$posPTG+1,50);
			$buyerPTG=str_replace("'","''",$posbuyerPTG);
			$lotPTG=trim($_POST['lot']);
			if($_POST['sts_potong']=="Y"){$sts_potong="Y";}else{ $sts_potong="T";}
			$sqlPTG=mysqli_query($con,"INSERT INTO tbl_potong SET
			nokk='$_POST[nokk]',
			nodemand='$_POST[nodemand]',
			langganan='$_POST[langganan]',
		  	buyer='$buyerPTG',
			no_order='$_POST[no_order]',
			no_item='$_POST[no_item]',
			po='$poPTG',
			jenis_kain='$jnsPTG',
		  	lebar='$_POST[lebar]',
		  	gramasi='$_POST[gramasi]',
		  	lot='$lotPTG',
			warna='$warnaPTG',
			sts_potong='$sts_potong',
			tgl_buat=now(),
		  	tgl_update=now()");
		}	 	  
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.location.href='FirstLotNew';
	 
  }
});</script>";
		}
				
	}


//if($_POST[ubah]=="ubah" AND $_POST[tgl_approve]="0000-00-00"){
//	echo "<script>swal({
//		title: 'Data Tidak Terupdate',   
//		text: 'Harap Isi Data Tanggal Approve',
//		type: 'info',
//		}).then((result) => {
//		if (result.value) {
//			window.location.href='FirstLot-$_POST[nokk]';		   
//		}
//	  });</script>";
//}else 
if($_POST['ubah']=="ubah"){
		$warna=str_replace("'","''",$_POST['warna']);
        $nowarna=str_replace("'","''",$_POST['no_warna']);	
        $jns=str_replace("'","''",$_POST['jenis_kain']);
        $po=str_replace("'","''",$_POST['po']);
        $cmt_internal=str_replace("'","''",$_POST['cmt_internal']);
        $cmt_buyer=str_replace("'","''",$_POST['cmt_buyer']);
        $ket=str_replace("'","''",$_POST['ket']);
        $lot=trim($_POST['lot']);
		$tgl_approve=$_POST['tgl_approve'];
		$tgl_kirim=$_POST['tgl_kirim'];
        $pos=strpos($_POST['langganan'], "/");
        $posbuyer=substr($_POST['langganan'],$pos+1,50);
        $buyer=str_replace("'","''",$posbuyer);
	    $file = $_FILES['spectro']['name'];
		// ambil data file
		$namaFile = $_FILES['spectro']['name'];
	    $namaSementara = $_FILES['spectro']['tmp_name'];
		// tentukan lokasi file akan dipindahkan
		$dirUpload = "dist/pdf/";
		// pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        //if ($terupload) {
		if($_POST['sts_potong']=="Y"){$sts_potong="Y";}else{ $sts_potong="T";} 
  	    $sqlData=mysqli_query($con,"UPDATE tbl_firstlot SET 
		  langganan='$_POST[langganan]',
		  buyer='$buyer',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[gramasi]',
		  lot='$lot',
		  warna='$warna',
		  no_warna='$nowarna',
		  season='$_POST[season]',
		  validity='$_POST[validity]',
		  cmt_internal='$cmt_internal',
          cmt_buyer='$cmt_buyer',
		  ket='$ket',
		  tgl_approve='$tgl_approve',
		  tgl_kirim='$tgl_kirim',
		  acc_buyer='$_POST[acc_buyer]',
		  spectro='$file',
		  sts_potong='$sts_potong',
		  `sample`='$_POST[sample]',
		  tgl_update=now()
		  WHERE nodemand='$_GET[nodemand]'");
		  if($_POST['sts_potong']=="Y" AND $cekP==0){
			$warnaPTG=str_replace("'","''",$_POST['warna']);
			$jnsPTG=str_replace("'","''",$_POST['jenis_kain']);
			$poPTG=str_replace("'","''",$_POST['po']);
			$posPTG=strpos($_POST['langganan'], "/");
        	$posbuyerPTG=substr($_POST['langganan'],$posPTG+1,50);
			$buyerPTG=str_replace("'","''",$posbuyerPTG);
			$lotPTG=trim($_POST['lot']);
			if($_POST['sts_potong']=="Y"){$sts_potong="Y";}else{ $sts_potong="T";}
			$sqlPTG=mysqli_query($con,"INSERT INTO tbl_potong SET
			nokk='$_POST[nokk]',
			nodemand='$_POST[nodemand]',
			langganan='$_POST[langganan]',
		  	buyer='$buyerPTG',
			no_order='$_POST[no_order]',
			no_item='$_POST[no_item]',
			po='$poPTG',
			jenis_kain='$jnsPTG',
		  	lebar='$_POST[lebar]',
		  	gramasi='$_POST[gramasi]',
		  	lot='$lotPTG',
			warna='$warnaPTG',
			sts_potong='$sts_potong',
			tgl_buat=now(),
		  	tgl_update=now()");
		}	 	  
        //} else {
        //   echo "Upload Gagal!".$file;
        //}
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Terupdate',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.location.href='FirstLotNew';
	 
  }
});</script>";
		}
}

?>
<div class="modal fade" id="DataSeason">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Season / Validity</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Season / Validity</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_season" id="simpan_season" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_season']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_season_validity SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='FirstLotNew-$nodemand';
	 
  }
});</script>";
		}
}
?>
