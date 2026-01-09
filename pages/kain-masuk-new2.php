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
//$today = date("Y-m-d");
//$bln= date("Y-m");
//Cari notest terakhir pada hari ini
//$sqlnotes = "SELECT max(no_test) FROM tbl_tq_nokk WHERE tgl_masuk LIKE '$bln%'";
//$query = mysql_query($sqlnotes) or die (mysql_error());

//$testno = mysql_fetch_array($query);

//if($testno){
//  $nilai = substr($testno[0], 8);
//  $kode = (int) $nilai;

  //tambahkan sebanyak + 1
//  date_default_timezone_set('Asia/Jakarta');
//  $tgl = date("Ymd");
//  $kode = $kode + 1;
//  $auto_notest = $tgl.str_pad($kode, 4, "0",  STR_PAD_LEFT);
//} else {
//  $auto_notest = $tgl."0001";
//}

function autono_test()
{
    $bln= date("Ym");
    $today= date("Ymd");
    $sqlnotes = mysql_query("SELECT no_test FROM tbl_tq_nokk WHERE substr(no_test,1,6) like '%".$bln."%' ORDER BY no_test DESC LIMIT 1") or die(mysql_error());
    $dt=mysql_num_rows($sqlnotes);
    if ($dt>0) {
        $rd=mysql_fetch_array($sqlnotes);
        $dt=$rd['no_test'];
        $strd=substr($dt, 8, 4);
        $Urutd = (int)$strd;
    } else {
        $Urutd = 0;
    }
    $Urutd = $Urutd + 1;
    $Nold="";
    $nilaid=4-strlen($Urutd);
    for ($i=1;$i<=$nilaid;$i++) {
        $Nold= $Nold."0";
    }
    $no2 =$today.$Nold.$Urutd;
    //$no2 =$today.str_pad($Urutd, 4, "0",  STR_PAD_LEFT);
    return $no2;
}

