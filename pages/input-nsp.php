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
				soda.RefNo as DetailRefNo, jo.DocumentNo as NoOrder,soda.PONumber,
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,pp.ProductCode,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate
				
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
$sqlCek=mysqli_query($con,"SELECT * FROM tbl_nsp_qcf WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
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
					  <label for="nokk" class="col-sm-3 control-label">No KK</label>
					  <div class="col-sm-4">
					  <input name="nokk" type="text" class="form-control" id="nokk" 
						 onchange="window.location='NSP-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
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
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
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
   <?php }else if($_GET['nokk']!=""){ ?>
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
  	  window.open('pages/cetak/bon_nsp.php?nokk=$_POST[nokk]','_blank');
      window.location.href='NSP-$_GET[nokk]';
	 
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
		  WHERE nokk='$nokk'");	 	  
	  
		if($sqlData){	
	echo "<script>swal({
  title: 'Data Telah diUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.location.href='NSP-$nokk';
	 
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
