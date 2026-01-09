<script type="text/javascript">
    function proses_nokk(){
        var nokk = document.getElementById("nokk").value;

        if (nokk == 0) {
            window.location.href='LapPacking';
        }else{
            window.location.href='LapPacking&'+nokk;
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
            window.location.href='LapPacking&'+nokk+'&'+shift;
        }
    }
</script>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if($_POST['simpan']=="simpan")
{
	$ceksql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$_GET[nokk]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='PACKING' LIMIT 1");
    $cek=mysqli_num_rows($ceksql);
	if($cek>0){
    $pelanggan=str_replace("'","''",$_POST['pelanggan']);
    $order=str_replace("'","''",$_POST['no_order']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $warna=str_replace("'","''",$_POST['warna']);
    $catatan=str_replace("'","''",$_POST['catatan']);
	$sql1=mysqli_query($con,"UPDATE`tbl_lap_inspeksi` SET
	`no_order`='$order',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`no_mc`='$_POST[no_mc]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`jml_netto`='$_POST[rol_netto]',
	`netto`='$_POST[netto]',
	`panjang`='$_POST[panjang]',
	`satuan`='$_POST[satuan]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`no_grobak`='$_POST[no_grbk]',
	`tgl_mulai`='$_POST[tgl_mulai]',
	`tgl_selesai`='$_POST[tgl_selesai]',
	`jam_mulai`='$_POST[mulai]',
	`jam_selesai`='$_POST[selesai]',
	`istirahat`='$_POST[istirahat]',
	`catatan`='$catatan',
	`jam_mutasi`='$_POST[jam]',
	`tgl_update`='$_POST[tgl]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `ket_qty`='$_POST[ket_qty]'
	WHERE `nokk`='$_POST[nokk]' and  `shift`='$_POST[shift]'");
	if($sql1){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapPacking&$_POST[nokk]';
               
            }
          });</script>";
		}
		}
    else{
    $pelanggan=str_replace("'","''",$_POST['pelanggan']);
    $order=str_replace("'","''",$_POST['no_order']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $warna=str_replace("'","''",$_POST['warna']);
    $catatan=str_replace("'","''",$_POST['catatan']);
	$sql=mysqli_query($con,"INSERT INTO `tbl_lap_inspeksi` SET
	`nokk`='$_POST[nokk]',
	`no_order`='$order',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`shift`='$_POST[shift]',
	`no_mc`='$_POST[no_mc]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`netto`='$_POST[netto]',
	`jml_netto`='$_POST[rol_netto]',
	`panjang`='$_POST[panjang]',
	`satuan`='$_POST[satuan]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`no_grobak`='$_POST[no_grbk]',
	`tgl_mulai`='$_POST[tgl_mulai]',
	`tgl_selesai`='$_POST[tgl_selesai]',
	`jam_mulai`='$_POST[mulai]',
	`jam_selesai`='$_POST[selesai]',
	`istirahat`='$_POST[istirahat]',
	`catatan`='$catatan',
	`dept`='PACKING',
	`jam_mutasi`='$_POST[jam]',
	`tgl_update`='$_POST[tgl]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `ket_qty`='$_POST[ket_qty]'");
	if($sql){
        //echo " <script>alert('Data has been saved!');</script>";
        echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapPacking&$_POST[nokk]';
               
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
$msql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='PACKING'");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data sudah disimpan di database mysqli
$msql1=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND `dept`='PACKING'");
$row1=mysqli_fetch_array($msql1);
$crow1=mysqli_num_rows($msql1);

//Data sudah disimpan di database mysqli
$qryfin=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' AND `dept`='PACKING' ORDER BY id DESC");
$rfin=mysqli_fetch_array($qryfin);
$cekfin=mysqli_num_rows($qryfin);

//Ambil data tgl mulai
$qryM=mysqli_query($con,"SELECT * FROM `tmp_detail_kite` WHERE nokkKite='$nokk' ORDER BY id DESC LIMIT 1");
$rM=mysqli_fetch_array($qryM);

//Ambil data tgl selesai
$qryS=mysqli_query($con,"SELECT a.*, b.* FROM detail_pergerakan_stok a LEFT JOIN pergerakan_stok b 
ON a.id_stok=b.id WHERE a.nokk='$nokk' AND a.transtatus IS NULL ORDER BY a.id DESC LIMIT 1");
$rS=mysqli_fetch_array($qryS);

//Data belum disimpan di database mysqli
$sql=sqlsrv_query($conn,"SELECT processcontrolJO.SODID,processcontrol.productid,salesorders.customerid,joborders.documentno, 
       salesorders.buyerid,processcontrolbatches.lotno,hangerno,color,description,CONVERT(VARCHAR(20),TM.dbo.SODetails.[RequiredDate],120) AS RequiredDate,Capacity
          FROM Joborders 
          INNER JOIN processcontrolJO on processcontrolJO.joid = Joborders.id 
          INNER JOIN salesorders on soid= salesorders.id
		  INNER JOIN SODetails on SODetails.id= processcontrolJO.SODID
          INNER JOIN processcontrol on processcontrolJO.pcid = processcontrol.id 
          INNER JOIN processcontrolbatches on processcontrolbatches.pcid = processcontrol.id 
          INNER JOIN productmaster on productmaster.id= processcontrol.productid 
          WHERE processcontrolbatches.documentno='$nokk'");
		  $r=sqlsrv_fetch_array($sql);
$sql1=sqlsrv_query($conn,"select partnername from partners where id='$r[customerid]'");	
$r1=sqlsrv_fetch_array($sql1);
$sql2=sqlsrv_query($conn,"select partnername from partners where id='$r[buyerid]'");	
$r2=sqlsrv_fetch_array($sql2);
$sqlp=mysqli_query($con,"SELECT
	no_lot,
	no_mc,
	bruto,
	sum(net_wight) AS `neto`,
	count(net_wight) AS rolb,
	count(net_wight) AS roln,
	sum(yard_) AS panjang,
	satuan,user_packing
FROM
	tbl_kite a
INNER JOIN tmp_detail_kite b ON a.nokk = b.nokkKite
WHERE
	a.nokk = '$nokk' ");
	$rp=mysqli_fetch_array($sqlp);
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
                            <option value="1" <?php if($_GET['shift']=="1"){echo "SELECTED";}?>>1</option>
                            <option value="2" <?php if($_GET['shift']=="2"){echo "SELECTED";}?>>2</option>
                            <option value="3" <?php if($_GET['shift']=="3"){echo "SELECTED";}?>>3</option>
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
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($r['color']);}?></textarea>
                </div>
            </div>
            <div class="form-group">		  	
                <label for="awal" class="col-sm-3 control-label">Tgl Pengiriman</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_pengiriman'];}else if($_GET['nokk']!="" and $r['RequiredDate']!=""){echo date('Y-m-d', strtotime($r['RequiredDate']));} ?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">		  	
                <label for="tgl" class="col-sm-3 control-label">Tgl Update</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_update'];} ?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
				<label for="inspektor" class="col-sm-3 control-label">Group</label>
                    <div class="col-sm-3">
                    <?php if($crow>0){$grup=$row['inspektor'];}else{$grup=$rp['user_packing'];}?>
                        <select class="form-control select2" name="inspektor" required>
                            <option value="">Pilih</option>
                            <option value="PACKING A" <?php if($grup=="PACKING A"){echo "SELECTED";}?>>PACKING A</option>
                            <option value="PACKING B" <?php if($grup=="PACKING B"){echo "SELECTED";}?>>PACKING B</option>
                            <option value="PACKING C" <?php if($grup=="PACKING C"){echo "SELECTED";}?>>PACKING C</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="lot" class="col-sm-3 control-label">Lot</label>
                <div class="col-sm-2">
                    <input name="lot" class="form-control" type="text" id="lot" value="<?php echo $row['lot'];?>" placeholder="Lot">
                </div>
                <label for="mulai" class="col-sm-1 control-label">Jam Mulai</label>
                <div class="col-sm-2">
                    <input name="mulai" class="form-control" type="text" id="mulai" placeholder="00.00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + '';
                    }" value="<?php if($crow>0){echo $row['jam_mulai'];}else if($rM['nokkKite']==""){}else{echo substr($rM['create_date'],11,5);} ?>" maxlength="5" size="5">
                </div>
                <div class="col-sm-4">					  
                    <div class="input-group date">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_mulai" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_mulai'];}else if($rM['nokkKite']==""){}else{echo substr($rM['create_date'],0,10);}?>" required/>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="no_mc" class="col-sm-3 control-label">No MC</label>
                <div class="col-sm-2">
                    <input name="no_mc" class="form-control" type="text" id="no_mc" value="<?php if($crow >0){echo $row['no_mc'];}else{echo $rp['no_mc'];}?>" placeholder="No MC">
                </div>
                <label for="selesai" class="col-sm-1 control-label">Jam Selesai</label>
                <div class="col-sm-2">
                    <input name="selesai" class="form-control" type="text" id="selesai" placeholder="00.00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + '';
                    }" value="<?php if($crow>0){echo $row['jam_selesai'];}else if($rS['nokk']==""){}else{echo substr($rS['tgl_update'],11,5);} ?>" maxlength="5" size="5">
                </div>
                <div class="col-sm-4">					  
                    <div class="input-group date">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_selesai" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_selesai'];}else if($rS['nokk']==""){}else{echo substr($rS['tgl_update'],0,10);}?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="operator" class="col-sm-3 control-label">Operator</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select class="form-control select2" name="operator" id="operator">
                                <option value="">Pilih</option>
                                <?php 
                                $qryo=mysqli_query($con,"SELECT nama FROM tbl_operator ORDER BY nama ASC");
                                while($ro=mysqli_fetch_array($qryo)){
                                ?>
                                <option value="<?php echo $ro['nama'];?>" <?php if($row['operator']==$ro['nama']){echo "SELECTED";}?>><?php echo $ro['nama'];?></option>	
                                <?php }?>
                            </select>
                            <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataOperator"> ...</button></span>
						</div>
                    </div>
            </div>
            <div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" 
						value="<?php if($crow>0){echo $row['lebar'];} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="gramasi" type="text" class="form-control" id="gramasi" 
						value="<?php if($crow>0){echo $row['gramasi'];} ?>" placeholder="0" required>
					</div>		
				</div>
            <div class="form-group">
                <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol" type="text" class="form-control" id="rol" value="<?php if($crow > 0){echo $row['jml_roll'];}else{echo $rp['rolb'];}?>" placeholder="" required>
                        <span class="input-group-addon">Roll</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo number_format($rp['bruto'],'2','.','');} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label for="istirahat" class="col-sm-3 control-label">Istirahat</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <select class="form-control chosen-select" name="istirahat" id="istirahat">
                                <option value="">Pilih</option>
                                <option value="30" <?php if($row['istirahat']=="30"){echo "SELECTED";}?>>30</option>
                                <option value="60" <?php if($row['istirahat']=="60"){echo "SELECTED";}?>>60</option>
                                <option value="90" <?php if($row['istirahat']=="90"){echo "SELECTED";}?>>90</option>
                            </select>
                            <span class="input-group-addon">Menit</span>
					    </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="qty_netto" class="col-sm-3 control-label">Qty Netto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol_netto" type="text" class="form-control" id="rol_netto" value="<?php if($crow >0){echo $row['jml_netto'];}else{echo $rp['roln'];}?>" placeholder="" required>
                        <span class="input-group-addon">Roll</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="netto" type="text" class="form-control" id="netto" value="<?php if($crow>0){echo $row['netto'];}else{echo number_format($rp['neto'],'2','.','');} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label for="panjang" class="col-sm-3 control-label">Panjang</label>
                <div class="col-sm-4">
                    <div class="input-group">  
                        <input name="panjang" type="text" class="form-control" id="panjang" value="<?php if($crow>0){echo $row['panjang'];}else{echo number_format($rp['panjang'],'2','.','');} ?>" placeholder="0.00" style="text-align: right;" required>
                            <span class="input-group-addon">
                                <?php if($crow>0){$satuan=$row['satuan'];}else{$satuan=$rp['satuan'];}?>
                                <select name="satuan" style="font-size: 12px;" id="satuan">
                                    <option value="Yard" <?php if($satuan=="Yard"){echo "SELECTED";}?>>Yard</option>
                                    <option value="Meter" <?php if($satuan=="Meter"){echo "SELECTED";}?>>Meter</option>
                                </select>
                            </span>	
                    </div>
                </div>
            </div>
            <div class="form-group">
				<label for="proses" class="col-sm-3 control-label">Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="proses">
                            <option value="F" <?php if($row['proses']=="F"){echo "SELECTED";}?>>F</option>
                            <option value="O" <?php if($row['proses']=="O"){echo "SELECTED";}?>>O</option>
                            <option value="T" <?php if($row['proses']=="T"){echo "SELECTED";}?>>T</option>
                        </select>
                    </div>
                <label for="ket_qty" class="col-sm-3 control-label">Ket. Qty</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="ket_qty" required>
                            <option value="Quantity Kecil" <?php if($row['ket_qty']=="Quantity Kecil"){echo "SELECTED";}?>>Quantity Kecil</option>
                            <option value="Quantity Besar" <?php if($row['ket_qty']=="Quantity Besar"){echo "SELECTED";}?>>Quantity Besar</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status">
                            <option value="OK" <?php if($row['status']=="OK"){echo"SELECTED";}?> >OK</option>
                            <option value="BS" <?php if($row['status']=="BS"){echo"SELECTED";}?>>BS</option>
                            <option value="BW" <?php if($row['status']=="BW"){echo"SELECTED";}?>>BW</option>
                            <option value="TCW" <?php if($row['status']=="TCW"){echo"SELECTED";}?>>TCW</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="jam" class="col-sm-3 control-label">Jam Mutasi</label>
                <div class="col-sm-2">
                    <input name="jam" class="form-control" type="text" id="jam" placeholder="00:00:00"title=" e.g 14:25:00 " pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}$" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + ':';
                    }" maxlength="8" size="10">
                </div>
            </div>
            <div class="form-group">
                  <label for="catatan" class="col-sm-3 control-label">Catatan</label>
                  <div class="col-sm-8">
                        <textarea name="catatan" class="form-control" id="catatan" placeholder="Keterangan"><?php echo $row['catatan'];?></textarea>  
                  </div>				   
            </div>
        </div>
    </div>
    <div class="box-footer">
            <?php if($_GET['nokk']!=""  and $_GET['shift']!="" and $cek==0){ ?>
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
            <!--<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button> -->
            
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatPacking'"><i class="fa fa-search"></i> Lihat Data</button> 	   
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
                  <label for="operator" class="col-md-3 control-label">Nama Operator</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="operator" name="operator" required>
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
	$nama=strtoupper($_POST['operator']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_operator SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='LapPacking-$nokk';
	 
  }
});</script>";
		}
}
?>