$sqlCek=mysql_query("SELECT * FROM tbl_tq_nokk WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysql_num_rows($sqlCek);
$rcek=mysql_fetch_array($sqlCek);
$no_tes=$rcek[no_test]+1;
$no_order= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$pelanggan1= isset($_POST['pelanggan']) ? $_POST['pelanggan'] : '';
$no_po= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$noitem= isset($_POST['no_item']) ? $_POST['no_item'] : '';
$nohanger= isset($_POST['no_hanger']) ? $_POST['no_hanger'] : '';
$jns_kain= isset($_POST['jns_kain']) ? $_POST['jns_kain'] : '';
$lebar= isset($_POST['lebar']) ? $_POST['lebar'] : '';
$grms= isset($_POST['grms']) ? $_POST['grms'] : '';
$warna= isset($_POST['warna']) ? $_POST['warna'] : '';
$no_warna= isset($_POST['no_warna']) ? $_POST['no_warna'] : '';
$lot= isset($_POST['lot']) ? $_POST['lot'] : '';
$proses= isset($_POST['proses']) ? $_POST['proses'] : '';
$suhu= isset($_POST['suhu']) ? $_POST['suhu'] : '';
$development= isset($_POST['development']) ? $_POST['development'] : '';
//$con1=mysql_connect("10.0.0.10","dit","4dm1n");
//$db1=mysql_select_db("db_finishing",$con1)or die("Gagal Koneksi ke finishing");
//$qryFin=mysql_query("SELECT * FROM tbl_produksi WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
//$dtFin=mysql_fetch_array($qryFin);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
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
						 onchange="window.location='KainInNewRev-'+this.value" value="<?php echo $_GET[nokk];?>" placeholder="No KK" required >
			  </div>
					</div>
        <div class="form-group">
		  <label for="no_test" class="col-sm-3 control-label">No Test</label>
		  <div class="col-sm-4">
			<input name="no_test" type="text" class="form-control" id="no_test" placeholder="No Test" autocomplete="off" 
			value="<?php if($nokk!=""){echo autono_test(); }else{} ?>" readonly="readonly" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" class="form-control" id="no_order" 
			value="<?php if($cek>0){echo $rcek[no_order];}else if($_POST['no_order']!=""){echo $no_order;}else{echo $r[NoOrder];} ?>" placeholder="No Order" required>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-8">
			<input name="pelanggan" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek[pelanggan];}else if($_POST['pelanggan']!=""){echo $pelanggan1;}else if($r1[partnername]!=""){echo $pelanggan;}else{}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek[no_po];}else if($_POST['no_po']!=""){echo $no_po;}else{echo $r[PONumber];} ?>" placeholder="PO" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
		  <div class="col-sm-3">
			<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
			value="<?php if($_POST['no_hanger']!=""){echo $nohanger;}else{echo $r[HangerNo];}?>" placeholder="No Hanger">  
		  </div>
		  <div class="col-sm-3">
		  <input name="no_item" type="text" class="form-control" id="no_item" 
			value="<?php if($_POST['no_item']!=""){echo $noitem;}else{echo $r[ProductCode];}?>" placeholder="No Item">
		  </div>	
		</div>
		<div class="form-group">
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8">
			  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek[jenis_kain];}else if($_POST['jns_kain']!=""){echo $jns_kain;}else{echo $r[ProductDesc];}?></textarea>
			  </div>
		  </div>	 		
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
      <div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php if($cek>0){echo $rcek[lebar];}else if($_POST['lebar']!=""){echo $lebar;}else if($nokk!=""){echo round($r[Lebar]);}else{} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php if($cek>0){echo $rcek[gramasi];}else if($_POST['grms']!=""){echo $grms;}else if($nokk!=""){echo round($r[Gramasi]);}else{} ?>" placeholder="0" required>
		  </div>		
		</div>		  
		<div class="form-group">
		  <label for="warna" class="col-sm-3 control-label">Warna</label>
		  <div class="col-sm-8">
			<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek[warna];}else if($_POST['warna']!=""){echo $warna;}else{echo $r[Color];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
		  <div class="col-sm-8">
			<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek[no_warna];}else if($_POST['no_warna']!=""){echo $no_warna;}else{echo $r[ColorNo];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Lot</label>
		  <div class="col-sm-2">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek[lot];}else if($_POST['lot']!=""){echo $lot;}else{echo $lotno;} ?>" placeholder="Lot" >
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
                    value="<?php if($_POST['proses']!=""){echo $proses;} ?>" placeholder="Proses" required>
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
					value="<?php if($cek>0){echo $rcek[suhu];}else if($_POST['suhu']!=""){echo $suhu;}else{} ?>" placeholder="Suhu" style="text-align: right;" required>
					<span class="input-group-addon">&deg;C</span>	
				</div>	
		  	</div>				   
		</div>
		<div class="form-group">
		  <label for="development" class="col-sm-3 control-label">Development</label>
		  <div class="col-sm-3">
		  	<div class="input-group">  
                <select name="development" id="development" class="form-control select2" required>
					<option selected="selected" value="">Pilih</option>
					<?php if($_POST['development']!=""){?>
					<option <?php if($_POST['development']!=""){?> selected=selected <?php };?> value="<?php echo $development;?>"><?php echo $development; ?></option>
					<?php }?>
                    <option value="Development">Development</option>
                    <option value="1st Bulk">1st Bulk</option>
                    <option value="Reorder">Reorder</option>
				</select>
            </div>
		  </div>				   
		</div>
	 </div>	
</div>	 
   <div class="box-footer">

   </div>
    <!-- /.box-footer -->
</div>

