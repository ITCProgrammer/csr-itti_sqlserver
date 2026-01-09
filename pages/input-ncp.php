<?php
include"koneksi.php";
ini_set("error_reporting", 1);
$NCPNO		= isset($_POST['no_ncp']) ? $_POST['no_ncp'] : '';
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
				soda.RefNo as DetailRefNo, jo.DocumentNo as NoOrder,soda.PONumber,
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,pp.ProductCode,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,convert(char(10),sod.RequiredDate,121) as RequiredDate
				
			from
				SalesOrders so inner join
				JobOrders jo on jo.SOID=so.ID inner join
				SODetails sod on so.ID = sod.SOID inner join
				SODetailsAdditional soda on sod.ID = soda.SODID left join
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
					soda.RefNo,pcb.DocumentNo,soda.HangerNo,pp.ProductCode,
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
$ko=sqlsrv_query($conn,"select  ko.KONo,p.PartnerName from
		ProcessControlJO pcjo inner join
		ProcessControl pc on pcjo.PCID = pc.ID left join
		KnittingOrders ko on pc.CID = ko.CID and pcjo.KONo = ko.KONo left join
		Partners p ON p.ID=ko.SupplierID 
	where
		pcjo.PCID = '$r[PCID]'
group by ko.KONo,p.PartnerName");
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
$sqlCek=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE nokk='$nokk' and no_ncp='$NCPNO' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
if($r['RequiredDate']!=""){
$awal  = date_create($r['RequiredDate']);
$akhir = date_create(); // waktu sekarang
$diff  = date_diff( $awal, $akhir );
$startTime = date("Y-m-d");	
if($startTime>$r['RequiredDate']){	
$tglTarget = date('Y-m-d',strtotime('+5 day',strtotime($startTime)));
}else{
	if($diff->d >7){
		$tglTarget = date('Y-m-d',strtotime('+7 day',strtotime($startTime)));
	}else{
		$tglTarget= $r['RequiredDate'];
	}
	
}
//echo 'Selisih hari: ';
//echo $diff->d . ' hari ';
//echo $startTime;	
}

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
					  <label for="nokk" class="col-sm-3 control-label">No KK</label>
					  <div class="col-sm-4">
					  <input name="nokk" type="text" class="form-control" id="nokk" 
						 onchange="window.location='NCP-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
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
		  <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-8">
			<input name="pelanggan" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['langganan'];}else if($r1['partnername']!=""){echo $r1['partnername'];}else{}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="buyer" class="col-sm-3 control-label">Buyer</label>
		  <div class="col-sm-8">
			<input name="buyer" type="text" class="form-control" id="buyer" 
			value="<?php if($cek>0){echo $rcek['buyer'];}else if($r2['partnername']!=""){echo $r2['partnername'];}else{}?>" placeholder="Buyer" >
		  </div>				   
		</div> 
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
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
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8">
			  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{echo $r['ProductDesc'];}?></textarea>
			  </div>
		  </div>	 		
		<div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php if($cek>0){echo $rcek['lebar'];}else if($nokk!=""){echo round($r['Lebar']);}else{} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php if($cek>0){echo $rcek['gramasi'];}else if($nokk!=""){echo round($r['Gramasi']);}else{} ?>" placeholder="0" required>
		  </div>		
		</div>
		<div class="form-group">
		  <label for="warna" class="col-sm-3 control-label">Warna</label>
		  <div class="col-sm-8">
			<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else{echo $r['Color'];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
		  <div class="col-sm-8">
			<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}else{echo $r['ColorNo'];}?></textarea>
		  </div>				   
		</div>		 
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
	  <div class="form-group">
		  <label for="no_ncp" class="col-sm-3 control-label">No NCP</label>
		  	<div class="col-sm-4">
				<div class="input-group">
				<select name="no_ncp" class="form-control" id="no_ncp" placeholder="No NCP" onChange="rd();">
					<option value=""></option>
					<?php $qCek=mysqli_query($con,"SELECT no_ncp,masalah FROM tbl_ncp_qcf WHERE nokk='$_GET[nokk]' ORDER BY id DESC");
					while($dCek=mysqli_fetch_array($qCek)){ ?>
					<option value="<?php echo $dCek['no_ncp'];?>" <?php if($dCek['no_ncp']==$NCPNO){echo "SELECTED";}?>><?php echo $dCek['no_ncp'];?></option>
					<?php } ?>
				</select>
				<span class="input-group-btn"><button type="submit" class="btn btn-default" name="cek" id="cek" value="cek"> <span class="fa fa-search"></span></button></span>	
				</div>	
		  	</div>
			<div class="col-sm-4">
				<select class="form-control select2" name="dibuat_oleh" id="dibuat_oleh" required>
					<option value="">Dibuat Oleh</option>
					<option value="Agung C" <?php if($rcek['dibuat_oleh']=="Agung C"){echo "SELECTED";}?>>Agung C</option>
					<option value="Agus S" <?php if($rcek['dibuat_oleh']=="Agus S"){echo "SELECTED";}?>>Agus S</option>
					<option value="Alimulhakim" <?php if($rcek['dibuat_oleh']=="Alimulhakim"){echo "SELECTED";}?>>Alimulhakim</option>
					<option value="Andi W" <?php if($rcek['dibuat_oleh']=="Andi W"){echo "SELECTED";}?>>Andi W</option>
					<option value="Arif" <?php if($rcek['dibuat_oleh']=="Arif"){echo "SELECTED";}?>>Arif</option>
					<option value="Dewi S" <?php if($rcek['dibuat_oleh']=="Dewi S"){echo "SELECTED";}?>>Dewi S</option>
					<option value="Edwin" <?php if($rcek['dibuat_oleh']=="Edwin"){echo "SELECTED";}?>>Edwin</option>
					<option value="Ely" <?php if($rcek['dibuat_oleh']=="Ely"){echo "SELECTED";}?>>Ely</option>
					<option value="Ferry W" <?php if($rcek['dibuat_oleh']=="Ferry W"){echo "SELECTED";}?>>Ferry W</option>
					<option value="Heru H" <?php if($rcek['dibuat_oleh']=="Heru H"){echo "SELECTED";}?>>Heru H</option>
					<option value="Heryanto" <?php if($rcek['dibuat_oleh']=="Heryanto"){echo "SELECTED";}?>>Heryanto</option>
					<option value="Janu" <?php if($rcek['dibuat_oleh']=="Janu"){echo "SELECTED";}?>>Janu</option>
					<option value="Purnomo" <?php if($rcek['dibuat_oleh']=="Purnomo"){echo "SELECTED";}?>>Purnomo</option>
					<option value="Rudi P" <?php if($rcek['dibuat_oleh']=="Rudi P"){echo "SELECTED";}?>>Rudi P</option>
					<option value="Sopian" <?php if($rcek['dibuat_oleh']=="Sopian"){echo "SELECTED";}?>>Sopian</option>
					<option value="Taufik R" <?php if($rcek['dibuat_oleh']=="Taufik R"){echo "SELECTED";}?>>Taufik R</option>
					<option value="Tri S" <?php if($rcek['dibuat_oleh']=="Tri S"){echo "SELECTED";}?>>Tri S</option>
					<option value="Vivik" <?php if($rcek['dibuat_oleh']=="Vivik"){echo "SELECTED";}?>>Vivik</option>
					<option value="Yusuf Dwi K" <?php if($rcek['dibuat_oleh']=="Yusuf Dwi K"){echo "SELECTED";}?>>Yusuf Dwi K</option>
				</select>
			</div>				   
		</div>	  
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Lot</label>
		  <div class="col-sm-3">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek['lot'];}else{echo $lotno;} ?>" placeholder="Lot" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="po_rajut" class="col-sm-3 control-label">PO Rajut</label>
		  <div class="col-sm-3">
			<input name="po_rajut" type="text" class="form-control" id="po_rajut" 
			value="<?php if($cek>0){echo $rcek['po_rajut'];}else{echo $rKO['KONo'];} ?>" placeholder="PO Rajut" required>
		  </div>
		  <div class="col-sm-5">
			<input name="supp_rajut" type="text" class="form-control" id="supp_rajut" 
			value="<?php if($cek>0){echo $rcek['supp_rajut'];}else{echo $rKO['PartnerName'];} ?>" placeholder="Supplier Rajut" >
		  </div>	
		</div>
		<div class="form-group">
		  <label for="tgl_delivery" class="col-sm-3 control-label">Tgl Delivery</label>
		  <div class="col-sm-3">
			<input name="tgl_delivery" type="text" class="form-control" id="tgl_delivery" 
			value="<?php if($cek>0){echo $rcek['tgl_delivery'];}else if($r['RequiredDate']!=""){echo $r['RequiredDate'];}else{}?>" placeholder="" autocomplete="off" readonly>
		  </div>
		  <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_target" type="text" class="form-control pull-right" id="datepicker" placeholder="tgl Target" value="<?php if($cek>0){echo $rcek['tgl_rencana'];}else { echo $tglTarget; } ?>" autocomplete="off"/>
          </div>
        </div>	
		</div>
		<div class="form-group">
		  	<label for="masalah_dominan" class="col-sm-3 control-label">Masalah Utama</label>
		  	<div class="col-sm-6">
				<div class="input-group">
					<select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
						<option value="">Pilih</option>
						<?php 
						$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalahutama_ncp ORDER BY masalah ASC");
						while($rm=mysqli_fetch_array($qrym)){
						?>
						<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
						<?php }?>
					</select>
					<!-- <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalahDominan"> ...</button></span> -->
				</div>
		  	</div>
		</div>  
		<div class="form-group">
                <label for="multi" class="col-sm-3 control-label">Analisa Kerusakan yg Terjadi</label>
			    <div class="col-sm-8">
				<div class="input-group">
                <select class="form-control select2" multiple="multiple" data-placeholder="Jenis Masalah" name="rmp_benang[]" id="kerusakan" required>
				<?php
				$dtArr=$rcek['masalah'];	
				$data = explode(",",$dtArr);
				$qCek1=mysqli_query($con,"SELECT nama FROM tbl_masalah_ncp WHERE jenis='Masalah' ORDER BY nama ASC");
				$i=0;	
				while($dCek1=mysqli_fetch_array($qCek1)){ ?>
				<option value="<?php echo $dCek1['nama'];?>" <?php if($dCek1['nama']==$data[0] or $dCek1['nama']==$data[1] or $dCek1['nama']==$data[2] or $dCek1['nama']==$data[3] or $dCek1['nama']==$data[4] or $dCek1['nama']==$data[5]){echo "SELECTED";} ?>><?php echo $dCek1['nama'];?></option>
				<?php $i++;} ?>                 
                </select>
				<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
			</div>
				</div>	
        </div>  
		<div class="form-group">
        <label for="rol" class="col-sm-3 control-label">Rol</label>
        <div class="col-sm-2">  
					<input name="rol" type="text" class="form-control" id="rol" value="<?php if($cek>0){echo $rcek['rol'];} ?>" placeholder="0.00" style="text-align: right;" required>			
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
				<option value="CQA" <?php if($rcek['dept']=="CQA"){echo "SELECTED";}?>>CQA</option>
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
		  <div class="col-sm-5">
			<input name="tempat" type="text" class="form-control" id="tempat" 
			value="<?php if($cek>0){echo $rcek['tempat'];} ?>" placeholder="Tempat Kain Diletakkan" >
		  </div>	
	    </div>
		
		<div class="form-group">
		  <label for="nsp1" class="col-sm-3 control-label">Non Standar Proses</label>
		  <div class="col-sm-3">
			<select class="form-control select2" name="nsp1">
				<option value="">Pilih</option>
				<option value="MKT" <?php if($rcek['nsp']=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($rcek['nsp']=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($rcek['nsp']=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($rcek['nsp']=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($rcek['nsp']=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($rcek['nsp']=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($rcek['nsp']=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($rcek['nsp']=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($rcek['nsp']=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($rcek['nsp']=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($rcek['nsp']=="GKJ"){echo "SELECTED";}?>>GKJ</option>
				<option value="BRS" <?php if($rcek['nsp']=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($rcek['nsp']=="PRT"){echo "SELECTED";}?>>PRT</option>
				<option value="TAS" <?php if($rcek['nsp']=="TAS"){echo "SELECTED";}?>>TAS</option>
				<option value="YND" <?php if($rcek['nsp']=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($rcek['nsp']=="PRO"){echo "SELECTED";}?>>PRO</option>
				<option value="GAS" <?php if($rcek['nsp']=="GAS"){echo "SELECTED";}?>>GAS</option>			
			</select>	
		  </div>	
			<div class="col-sm-5">
			<input name="peninjau_awal1" type="text" class="form-control" id="peninjau_awal1" 
			value="<?php if($cek>0){echo $rcek['peninjau_awal'];} ?>" placeholder="Nama Peninjau Awal" >
		  </div>
	    </div>		  
		<div class="form-group">
		  <label for="nsp2" class="col-sm-3 control-label">Non Standar Proses</label>
		  <div class="col-sm-3">
			<select class="form-control select2" name="nsp2">
				<option value="">Pilih</option>
				<option value="MKT" <?php if($rcek['nsp1']=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($rcek['nsp1']=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($rcek['nsp1']=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($rcek['nsp1']=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($rcek['nsp1']=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($rcek['nsp1']=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($rcek['nsp1']=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($rcek['nsp1']=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($rcek['nsp1']=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($rcek['nsp1']=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($rcek['nsp1']=="GKJ"){echo "SELECTED";}?>>GKJ</option>
				<option value="BRS" <?php if($rcek['nsp1']=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($rcek['nsp1']=="PRT"){echo "SELECTED";}?>>PRT</option>
				<option value="TAS" <?php if($rcek['nsp1']=="TAS"){echo "SELECTED";}?>>TAS</option>
				<option value="YND" <?php if($rcek['nsp1']=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($rcek['nsp1']=="PRO"){echo "SELECTED";}?>>PRO</option>	
				<option value="GAS" <?php if($rcek['nsp1']=="GAS"){echo "SELECTED";}?>>GAS</option>		
			</select>	
		  </div>	
			<div class="col-sm-5"></div>
	    </div>
		<div class="form-group">
		  <label for="nsp3" class="col-sm-3 control-label">Non Standar Proses</label>
		  <div class="col-sm-3">
			<select class="form-control select2" name="nsp3">
				<option value="">Pilih</option>
				<option value="MKT" <?php if($rcek['nsp2']=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($rcek['nsp2']=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($rcek['nsp2']=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($rcek['nsp2']=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($rcek['nsp2']=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($rcek['nsp2']=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($rcek['nsp2']=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($rcek['nsp2']=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($rcek['nsp2']=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($rcek['nsp2']=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($rcek['nsp2']=="GKJ"){echo "SELECTED";}?>>GKJ</option>
				<option value="BRS" <?php if($rcek['nsp2']=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($rcek['nsp2']=="PRT"){echo "SELECTED";}?>>PRT</option>
				<option value="TAS" <?php if($rcek['nsp2']=="TAS"){echo "SELECTED";}?>>TAS</option>
				<option value="YND" <?php if($rcek['nsp2']=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($rcek['nsp2']=="PRO"){echo "SELECTED";}?>>PRO</option>		
				<option value="GAS" <?php if($rcek['nsp2']=="GAS"){echo "SELECTED";}?>>GAS</option>		
			</select>	
		  </div>	
			<div class="col-sm-5"></div>
	    </div>
		<div class="form-group">
		  <label for="ket" class="col-sm-3 control-label">Keterangan</label>
		  <div class="col-sm-7">
			<textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php if($cek>0){echo $rcek['ket']; }?></textarea>
		  </div>		 
		</div>		  
	 </div>
	
</div>	 
   <div class="box-footer">
   <?php if($_GET['nokk']!=""){ ?> 	
   <?php if($NCPNO!=""){ ?>
	<input type="submit" value="Ubah" name="save" id="save" class="btn btn-primary pull-right" >
   <?php }else{ ?>	   
  <input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" >	  
   <?php } ?>	
	   
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
function no_urut(){
include"koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$format = $_POST['dept']."/".date("y/m/");
$sql=mysqli_query($con,"SELECT no_ncp FROM tbl_ncp_qcf WHERE substr(no_ncp,1,10) like '".$format."%' ORDER BY no_ncp DESC LIMIT 1 ") or die (mysqli_error());
$d=mysqli_num_rows($sql);
if($d>0){
$r=mysqli_fetch_array($sql);
$d=$r['no_ncp'];
$str=substr($d,10,3);
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
$nou=no_urut();
if($_POST['save']=="Simpan"){
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $ket=str_replace("'","''",$_POST['ket']);
	  $lot=trim($_POST['lot']);
	  $ncp=$nou;
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
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_ncp_qcf SET 
		  nokk='$_POST[nokk]',
		  no_ncp='$ncp',
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
		  masalah='$kt1',
		  berat='$_POST[berat]',
		  dept='$_POST[dept]',
		  nsp='$_POST[nsp1]',
		  nsp1='$_POST[nsp2]',
		  nsp2='$_POST[nsp3]',
		  peninjau_awal='$_POST[peninjau_awal1]',
		  ket='$ket',
		  tempat='$_POST[tempat]',
		  masalah_dominan='$_POST[masalah_dominan]',
		  dibuat_oleh='$_POST[dibuat_oleh]',
		  tgl_delivery='$_POST[tgl_delivery]',
		  tgl_rencana='$_POST[tgl_target]',
		  tgl_buat=now(),
		  tgl_update=now()");	 	  
	  
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_ncp.php?no_ncp=$ncp','_blank');
      window.location.href='NCP-$_GET[nokk]';
	 
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
  	  $sqlData=mysqli_query($con,"UPDATE tbl_ncp_qcf SET 
		  rol='$_POST[rol]',
		  masalah='$kt1',
		  berat='$_POST[berat]',
		  nsp='$_POST[nsp1]',
		  nsp1='$_POST[nsp2]',
		  nsp2='$_POST[nsp3]',
		  po='$po',
		  lot='$lot',
		  peninjau_awal='$_POST[peninjau_awal1]',
		  ket='$ket',
		  masalah_dominan='$_POST[masalah_dominan]',
		  dibuat_oleh='$_POST[dibuat_oleh]',
		  tgl_update=now()
		  WHERE nokk='$nokk' and no_ncp='$NCPNO'");	 	  
	  
		if($sqlData){	
	echo "<script>swal({
  title: 'Data Telah diUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_ncp.php?no_ncp=$NCPNO','_blank');
      window.location.href='NCP-$nokk';
	 
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
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Analisa Kerusakan yg Terjadi</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="kerusakan" class="col-md-3 control-label">Jenis Kerusakan</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="kerusakan" name="kerusakan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_kerusakan" id="simpan_kerusakan" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_kerusakan']=="Simpan"){
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalah_ncp SET 
		  nama='$_POST[kerusakan]'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='NCP-$nokk';
	 
  }
});</script>";
		}
}
?>

<div class="modal fade" id="DataMasalahDominan">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masalah Utama</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_masalah']=="Simpan"){
	$masalah=strtoupper($_POST['masalah_dominan']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalahutama_ncp SET 
		  masalah='$masalah'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='NCP-$nokk';
	 
  }
});</script>";
		}
}
?>
