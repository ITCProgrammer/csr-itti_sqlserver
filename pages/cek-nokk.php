<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$nokk=$_GET['nokk'];
$sql=sqlsrv_query($conn,"select top 1
			x.*,dbo.fn_StockMovementDetails_GetTotalWeightPCC(0, x.PCBID) as Weight, 
			pm.Weight as Gramasi,pm.CuttableWidth as Lebar, pm.Description as ProductDesc, pm.ColorNo, pm.Color,
      dbo.fn_StockMovementDetails_GetTotalRollPCC(0, x.PCBID) as RollCount,
			case when (x.Flag1 & 1) = 1 then N'Original Color' else N'' end as ColorSampleOriginal,
		  case when (x.Flag1 & 2) = 2 then N'Color LD' else N'' end as ColorSampleLD,
		  isnull(x.OtherDesc, N'') as ColorSampleOther,
			dbo.fn_Rpt_F013_1(x.Sid) as GarmentStyle
			
		from
			(
			select
				sosc.OtherDesc,sosc.Flag as Flag1,so.ID as Sid,so.SONumber, convert(char(10),so.SODate,103) as TglSO, so.CustomerID, so.BuyerID, so.PODate,
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
				SOSampleColor sosc on so.ID = sosc.SOID left join
				ProcessFlowProcessNo pfpn on pfpn.EntryType = 2 and pcb.ID = pfpn.ParentID and pfpn.MachineType = 24 left join
				ProcessFlowDetailsNote pfdn on pfpn.EntryType = pfdn.EntryType and pfpn.ID = pfdn.ParentID
			where pcb.DocumentNo='$nokk' and pcb.Gross<>'0'
				group by
					so.ID,so.SONumber, so.SODate, so.CustomerID, so.BuyerID, so.PONumber, so.PODate,jo.DocumentNo,
					sod.ID, sod.ProductID, sod.Quantity, sod.UnitID, sod.Weight, sod.WeightUnitID,
					soda.RefNo,pcb.DocumentNo,soda.HangerNo,pp.ProductCode,
					pcb.ID, pcb.DocumentNo, pcb.Gross,soda.PONumber,
					pcb.Quantity, pcb.UnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
					pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate,
					sosc.OtherDesc,sosc.Flag
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
$pelanggan=$r1['partnername']." / ".$r2['partnername'];
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
			$nomorLot="$nomLot/K$r[ChildLevel]&nbsp;";				
								
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
		$sqlN1=sqlsrv_query($conn,"select top 1 CAST(TM.dbo.ProcessControlBatches.[Note] AS VARCHAR(8000)) AS Note
 	from dbo.ProcessControlBatches where ID='$r[PCBID]'");
	 $rN1=sqlsrv_fetch_array($sqlN1);
		$sqlN2=sqlsrv_query($conn,"select top 1 CAST(TM.dbo.SODetailsAdditional.[Note] AS VARCHAR(8000)) AS Note
 	from dbo.SODetailsAdditional where SODID='$r[SODID]'");
	 $rN2=sqlsrv_fetch_array($sqlN2);
		$sqlN3=sqlsrv_query($conn,"select top 1 CAST(TM.dbo.SalesOrders.[Note] AS VARCHAR(8000)) AS Note
 	from dbo.SalesOrders where ID='$r[Sid]'");
	 $rN3=sqlsrv_fetch_array($sqlN3);
		$sqlN4=sqlsrv_query($conn,"select top 1 CAST(TM.dbo.ProductMaster.[Note] AS VARCHAR(8000)) AS Note
 	from dbo.ProductMaster where ID='$r[ProductID]'");
	 $rN4=sqlsrv_fetch_array($sqlN4);
		$note = $rN4['Note']." * ".$rN1['Note']." * ".$rN2['Note']." * ".$rN3['Note'];
$sqlpack=mysqli_query($con,"SELECT
	tgl_mulai,jml_netto,netto,panjang,satuan
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'PACKING'
ORDER BY id DESC LIMIT 1");
			$sPack=mysqli_fetch_array($sqlpack);
		$sqlinsp=mysqli_query($con,"SELECT
	tgl_update,jml_netto,netto,panjang
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'INSPEK MEJA'
ORDER BY id DESC LIMIT 1");
			$sInsp=mysqli_fetch_array($sqlinsp);
$sqlwarna=mysqli_query($con,"SELECT
	tgl_update,`status`
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'QCF'
ORDER BY id DESC LIMIT 1");
			$sWarna=mysqli_fetch_array($sqlwarna);
}
$sqlCek=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nokk='$nokk' LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$sqlManual=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE nokk='$nokk' LIMIT 1");
$cekM=mysqli_fetch_array($sqlManual);
$rcek=mysqli_fetch_array($sqlCek);
$sqlD=mysqli_query($con,"SELECT GROUP_CONCAT(CONCAT(persen, '%') SEPARATOR '; ') as persen, GROUP_CONCAT(dept SEPARATOR '; ') as dept FROM tbl_qcf_detail WHERE id_qcf='$rcek[id]'");
$rcekd=mysqli_fetch_array($sqlD);
?>
<div class="row">
<div class="col-xs-12">
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <div class="box box-info">
   <div class="box-header with-border">
    <h3 class="box-title">No Kartu Kerja</h3>
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
                     onchange="window.location='CekNokk-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
		  </div>
                </div>
	  </div>
	  <div class="col-md-6">
	  <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
                  <div class="col-sm-8">
				  <textarea class="form-control" name="pelanggan" placeholder="Pelanggan"><?php if($pelanggan!=" / "){echo $pelanggan;} ?></textarea>
		  </div>
                </div>
	  </div>
	 </div>
  </div>	 
	</form>	
	</div>
</div>	
<div class="row">
<div class="col-xs-6">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <div class="box box-info collapsed-box">
   <div class="box-header with-border">
    <h3 class="box-title">Detail Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div>
  </div>
  <div class="box-body">	           
	           <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">PO</label>
                  <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" 
                    value="<?php if($cek>0){echo $rcek['no_po'];}else{if($r['PONumber']!=""){echo $r['PONumber'];}else if($nokk!=""){echo $cekM['no_po'];}} ?>" placeholder="PO" >
                  </div>				   
                </div>
	            <div class="form-group">
                  <label for="no_order" class="col-sm-3 control-label">No Order</label>
                  <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" 
                    value="<?php if($cek>0){echo $rcek['no_order'];}else{if($r['NoOrder']!=""){echo $r['NoOrder'];}else if($nokk!=""){echo $cekM['no_order'];}} ?>" placeholder="No Order" required>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                  <div class="col-sm-3">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" 
                    value="<?php if($cek>0){echo $rcek['no_hanger'];}else{if($r['HangerNo']){echo $r['HangerNo'];}else if($nokk!=""){echo $cekM['no_item'];}}?>" placeholder="No Hanger">  
                  </div>
				  <div class="col-sm-3">
				  <input name="no_item" type="text" class="form-control" id="no_item" 
                    value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else if($r['ProductCode']!=""){echo $r['ProductCode'];}else{if($r['HangerNo']){echo $r['HangerNo'];}else if($nokk!=""){echo $cekM['no_item'];}}?>" placeholder="No Item">
				  </div>	
                </div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" rows="3" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{if($r['ProductDesc']!=""){echo $r['ProductDesc']." ".$r['GarmentStyle'];}else if($nokk!=""){ echo $cekM['jenis_kain']; } }?></textarea>
					  </div>
                  </div>		        
		    <div class="form-group">
                  <label for="qty_order" class="col-sm-3 control-label">Qty Order</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty1" type="text" class="form-control" id="qty1" 
                    value="<?php if($cek>0){echo $rcek['berat_order'];}else{echo round($r['BatchQuantity'],2);} ?>" placeholder="0.00" required>
					  <span class="input-group-addon">KGs</span></div>  
                  </div>
				  <div class="col-sm-4">
					<div class="input-group">  
                    <input name="qty2" type="text" class="form-control" id="qty2" 
                    value="<?php if($cek>0){echo $rcek['panjang_order'];}else{echo round($r['Quantity'],2);} ?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">
							  <select name="satuan1" style="font-size: 12px;">
								  <option value="Yard" <?php if($r['UnitID']=="21"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($r['UnitID']=="10"){ echo "SELECTED"; }?>>Meter</option>
								  <option value="PCS" <?php if($r['UnitID']=="1"){ echo "SELECTED"; }?>>PCS</option>
							  </select>
					    </span>
					</div>	
                  </div>		
                </div>		 		
		 		<div class="form-group">
                  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="lebar" type="text" class="form-control" id="lebar" 
                    value="<?php if($cek>0){echo $rcek['lebar'];}else{echo round($r['Lebar']);} ?>" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="grms" type="text" class="form-control" id="grms" 
                    value="<?php if($cek>0){echo $rcek['gramasi'];}else{echo round($r['Gramasi']);} ?>" placeholder="0" required>
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="warna" class="col-sm-3 control-label">Warna</label>
                  <div class="col-sm-8">
                    <textarea name="warna" rows="1" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else{if($r['Color']!=""){echo $r['Color'];}else if($nokk!=""){ echo $cekM['warna'];} }?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                  <div class="col-sm-8">
                    <textarea name="no_warna" rows="1" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}else{if($r['ColorNo']!=""){echo $r['ColorNo'];}else if($nokk!=""){echo $cekM['no_warna'];}}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" 
                    value="<?php if($cek>0){echo $rcek['lot'];}else{if($nomorLot!=""){echo $lotno;}else if($nokk!=""){echo $cekM['lot'];} } ?>" placeholder="Lot" >
                  </div>				   
                </div>
	  			<div class="form-group">
                  <label for="std" class="col-sm-3 control-label">STD. Cocok Warna</label>
                  <div class="col-sm-8"><textarea name="std"  class="form-control" id="std" placeholder="STD. Cocok Warna"><?php echo $r['ColorSampleOriginal'];?> <?php echo $r['ColorSampleOther'];?> <?php echo $r['ColorSampleLD']; ?>
                    </textarea>
					</div>				   
                </div>
	  
</div>	

</div>
</form>   
	</div>
		<div class="col-xs-3">
<div class="box box-warning collapsed-box table-responsive">
            <div class="box-header">
              <h3 class="box-title">Detail Bagi Kain</h3>
			  <div class="box-tools pull-right">      
				  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
				</div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table width="100%" class="table">
                <tr>
                  <th width="44" style="width: 10px"><div align="center">No Rol</div></th>
                  <th width="81"><div align="right">Berat(KG)</div></th>
                  <th width="53"><div align="right">Panjang</div></th>
                </tr>
				 <?php 
				  $noD="1";
				  $sqlD=sqlsrv_query($conn,"SELECT ROUND(c.Weight,2) as Weight,ROUND(c.Length,2) as Length FROM ProcessControlBatches a
INNER JOIN StockMovement b ON a.ID=b.PCBID
INNER JOIN StockMovementDetails c ON b.ID=c.StockMovementID
WHERE a.DocumentNo='$_GET[nokk]' AND b.TransactionType='7' AND b.TransactionStatus='1'");
				  while($rD=sqlsrv_fetch_array($sqlD)){?> 
                <tr>
                  <td align="center"><?php echo $noD; ?></td>
                  <td align="right"><?php echo number_format($rD['Weight'],"2",".",""); ?></td>
                  <td align="right"><?php echo number_format($rD['Length'],"2",".",""); ?></td>
                </tr>                
				  <?php $noD++;
						$tWD=$tWD+$rD['Weight'];
						$tLD=$tLD+$rD['Length'];							 
													 } ?>
				<tr>
                  <td align="right"><strong>Rolls: <?php echo $noD-1; ?></strong></strong></td>
                  <td align="right"><strong><?php echo number_format($tWD,"2",".",""); ?></strong></td>
                  <td align="right"><strong><?php echo number_format($tLD,"2",".",""); ?></strong></td>
                </tr>  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
	<div class="col-xs-3">
<div class="box box-danger collapsed-box table-responsive">
            <div class="box-header">
              <h3 class="box-title">Detail  Kain Jadi</h3>
			<div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table width="100%" class="table">
                <tr>
                  <th width="44" style="width: 10px"><div align="center">No Rol</div></th>
                  <th width="81"><div align="right">Berat(KG)</div></th>
                  <th width="53"><div align="right">Panjang</div></th>
                </tr>
				  <?php 
				  $noD="1";
				  if($_GET['nokk']==""){$idno=" AND id='' ";}else{$idno=" "; }
				  $sqlK=mysqli_query($con,"SELECT no_roll,weight,yard_ FROM detail_pergerakan_stok 
				  WHERE nokk='$_GET[nokk]' $idno and (transtatus='0' or transtatus='1') ORDER BY no_roll ASC");
				  while($rK=mysqli_fetch_array($sqlK)){?>
                <tr>
                  <td align="center"><?php echo $rK['no_roll']; ?></td>
                  <td align="right"><?php echo number_format($rK['weight'],"2",".",""); ?></td>
                  <td align="right"><?php echo number_format($rK['yard_'],"2",".",""); ?></td>
                </tr>
				  <?php $noK++;
						$tWK=$tWK+$rK['weight'];
						$tLK=$tLK+$rK['yard_'];							 
													 } ?>
				<tr>
                  <td align="right"><strong>Rolls: <?php echo $noK; ?></strong></td>
                  <td align="right"><strong><?php echo number_format($tWK,"2",".",""); ?></strong></td>
                  <td align="right"><strong><?php echo number_format($tLK,"2",".",""); ?></strong></td>
                </tr>   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
          <!-- /.box -->			
</div>
<div class="row">
<div class="col-xs-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom table-responsive">
            <ul class="nav nav-tabs pull-right">
			  <li><a href="#qc_inspek" data-toggle="tab">QC Inspeksi</a></li>		
			  <li><a href="#qc_lab" data-toggle="tab">QC LabTest</a></li>	
			  <li><a href="#qc_color" data-toggle="tab">QC Color</a></li>
			  <li><a href="#prt" data-toggle="tab">PRT</a></li>	
              <li><a href="#fin" data-toggle="tab">FIN
				  <?php 
				   $Cfin1=mysqli_connect("svr4","dit","4dm1n");
    			   $dbfin1=mysqli_select_db("db_finishing",$Cfin1)or die("Gagal Koneksi");
				   $sqlJFin1=mysqli_query($Cfin1,"SELECT COUNT(*) as jml FROM `tbl_produksi` a 
				   LEFT JOIN `tbl_no_mesin` b ON a.no_mesin=b.no_mesin 
				   WHERE a.nokk='$_GET[nokk]' ORDER BY a.`jam_in` ASC ");
				   $rJfin1=mysqli_fetch_array($sqlJFin1);
				  
				  ?><sup><span class="label label-danger"><?php if($rJfin1['jml']>0){echo $rJfin1['jml'];}?></span></sup></a></li>
              <li><a href="#brs" data-toggle="tab">BRS
				  <?php 
				   $Cbrs1=mysqli_connect("svr4","dit","4dm1n");
  				   $dbbrs1=mysqli_select_db("db_brushing",$Cbrs1)or die("Gagal Koneksi");	
                   $sqlJbrs1=mysqli_query($Cbrs1,"SELECT COUNT(*) as jml FROM tbl_produksi WHERE nokk='$_GET[nokk]' ORDER BY id ASC");
				   $rJbrs=mysqli_fetch_array($sqlJbrs1);
				  
				  ?><sup><span class="label label-danger"><?php if($rJbrs['jml']>0){echo $rJbrs['jml'];}?></span></sup></a></li> 
			  <li><a href="#dye" data-toggle="tab">DYE 
				  <?php 
				  $Cdye1=mysqli_connect("svr4","dit","4dm1n");
                  $dbdye1=mysqli_select_db("db_dying",$Cdye1)or die("Gagal Koneksi");
				  $sqlJdye1=mysqli_query($Cdye1,"SELECT
	COUNT(*) as jml
FROM
	tbl_schedule b
	LEFT JOIN  tbl_montemp c ON c.id_schedule = b.id
	LEFT JOIN tbl_hasilcelup a ON a.id_montemp=c.id
WHERE
	b.nokk='$_GET[nokk]'
	ORDER BY
	b.no_mesin ASC");
				 $rJdye=mysqli_fetch_array($sqlJdye1);
				  
				  ?><sup><span class="label label-danger"><?php if($rJdye['jml']>0){echo $rJdye['jml'];}?></span></sup></a></li>	
              <li class="active"><a href="#dtl" data-toggle="tab">#</a></li>              
              <li class="pull-left header"><i class="fa fa-th"></i> Produksi</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="fin">
                <table id="tblr4" class="table table-bordered table-hover nowrap" width="100%" >
                  <thead class="bg-red">
                    <tr>
                      <th rowspan="2" >Tgl</th>
                      <th rowspan="2" >B/K</th>
                      <th rowspan="2" >Mesin</th>
                      <th rowspan="2" >No Mesin</th>
                      <th rowspan="2">Proses</th>
                      <th colspan="2" >Lebar x Gramasi</th>
                      <th colspan="2" >Waktu</th>
                      <th colspan="2" >Stop Mesin</th>
                      <th rowspan="2" >Total</th>
                      <th rowspan="2">Kode</th>
                      <th rowspan="2">Operator</th>
                      <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                      <th>Minta</th>
                      <th>Hasil</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
	$Cfin=mysqli_connect("svr4","dit","4dm1n");
    $dbfin=mysqli_select_db("db_finishing",$Cfin)or die("Gagal Koneksi");
		$sqlFin=mysqli_query($Cfin," SELECT 
	*,a.`id` as `idp` 
FROM
	`tbl_produksi` a
	LEFT JOIN `tbl_no_mesin` b ON a.no_mesin=b.no_mesin

WHERE
	a.nokk='$_GET[nokk]' ORDER BY a.`jam_in` ASC ");
    $noFIN=1;
    while($rowd=mysqli_fetch_array($sqlFin)){
		 
// hitung hari dan jam	 
$awal  = strtotime($rowd['tgl_stop_l'].' '.$rowd['stop_l']);
$akhir = strtotime($rowd['tgl_stop_r'].' '.$rowd['stop_r']);
$diff  = ($akhir - $awal);
$tmenit=round($diff / (60),2);		
$tjam  =round($diff / (60 * 60),2);
$hari  =round($tjam/24,2);
	  		  ?>
                    <tr>
                      <td align="center"><?php echo $rowd['tgl_update'];?></td>
                      <td align="center"><?php echo $rowd['kondisi_kain'];?></td>
                      <td align="center"><?php echo $rowd['nama_mesin'];?></td>
                      <td><?php echo $rowd['no_mesin']; ?></font></td>
                      <td><?php echo $rowd['proses']; ?></font></td>
                      <td><?php echo $rowd['lebar']; ?>x<?php echo $rowd['gramasi'];?></td>
                      <td><?php echo $rowd['lebar_h'];?>x<?php echo $rowd['gramasi_h'];?></td>
                      <td><?php echo $rowd['jam_in'];?></td>
                      <td><?php echo $rowd['jam_out'];?></td>
                      <td><?php echo $rowd['stop_l'];?></td>
                      <td><?php echo $rowd['stop_r'];?></td>
                      <td><?php echo $tmenit;?></td>
                      <td><?php echo $rowd['kd_stop'];?></td>
                      <td><?php echo $rowd['acc_staff'];?></td>
                      <td><?php echo $rowd['catatan'];?></td>
                    </tr>
                    <?php 
	 
	 $noFIN++;} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="brs">
               <table id="tblr3" class="table table-bordered table-hover nowrap" width="100%">
<thead class="btn-primary">
   <tr>
     <th width="38"><div align="center">Mesin</div></th>
     <th width="215"><div align="center">No Mesin</div></th>
      <th width="215"><div align="center">Proses</div></th>
      <th width="215"><div align="center">Lama Proses</div></th>
      <th width="215"><div align="center">Keterangan</div></th>
   </tr>
</thead>
<tbody>
  <?php 	
  $Cbrs=mysqli_connect("svr4","dit","4dm1n");
  $dbbrs=mysqli_select_db("db_brushing",$Cbrs)or die("Gagal Koneksi");	
  $sql1=mysqli_query("SELECT * FROM tbl_produksi WHERE nokk='$_GET[nokk]' ORDER BY id ASC",$Cbrs);	
  while($rowd1=mysqli_fetch_array($sql1)){
		
	?>
   <tr class="table table-bordered table-hover table-striped">
     <td align="center"><?php echo $rowd1['no_mesin'];?></td>
     <td align="left"><?php echo $rowd1['nama_mesin'];?></td>
	   <td align="left"><?php echo $rowd1['proses'];?></br><i><?php echo $rowd1['tgl_buat'];?></i></td>
     <td align="center">&nbsp;</td>
     <td><br />
       <?php echo $rowd1['ket'];?></td>
   </tr>
   <?php }?>
   </tbody>
   
</table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="dye">
                <table id="tblr2" class="table table-bordered table-hover nowrap" width="100%">
<thead class="btn-danger">
   <tr>
     <th width="38"><div align="center">Mesin</div></th>
     <th width="215"><div align="center">No Resep</div></th>
      <th width="215"><div align="center">Proses</div></th>
      <th width="215"><div align="center">Lama Proses</div></th>
      <th width="215"><div align="center">Keterangan</div></th>
   </tr>
</thead>
<tbody>
  <?php 
  $Cdye=mysqli_connect("svr4","dit","4dm1n");
  $dbdye=mysqli_select_db("db_dying",$Cdye)or die("Gagal Koneksi");	
  $sql=mysqli_query($Cdye,"SELECT
	a.*,
	b.id as ids,
	b.no_resep,
	b.resep,
	b.no_mesin,
	b.warna,
	b.proses,
	if(c.status='selesai',if(ISNULL(TIMEDIFF(c.tgl_mulai,c.tgl_stop)),a.lama_proses,CONCAT(LPAD(FLOOR((((HOUR(a.lama_proses)*60)+MINUTE(a.lama_proses))-((HOUR(TIMEDIFF(c.tgl_mulai,c.tgl_stop))*60)+MINUTE(TIMEDIFF(c.tgl_mulai,c.tgl_stop))))/60),2,0),':',LPAD(((((HOUR(a.lama_proses)*60)+MINUTE(a.lama_proses))-((HOUR(TIMEDIFF(c.tgl_mulai,c.tgl_stop))*60)+MINUTE(TIMEDIFF(c.tgl_mulai,c.tgl_stop))))%60),2,0))),TIME_FORMAT(timediff(now(),c.tgl_buat),'%H:%i')) as lama,
	b.`status` as sts
FROM
	tbl_schedule b
	LEFT JOIN  tbl_montemp c ON c.id_schedule = b.id
	LEFT JOIN tbl_hasilcelup a ON a.id_montemp=c.id
WHERE
	b.nokk='$_GET[nokk]'
	ORDER BY
	b.no_mesin ASC");	
 while($rowd=mysqli_fetch_array($sql)){
		
	?>
   <tr class="table table-bordered table-hover table-striped">
     <td align="center"><?php echo $rowd['no_mesin'];?></td>
     <td align="left"><i><a href="#" id='<?php echo $rowd['ids']; ?>' class="resep"><?php echo $rowd['no_resep'];?></a></i> (<?php echo $rowd['resep'];?> )</td>
     <td align="left"><?php echo $rowd['proses'];?><br />
       <i class="label bg-hijau"><?php if($rowd['operator_keluar']!=""){echo $rowd['operator_keluar'];}else{ echo $rowd['operator'];}?></i></td>
     <td align="center"><?php echo $rowd['lama'];?></td>
     <td><i class="label <?php if($rowd['status']=="OK"){echo "bg-green";}else if($rowd['status']=="Gagal Proses"){echo "bg-red";} ?>"> <?php echo $rowd['status'];?> </i><br /><?php echo $rowd['ket'];?></td>
   </tr>
   <?php }?>
   </tbody>
   
</table>
              </div>
              <!-- /.tab-pane -->
			  <!-- /.tab-pane -->
              <div class="tab-pane active" id="dtl">
                <table id="tblr1" class="table table-bordered table-hover nowrap" width="100%">
<thead class="btn-danger">
   <tr>
     <th width="38"><div align="center">Tgl</div></th>
     <th width="215"><div align="center">Proses</div></th>
      <th width="215"><div align="center">Keterangan</div></th>
   </tr>
</thead>
<tbody>
  
   <tr class="table table-bordered table-hover table-striped">
     <td align="center">&nbsp;</td>
     <td align="left"><br /></td>
     <td><br /></td>
   </tr>
   
   </tbody>
   
</table>
              </div>
              <!-- /.tab-pane -->	
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
</div>
<div class="row">
<div class="col-xs-12">
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <div class="box box-info">
   <div class="box-header with-border">
    <h3 class="box-title">Keterangan Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
	  <div class="form-group">
                  <div class="col-sm-12">
				  <textarea name="ket" cols="10" rows="10" class="form-control" placeholder="Keterangan"><?php echo $note; ?></textarea>
		  </div>
                </div>
	 </div>
  </div>	 
	</form>	
	</div>
</div>
<div id="Resep" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">