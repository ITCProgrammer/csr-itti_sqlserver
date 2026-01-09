<script type="text/javascript">
    function tampil(){
	if(document.forms['form1']['status'].value=="BW" || document.forms['form1']['status'].value=="TBD"){
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
            window.location.href='CWarnaFin';
        }else{
            window.location.href='CWarnaFin&'+nokk;
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
            window.location.href='CWarnaFin&'+nokk+'&'+shift;
        }
    }
</script>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if($_POST['simpan']=="simpan")
{
		$ceksql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$_GET[nokk]' and `shift`='$_POST[shift]' AND `pisah_kain`='$_POST[no_revisi]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='QCF' LIMIT 1");
    $cek=mysqli_num_rows($ceksql);
	if($cek>0){
	$pelanggan=str_replace("'","''",$_POST['pelanggan']);
	$order=str_replace("'","''",$_POST['no_order']);
	$po=str_replace("'","''",$_POST['no_po']);
	$jns=str_replace("'","''",$_POST['jenis_kain']);
	$warna=str_replace("'","''",$_POST['warna']);
    $catatan=str_replace("'","''",$_POST['catatan']);
    $colorist_qcf=str_replace("'","''",$_POST['colorist_qcf']);
	$sql1=mysqli_query($con,"UPDATE`tbl_lap_inspeksi` SET
	`no_order`='$order',
	`no_po`='$po',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`no_item`='$_POST[no_item]',
	`warna`='$warna',
	`no_warna`='$_POST[no_warna]',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`pisah_kain`='$_POST[no_revisi]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`tgl_update`='$_POST[tgl]',
    `disposisi`='$_POST[disposisi]',
    `colorist_qcf`='$colorist_qcf',
	`catatan`='$catatan'
	WHERE `nokk`='$_POST[nokk]'");
	if($sql1){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='CWarnaFin&$_POST[nokk]';
               
            }
          });</script>";
		}
		}
    else{
	$pelanggan=str_replace("'","''",$_POST['pelanggan']);
	$order=str_replace("'","''",$_POST['no_order']);
	$po=str_replace("'","''",$_POST['no_po']);
	$jns=str_replace("'","''",$_POST['jenis_kain']);
	$warna=str_replace("'","''",$_POST['warna']);
    $catatan=str_replace("'","''",$_POST['catatan']);
    $colorist_qcf=str_replace("'","''",$_POST['colorist_qcf']);
	$sql=mysqli_query($con,"INSERT INTO `tbl_lap_inspeksi` SET
	`nokk`='$_POST[nokk]',
	`no_order`='$order',
	`no_po`='$po',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`no_item`='$_POST[no_item]',
	`warna`='$warna',
	`no_warna`='$_POST[no_warna]',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`shift`='$_POST[shift]',
	`jml_roll`='$_POST[rol]',
	`pisah_kain`='$_POST[no_revisi]',
	`bruto`='$_POST[bruto]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`catatan`='$catatan',
    `tgl_cwarna`=now(),
	`dept`='QCF',
    `disposisi`='$_POST[disposisi]',
    `colorist_qcf`='$colorist_qcf',
	`tgl_update`='$_POST[tgl]'");
	if($sql){
        //echo " <script>alert('Data has been saved!');</script>";
        echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='CWarnaFin&$_POST[nokk]';
               
            }
          });</script>";
		}
	}
}
?>

