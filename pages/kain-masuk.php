<?php
$nokk=$_GET[nokk];
$sql=mssql_query("select top 1
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
		  $r=mssql_fetch_array($sql);
$sql1=mssql_query("select partnername from partners where id='$r[CustomerID]'");	
$r1=mssql_fetch_array($sql1);
$sql2=mssql_query("select partnername from partners where id='$r[BuyerID]'");	
$r2=mssql_fetch_array($sql2);
$pelanggan=$r1[partnername]."/".$r2[partnername];
$ko=mssql_query("select  ko.KONo from
		ProcessControlJO pcjo inner join
		ProcessControl pc on pcjo.PCID = pc.ID left join
		KnittingOrders ko on pc.CID = ko.CID and pcjo.KONo = ko.KONo 
	where
		pcjo.PCID = '$r[PCID]'
group by ko.KONo",$conn);
					$rKO=mssql_fetch_array($ko);
					
$child=$r[ChildLevel];
	if($nokk!=""){	
		if($child > 0){
			$sqlgetparent=mssql_query("select ID,LotNo from ProcessControlBatches where ID='$r[RootID]' and ChildLevel='0'");
			$rowgp=mssql_fetch_assoc($sqlgetparent);
			
			//$nomLot=substr("$row2[LotNo]",0,1);
			$nomLot=$rowgp[LotNo];
			$nomorLot="$nomLot/K$r[ChildLevel]";				
								
		}else{
			$nomorLot=$r[LotNo];
				
		}

		$sqlLot1="Select count(*) as TotalLot From ProcessControlBatches where PCID='$r[PCID]' and RootID='0' and LotNo < '1000'";
		$qryLot1 = mssql_query($sqlLot1) or die('A error occured : ');							
		$rowLot=mssql_fetch_assoc($qryLot1);
		$lotno=$rowLot[TotalLot]."-".$nomorLot;
		if($r[Quantity]!=""){
		$x=((($r[Lebar]+2)*$r[Gramasi])/43.06038193629178);
		$x1=(1000/$x);
		$yard=$x1*$r[Quantity]; 
	}

}
$sqlCek=mysql_query("SELECT * FROM tbl_tq_nokk WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysql_num_rows($sqlCek);
$rcek=mysql_fetch_array($sqlCek);
$no_tes=$rcek[no_test]+1;
$con1=mysql_connect("10.0.0.10","dit","4dm1n");
$db1=mysql_select_db("db_finishing",$con1)or die("Gagal Koneksi ke finishing");
$qryFin=mysql_query("SELECT * FROM tbl_produksi WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$dtFin=mysql_fetch_array($qryFin);
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
					  <label for="no_po" class="col-sm-3 control-label">No KK</label>
					  <div class="col-sm-4">
					  <input name="nokk" type="text" class="form-control" id="nokk" 
						 onchange="window.location='KainIn-'+this.value" value="<?php echo $_GET[nokk];?>" placeholder="No KK" required >
			  </div>
					</div>
		<div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" class="form-control" id="no_order" 
			value="<?php if($cek>0){echo $rcek[no_order];}else{echo $r[NoOrder];} ?>" placeholder="No Order" required>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-8">
			<input name="pelanggan" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek[pelanggan];}else if($r1[partnername]!=""){echo $pelanggan;}else{}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek[no_po];}else{echo $r[PONumber];} ?>" placeholder="PO" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
		  <div class="col-sm-3">
			<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
			value="<?php if($cek>0){echo $rcek[no_hanger];}else{echo $r[HangerNo];}?>" placeholder="No Hanger">  
		  </div>
		  <div class="col-sm-3">
		  <input name="no_item" type="text" class="form-control" id="no_item" 
			value="<?php if($rcek[no_item]!=""){echo $rcek[no_item];}else{echo $r[ProductCode];}?>" placeholder="No Item">
		  </div>	
		</div>
		<div class="form-group">
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8">
			  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek[jenis_kain];}else{echo $r[ProductDesc];}?></textarea>
			  </div>
		  </div>	 		
		<div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php if($cek>0){echo $rcek[lebar];}else if($nokk!=""){echo round($r[Lebar]);}else{} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php if($cek>0){echo $rcek[gramasi];}else if($nokk!=""){echo round($r[Gramasi]);}else{} ?>" placeholder="0" required>
		  </div>		
		</div>
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">		  
		<div class="form-group">
		  <label for="warna" class="col-sm-3 control-label">Warna</label>
		  <div class="col-sm-8">
			<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek[warna];}else{echo $r[Color];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
		  <div class="col-sm-8">
			<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek[no_warna];}else{echo $r[ColorNo];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Lot</label>
		  <div class="col-sm-2">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek[lot];}else{echo $lotno;} ?>" placeholder="Lot" >
		  </div>				   
		</div>
		<!--  
		<div class="form-group">
		  <label for="kd_proses" class="col-sm-3 control-label">Kode Proses</label>
		  <div class="col-sm-2">
			<select name="kd_proses" class="form-control" id="kd_proses">
			<option value="Fin">Fin</option>
			<option value="Oven">Oven</option>
			<option value="Comp">Comp</option>
			<option value="AP">AP</option>
			<option value="PB">PB</option>	
			</select>
		  </div>				   
		</div>
 		-->
		<div class="form-group">
                  <label for="proses" class="col-sm-3 control-label">Proses</label>
                  <div class="col-sm-6">
                    <input name="proses" type="text" class="form-control" id="proses" 
                    value="" placeholder="Proses" required>
                  </div>				   
          </div>
		  <!--<div class="form-group">
        <label for="tgl_finishing" class="col-sm-3 control-label">Tgl. Finishing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_finishing" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $dtFin[tgl_proses_out]; ?>" required/>
          </div>
        </div>
	  </div> --> 
		<div class="form-group">
		  <label for="suhu" class="col-sm-3 control-label">Suhu</label>
		  <div class="col-sm-3">
			<div class="input-group">  
			<input name="suhu" type="text" class="form-control" id="suhu" 
			value="<?php if($cek>0){echo $rcek[suhu];}else{} ?>" placeholder="Suhu" style="text-align: right;" required>
			<span class="input-group-addon">&deg;C</span>	
			</div>	
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_test" class="col-sm-3 control-label">No Test</label>
		  <div class="col-sm-2">
			<input name="no_test" type="text" class="form-control" id="no_test" placeholder="No Test" autocomplete="off" 
			value="<?php if($nokk!=""){echo $no_tes; }else{} ?>" readonly="readonly" >
		  </div>				   
		</div>
	 </div>
	
