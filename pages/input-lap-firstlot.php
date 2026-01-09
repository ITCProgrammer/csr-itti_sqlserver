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
$nokk=$_GET['nokk'];
$sql=sqlsrv_query($conn,"select top 1
			x.*,dbo.fn_StockMovementDetails_GetTotalWeightPCC(0, x.PCBID) as Weight, 
			pm.Weight as Gramasi,pm.CuttableWidth as Lebar, pm.Description as ProductDesc, pm.ColorNo, pm.Color,
      dbo.fn_StockMovementDetails_GetTotalRollPCC(0, x.PCBID) as RollCount
		from
			(
			select
				so.SONumber, convert(char(10),so.SODate,103) as TglSO, so.CustomerID, so.BuyerID, so.PODate,
				sod.ID as SODID, sod.ProductID, sod.Quantity, sod.UnitID, sod.WeightUnitID, 
				soda.RefNo as DetailRefNo, jo.DocumentNo as NoOrder,soda.PONumber,sog.OtherDesc,
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,pp.ProductCode,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate
				
			from
				SalesOrders so inner join
				JobOrders jo on jo.SOID=so.ID inner join
				SODetails sod on so.ID = sod.SOID inner join
				SODetailsAdditional soda on sod.ID = soda.SODID left join
				SOGarmentStyle sog ON so.ID = sog.SOID left join
				ProductPartner pp on pp.productid= sod.productid left join
				ProcessControlJO pcjo on sod.ID = pcjo.SODID left join
				ProcessControlBatches pcb on pcjo.PCID = pcb.PCID left join
				ProcessControlBatchesLastPosition pcblp on pcb.ID = pcblp.PCBID left join
				ProcessFlowProcessNo pfpn on pfpn.EntryType = 2 and pcb.ID = pfpn.ParentID and pfpn.MachineType = 24 left join
				ProcessFlowDetailsNote pfdn on pfpn.EntryType = pfdn.EntryType and pfpn.ID = pfdn.ParentID
			where pcb.DocumentNo='$nokk' and pcb.Gross<>'0'
				group by
					so.SONumber, so.SODate, so.CustomerID, so.BuyerID, so.PONumber, so.PODate,jo.DocumentNo,
					sod.ID, sod.ProductID, sod.Quantity, sod.UnitID, sod.Weight, sod.WeightUnitID,
					soda.RefNo,pcb.DocumentNo,soda.HangerNo,pp.ProductCode,sog.OtherDesc,
					pcb.ID, pcb.DocumentNo, pcb.Gross,soda.PONumber,
					pcb.Quantity, pcb.UnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
					pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate
				) x inner join
				ProductMaster pm on x.ProductID = pm.ID left join
				Departments dep on x.DepartmentID  = dep.ID left join
				Departments pdep on dep.RootID = pdep.ID left join				
				Partners cust on x.CustomerID = cust.ID left join
				Partners buy on x.BuyerID = buy.ID left join
				UnitDescription udq on x.UnitID = udq.ID left join
				UnitDescription udw on x.WeightUnitID = udw.ID left join
				UnitDescription udb on x.BatchUnitID = udb.ID
			order by
				x.SODID, x.PCBID");
		  $r=sqlsrv_fetch_array($sql);
$sql1=sqlsrv_query($conn,"select partnername from partners where id='$r[CustomerID]'");	
$r1=sqlsrv_fetch_array($sql1);
$sql2=sqlsrv_query($conn,"select partnername from partners where id='$r[BuyerID]'");	
$r2=sqlsrv_fetch_array($sql2);
$pelanggan=$r1['partnername']."/".$r2['partnername'];
$ko=sqlsrv_query($conn,"select  ko.KONo from
		ProcessControlJO pcjo inner join
		ProcessControl pc on pcjo.PCID = pc.ID left join
		KnittingOrders ko on pc.CID = ko.CID and pcjo.KONo = ko.KONo 
	where
		pcjo.PCID = '$r[PCID]'
group by ko.KONo");
					$rKO=sqlsrv_fetch_array($ko);
					
$child=$r['ChildLevel'];
	if($nokk!=""){	
		if($child > 0){
			$sqlgetparent=sqlsrv_query($conn,"select ID,LotNo from ProcessControlBatches where ID='$r[RootID]' and ChildLevel='0'");
			$rowgp=sqlsrv_fetch_array($sqlgetparent);
			
			//$nomLot=substr("$row2[LotNo]",0,1);
			$nomLot=$rowgp['LotNo'];
			$nomorLot="$nomLot/K$r[ChildLevel]";				
								
		}else{
			$nomorLot=$r['LotNo'];
				
		}

		$sqlLot1="Select count(*) as TotalLot From ProcessControlBatches where PCID='$r[PCID]' and RootID='0' and LotNo < '1000'";
		$qryLot1 = sqlsrv_query($conn,$sqlLot1) or die('A error occured : ');							
		$rowLot=sqlsrv_fetch_array($qryLot1);
		$lotno=$rowLot['TotalLot']."-".$nomorLot;
		if($r['Quantity']!=""){
		$x=((($r['Lebar']+2)*$r['Gramasi'])/43.06038193629178);
		$x1=(1000/$x);
		$yard=$x1*$r['Quantity']; 
	}

}

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);

$sqlCekP=mysqli_query($con,"SELECT * FROM tbl_potong WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
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
					<label for="no_po" class="col-sm-3 control-label">No KK</label>
					<div class="col-sm-4">
					  	<input name="nokk" type="text" class="form-control" id="nokk" 
						onchange="window.location='FirstLot-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
			  		</div>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" 
						value="<?php if($cek>0){echo $rcek['no_order'];}else{echo $r['NoOrder'];} ?>" placeholder="No Order" required>
					</div>				   
				</div>
				<div class="form-group">
					<label for="langganan" class="col-sm-3 control-label">Langganan</label>
					<div class="col-sm-8">
						<input name="langganan" type="text" class="form-control" id="langganan" 
						value="<?php if($cek>0){echo $rcek['langganan'];}else if($r1['partnername']!=""){echo $pelanggan;}else{}?>" placeholder="Langganan" >
					</div>				   
				</div>
				<div class="form-group">
					<label for="po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="po" type="text" class="form-control" id="po" 
						value="<?php if($cek>0){echo $rcek['po'];}else{echo $r['PONumber'];} ?>" placeholder="PO" >
					</div>				   
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
						value="<?php if($cek>0){echo $rcek['no_hanger'];}else{echo $r['HangerNo'];}?>" placeholder="No Hanger">  
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" 
						value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else{echo $r['ProductCode'];}?>" placeholder="No Item">
					</div>	
				</div>
				<div class="form-group">
					<label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<input name="jenis_kain" type="text" class="form-control" id="jenis_kain" 
						value="<?php if($cek>0){echo $rcek['jenis_kain'];}else{echo $r['ProductDesc'];}?>" placeholder="Jenis Kain">
					</div>
				</div>
				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" 
						value="<?php if($cek>0){echo $rcek['lebar'];}else if($nokk!=""){echo round($r['Lebar']);}else{} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="gramasi" type="text" class="form-control" id="gramasi" 
						value="<?php if($cek>0){echo $rcek['gramasi'];}else if($nokk!=""){echo round($r['Gramasi']);}else{} ?>" placeholder="0" required>
					</div>		
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna / No Warna</label>
					<div class="col-sm-4">
						<input name="warna" type="text" class="form-control" id="warna" 
						value="<?php if($cek>0){echo $rcek['warna'];}else{echo $r['Color'];}?>" placeholder="Warna">
					</div>				   
					<div class="col-sm-4">
						<input name="no_warna" type="text" class="form-control" id="no_warna" 
						value="<?php if($cek>0){echo $rcek['no_warna'];}else{echo $r['ColorNo'];}?>" placeholder="No Warna">
					</div>				   
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Lot</label>
					<div class="col-sm-3">
						<input name="lot" type="text" class="form-control" id="lot" 
						value="<?php if($cek>0){echo $rcek['lot'];}else{echo $lotno;} ?>" placeholder="Lot" >
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
			<?php if($_GET['nokk']!="" and $cek==0){ ?> 	
			<button type="submit" class="btn btn-primary pull-right" name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
			<?php }else if($_GET['nokk']!="" and $cek>0){ ?>
			<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
			<a href="pages/cetak/cetak_ptg_firstlot.php?id=<?php echo $rcek['id']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a> 
			<?php } ?>	 
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatFirstLot'"><i class="fa fa-search"></i> Lihat Data</button>   
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
      window.location.href='FirstLot';
	 
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
		  WHERE nokk='$_GET[nokk]'");
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
      window.location.href='FirstLot';
	 
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
         window.location.href='FirstLot-$nokk';
	 
  }
});</script>";
		}
}
?>
