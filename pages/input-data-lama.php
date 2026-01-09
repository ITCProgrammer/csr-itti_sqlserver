<?php
	if($_POST[send]=="send"){
$ket=str_replace("'","''",$_POST[ket]);
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
$mail->addAddress(''.$_POST[untuk].'');

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');
// Menambahkan cc atau bcc 
$mail->addCC(''.$_POST[cc].'');
//$mail->addBCC('usmanas.as@gmail.com');

// Subjek email
$mail->Subject = ''.$_POST[subjek].'';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent =''.$_POST[editor1].'';
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
	if($_POST[save]=="save"){
	  $warna=str_replace("'","''",$_POST[warna]);
	  $jns=str_replace("'","''",$_POST[jns_kain]);
	  $styl=str_replace("'","''",$_POST[styl]);	
	  $po=str_replace("'","''",$_POST[no_po]);	
  	  $sqlData=mysql_query("INSERT INTO tbl_qcf SET 
		  nokk='$_POST[nokk]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_po='$po',
		  jenis_kain='$jns',
		  styl='$styl',
		  lot='$_POST[lot]',
		  rol='$_POST[rol]',
		  warna='$warna',
		  netto='$_POST[netto]',
		  panjang='$_POST[panjang]',
		  satuan='$_POST[satuan]',
		  tgl_masuk='$_POST[tglmsk]',
		  tgl_update=now()");	 	  
	  
		if($sqlData){
			echo "<script>alert('Data Tersimpan');</script>";
			echo "<script>window.location.href='?p=Input-Data&nokk=$_GET[nokk];</script>";
		}
		
			
	}
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
				soda.RefNo as DetailRefNo,jo.DocumentNo as NoOrder,soda.PONumber,
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID
				
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
					pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID
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
$sql1=mssql_query("select partnername from partners where id='$r[customerid]'");	
$r1=mssql_fetch_array($sql1);
$sql2=mssql_query("select partnername from partners where id='$r[buyerid]'");	
$r2=mssql_fetch_array($sql2);
$child=$r[ChildLevel];
	if($nokk!=""){	
		if($child > 0){
			$sqlgetparent=mssql_query("select ID,LotNo from ProcessControlBatches where ID='$r[RootID]' and ChildLevel='0'");
			$rowgp=mssql_fetch_assoc($sqlgetparent);
			
			//$nomLot=substr("$row2[LotNo]",0,1);
			$nomLot=$rowgp[LotNo];
			$nomorLot="$nomLot/K$r[ChildLevel]&nbsp;";				
								
		}else{
			$nomorLot=$r[LotNo];
				
		}

		$sqlLot1="Select count(*) as TotalLot From ProcessControlBatches where PCID='$r[PCID]' and RootID='0' and LotNo < '1000'";
		$qryLot1 = mssql_query($sqlLot1) or die('A error occured : ');							
		$rowLot=mssql_fetch_assoc($qryLot1);
		$lotno=$rowLot[TotalLot]."-".$nomorLot;
		$x=((($r[Lebar]+2)*$r[Gramasi])/43.06038193629178);
		$x1=(1000/$x);
		$yard=$x1*$r[Quantity]; 
$sqlpack=mysql_query("SELECT
	tgl_mulai,jml_netto,netto,panjang,satuan
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'PACKING'
ORDER BY id DESC LIMIT 1");
			$sPack=mysql_fetch_array($sqlpack);
		$sqlinsp=mysql_query("SELECT
	tgl_mulai,jml_netto,netto,panjang
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'INSPEKSI'
ORDER BY id ASC LIMIT 1");
			$sInsp=mysql_fetch_array($sqlinsp);
$sqlwarna=mysql_query("SELECT
	tgl_update,`status`
FROM
	`tbl_lap_inspeksi`
WHERE
	`nokk` = '$nokk'
AND `dept` = 'QCF'
ORDER BY id DESC LIMIT 1");
			$sWarna=mysql_fetch_array($sqlwarna);
}
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
                     onchange="window.location='?p=Input-Data&nokk='+this.value" value="<?php echo $_GET[nokk];?>" placeholder="No KK" required >
		  </div>
                </div>
	           <div class="form-group">
                  <label for="no_order" class="col-sm-3 control-label">No Order</label>
                  <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" 
                    value="<?php echo $r[NoOrder]; ?>" placeholder="No Order" required>
                  </div>				   
                </div>
	           <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">PO</label>
                  <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" 
                    value="<?php echo $r[PONumber]; ?>" placeholder="PO" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_hanger" class="col-sm-3 control-label">No Hanger</label>
                  <div class="col-sm-5">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" 
                    value="<?php echo $r[HangerNo];?>" placeholder="No Hanger" >
                  </div>				   
                </div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php echo $r[ProductDesc];?></textarea>
					  </div>
                  </div>
		        <div class="form-group">
                  <label for="styl" class="col-sm-3 control-label">Style</label>
                  <div class="col-sm-8">
                    <input name="styl" type="text" class="form-control" id="styl" 
                    value="" placeholder="Style" required>
                  </div>				   
                </div>
		    <div class="form-group">
                  <label for="qty_order" class="col-sm-3 control-label">Qty Order</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty1" type="text" class="form-control" id="qty1" 
                    value="<?php if($nokk!=""){echo round($r[BatchQuantity],2);} ?>" placeholder="0.00" required>
					  <span class="input-group-addon">KGs</span></div>  
                  </div>
				  <div class="col-sm-4">
					<div class="input-group">  
                    <input name="qty2" type="text" class="form-control" id="qty2" 
                    value="<?php if($nokk!=""){echo round($r[Quantity],2);} ?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">
							  <select name="satuan" style="font-size: 12px;">
								  <option value="Yard" <?php if($r[UnitID]=="21"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($r[UnitID]=="10"){ echo "SELECTED"; }?>>Meter</option>
							  </select>
					    </span>
					</div>	
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="jml_bruto" class="col-sm-3 control-label">Jml Bruto</label>
                  <div class="col-sm-2">
                    <input name="qty3" type="text" class="form-control" id="qty3" 
                    value="<?php if($nokk!=""){echo round($r[RollCount]);} ?>" placeholder="0.00" required>
                  </div>
				  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty4" type="text" class="form-control" id="qty4" 
                    value="<?php if($nokk!=""){echo round($r[Weight],2);} ?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">KGs</span>
					</div>	
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="lebar" type="text" class="form-control" id="lebar" 
                    value="<?php if($nokk!=""){echo round($r[Lebar]);} ?>" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="grms" type="text" class="form-control" id="grms" 
                    value="<?php if($nokk!=""){echo round($r[Gramasi]);} ?>" placeholder="0" required>
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="warna" class="col-sm-3 control-label">Warna</label>
                  <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php echo $r[Color];?></textarea>  
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" 
                    value="<?php echo $lotno; ?>" placeholder="Lot" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="rol" class="col-sm-3 control-label">Rol</label>
                  <div class="col-sm-2">
                    <input name="rol" type="text" class="form-control" id="rol" 
                    value="<?php echo $sPack[jml_netto];?>" placeholder="0" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="netto" class="col-sm-3 control-label">Netto</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="netto" type="text" class="form-control" id="netto" 
                    value="<?php echo $sPack[netto];?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="panjang" class="col-sm-3 control-label">Panjang</label>
                  <div class="col-sm-4">
					  <div class="input-group">
                    <input name="panjang" type="text" class="form-control" id="panjang" 
                    value="<?php echo $sPack[panjang];?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack[satuan]=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack[satuan]=="Meter"){ echo "SELECTED"; }?>>Meter</option>
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
                    value="" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
	  <div class="form-group">
                  <label for="finl_g" class="col-sm-3 control-label">Fin Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="finlebar" type="text" class="form-control" id="finlebar" 
                    value="" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="fingrms" type="text" class="form-control" id="fingrms" 
                    value="" placeholder="0" required>
                  </div>		
                </div>
	<div class="form-group">
                  <label for="insl_g" class="col-sm-3 control-label">Ins Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="inslebar" type="text" class="form-control" id="inslebar" 
                    value="" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="insgrms" type="text" class="form-control" id="insgrms" 
                    value="" placeholder="0" required>
                  </div>		
                </div>	  
	  <div class="form-group">
        <label for="tglfin" class="col-sm-3 control-label">Tgl Finishing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglfin" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="" required/>
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label for="tglins" class="col-sm-3 control-label">Tgl Inspeksi</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglins" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php echo $sInsp[tgl_mulai];?>" />
          </div>
        </div>
	  </div>
	  <div class="form-group">
        <label for="tglpk" class="col-sm-3 control-label">Tgl Packing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglpk" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $sPack[tgl_mulai];?>" required/>
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label for="tglmsk" class="col-sm-3 control-label">Tgl Masuk</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglmsk" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="" />
          </div>
        </div>
	  </div>
	  <div class="form-group">
                  <label for="penyusutan" class="col-sm-3 control-label">Penyusutan</label>
                  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="pp" type="text" class="form-control" id="pp" 
                    value="" placeholder="P" required>
					<span class="input-group-addon">%</span>	
					</div>	
                  </div>
				  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="pl" type="text" class="form-control" id="pl" 
                    value="" placeholder="L" required>
					<span class="input-group-addon">%</span>
					</div>	
                  </div>
		  		  <div class="col-sm-2">
					<div class="input-group">  
                    <input name="ps" type="text" class="form-control" id="ps" 
                    value="" placeholder="S" required>
					<span class="input-group-addon">%</span>
					</div>
                  </div>	
      </div>
		  <div class="form-group">
                  <label for="cekwarna" class="col-sm-3 control-label">Cek Warna</label>
                  <div class="col-sm-8">
                    <textarea name="cekwarna" class="form-control" id="cekwarna" placeholder="Cek Warna"><?php echo $sWarna[status]." ".$sWarna[tgl_update]; ?></textarea>  
                  </div>				   
                </div>
		    <div class="form-group">
                  <label for="extra" class="col-sm-3 control-label">Extra</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="extra" type="text" class="form-control" id="extra" 
                    value="" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>	
				<div class="col-sm-4">
					  <div class="input-group">
                    <input name="panjang1" type="text" class="form-control" id="panjang1" 
                    value="" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan1" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack[satuan]=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack[satuan]=="Meter"){ echo "SELECTED"; }?>>Meter</option>
							  </select>
					    </span></div>
					  </div>
                </div>
		 		
		  <div class="form-group">
                  <label for="ket" class="col-sm-3 control-label">Ket</label>
                  <div class="col-sm-8">
                    <textarea name="ket" class="form-control" id="ket" placeholder="Keterangan"></textarea>  
                  </div>				   
          </div>
		  <div class="form-group">
                  <label for="masalah" class="col-sm-3 control-label">Masalah</label>
                  <div class="col-sm-8">
				  <div class="input-group">
                  <input  type="text" name="masalah" class="form-control" id="masalah" placeholder="Masalah">
                    <span class="input-group-btn">
                      <a href="#" data-toggle="modal" data-target="#myModal"><i class="btn btn-info btn-flat">Send</i> </a>
                    </span>
              </div>  
                  </div>				   
          </div>
		  		  
	 </div>
	
</div>	 
   <div class="box-footer">
   <button type="submit" class="btn btn-primary pull-left" name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
   <button type="submit" class="btn btn-success pull-right" name="send" value="send">Send <i class="fa fa-envelope-o"></i></button>
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
                <input class="form-control" placeholder="To:" name="untuk">
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Cc:" name="cc">
              </div>			
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subjek">
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
    <td width="723" nowrap valign="bottom"><p align="right">2129</p></td>
    <td width="723" nowrap valign="bottom"><p>LOT </p></td>
    <td width="723" nowrap valign="bottom"><p>1-1</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>CUSTOMER</p></td>
    <td width="723" nowrap valign="bottom"><p>RICKY&nbsp; GARMENT/RUSSEL </p></td>
    <td width="723" nowrap valign="bottom"><p>UKURAN </p></td>
    <td width="723" nowrap valign="bottom"><p>58X220</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>PO</p></td>
    <td width="723" nowrap valign="bottom"><p>012/ITT/11/18</p></td>
    <td width="723" nowrap valign="bottom"><p>ROLL</p></td>
    <td width="723" nowrap valign="bottom"><p>1</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>ORDER</p></td>
    <td width="723" nowrap valign="bottom"><p>3037364/X/18</p></td>
    <td width="723" nowrap valign="bottom"><p>QTY</p></td>
    <td width="723" nowrap valign="bottom"><p>7.21</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>JENIS KAIN</p></td>
    <td width="723" nowrap valign="bottom"><p>98/2 CTN POLY&nbsp; SPD&nbsp;    DK&nbsp; RIB 1X1 SPD &nbsp;QD </p></td>
    <td width="723" nowrap valign="bottom"><p>PABRIK RAJUT</p></td>
    <td width="723" nowrap valign="bottom"><p>2015416/VIII/18</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p>WHITE </p></td>
    <td width="723" nowrap valign="bottom"><p>DELIVERY KAIN    JADI</p></td>
    <td width="723" nowrap valign="bottom"><p>16/11/18</p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>NO WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p>8B 0852&nbsp;    BRL </p></td>
    <td width="723" nowrap valign="bottom"><p>DEPT PENANGGUNG JWB</p></td>
    <td width="723" nowrap valign="bottom"><p>FIN:100%</p></td>
  </tr>
  <tr>
    <td width="723" valign="top" nowrap><p>MASALAH KAIN </p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
    <td width="723" colspan="2" valign="top"><p align="center">LEBAR&nbsp; TIDAK STABIL 57-58&nbsp; INCH CUTTING    LOSS&nbsp; SPV QC </p></td>
    <td width="723" valign="top"><p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap colspan="4"><p>ESTIMASI GANTI    KAIN 1 KG</p>      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap colspan="4" valign="bottom"><p><strong>CEK&nbsp;    STOCK/SISA </strong></p>      <p>&nbsp;</p></td>
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