</div>	 
   <div class="box-footer">
   <?php if($_GET['nokk']!=""){ ?> 	
   <button type="submit" class="btn btn-primary pull-left" name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
   <a href="pages/cetak/cetak_label.php?idkk=<?php echo $_GET[nokk]; ?>&po=<?php echo $PO; ?>&item=<?php echo $Item; ?>&warna=<?php echo $Warna; ?>&buyer=<?php echo $Langganan; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a> 
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
if($_POST[save]=="save"){
	  $con=mysql_connect("10.0.0.10","dit","4dm1n");
      $db=mysql_select_db("db_qc",$con)or die("Gagal Koneksi");	
	  $warna=str_replace("'","''",$_POST[warna]);
	  $nowarna=str_replace("'","''",$_POST[no_warna]);	
	  $jns=str_replace("'","''",$_POST[jns_kain]);
	  $po=str_replace("'","''",$_POST[no_po]);
	  $lot=trim($_POST[lot]);
  	  $sqlData=mysql_query("INSERT INTO tbl_tq_nokk SET 
		  nokk='$_POST[nokk]',
		  no_test='$_POST[no_test]',
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  no_po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lot='$lot',
		  warna='$warna',
		  no_warna='$nowarna',
		  tgl_fin=now(),
		  proses_fin='$_POST[proses]',
		  suhu='$_POST[suhu]',
		  tgl_masuk=now(),
		  tgl_update=now()");	 	  
	  
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label.php?idkk=$_GET[nokk]','_blank');	
	 window.location.href='KainIn';
	 
  }
});</script>";
		}
				
	}

?>
