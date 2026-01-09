<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
	if($_POST['send']=="send"){
$ket=str_replace("'","''",$_POST['ket']);
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.indotaichen.com'; //mail.usmanas.web.id / mail.indotaichen.com
$mail->SMTPAuth = true;
$mail->Username = 'dept.it@indotaichen.com'; //usman@usmanas.web.id / dept.it@indotaichen.com
$mail->Password = 'D1t2017'; //fariz001 / D1t2017
$mail->SMTPSecure = 'STARTTLS';
$mail->Port = 587;

$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

// Menambahkan penerima
$mail->addAddress($_POST['untuk']);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');
// Menambahkan cc atau bcc 
$cc=str_replace("'","''",$_POST['cc']);		
$mail->addCC($cc);
//$mail->addBCC('usmanas.as@gmail.com');

// Subjek email
$mail->Subject = ''.$_POST['subjek'].'';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent =''.$_POST['editor1'].'';
$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    // echo 'Pesan telah terkirim';
}
	}
	if($_POST['save']=="save"){
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $styl=str_replace("'","''",$_POST['styl']);	
	  $po=str_replace("'","''",$_POST['no_po']);
	  $masalah=str_replace("'","''",$_POST['masalah']);
	  $cekwarna=str_replace("'","''",$_POST['cekwarna']);
	  $ket1=str_replace("'","''",$_POST['ket']);	
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_qcf SET 
		  nokk='$_POST[nokk]',
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_po='$po',
		  no_ko='$_POST[no_ko]',
		  jenis_kain='$jns',
		  styl='$styl',
		  berat_order='$_POST[qty1]',
		  panjang_order='$_POST[qty2]',
		  satuan_order='$_POST[satuan1]',
		  rol_bruto='$_POST[qty3]',
		  berat_bruto='$_POST[qty4]',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lebar_ins='$_POST[inslebar]',
		  gramasi_ins='$_POST[insgrms]',
		  lebar_fin='$_POST[finlebar]',
		  gramasi_fin='$_POST[fingrms]',
		  susut_p='$_POST[pp]',
		  susut_l='$_POST[pl]',
		  susut_s='$_POST[ps]',
		  berat_extra='$_POST[extra]',
		  panjang_extra='$_POST[extra_p]',
		  lot='$_POST[lot]',
		  rol='$_POST[rol]',
		  warna='$warna',
		  no_warna='$nowarna',
		  cek_warna='$cekwarna',
		  netto='$_POST[netto]',
		  panjang='$_POST[panjang]',
		  satuan='$_POST[satuan2]',
		  sisa='$_POST[sisa]',
		  tgl_masuk='$_POST[tglmsk]',
		  tgl_pack='$_POST[tglpk]',
		  tgl_ins='$_POST[tglins]',
		  tgl_fin='$_POST[tglfin]',
		  tgl_delivery='$_POST[tgl_delivery]',
		  masalah='$masalah',
		  ket='$ket1',
		  tgl_update=now()");	 	  
	  
		if($sqlData){
			echo "<script>alert('Data Tersimpan');</script>";
			echo "<script>window.location.href='?p=Input-Data&nokk=$_GET[nokk];</script>";
		}
		
			
	}
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
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate
				
			from
				SalesOrders so inner join
				JobOrders jo on jo.SOID=so.ID inner join
				SODetails sod on so.ID = sod.SOID inner join
				SODetailsAdditional soda on sod.ID = soda.SODID left join
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
	tgl_mulai,jml_netto,netto,panjang
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'INSPEKSI'
ORDER BY id ASC LIMIT 1");
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
$rcek=mysqli_fetch_array($sqlCek);
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
                  <label for="no_po" class="col-sm-3 control-label">No KK</label>
                  <div class="col-sm-4">
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='?p=Input-Data&nokk='+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
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
                  <label for="no_po" class="col-sm-3 control-label">PO</label>
                  <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" 
                    value="<?php if($cek>0){echo $rcek['no_po'];}else{echo $r['PONumber'];} ?>" placeholder="PO" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_hanger" class="col-sm-3 control-label">No Hanger</label>
                  <div class="col-sm-5">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" 
                    value="<?php if($cek>0){echo $rcek['no_hanger'];}else{echo $r['HangerNo'];}?>" placeholder="No Hanger" >
                  </div>				   
                </div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{echo $r['ProductDesc'];}?></textarea>
					  </div>
                  </div>
		        <div class="form-group">
                  <label for="styl" class="col-sm-3 control-label">Style</label>
                  <div class="col-sm-8">
                    <input name="styl" type="text" class="form-control" id="styl" 
                    value="<?php if($cek>0){echo $rcek['styl'];} ?>" placeholder="Style" required>
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
							  </select>
					    </span>
					</div>	
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="jml_bruto" class="col-sm-3 control-label">Jml Bruto</label>
                  <div class="col-sm-2">
                    <input name="qty3" type="text" class="form-control" id="qty3" 
                    value="<?php if($cek>0){echo $rcek['rol_bruto'];}else{echo round($r['RollCount']);} ?>" placeholder="0.00" required>
                  </div>
				  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty4" type="text" class="form-control" id="qty4" 
                    value="<?php if($cek>0){echo $rcek['berat_bruto'];}else{echo round($r['Weight'],2);} ?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">KGs</span>
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
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else{echo $r['Color'];}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" 
                    value="<?php if($cek>0){echo $rcek['lot'];}else{echo $lotno;} ?>" placeholder="Lot" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="rol" class="col-sm-3 control-label">Rol</label>
                  <div class="col-sm-2">
                    <input name="rol" type="text" class="form-control" id="rol" 
                    value="<?php if($cek>0){echo $rcek['rol'];}else{echo $sPack['jml_netto'];}?>" placeholder="0" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="netto" class="col-sm-3 control-label">Netto</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="netto" type="text" class="form-control" id="netto" 
                    value="<?php if($cek>0){echo $rcek['netto'];}else{echo $sPack['netto'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="panjang" class="col-sm-3 control-label">Panjang</label>
                  <div class="col-sm-4">
					  <div class="input-group">
                    <input name="panjang" type="text" class="form-control" id="panjang" 
                    value="<?php if($cek>0){echo $rcek['panjang'];}else{echo $sPack['panjang'];}?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan2" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
							  </select>
					    </span></div>
					  </div>
                  </div>
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
	  <div class="form-group">
                  <label for="sisa" class="col-sm-3 control-label">Sisa</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="sisa" type="text" class="form-control" id="sisa" 
                    value="<?php if($cek>0){echo $rcek['sisa'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
	  <div class="form-group">
                  <label for="finl_g" class="col-sm-3 control-label">Fin Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="finlebar" type="text" class="form-control" id="finlebar" 
                    value="<?php if($cek>0){echo $rcek['lebar_fin'];}?>" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="fingrms" type="text" class="form-control" id="fingrms" 
                    value="<?php if($cek>0){echo $rcek['gramasi_fin'];}?>" placeholder="0" required>
                  </div>		
                </div>
	<div class="form-group">
                  <label for="insl_g" class="col-sm-3 control-label">Ins Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="inslebar" type="text" class="form-control" id="inslebar" 
                    value="<?php if($cek>0){echo $rcek['lebar_ins'];}?>" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="insgrms" type="text" class="form-control" id="insgrms" 
                    value="<?php if($cek>0){echo $rcek['gramasi_ins'];}?>" placeholder="0" required>
                  </div>		
                </div>	  
	  <div class="form-group">
        <label for="tglfin" class="col-sm-3 control-label">Tgl Finishing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglfin" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_fin'];}?>" required/>
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label for="tglins" class="col-sm-3 control-label">Tgl Inspeksi</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglins" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_ins'];}else{echo $sInsp['tgl_mulai'];} ?>" />
          </div>
        </div>
	  </div>
	  <div class="form-group">
        <label for="tglpk" class="col-sm-3 control-label">Tgl Packing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglpk" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_pack'];}else{echo $sPack['tgl_mulai'];}?>" required/>
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label for="tglmsk" class="col-sm-3 control-label">Tgl Masuk</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglmsk" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_masuk'];}?>" />
          </div>
        </div>
	  </div>
	  <div class="form-group">
                  <label for="penyusutan" class="col-sm-3 control-label">Penyusutan</label>
                  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="pp" type="text" class="form-control" id="pp" 
                    value="<?php if($cek>0){echo $rcek['susut_p'];}?>" placeholder="P" required>
					<span class="input-group-addon">%</span>	
					</div>	
                  </div>
				  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="pl" type="text" class="form-control" id="pl" 
                    value="<?php if($cek>0){echo $rcek['susut_l'];}?>" placeholder="L" required>
					<span class="input-group-addon">%</span>
					</div>	
                  </div>
		  		  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="ps" type="text" class="form-control" id="ps" 
                    value="<?php if($cek>0){echo $rcek['susut_s'];}?>" placeholder="S" required>
					<span class="input-group-addon">%</span>
					</div>
                  </div>	
      </div>
		  <div class="form-group">
                  <label for="cekwarna" class="col-sm-3 control-label">Cek Warna</label>
                  <div class="col-sm-8">
                    <textarea name="cekwarna" class="form-control" id="cekwarna" placeholder="Cek Warna"><?php if($cek>0){echo $rcek['cek_warna'];}else{echo $sWarna['status']." ".$sWarna['tgl_update'];} ?></textarea>  
                  </div>				   
                </div>
		    <div class="form-group">
                  <label for="extra" class="col-sm-3 control-label">Extra</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="extra" type="text" class="form-control" id="extra" 
                    value="<?php if($cek>0){echo $rcek['berat_extra'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>	
				<div class="col-sm-4">
					  <div class="input-group">
                    <input name="extra_p" type="text" class="form-control" id="extra_p" 
                    value="<?php if($cek>0){echo $rcek['panjang_extra'];}?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan1" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
							  </select>
					    </span></div>
					  </div>
                </div>
		 		
		  <div class="form-group">
                  <label for="ket" class="col-sm-3 control-label">Ket</label>
                  <div class="col-sm-8">
                    <textarea name="ket" class="form-control" id="ket" placeholder="Keterangan"><?php if($cek>0){ echo $rcek['ket'];}?></textarea>  
                  </div>				   
          </div>
		  <div class="form-group">
                  <label for="masalah" class="col-sm-3 control-label">Masalah</label>
                  <div class="col-sm-8">
				  <textarea name="masalah" class="form-control" id="masalah" placeholder="Masalah"><?php if($cek>0){ echo $rcek['masalah'];}?></textarea>  
                  </div>				   
          </div>
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['no_warna'];}else{echo $r['ColorNo'];}?>" name="no_warna"> <input type="hidden" value="<?php if($cek>0){echo $rcek['pelanggan'];}else{echo $pelanggan;}?>" name="pelanggan">
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['no_ko'];}else{echo $rKO['KONo'];}?>" name="no_ko">
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['tgl_delivery'];}else{echo date('Y-m-d', strtotime($r['RequiredDate']));}?>" name="tgl_delivery">
	 </div>
	
