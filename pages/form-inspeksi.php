<script>
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}	

function aktif_staff(){
	if(document.forms['form1']['personil'].value == "bayu" || document.forms['form1']['personil'].value == "putri" ){
		document.form1.acc_staff.removeAttribute("disabled");
		document.form1.acc_staff.setAttribute("required",true);
	}else{
		document.form1.acc_staff.setAttribute("disabled",true);
		document.form1.acc_staff.removeAttribute("required");
		}
}
function aktif(){
		if(document.forms['form1']['manual'].checked == true){
		document.form1.nokk.setAttribute("readonly",true);
		document.form1.nokk.removeAttribute("required");		
		document.form1.nokk.value="";	
		document.form1.datepicker2.setAttribute("readonly",true);
		document.form1.datepicker2.removeAttribute("required");
		document.form1.datepicker2.value="";	
		document.form1.langganan.setAttribute("readonly",true);
		document.form1.langganan.removeAttribute("required");
		document.form1.langganan.value="";	
		document.form1.buyer.setAttribute("readonly",true);
		document.form1.buyer.removeAttribute("required");
		document.form1.buyer.value="";	
		document.form1.no_order.setAttribute("readonly",true);
		document.form1.no_order.removeAttribute("required");
		document.form1.no_order.value="";	
		document.form1.no_po.setAttribute("readonly",true);
		document.form1.no_po.removeAttribute("required");
		document.form1.no_po.value="";	
		document.form1.no_hanger.setAttribute("readonly",true);
		document.form1.no_hanger.removeAttribute("required");
		document.form1.no_hanger.value="";	
		document.form1.no_item.setAttribute("readonly",true);
		document.form1.no_item.removeAttribute("required");
		document.form1.no_item.value="";	
		document.form1.jns_kain.setAttribute("readonly",true);
		document.form1.jns_kain.removeAttribute("required");
		document.form1.jns_kain.value="";	
		document.form1.lebar.setAttribute("readonly",true);
		document.form1.lebar.removeAttribute("required");
		document.form1.lebar.value="";	
		document.form1.grms.setAttribute("readonly",true);
		document.form1.grms.removeAttribute("required");
		document.form1.grms.value="";	
		document.form1.warna.setAttribute("readonly",true);
		document.form1.warna.removeAttribute("required");
		document.form1.warna.value="";	
		document.form1.no_warna.setAttribute("readonly",true);
		document.form1.no_warna.removeAttribute("required");
		document.form1.no_warna.value="";	
		document.form1.qty1.setAttribute("readonly",true);
		document.form1.qty1.removeAttribute("required");
		document.form1.qty1.value="";	
		document.form1.qty2.setAttribute("readonly",true);
		document.form1.qty2.removeAttribute("required");
		document.form1.qty2.value="";	
		document.form1.satuan1.setAttribute("disabled",true);
		document.form1.satuan1.removeAttribute("required");
		document.form1.satuan1.value="";	
		document.form1.lot.setAttribute("readonly",true);
		document.form1.lot.removeAttribute("required");
		document.form1.lot.value="";	
		document.form1.qty3.setAttribute("readonly",true);
		document.form1.qty3.removeAttribute("required");
		document.form1.qty3.value="";	
		document.form1.qty4.setAttribute("readonly",true);
		document.form1.qty4.removeAttribute("required");
		document.form1.qty4.value="";	
		document.form1.loading.setAttribute("readonly",true);
		document.form1.loading.removeAttribute("required");
		document.form1.loading.value="";	
		document.form1.no_rajut.setAttribute("readonly",true);
		document.form1.no_rajut.removeAttribute("required");
		document.form1.no_rajut.value="";	
		document.form1.kategori_warna.setAttribute("disabled",true);
		document.form1.kategori_warna.removeAttribute("required");
		document.form1.kategori_warna.value="";	
		document.form1.no_resep.setAttribute("readonly",true);
		document.form1.no_resep.removeAttribute("required");
		document.form1.no_resep.value="";
		document.form1.resep.setAttribute("disabled",true);
		document.form1.resep.removeAttribute("required");
		document.form1.resep.value="";	
		}
		else{
		document.form1.nokk.removeAttribute("readonly");
		document.form1.nokk.setAttribute("required",true);	
		document.form1.datepicker2.removeAttribute("readonly");
		document.form1.datepicker2.setAttribute("required",true);	
		document.form1.langganan.removeAttribute("readonly");
		document.form1.langganan.setAttribute("required",false);	
		document.form1.buyer.removeAttribute("readonly");
		document.form1.buyer.setAttribute("required",false);
		document.form1.no_order.removeAttribute("readonly");
		document.form1.no_order.setAttribute("required",false);	
		document.form1.no_po.removeAttribute("readonly");
		document.form1.no_po.setAttribute("required",false);
		document.form1.no_hanger.removeAttribute("readonly");
		document.form1.no_hanger.setAttribute("required",false);
		document.form1.no_item.removeAttribute("readonly");
		document.form1.no_item.setAttribute("required",false);
		document.form1.jns_kain.removeAttribute("readonly");
		document.form1.jns_kain.setAttribute("required",false);
		document.form1.lebar.removeAttribute("readonly");
		document.form1.lebar.setAttribute("required",true);	
		document.form1.grms.removeAttribute("readonly");
		document.form1.grms.setAttribute("required",true);
		document.form1.warna.removeAttribute("readonly");
		document.form1.warna.setAttribute("required",false);
		document.form1.no_warna.removeAttribute("readonly");
		document.form1.no_warna.setAttribute("required",false);
		document.form1.qty1.removeAttribute("readonly");
		document.form1.qty1.setAttribute("required",true);
		document.form1.qty2.removeAttribute("readonly");
		document.form1.qty2.setAttribute("required",true);
		document.form1.satuan1.removeAttribute("disabled");
		document.form1.satuan1.setAttribute("required",true);	
		document.form1.lot.removeAttribute("readonly");
		document.form1.lot.setAttribute("required",true);	
		document.form1.qty3.removeAttribute("readonly");
		document.form1.qty3.setAttribute("required",true);
		document.form1.qty4.removeAttribute("readonly");
		document.form1.qty4.setAttribute("required",true);
		document.form1.loading.removeAttribute("readonly");
		document.form1.loading.setAttribute("required",true);
		document.form1.no_rajut.removeAttribute("readonly");
		document.form1.no_rajut.setAttribute("required",false);
		document.form1.kategori_warna.removeAttribute("disable");
		document.form1.kategori_warna.setAttribute("required",false);
		document.form1.no_resep.removeAttribute("readonly");
		document.form1.no_resep.setAttribute("required",false);
		document.form1.resep.removeAttribute("disabled");
		document.form1.resep.setAttribute("required",false);	
		}
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
$format = date("ymd");
$sql=mysqli_query($con,"SELECT nokk FROM tbl_schedule WHERE substr(nokk,1,6) like '%".$format."%' ORDER BY nokk DESC LIMIT 1 ") or die (mysqli_error());
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
				soda.RefNo as DetailRefNo,jo.DocumentNo as NoOrder,soda.PONumber,
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
					soda.RefNo,pcb.DocumentNo,soda.HangerNo,
					pcb.ID, pcb.DocumentNo, pcb.Gross,soda.PONumber,pp.ProductCode,
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
$pelanggan=$r1['partnername'];
$buyer=$r2['partnername'];
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
			$rowgp=sqlsrv_fetch_assoc($sqlgetparent);
			
			//$nomLot=substr("$row2[LotNo]",0,1);
			$nomLot=$rowgp['LotNo'];
			$nomorLot="$nomLot/K$r[ChildLevel]";				
								
		}else{
			$nomorLot=$r['LotNo'];
				
		}

		$sqlLot1="Select count(*) as TotalLot From ProcessControlBatches where PCID='$r[PCID]' and RootID='0' and LotNo < '1000'";
		$qryLot1 = sqlsrv_query($conn,$sqlLot1) or die('A error occured : ');							
		$rowLot=sqlsrv_fetch_assoc($qryLot1);
		$lotno=$rowLot['TotalLot']."-".$nomorLot;
		

}
$sqlCek=mysqli_query($con,"SELECT * FROM tbl_schedule WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
$sqlCek1=mysqli_query($con,"SELECT * FROM tbl_schedule WHERE nokk='$nokk' AND not status='selesai' ORDER BY id DESC LIMIT 1");
$cek1=mysqli_num_rows($sqlCek1);

?>	
<?php
$Kapasitas	= isset($_POST['kapasitas']) ? $_POST['kapasitas'] : '';
$TglMasuk	= isset($_POST['tglmsk']) ? $_POST['tglmsk'] : '';
$Item		= isset($_POST['item']) ? $_POST['item'] : '';
$Warna		= isset($_POST['warna']) ? $_POST['warna'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
?>
<div class="row">
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
	<div class="col-md-3">
	<div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
		
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='FormSchedule-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
		  </div>
	    </div>
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="no_rol" type="text" class="form-control" id="no_rol" 
                   value="" placeholder="No Roll" required >
		  </div>
	    </div>
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='FormSchedule-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
		  </div>
	    </div>
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="no_rol" type="text" class="form-control" id="no_rol" 
                   value="" placeholder="No Roll" required >
		  </div>
	    </div>
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='FormSchedule-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
		  </div>
	    </div>
		<div class="form-group">
                  <div class="col-sm-12">
				  <input name="no_rol" type="text" class="form-control" id="no_rol" 
                   value="" placeholder="No Roll" required >
		  </div>
	    </div>
		</div>
	</div>
	</div>	
		
	</form>	
	<div class="col-md-9">
	<div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Yarn Defect</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
		
		</div>
	</div>
	</div>
	<div class="col-md-9">
	<div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Construction Defect</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
		
		</div>
	</div>
	</div>
	<div class="col-md-9">
	<div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Input Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
		
		</div>
	</div>
	</div>
	<div class="col-md-9">
	<div class="box box-info">
  	<div class="box-header with-border">
    <h3 class="box-title">Input Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 	<div class="box-body"> 
		
		</div>
	</div>
	</div>
</div>	          

<?php 
	if($_POST['save']=="save"){
	  $qryCek=mysqli_query($con,"SELECT * from tbl_schedule WHERE `status`='sedang jalan' and  no_mesin='$_POST[no_mc]'");
	  $row=mysqli_num_rows($qryCek);
	  $qryCekN=mysqli_query($con,"SELECT * from tbl_schedule WHERE nokk='$_POST[nokk]' and  no_mesin='$_POST[no_mc]'");
	  $rowN=mysqli_num_rows($qryCekN);	
	  if($row>0 and $_POST['no_urut']=="1"){
		echo "<script> swal({
            title: 'Tidak bisa input urutan ke-`1`, mesin masih jalan',
            text: ' Klik OK untuk Input No Urut kembali',
            type: 'warning'
        }, function(){
            window.location='';
        });</script>";  
	  }	else if($rowN>0 ){	  
		 echo "<script> swal({
            title: 'Tidak bisa input, NoKK sudah di mesin ini',
            text: ' Klik OK untuk Input No Urut kembali',
            type: 'warning'
        }, function(){
            window.location='';
        });</script>"; 
	  }	else {
	  if($_POST['nokk']!=""){$kartu=$_POST['nokk'];}else{$kartu=$nou;}	
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $catatan=str_replace("'","''",$_POST['catatan']);	  
	  $lot=trim($_POST['lot']);	
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_schedule SET
		  nokk='$kartu',
		  langganan='$_POST[langganan]',
		  buyer='$_POST[buyer]',
		  no_order='$_POST[no_order]',
		  po='$po',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  jenis_kain='$jns',
		  tgl_delivery='$_POST[tgl_delivery]',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  warna='$warna',
		  no_warna='$nowarna',
		  qty_order='$_POST[qty1]',
		  pjng_order='$_POST[qty2]',
		  satuan_order='$_POST[satuan1]',
		  lot='$lot',
		  rol='$_POST[qty3]',
		  bruto='$_POST[qty4]',
		  shift='$_POST[shift]',
		  g_shift='$_POST[g_shift]',
		  no_mesin='$_POST[no_mc]',
		  no_urut='$_POST[no_urut]',
		  no_sch='$_POST[no_urut]',
		  proses='$_POST[proses]',
		  revisi='$_POST[revisi]',
		  ket_status='$_POST[ket]',
		  ket_kain='$_POST[ket_kain]',
		  tgl_masuk=now(),
		  personil='$_POST[personil]',
		  target='$_POST[target]',
		  catatan='$catatan',
		  tgl_update=now()",$con);	 	  
	  
		if($sqlData){
			// echo "<script>alert('Data Tersimpan');</script>";
			// echo "<script>window.location.href='?p=Input-Data-KJ;</script>";
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Schedule'; 
  }
});</script>";
		}
	  }
			
	}
    if($_POST['update']=="update"){
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $catatan=str_replace("'","''",$_POST['catatan']);	
	  $lot=trim($_POST['lot']);		
  	  $sqlData=mysqli_query("UPDATE tbl_schedule SET 
		  no_mesin='$_POST[no_mc]',
		  no_urut='$_POST[no_urut]',
		  no_sch='$_POST[no_urut]',
		  proses='$_POST[proses]',
		  revisi='$_POST[revisi]',
		  shift='$_POST[shift]',
		  g_shift='$_POST[g_shift]',
		  ket_status='$_POST[ket]',
		  personil='$_POST[personil]',
		  target='$_POST[target]',
		  catatan='$catatan',
		  tgl_stop=now(),
		  tgl_update=now()
		  WHERE nokk='$_POST[nokk]'",$con);	 	  
	  
		if($sqlData){
			// echo "<script>alert('Data Telah Diubah');</script>";
			// echo "<script>window.location.href='?p=Input-Data-KJ;</script>";
			echo "<script>swal({
  title: 'Data Telah DiUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Schedule'; 
  }
});</script>";
		}
		
			
	}
?>
