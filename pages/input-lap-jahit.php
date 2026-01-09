<script type="text/javascript">
    function tampil(){
	if(document.forms['form1']['status'].value=="BEDA WARNA"){
		$("#disposisi").css("display", "");  // To unhide
	}else{
		$("#disposisi").css("display", "none");  // To hide
	}
    if(document.forms['form1']['status'].value==""){
		$("#disposisi").css("display", "none");  // To hide
	}
    if(document.forms['form1']['status'].value=="OK"){
		$("#disposisi").css("display", "none");  // To hide
	}
    }
    function proses_nokk(){
        var nokk = document.getElementById("nokk").value;

        if (nokk == 0) {
            window.location.href='LapJahit';
        }else{
            window.location.href='LapJahit&'+nokk;
        }
    }

    function proses_shift() {
        var nokk    = document.getElementById("nokk").value;
        var shift = document.getElementById("shift").value;

        if (nokk == "") {
            swal({
                title: 'Nomor KK tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        }else if (shift == 0){
            swal({
                title: 'Shift tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        } else {
            window.location.href='LapJahit&'+nokk+'&'+shift;
        }
    }
</script>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if($_POST['simpan']=="simpan")
{
		$ceksql=mysqli_query($con,"SELECT * FROM `tbl_jahit` WHERE `nokk`='$_GET[nokk]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_jahit, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
    $cek=mysqli_num_rows($ceksql);
	if($cek>0){
	$langganan=str_replace("'","''",$_POST['langganan']);
	$order=str_replace("'","''",$_POST['no_order']);
	$po=str_replace("'","''",$_POST['no_po']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $jns_body=str_replace("'","''",$_POST['jenis_kain_body']);
    $lot_body=str_replace("'","''",$_POST['lot_body']);
	$warna=str_replace("'","''",$_POST['warna']);
    $ket=str_replace("'","''",$_POST['ket']);
    $colorist_qcf=str_replace("'","''",$_POST['colorist_qcf']);
	$sql1=mysqli_query($con,"UPDATE `tbl_jahit` SET
	`no_order`='$order',
	`no_po`='$po',
	`langganan`='$langganan',
	`jenis_kain`='$jns',
    `jenis_kain_body`='$jns_body',
	`warna`='$warna',
	`lot`='$_POST[lot]',
    `lot_body`='$_POST[lot_body]',
	`roll`='$_POST[roll]',
	`bruto`='$_POST[bruto]',
	`status`='$_POST[status]',
    `operator`='$_POST[operator]',
    `tgl_fin`='$_POST[tgl_fin]',
    `tgl_jahit`='$_POST[tgl_jahit]',
	`ket`='$ket',
    `disposisi`='$_POST[disposisi]',
    `colorist_qcf`='$colorist_qcf',
    `tgl_update`=now()
	WHERE `nokk`='$_POST[nokk]'");
	if($sql1){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapJahit-$_POST[nokk]';
               
            }
          });</script>";
		}
		}
    else{
    $langganan=str_replace("'","''",$_POST['langganan']);
    $order=str_replace("'","''",$_POST['no_order']);
    $po=str_replace("'","''",$_POST['no_po']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $jns_body=str_replace("'","''",$_POST['jenis_kain_body']);
    $lot_body=str_replace("'","''",$_POST['lot_body']);
    $warna=str_replace("'","''",$_POST['warna']);
    $ket=str_replace("'","''",$_POST['ket']);
    $colorist_qcf=str_replace("'","''",$_POST['colorist_qcf']);
	$sql=mysqli_query($con,"INSERT INTO `tbl_jahit` SET
	`nokk`='$_POST[nokk]',
	`no_order`='$order',
	`no_po`='$po',
	`langganan`='$langganan',
	`jenis_kain`='$jns',
    `jenis_kain_body`='$jns_body',
	`warna`='$warna',
	`lot`='$_POST[lot]',
    `lot_body`='$_POST[lot_body]',
	`roll`='$_POST[roll]',
	`bruto`='$_POST[bruto]',
	`status`='$_POST[status]',
    `operator`='$_POST[operator]',
    `tgl_fin`='$_POST[tgl_fin]',
    `tgl_jahit`='$_POST[tgl_jahit]',
    `shift`='$_POST[shift]',
	`ket`='$ket',
    `disposisi`='$_POST[disposisi]',
    `colorist_qcf`='$colorist_qcf',
    `tgl_buat`=now(),
    `tgl_update`=now()");
	if($sql){
        //echo " <script>alert('Data has been saved!');</script>";
        echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapJahit-$_POST[nokk]';
               
            }
          });</script>";
		}
	}
}
?>

<?Php
if($_GET['nokk']!=""){$nokk=$_GET['nokk'];}else{$nokk=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_jahit` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_jahit, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data belum disimpan di database mysqli
$sql=sqlsrv_query($conn,"select top 1
			x.*,dbo.fn_StockMovementDetails_GetTotalWeightPCC(0, x.PCBID) as Weight, 
			pm.Weight as Gramasi,pm.CuttableWidth as Lebar, pm.Description as description, pm.colorno, pm.color,
      dbo.fn_StockMovementDetails_GetTotalRollPCC(0, x.PCBID) as RollCount
		from
			(
			select
				so.SONumber, convert(char(10),so.SODate,103) as TglSO, so.customerid, so.buyerid, so.PODate,
				sod.ID as SODID, sod.ProductID, sod.Quantity, sod.UnitID, sod.WeightUnitID, 
				soda.RefNo as DetailRefNo, jo.documentno as documentno,soda.PONumber,
				pcb.ID as PCBID, pcb.Gross as Bruto,soda.HangerNo,pp.ProductCode,
				pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
				pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate,
				pcb.Capacity
				
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
					pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID,sod.RequiredDate,pcb.Capacity
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
/*$sql=mssql_query("SELECT processcontrolJO.SODID,processcontrol.productid,salesorders.customerid,salesorders.PONumber,joborders.documentno, 
       salesorders.buyerid,processcontrolbatches.lotno,hangerno,color,colorno,description,RequiredDate,Capacity
          FROM Joborders 
          INNER JOIN processcontrolJO on processcontrolJO.joid = Joborders.id 
          INNER JOIN salesorders on soid= salesorders.id
		  INNER JOIN SODetails on SODetails.id= processcontrolJO.SODID
          INNER JOIN processcontrol on processcontrolJO.pcid = processcontrol.id 
          INNER JOIN processcontrolbatches on processcontrolbatches.pcid = processcontrol.id 
          INNER JOIN productmaster on productmaster.id= processcontrol.productid 
          WHERE processcontrolbatches.documentno='$nokk'");*/
		  $r=sqlsrv_fetch_array($sql);
$sql1=sqlsrv_query($conn,"select partnername from partners where id='$r[customerid]'");	
$r1=sqlsrv_fetch_array($sql1);
$sql2=sqlsrv_query($conn,"select partnername from partners where id='$r[buyerid]'");	
$r2=sqlsrv_fetch_array($sql2);

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
				<label for="nokk" class="col-sm-3 control-label">No Kartu Kerja</label>
                <div class="col-sm-4">
					<input name="nokk" type="text" class="form-control" id="nokk" 
					onchange="proses_nokk()" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
			    </div>
			</div>
            <div class="form-group">
            <label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control chosen-select" name="shift" required id="shift" onchange="proses_shift()">
                            <option value="0">Pilih</option>
                            <option value="A" <?php if($_GET['shift']=="A"){echo "SELECTED";}?>>A</option>
                            <option value="B" <?php if($_GET['shift']=="B"){echo "SELECTED";}?>>B</option>
                            <option value="C" <?php if($_GET['shift']=="C"){echo "SELECTED";}?>>C</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="langganan" class="col-sm-3 control-label">Langganan</label>
                <div class="col-sm-8">
                    <input name="langganan" type="text" class="form-control" id="langganan" 
			        value="<?php if($crow>0){echo $row['langganan'];}else{if($_GET['nokk']!="" and $r1['partnername']!=""){echo $r1['partnername']."/".$r2['partnername'];}}?>" placeholder="Langganan" >
                </div>
            </div>
            <div class="form-group">
                <label for="no_po" class="col-sm-3 control-label">PO</label>
                <div class="col-sm-5">
                    <input name="no_po" class="form-control" type="text" id="no_po" value="<?php if($crow>0){echo $row['no_po'];}else{echo $r['PONumber'];} ?>" placeholder="PO" required>
                </div>
            </div>
            <div class="form-group">
                <label for="no_order" class="col-sm-3 control-label">No Order</label>
                <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if($crow>0){echo $row['no_order'];}else{echo $r['documentno'];} ?>" placeholder="No Order" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain Accessories</label>
                <div class="col-sm-8">
                    <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain Accessories"><?php if($crow>0){echo $row['jenis_kain'];}else{echo stripslashes($r['description']);}?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kain_body" class="col-sm-3 control-label">Jenis Kain Body</label>
                <div class="col-sm-8">
                    <textarea name="jenis_kain_body" class="form-control" id="jenis_kain_body" placeholder="Jenis Kain Body"><?php if($crow>0){echo $row['jenis_kain_body'];}?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($r['color']);}?></textarea>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">		  	
                <label for="tgl_jahit" class="col-sm-3 control-label">Tgl Jahit</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_jahit" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_jahit'];}?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="lot" class="col-sm-3 control-label">Lot Accessories</label>
                <div class="col-sm-3">
                    <input name="lot" class="form-control" type="text" id="lot" value="<?php if($crow>0){echo $row['lot'];}else{echo $lotno;} ?>" placeholder="Lot Accessories">
                </div>
            </div>
            <div class="form-group">
                <label for="lot_body" class="col-sm-3 control-label">Lot Body</label>
                <div class="col-sm-3">
                    <input name="lot_body" class="form-control" type="text" id="lot_body" value="<?php echo $row['lot_body'];?>" placeholder="Lot Body">
                </div>
            </div>
            <div class="form-group">
                <label for="tgl_fin" class="col-sm-3 control-label">Tgl Fin</label>
                <div class="col-sm-5">
                    <input name="tgl_fin" class="form-control" type="text" id="tgl_fin" value="<?php if($crow>0){echo $row['tgl_fin'];}?>" placeholder="Tgl Fin" required>
                </div>
            </div>
            <!--<div class="form-group">		  	
                <label for="tgl_fin" class="col-sm-3 control-label">Tgl Fin</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_fin" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_fin'];}?>" required/>
                        </div>
                    </div>
            </div>-->
            <div class="form-group">
                <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="roll" type="text" class="form-control" id="roll" value="<?php echo $row['roll'];?>" placeholder="0" required>
                        <span class="input-group-addon">Roll</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo number_format($r['Capacity'],'2','.','');} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
            </div>
            <div class="form-group">
				<label for="operator" class="col-sm-3 control-label">Operator</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="operator" id="operator" required>
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_operator_jahit ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($row['operator']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataOperator"> ...</button></span>
						</div>
					</div>
            </div>
            <div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status" onChange="tampil();">
                            <option value="">Pilih</option>
                            <option value="OK" <?php if($row['status']=="OK"){echo"SELECTED";}?> >OK</option>
                            <option value="BEDA WARNA" <?php if($row['status']=="BEDA WARNA"){echo"SELECTED";}?>>BEDA WARNA</option>
                            <option value="BELUM OK" <?php if($row['status']=="BELUM OK"){echo"SELECTED";}?> >BELUM OK</option>
                        </select>
                    </div>
            </div>
            <div class="form-group" id="disposisi" style="display:none;">
                <label for="disposisi" class="col-sm-3 control-label">Disposisi</label>
                <div class="col-sm-5">
                    <input name="disposisi" class="form-control" type="text" id="disposisi" value="<?php echo $row['disposisi'];?>" placeholder="Disposisi">
                </div>
            </div>
            <div class="form-group">
                <label for="colorist_qcf" class="col-sm-3 control-label">Colorist QCF</label>
                <div class="col-sm-5">
                    <input name="colorist_qcf" class="form-control" type="text" id="colorist_qcf" value="<?php echo $row['colorist_qcf'];?>" placeholder="Colorist QCF">
                </div>
            </div>
            <div class="form-group">
                  <label for="ket" class="col-sm-3 control-label">Ket</label>
                  <div class="col-sm-8">
                        <textarea name="ket" class="form-control" id="ket" placeholder="Keterangan"><?php echo $row['ket'];?></textarea>  
                  </div>				   
            </div>
        </div>
    </div>
    <div class="box-footer">
            <?php if($_GET['nokk']!="" and $_GET['shift']!="" and $cek==0){ ?>
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
            <!--<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button> -->
            
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatJahit'"><i class="fa fa-search"></i> Lihat Data</button> 	   
    </div>
</div>
</form>

<div class="modal fade" id="DataOperator">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Operator</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Operator</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_operator" id="simpan_operator" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_operator']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_operator_jahit SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='Lapjahit-$nokk';
	 
  }
});</script>";
		}
}
?>