</div>	 
   <div class="box-footer">
   <button type="submit" class="btn btn-primary pull-left" name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
   <?php if($cek>0){ ?>	   
   <a href="#" data-toggle="modal" data-target="#myModal"><i class="btn btn-info pull-right">Send to Email</i> </a></button>
   <?php } ?>
   </div>
    <!-- /.box-footer -->
  




</div>
</form>
<div class="modal fade modal-3d-slit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 80%;">
				<form action="" method="post" enctype="multipart/form-data" name="form2">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Email</h4>
						
                    </div>
                    <div class="modal-body">
						
              <div class="form-group">
                <input class="form-control" placeholder="To:" name="untuk" required>
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Cc:" name="cc">
              </div>			
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subjek" required>
              </div>
              <div class="form-group">
                    <textarea id="editor1" name="editor1" rows="10" cols="80"><p>Dear mkt team,</p>
<p>Mohon di tindak lanjuti untuk  cek stock ataupun ganti kain dengan depatement terkait </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Ditunggu feedbacknya segera </p>
<p>&nbsp;</p>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="723" nowrap colspan="4" valign="bottom"><p align="center"><u>BON PENGHUBUNG LANGGANAN PT. INDO    TAICHEN</u></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>NO. BPP</p></td>
    <td width="723" nowrap valign="bottom"><p align="right">&nbsp;</p></td>
    <td width="723" nowrap valign="bottom"><p>LOT </p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['lot'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>CUSTOMER</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['pelanggan'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>UKURAN </p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['lebar']."X".$rcek['gramasi'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>PO</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_po'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>ROLL</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['rol'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>ORDER</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_order'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>QTY</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['berat_order'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>JENIS KAIN</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['jenis_kain'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>PABRIK RAJUT</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_ko'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['warna'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>DELIVERY KAIN    JADI</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['tgl_delivery'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>NO WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_warna'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>DEPT PENANGGUNG JWB</p></td>
    <td width="723" nowrap valign="bottom"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="723" valign="top" nowrap><p>MASALAH KAIN</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
    <td width="723" colspan="2" valign="top"><p align="center"><?php echo $rcek['masalah'];?></p></td>
    <td width="723" valign="top"><p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap colspan="4"><p>&nbsp;</p>      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap colspan="4" valign="bottom"><p><strong>&nbsp;</strong></p>      <p>&nbsp;</p></td>
  </tr>
 
</table>
<p>&nbsp;</p>
<p><strong>Thanks &amp; b&rsquo;regards</strong><br>
  <strong>Tenny/aisyah</strong></p>
                    </textarea>
              </div>
						
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <button type="submit" class="btn btn-success pull-right" name="send" value="send">Send <i class="fa fa-envelope-o"></i></button>
              </div>
             </div>
            <!-- /.box-footer -->
          </div>
					</form>
          <!-- /. box -->
	</div>	
        </div>    
						
                    </div>
                </div>
            </div>
        </div> 
