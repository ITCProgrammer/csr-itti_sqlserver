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
    function proses_demand(){
        var nodemand = document.getElementById("nodemand").value;

        if (nodemand == 0) {
            window.location.href='LapJahitNew';
        }else{
            window.location.href='LapJahitNew&'+nodemand;
        }
    }

    function proses_shift() {
        var nodemand    = document.getElementById("nodemand").value;
        var shift = document.getElementById("shift").value;

        if (nodemand == "") {
            swal({
                title: 'Nomor Demand tidak boleh kosong',   
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
            window.location.href='LapJahitNew&'+nodemand+'&'+shift;
        }
    }
</script>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if($_POST['simpan']=="simpan")
{
		$ceksql=mysqli_query($con,"SELECT * FROM `tbl_jahit` WHERE `nodemand`='$_GET[nodemand]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_jahit, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
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
	WHERE `nodemand`='$_POST[nodemand]'");
	if($sql1){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapJahitNew-$_POST[nodemand]';
               
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
    `nodemand`='$_POST[nodemand]',
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
                window.location.href='LapJahitNew-$_POST[nodemand]';
               
            }
          });</script>";
		}
	}
}
?>

<?Php
if($_GET['nodemand']!=""){$nodemand=$_GET['nodemand'];}else{$nodemand=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_jahit` WHERE `nodemand`='$nodemand' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_jahit, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

$sqlDB2="SELECT A.CODE AS DEMANDNO, TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, 
CASE
    WHEN C.PO_HEADER IS NULL THEN C.PO_LINE
    ELSE C.PO_HEADER
END AS PO_NUMBER,
TRIM(E.LEGALNAME1) AS LEGALNAME1, TRIM(C.ORDERPARTNERBRANDCODE) AS ORDERPARTNERBRANDCODE, 
TRIM(C.SALESORDERCODE) AS SALESORDERCODE, TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION, TRIM(C.NO_ITEM) AS NO_ITEM, TRIM(A.SUBCODE05) AS NO_WARNA, TRIM(F.LONGDESCRIPTION) AS WARNA,
C.DELIVERYDATE,D.NAMENAME,D.VALUEDECIMAL,G.USERPRIMARYQUANTITY AS QTY_BRUTO
FROM PRODUCTIONDEMAND A 
LEFT JOIN 
	(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
	PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
	GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
ON A.CODE=B.PRODUCTIONDEMANDCODE
LEFT JOIN 
	(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE AS PO_HEADER, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
	SALESORDERDELIVERY.DELIVERYDATE, ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
	LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
	LEFT JOIN ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE AND 
	SALESORDERLINE.SUBCODE01 = ORDERITEMORDERPARTNERLINK.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ORDERITEMORDERPARTNERLINK.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ORDERITEMORDERPARTNERLINK.SUBCODE03 AND
	SALESORDERLINE.SUBCODE04 = ORDERITEMORDERPARTNERLINK.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ORDERITEMORDERPARTNERLINK.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ORDERITEMORDERPARTNERLINK.SUBCODE06 AND 
	SALESORDERLINE.SUBCODE07 = ORDERITEMORDERPARTNERLINK.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ORDERITEMORDERPARTNERLINK.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ORDERITEMORDERPARTNERLINK.SUBCODE09 AND 
	SALESORDERLINE.SUBCODE10 = ORDERITEMORDERPARTNERLINK.SUBCODE10
	GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
	SALESORDERDELIVERY.DELIVERYDATE, ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.SUBCODE03 = C.SUBCODE03 AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
LEFT JOIN
	(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
	LISTAGG(TRIM(ADSTORAGE.NAMENAME),',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS NAMENAME, 
	LISTAGG(ADSTORAGE.VALUEDECIMAL,',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS VALUEDECIMAL
	FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
	GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10) D
ON A.SUBCODE01=D.SUBCODE01 AND
A.SUBCODE02=D.SUBCODE02 AND
A.SUBCODE03=D.SUBCODE03 AND 
A.SUBCODE04=D.SUBCODE04 AND
A.SUBCODE05=D.SUBCODE05 AND 
A.SUBCODE06=D.SUBCODE06 AND 
A.SUBCODE07=D.SUBCODE07 AND 
A.SUBCODE08=D.SUBCODE08 AND 
A.SUBCODE09=D.SUBCODE09 AND 
A.SUBCODE10=D.SUBCODE10
LEFT JOIN
	(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) E
ON A.CUSTOMERCODE=E.CUSTOMERSUPPLIERCODE
LEFT JOIN 
	(SELECT USERGENERICGROUP.CODE,USERGENERICGROUP.LONGDESCRIPTION FROM USERGENERICGROUP USERGENERICGROUP) F
ON A.SUBCODE05=F.CODE
LEFT JOIN
	(SELECT PRODUCTIONRESERVATION.ORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE, SUM(PRODUCTIONRESERVATION.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY FROM PRODUCTIONRESERVATION 
	PRODUCTIONRESERVATION WHERE PRODUCTIONRESERVATION.ITEMTYPEAFICODE='KGF' GROUP BY PRODUCTIONRESERVATION.ORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE) G
ON A.CODE = G.ORDERCODE
WHERE A.CODE='$nodemand'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);
$ww=explode(",",$rowdb2['NAMENAME']);
$valueww=explode(",",$rowdb2['VALUEDECIMAL']);
//GRAMASI
if($ww[0]=="GSM"){ $gramasi=$valueww[0];}
else if($ww[1]=="GSM"){ $gramasi=$valueww[1];}
else if($ww[2]=="GSM"){ $gramasi=$valueww[2];}
else if($ww[3]=="GSM"){ $gramasi=$valueww[3];}
$posg=strpos($gramasi,".");
$valgramasi=substr($gramasi,0,$posg);
//WIDTH
if($ww[0]=="Width"){ $lebar=$valueww[0];}
else if($ww[1]=="Width"){ $lebar=$valueww[1];}
else if($ww[2]=="Width"){ $lebar=$valueww[2];}
else if($ww[3]=="Width"){ $lebar=$valueww[3];}
$posl=strpos($lebar,".");
$vallebar=substr($lebar,0,$posl);

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
				<label for="nodemand" class="col-sm-3 control-label">No Kartu Kerja</label>
                <div class="col-sm-4">
                    <input name="nokk" type="hidden" class="form-control" id="nokk" 
					 value="<?php echo $rowdb2['PRODUCTIONORDERCODE'];?>" >
					<input name="nodemand" type="text" class="form-control" id="nodemand" 
					onchange="proses_demand()" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
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
			        value="<?php if($crow>0){echo $row['pelanggan'];}else{if($_GET['nodemand']!="" and $rowdb2['LEGALNAME1']!=""){echo $rowdb2['LEGALNAME1']."/".$rowdb2['ORDERPARTNERBRANDCODE'];}}?>" placeholder="Langganan" >
                </div>
            </div>
            <div class="form-group">
                <label for="no_po" class="col-sm-3 control-label">PO</label>
                <div class="col-sm-5">
                    <input name="no_po" class="form-control" type="text" id="no_po" value="<?php if($crow>0){echo $row['no_po'];}else{echo $rowdb2['PO_NUMBER'];} ?>" placeholder="PO" required>
                </div>
            </div>
            <div class="form-group">
                <label for="no_order" class="col-sm-3 control-label">No Order</label>
                <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if($crow>0){echo $row['no_order'];}else{echo $rowdb2['SALESORDERCODE'];} ?>" placeholder="No Order" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain Accessories</label>
                <div class="col-sm-8">
                    <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain Accessories"><?php if($crow>0){echo $row['jenis_kain'];}else{echo stripslashes($rowdb2['ITEMDESCRIPTION']);}?></textarea>
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
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($rowdb2['WARNA']);}?></textarea>
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
                    <input name="lot" class="form-control" type="text" id="lot" value="<?php if($crow>0){echo $row['lot'];}else{ echo $rowdb2['PRODUCTIONORDERCODE'];} ?>" placeholder="Lot Accessories">
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
                        <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo number_format($rowdb2['QTY_BRUTO'],'2','.','');} ?>" placeholder="0.00" required>
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
            <?php if($_GET['nodemand']!="" and $_GET['shift']!="" and $cek==0){ ?>
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
            <!--<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button> -->
            
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatJahitNew'"><i class="fa fa-search"></i> Lihat Data</button> 	   
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
         window.location.href='LapJahitNew-$nodemand';
	 
  }
});</script>";
		}
}
?>