<?Php
if($_GET['nokk']!=""){$nokk=$_GET['nokk'];}else{$nokk=" ";}
if($_GET['shift']!=""){$shift=$_GET['shift'];}else{$shift=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='QCF' LIMIT 1");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data sudah disimpan di database mysqli
$msql1=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND `dept`='QCF' LIMIT 1");
$row1=mysqli_fetch_array($msql1);
$crow1=mysqli_num_rows($msql1);

//Data sudah disimpan di database mysqli
$qryfin=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' AND `dept`='QCF' ORDER BY id DESC LIMIT 1");
$rfin=mysqli_fetch_array($qryfin);
$cekfin=mysqli_num_rows($qryfin);

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
                        <select class="form-control select2" required name="shift" id="shift" onchange="proses_shift()">
                            <option value="0">Pilih</option>
                            <option value="A" <?php if($_GET['shift']=="A"){echo "SELECTED";}?>>A</option>
                            <option value="B" <?php if($_GET['shift']=="B"){echo "SELECTED";}?>>B</option>
                            <option value="C" <?php if($_GET['shift']=="C"){echo "SELECTED";}?>>C</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                <div class="col-sm-8">
                    <input name="pelanggan" type="text" class="form-control" id="pelanggan" 
			        value="<?php if($crow>0){echo $row['pelanggan'];}else{if($_GET['nokk']!="" and $r1['partnername']!=""){echo $r1['partnername']."/".$r2['partnername'];}}?>" placeholder="Pelanggan" >
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
                <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                <div class="col-sm-8">
                    <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if($crow>0){echo $row['jenis_kain'];}else{echo stripslashes($r['description']);}?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="no_item" class="col-sm-3 control-label">No Item</label>
                <div class="col-sm-3">
                    <input name="no_item" type="text" class="form-control" id="no_item" value="<?php if($crow>0){echo $row['no_item'];}else{echo $r['HangerNo'];} ?>" placeholder="No Item">
                </div>
            </div>
            <div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($r['color']);}?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                <div class="col-sm-8">
                    <textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($crow>0){echo $row['no_warna'];}else{echo stripslashes($r['colorno']);}?></textarea>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">		  	
                <label for="tgl" class="col-sm-3 control-label">Tgl Fin</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_update'];}?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">		  	
                <label for="awal" class="col-sm-3 control-label">Tgl Celup</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="awal" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_pengiriman'];} ?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
				<label for="no_revisi" class="col-sm-3 control-label">Revisi Ke</label>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="no_revisi" required>
                            <option value="0" <?php if($row['pisah_kain']=="0"){echo "SELECTED";}?>>1</option>
                            <option value="1" <?php if($row['pisah_kain']=="1"){echo "SELECTED";}?>>2</option>
                            <option value="2" <?php if($row['pisah_kain']=="2"){echo "SELECTED";}?>>3</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="lot" class="col-sm-3 control-label">Lot</label>
                <div class="col-sm-3">
                    <input name="lot" class="form-control" type="text" id="lot" value="<?php echo $row['lot'];?>" placeholder="Lot">
                </div>
            </div>
            <div class="form-group">
                <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol" type="text" class="form-control" id="rol" value="<?php echo $row['jml_roll'];?>" placeholder="" required>
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
				<label for="proses" class="col-sm-3 control-label">Code Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="proses">
                            <option value="Fin" <?php if($row['proses']=="Fin"){echo "SELECTED";}?>>Fin</option>
                            <option value="Fin 1X" <?php if($row['proses']=="Fin 1X"){echo "SELECTED";}?>>Fin 1X</option>
                            <option value="Pdr" <?php if($row['proses']=="Pdr"){echo "SELECTED";}?>>Pdr</option>
                            <option value="Oven" <?php if($row['proses']=="Oven"){echo"SELECTED";}?>>Oven</option>
                            <option value="Comp" <?php if($row['proses']=="Comp"){echo"SELECTED";}?>>Comp</option>
                            <option value="Setting" <?php if($row['proses']=="Setting"){echo"SELECTED";}?>>Setting</option>
                            <option value="AP" <?php if($row['proses']=="AP"){echo"SELECTED";}?>>AP</option>
                            <option value="PB" <?php if($row['proses']=="PB"){echo"SELECTED";}?>>PB</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status Warna</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status" onChange="tampil();">
                            <option value="">Pilih</option>
                            <option value="OK" <?php if($row['status']=="OK"){echo"SELECTED";}?> >OK</option>
                            <option value="BW" <?php if($row['status']=="BW"){echo"SELECTED";}?>>BW</option>
                            <option value="TBD" <?php if($row['status']=="TBD"){echo"SELECTED";}?>>TBD</option>
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
                  <label for="catatan" class="col-sm-3 control-label">Ket</label>
                  <div class="col-sm-8">
                        <textarea name="catatan" class="form-control" id="catatan" placeholder="Keterangan"><?php echo $row['catatan'];?></textarea>  
                  </div>				   
            </div>
        </div>
    </div>
    <div class="box-footer">
            <?php if($_GET['nokk']!="" and $_GET['shift']!="" and $cek==0){ ?>
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
            <!--<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button> -->
            
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatCWarnaFin'"><i class="fa fa-search"></i> Lihat Data</button> 	   
    </div>
</div>
</form>