<?php
$noitem= isset($_POST['no_itemtest']) ? $_POST['no_itemtest'] : '';
$buyer= isset($_POST['buyer']) ? $_POST['buyer'] : '';
$sqlCek1=mysql_query("SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1=mysql_num_rows($sqlCek1);
$rcek1=mysql_fetch_array($sqlCek1);
?>
<?php if($_GET['nokk']!=""){ ?>
<div class="box box-success">
   <div class="box-header with-border">
    <h3 class="box-title">Detail Testing</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body"> 
  	<div class="col-md-12">
		<div class="form-group">
          	<label for="buyer" class="col-sm-2 control-label">Buyer</label>
          	<div class="col-sm-3">
			  	<input name="buyer" type="text" style="text-transform:uppercase" class="form-control" id="buyer" placeholder="Buyer"
			  	value="<?php echo $buyer; ?>" required>
		  	</div>
		</div>
		<!--<div class="form-group">
			<label for="no_itemtest" class="col-sm-2 control-label">No Item</label>
          	<div class="col-sm-3">
			  	<input name="no_itemtest" type="text" style="text-transform:uppercase" class="form-control" id="no_itemtest" placeholder="No Item"
			  	value="<?php if($rcek[no_item]!=""){echo $rcek[no_item];}else if($_POST['no_item']!=""){echo $noitem;}else{echo $r[ProductCode];}?>" required>
		  	</div>
    	</div>-->
		<div class="form-group">
			<label for="no_testmaster" class="col-sm-2 control-label">No Test</label>
          	<div class="col-sm-3">
			  	<input name="no_testmaster" type="text" style="text-transform:uppercase" class="form-control" id="no_testmaster" placeholder="No Test"
			  	value="<?php echo $auto_notest; ?>" readonly>
		  	</div>
    	</div>
	</div>
<?php if($_POST['buyer']!=""){ ?>
<div class="col-md-12">
<!-- Custom Tabs -->
				<?php
					$qMB=mysql_query("SELECT * FROM tbl_masterbuyer_test WHERE buyer='$_POST[buyer]'");
					$cekMB=mysql_num_rows($qMB);
					
                if($cekMB>0){
                    while($dMB=mysql_fetch_array($qMB)){
                    $detail=explode(",",$dMB['physical']);
                    $detail1=explode(",",$dMB['functional']);
                    $detail2=explode(",",$dMB['colorfastness']);
				?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY" <?php if(in_array("FLAMMABILITY",$detail)){echo "checked";} ?>> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT" <?php if(in_array("FIBER CONTENT",$detail)){echo "checked";} ?>> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT" <?php if(in_array("FABRIC COUNT",$detail)){echo "checked";} ?>> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW" <?php if(in_array("BOW & SKEW",$detail)){echo "checked";} ?>> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE" <?php if(in_array("PILLING MARTINDLE",$detail)){echo "checked";} ?>> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY" <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "checked";} ?>> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX" <?php if(in_array("PILLING BOX",$detail)){echo "checked";} ?>> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER" <?php if(in_array("PILLING RANDOM TUMBLER",$detail)){echo "checked";} ?>> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION" <?php if(in_array("ABRATION",$detail)){echo "checked";} ?>> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE" <?php if(in_array("SNAGGING MACE",$detail)){echo "checked";} ?>> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD" <?php if(in_array("SNAGGING POD",$detail)){echo "checked";} ?>> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG" <?php if(in_array("BEAN BAG",$detail)){echo "checked";} ?>> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH" <?php if(in_array("BURSTING STRENGTH",$detail)){echo "checked";} ?>> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS" <?php if(in_array("THICKNESS",$detail)){echo "checked";} ?>> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY" <?php if(in_array("STRETCH & RECOVERY",$detail)){echo "checked";} ?>> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH" <?php if(in_array("GROWTH",$detail)){echo "checked";} ?>> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE" <?php if(in_array("APPEARANCE",$detail)){echo "checked";} ?>> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE" <?php if(in_array("HEAT SHRINKAGE",$detail)){echo "checked";} ?>> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ" <?php if(in_array("FIBRE/FUZZ",$detail)){echo "checked";} ?>> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS" <?php if(in_array("PILLING LOCUS",$detail)){echo "checked";} ?>> Pilling Locus
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING" <?php if(in_array("WICKING",$detail1)){echo "checked";} ?>> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY" <?php if(in_array("ABSORBENCY",$detail1)){echo "checked";} ?>> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME" <?php if(in_array("DRYING TIME",$detail1)){echo "checked";} ?>> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT" <?php if(in_array("WATER REPPELENT",$detail1)){echo "checked";} ?>> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH" <?php if(in_array("PH",$detail1)){echo "checked";} ?>> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE" <?php if(in_array("SOIL RELEASE",$detail1)){echo "checked";} ?>> Soil Release 
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING" <?php if(in_array("WASHING",$detail2)){echo "checked";} ?>> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID" <?php if(in_array("PERSPIRATION ACID",$detail2)){echo "checked";} ?>> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE" <?php if(in_array("PERSPIRATION ALKALINE",$detail2)){echo "checked";} ?>> Perpiration Fastness Alkaline
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER" <?php if(in_array("WATER",$detail2)){echo "checked";} ?>> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING" <?php if(in_array("CROCKING",$detail2)){echo "checked";} ?>> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING" <?php if(in_array("PHENOLIC YELLOWING",$detail2)){echo "checked";} ?>> Phenolic Yellowing 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT" <?php if(in_array("LIGHT",$detail2)){echo "checked";} ?>> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST" <?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail2)){echo "checked";} ?>> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION" <?php if(in_array("COLOR MIGRATION",$detail2)){echo "checked";} ?>> Color Migration Fastness
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION" <?php if(in_array("LIGHT PERSPIRATION",$detail2)){echo "checked";} ?>> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA" <?php if(in_array("SALIVA",$detail2)){echo "checked";} ?>> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING" <?php if(in_array("BLEEDING",$detail2)){echo "checked";} ?>> Bleeding 
						</label>
					</div>
                    <?php } ?>
				</form>
                
                <?php }else{ ?>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					 <div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY"> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT"> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT"> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW"> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE"> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX"> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER"> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION"> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE"> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD"> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG"> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH"> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS"> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY"> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH"> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE"> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE"> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ"> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS"> Pilling Locus
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
					<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING"> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY"> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME"> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT"> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH"> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE"> Soil Release 
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING"> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID"> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE"> Perpiration Fastness Alkaline
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER"> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING"> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING"> Phenolic Yellowing 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT"> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST"> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION"> Color Migration Fastness
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION"> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA"> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING"> Bleeding
						</label>
					</div>
				</form>
			<?php } ?>
</div>
<!-- /.col -->
<?php } ?>
</div>
  <div class="box-footer">
  <button type="submit" value="cari" class="btn btn-info">Cari Data</button>
  <?php if($_GET['nokk']!=""){ ?> 	
   <button type="submit" class="btn btn-primary pull-left" <?php if($_POST[buyer]==""){echo "disabled";}?> name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
   <a href="pages/cetak/cetak_label_new.php?idkk=<?php echo $_GET[nokk]; ?>&po=<?php echo $PO; ?>&item=<?php echo $Item; ?>&warna=<?php echo $Warna; ?>&buyer=<?php echo $Langganan; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a> 
   <?php } ?>
   </div>
    <!-- /.box-footer -->
</div>
<?php } ?>
</form>
						
                    </div>
                </div>
            </div>
        </div>
<?php
if($_POST[save]=="save" and $cekMB>0){
	//$con=mysql_connect("localhost","root","");
	//$db=mysql_select_db("db_qc",$con)or die("Gagal Koneksi");	
	$con=mysql_connect("10.0.0.10","dit","4dm1n");
    $db=mysql_select_db("db_qc",$con)or die("Gagal Koneksi");
function nourut()
{
    $format = date("ym");
    $sql=mysql_query("SELECT no_id FROM tbl_tq_nokk WHERE substr(no_id,1,4) like '%".$format."%' ORDER BY no_id DESC LIMIT 1 ") or die(mysql_error());
    $d=mysql_num_rows($sql);
    if ($d>0) {
        $r=mysql_fetch_array($sql);
        $d=$r['no_id'];
        $str=substr($d, 4, 4);
        $Urut = (int)$str;
    } else {
        $Urut = 0;
    }
    $Urut = $Urut + 1;
    $Nol="";
    $nilai=4-strlen($Urut);
    for ($i=1;$i<=$nilai;$i++) {
        $Nol= $Nol."0";
    }
    $no1 =$format.$Nol.$Urut;
    return $no1;
}
$nourut=nourut();	
	  $warna=str_replace("'","''",$_POST[warna]);
	  $nowarna=str_replace("'","''",$_POST[no_warna]);	
	  $jns=str_replace("'","''",$_POST[jns_kain]);
	  $po=str_replace("'","''",$_POST[no_po]);
	  $lot=trim($_POST[lot]);
      $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $noitem=strtoupper($_POST['no_itemtest']);
	  $notestmaster=$_POST['no_testmaster'];
	  $target = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}  
  	  $sqlData=mysql_query("INSERT INTO tbl_tq_nokk SET 
	  	  no_id='$nourut',	
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
          buyer='$buyer',
		  development='$_POST[development]',
		  tgl_target='$target',
		  tgl_update=now()");
		$sqlData2=mysql_query("INSERT INTO tbl_master_test SET
			buyer='$buyer',
			no_testmaster='$notestmaster',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			tgl_update=now()");
		$sqlData3=mysql_query("UPDATE tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			tgl_update=now()
			WHERE buyer='$buyer'");	 	  
	  
		if($sqlData2){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_new.php?idkk=$_GET[nokk]','_blank');	
	 window.location.href='KainInNewRev';
	 
  }
});</script>";
		}
				
}else if($_POST[save]=="save" AND $_POST[physical]=="" AND $_POST[functional]=="" AND $_POST[colorfastness]==""){
	echo "<script>swal({
		title: 'Data Testing Tidak Boleh Kosong!',   
		text: 'Klik Ok untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		   window.location.href='KainInNewRev';
		   
		}
	  });</script>";
 }else if($_POST[save]=="save"){
	function nourut()
{
    $format = date("ym");
    $sql=mysql_query("SELECT no_id FROM tbl_tq_nokk WHERE substr(no_id,1,4) like '%".$format."%' ORDER BY no_id DESC LIMIT 1 ") or die(mysql_error());
    $d=mysql_num_rows($sql);
    if ($d>0) {
        $r=mysql_fetch_array($sql);
        $d=$r['no_id'];
        $str=substr($d, 4, 4);
        $Urut = (int)$str;
    } else {
        $Urut = 0;
    }
    $Urut = $Urut + 1;
    $Nol="";
    $nilai=4-strlen($Urut);
    for ($i=1;$i<=$nilai;$i++) {
        $Nol= $Nol."0";
    }
    $no1 =$format.$Nol.$Urut;
    return $no1;
}
	  $nourut=nourut();	
	  $warna=str_replace("'","''",$_POST[warna]);
	  $nowarna=str_replace("'","''",$_POST[no_warna]);	
	  $jns=str_replace("'","''",$_POST[jns_kain]);
	  $po=str_replace("'","''",$_POST[no_po]);
	  $lot=trim($_POST[lot]);
	  $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $noitem=strtoupper($_POST['no_itemtest']);
	  $notestmaster=$_POST['no_testmaster'];
	  $target = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}   
  	  $sqlData=mysql_query("INSERT INTO tbl_tq_nokk SET 
	  	  no_id='$nourut',	
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
          buyer='$buyer',
		  development='$_POST[development]',
		  tgl_target='$target',
		  tgl_update=now()");
		$sqlData1=mysql_query("INSERT INTO tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			tgl_update=now()
		");
		$sqlData2=mysql_query("INSERT INTO tbl_master_test SET
			buyer='$buyer',
			no_testmaster='$notestmaster',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			tgl_update=now()
		");	 	  
	  
		if($sqlData2){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_new.php?idkk=$_GET[nokk]','_blank');	
	 window.location.href='KainInNewRev';
	 
  }
});</script>";
		}
	}

?>
